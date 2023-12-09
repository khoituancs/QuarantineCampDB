<?php
    include_once ("../config.php");
    // Create a connection to the MySQL server
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "QuarantineCampDB";

    // Create a MySQLi connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $params = [
        "fullname" => 1,
        "phone" => 1, 
        "admission_date" => 1,
        "identity_number" => 1,
        "gender" => 1
    ];
    $query_str = "SELECT * FROM patient JOIN admit ON patient.patient_number = admit.patient_number JOIN patient_comorbidity as pc ON patient.patient_number = pc.patient_number WHERE ";
    foreach(array_keys($params) as $key){
        if (isset($_POST[$key])){
            if ($_POST[$key] || $_POST[$key]==='0') {
                if ($params[$key]) {
                    // Parameters of type varchar, char, date, ... should be put in quotes
                    $query_str .= sprintf("(%s LIKE '%%%s%%') AND ", $key, mysqli_real_escape_string($conn, $_POST[$key]));
                } else {
                    $query_str .= sprintf("(%s LIKE %%%s%%) AND ", $key, mysqli_real_escape_string($conn, $_POST[$key]));
                }
            }                        
        }
    }
    if (strlen($query_str) == 165){
        //no condition added to the query
        echo '<span style="color: red;">Please provide at least one parameter to identify the patient.</span>';
        exit;
    }


    $query_str = rtrim($query_str, "AND ") . ";";
    $result = $conn->query($query_str);

    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . $mysqli->error);
        exit;
    }
    if ($result->num_rows > 0) {
        // Output data for each row
        echo '
        <div class="container-fluid px-3 table-responsive">
        <table class="table table-light table-striped table-hover table-bordered">
        <caption class="caption-top"><div>Click "View" to view patient info</div></caption>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th>Comorbidities</th>
                <th>View information</th>
            </tr>
        </thead>
        <tbody>
        ';
        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>' . $row["fullname"] . '</td>
                    <td>' . $row["phone"] . '</td>
                    <td>' . $row["comorbidity"] . '</td>
                    <td>
                        <div class="row mx-1 pb-1">
                        <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="view_query(1,'.$row["patient_number"].');">View testing</button>
                        </div>
                        <div class="row mx-1">
                        <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="view_query(2,'.$row["patient_number"].');">View full</button>
                        </div>
                    </td>
                </tr>
            ';
        }
        echo "
        </tbody>
        </table>
        </div>
        ";
    } else {
        echo '<span style="color: red;">No results found.</span>';
    }

    // Close the MySQL connection
    $conn->close();
?>