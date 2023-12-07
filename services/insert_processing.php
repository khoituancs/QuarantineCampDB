<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Invalid request method.";
        exit();
    }

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

    // $fullName = htmlspecialchars($_POST["full_name"]);
    // $gender = htmlspecialchars($_POST["gender"]);
    // $identityNumber = htmlspecialchars($_POST["identity_number"]);
    // $phone = htmlspecialchars($_POST["phone"]);
    // $address = htmlspecialchars($_POST["address"]);
    // $admissionDate = htmlspecialchars($_POST["admission_date"]);
    // $lastLocation = htmlspecialchars($_POST["last_location"]);
    // $admittingStaff = htmlspecialchars($_POST["admitting_staff"]);
    // $nurseNumber = htmlspecialchars($_POST["nurse_number"]);
    // $roomNumber = htmlspecialchars($_POST["room_number"]);
    // $floorNumber = htmlspecialchars($_POST["floor_number"]);
    // $buildingNumber = htmlspecialchars($_POST["building_number"]);
    // $comorbidities = htmlspecialchars($_POST["comorbidities"]);

    $fullName = $_POST["full_name"];
    $gender = $_POST["gender"];
    $identityNumber = $_POST["identity_number"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $admissionDate = $_POST["admission_date"];
    $lastLocation = $_POST["last_location"];
    $admittingStaff = $_POST["admitting_staff"];
    $nurseNumber = $_POST["nurse_number"];
    $roomNumber = $_POST["room_number"];
    $floorNumber = $_POST["floor_number"];
    $buildingNumber = $_POST["building_number"];
    $comorbidities = $_POST["comorbidities"];

    try {
        // Start a transaction
        pg_query($conn, "BEGIN");
        
        // Insert data into the 'patient' table
        $query = "INSERT INTO public.patient VALUES (DEFAULT, $1, $2, $3, $4, $5, NULL);";
        $result = pg_prepare($conn, "INSERT_PATIENT", $query);
        $result = pg_execute($conn, "INSERT_PATIENT", array($fullName, $gender, $identityNumber, $phone, $address));

        // Retrieve the patient_number of the inserted record
        $patientNumber = pg_last_oid($result);

        // Insert data into the 'admit' table
        
        $query = "INSERT INTO public.admit VALUES ($1, $2, $3, $4);";
        $result = pg_prepare($conn, "INSERT_ADMIT", $query);
        $result = pg_execute($conn, "INSERT_ADMIT", array($patientNumber, $admissionDate, $admittingStaff, $lastLocation));

        // Insert data into the 'take_care_of' table
        $query = "INSERT INTO public.take_care_of VALUES ($1, $2, CURRENT_DATE, NULL);";
        $result = pg_prepare($conn, "INSERT_TAKE_CARE_OF", $query);
        $result = pg_execute($conn, "INSERT_TAKE_CARE_OF", array($patientNumber, $nurseNumber));

        // Insert data into the 'location_history' table
        $query = "INSERT INTO public.location_history VALUES ($1, $2, $3, $4, $5);";
        $result = pg_prepare($conn, "INSERT_LOCATION_HISTORY", $query);
        $result = pg_execute($conn, "INSERT_LOCATION_HISTORY", array($patientNumber, $buildingNumber, $floorNumber, $roomNumber, $admissionDate));        

        // Commit the transaction
        pg_query($conn, "COMMIT");

    } catch (Exception $e) {
        // Rollback the transaction on error
        pg_query($conn, "ROLLBACK");

        // Output error message
        echo "Failed to insert record to the database: " . $e->getMessage();
    }

    echo "Success";
    // Close the database connection
    pg_close($conn);

?>