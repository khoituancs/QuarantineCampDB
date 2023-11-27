<?php

    $host = "localhost"; // Change this to your PostgreSQL server host if it's not on the same machine
    $port = "5432"; // Change this to your PostgreSQL server port if it's different
    $username = "stuti2309";
    $password = "stuti2309";
    $dbname = "qc";

    // Establish a connection to the PostgreSQL database
    $db_connection = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$db_connection) {
        die("Connection failed: " . pg_last_error());
    }

    // Query to select all patients from the "patient" table
    $query = "SELECT * FROM public.patient";
    $result = pg_query($db_connection, $query);

    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    // Display the results in HTML
    echo "<table border='1'>
            <tr>
                <th>Patient Number</th>
                <th>Identity Number</th>
                <th>Fullname</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Discharge Date</th>
            </tr>";

    // Fetch and display each row of the result set
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['patient_number']}</td>
                <td>{$row['identity_number']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['address']}</td>
                <td>{$row['discharge_date']}</td>
            </tr>";
    }

    echo "</table>";

    // Close the database connection
    pg_close($db_connection);

?>