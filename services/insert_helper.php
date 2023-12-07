<?php

    $host = "localhost"; // Change this to your PostgreSQL server host if it's not on the same machine
    $port = "5432"; // Change this to your PostgreSQL server port if it's different
    $username = "stuti2309";
    $password = "stuti2309";
    $dbname = "QuarantineCampDB";

    // Establish a connection to the PostgreSQL database
    $conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

        // Fetch data from the database
        $query = "SELECT unique_code, fullname FROM personnel JOIN staff ON unique_code = staff_code;";
        $result = pg_query($conn, $query);

        $data = array();
        if ($result) {
            $data['staff'] = array();
            while ($row = pg_fetch_assoc($result)) {
                $data['staff'][] = $row;
            }
        } else {
            die("Error: Unable to fetch data");
        }

        $query = "SELECT unique_code, fullname FROM personnel JOIN nurse ON unique_code = nurse_code;";
        $result = pg_query($conn, $query);

        if ($result) {
            $data['nurse'] = array();
            while ($row = pg_fetch_assoc($result)) {
                $data['nurse'][] = $row;
            }
        } else {
            die("Error: Unable to fetch data");
        }

        $query = "SELECT building_id FROM building;";
        $result = pg_query($conn, $query);

        if ($result) {
            $data['building'] = array();
            while ($row = pg_fetch_assoc($result)) {
                $data['building'][] = $row;
            }
        } else {
            die("Error: Unable to fetch data");
        }

        $query = "SELECT * FROM floor;";
        $result = pg_query($conn, $query);

        if ($result) {
            $data['floor'] = array();
            while ($row = pg_fetch_assoc($result)) {
                $data['floor'][] = $row;
            }
        } else {
            die("Error: Unable to fetch data");
        }

        $query = "SELECT * FROM room;";
        $result = pg_query($conn, $query);

        if ($result) {
            $data['room'] = array();
            while ($row = pg_fetch_assoc($result)) {
                $data['room'][] = $row;
                //echo gettype($row['room_number']);
            }
        } else {
            die("Error: Unable to fetch data");
        }

        // Return data as JSON
        header("Content-Type: application/json");
        echo json_encode($data, JSON_NUMERIC_CHECK);

    //echo "Success";

    // Close the database connection
    pg_close($conn);
?>