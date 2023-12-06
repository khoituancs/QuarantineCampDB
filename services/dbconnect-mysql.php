<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "QuarantineCampDB";

    // Create a MySQLi connection
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Check if the connection is successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query to select all patients from the "patient" table
    $query = "
    SELECT p.patient_number, p.fullname, p.phone, pc.comorbidity
    FROM patient as p
    JOIN patient_comorbidity as pc ON p.patient_number = pc.patient_number;
    ";
    $result = $mysqli->query($query);

    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . $mysqli->error);
    }

    // Display the results in HTML
    echo '
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
    ';

    // Fetch and display each row of the result set
    echo '
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
                <button class="btn" id="'.$row["patient_number"].'" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="">View testing</button>
                </div>
                <div class="row mx-1">
                <button class="btn" id="'.$row["patient_number"].'" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="">View full</button>
                </div>
            </td>
        </tr>
        ';
    }
    echo "
    </tbody>
    </table>
    ";

    // Close the database connection
    $mysqli->close();
?>
