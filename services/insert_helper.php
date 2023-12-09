<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/DB/config.php");

    // Establish a connection to the MySQL database
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
    
    // Fetch data from the database
    $query = "SELECT unique_code, fullname FROM personnel JOIN staff ON unique_code = staff_code;";
    $result = $conn->query($query);
    
    $data = array();
    if ($result) {
        $data['staff'] = array();
        while ($row = $result->fetch_assoc()) {
            $data['staff'][] = $row;
        }
    } else {
        die("Error: Unable to fetch data");
    }
    
    $query = "SELECT unique_code, fullname FROM personnel JOIN nurse ON unique_code = nurse_code;";
    $result = $conn->query($query);
    
    if ($result) {
        $data['nurse'] = array();
        while ($row = $result->fetch_assoc()) {
            $data['nurse'][] = $row;
        }
    } else {
        die("Error: Unable to fetch data");
    }
    
    $query = "SELECT building_id FROM building;";
    $result = $conn->query($query);
    
    if ($result) {
        $data['building'] = array();
        while ($row = $result->fetch_assoc()) {
            $data['building'][] = $row;
        }
    } else {
        die("Error: Unable to fetch data");
    }
    
    $query = "SELECT * FROM floor;";
    $result = $conn->query($query);
    
    if ($result) {
        $data['floor'] = array();
        while ($row = $result->fetch_assoc()) {
            $data['floor'][] = $row;
        }
    } else {
        die("Error: Unable to fetch data");
    }
    
    $query = "SELECT * FROM room;";
    $result = $conn->query($query);
    
    if ($result) {
        $data['room'] = array();
        while ($row = $result->fetch_assoc()) {
            $data['room'][] = $row;
        }
    } else {
        die("Error: Unable to fetch data");
    }
    
    // Return data as JSON
    header("Content-Type: application/json");
    echo json_encode($data, JSON_NUMERIC_CHECK);
    
    // Close the database connection
    $conn->close();    
?>