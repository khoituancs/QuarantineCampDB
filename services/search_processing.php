<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Invalid request method.";
        exit();
    }
    include_once($_SERVER["DOCUMENT_ROOT"] . "/QuarantineCampDB/config.php");

    // Establish a connection to the PostgreSQL database
    $conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    $params = [
        "fullname" => 1,
        "phone" => 1, 
        "admission_date" => 1,
        "identity_number" => 1,
        "gender" => 1
    ];
    $query_str = "SELECT * FROM patient JOIN admit ON patient.patient_number = admit.patient_number WHERE ";
    // foreach(array_keys($params) as $key){
    //     if (isset($_POST[$key])){
    //         if ($_POST[$key] || $_POST[$key]==='0') {
    //             if ($params[$key]) {
    //                 // Parameters of type varchar, char, date, ... should be put in quotes
    //                 $query_str .= sprintf("(%s LIKE '%%%s%%') AND ", $key, mysqli_real_escape_string($conn, $_POST[$key]));
    //             } else {
    //                 $query_str .= sprintf("(%s LIKE %%%s%%) AND ", $key, mysqli_real_escape_string($conn, $_POST[$key]));
    //             }
    //         }                        
    //     }
    // }
    foreach(array_keys($params) as $key){
        if (isset($_POST[$key])){
            if ($_POST[$key] || $_POST[$key]==='0') {
                if ($params[$key]) {
                    // Parameters of type varchar, char, date, ... should be put in quotes
                    $query_str .= sprintf("%s LIKE '%%%s%%' AND ", $key,$_POST[$key]);
                } else {
                    $query_str .= sprintf("%s LIKE %%%s%% AND ", $key,$_POST[$key]);
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
    $result = pg_query($conn, $query_str);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
        exit;
    }
    if (pg_numrows($result) > 0) {
        // Output data for each row
        echo pg_numrows($result);
        $sql = "SELECT comorbidity FROM patient JOIN patient_comorbidity as pc ON patient.patient_number = pc.patient_number WHERE patient.patient_number = $1;";
        $sub_res = pg_prepare($conn, "SELECT_COMORBIDITIES", $sql);
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
        while ($row = pg_fetch_assoc($result)) {
            // print_r($row);
            $sub_res = pg_execute($conn, "SELECT_COMORBIDITIES", array($row["patient_number"]));
            echo '
                <tr>
                    <td>' . $row["fullname"] . '</td>
                    <td>' . $row["phone"] . '</td>
                    <td>' . 
                    implode(", ", array_map(function($row) {
                        return $row["comorbidity"];
                    }, pg_fetch_all($sub_res)))
                    . '</td>
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

    pg_close($conn);
?>