<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Invalid request method.";
        exit();
    }
    include_once($_SERVER["DOCUMENT_ROOT"] . "/QuarantineCampDB/config.php");

    // Establish a connection to the PostgreSQL database
    $db_connection = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$db_connection) {
        die("Connection failed: " . pg_last_error());
    }

    // // Query to select all patients from the "patient" table
    // $query = "SELECT * FROM public.patient";
    // $result = pg_query($db_connection, $query);

    // // Check if the query was successful
    // if (!$result) {
    //     die("Error in SQL query: " . pg_last_error());
    // }

    // // Display the results in HTML
    // echo "<table border='1'>
    //         <tr>
    //             <th>Patient Number</th>
    //             <th>Identity Number</th>
    //             <th>Fullname</th>
    //             <th>Phone</th>
    //             <th>Gender</th>
    //             <th>Address</th>
    //             <th>Discharge Date</th>
    //         </tr>";

    // // Fetch and display each row of the result set
    // while ($row = pg_fetch_assoc($result)) {
    //     echo "<tr>
    //             <td>{$row['patient_number']}</td>
    //             <td>{$row['identity_number']}</td>
    //             <td>{$row['fullname']}</td>
    //             <td>{$row['phone']}</td>
    //             <td>{$row['gender']}</td>
    //             <td>{$row['address']}</td>
    //             <td>{$row['discharge_date']}</td>
    //         </tr>";
    // }

    // echo "</table>";

    $query = "
    SELECT p.patient_number, p.fullname, p.phone, pc.comorbidity
    FROM public.patient as p
    JOIN public.patient_comorbidity as pc ON p.patient_number = pc.patient_number;
    ";
    $result = pg_query($db_connection, $query);

    // // Check if the query was successful
    // if (!$result) {
    //     die("Error in SQL query: " . $mysqli->error);
    // }

    // Display the results in HTML
    echo '
    <table class="table table-light table-striped table-hover table-bordered">
    <caption class="caption-top"><div>Click "View" to view patient info</div></caption>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>Comorbidities</th>
            <th>View testings</th>
            <th>View full report</th>
        </tr>
    </thead>
    ';

    // Fetch and display each row of the result set
    echo '
    <tbody>
    ';
    while ($row = pg_fetch_assoc($result)) {
        echo '
        <tr>
            <td>' . $row["fullname"] . '</td>
            <td>' . $row["phone"] . '</td>
            <td>' . $row["comorbidity"] . '</td>
            <td>
                <button class="btn btn-primary" id="'.$row["patient_number"].'" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="">View testing</button>
            </td>
            <td>
                <button class="btn btn-success" id="'.$row["patient_number"].'" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="">View full</button>
            </td>
        </tr>
        ';
    }
    echo "
    </tbody>
    </table>
    ";


    // Close the database connection
    pg_close($db_connection);

?>