<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Invalid request method.";
        exit();
    }
    $data = json_decode(file_get_contents('php://input'), true);
    include_once($_SERVER["DOCUMENT_ROOT"] . "/QuarantineCampDB/config.php");

    // Establish a connection to the PostgreSQL database
    $conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // $fullName = htmlspecialchars($data["full_name"]);
    // $gender = htmlspecialchars($data["gender"]);
    // $identityNumber = htmlspecialchars($data["identity_number"]);
    // $phone = htmlspecialchars($data["phone"]);
    // $address = htmlspecialchars($data["address"]);
    // $admissionDate = htmlspecialchars($data["admission_date"]);
    // $lastLocation = htmlspecialchars($data["last_location"]);
    // $admittingStaff = htmlspecialchars($data["admitting_staff"]);
    // $nurseNumber = htmlspecialchars($data["nurse_number"]);
    // $roomNumber = htmlspecialchars($data["room_number"]);
    // $floorNumber = htmlspecialchars($data["floor_number"]);
    // $buildingNumber = htmlspecialchars($data["building_number"]);
    // $comorbidities = htmlspecialchars($data["comorbidities"]);

    $fullName = $data["full_name"];
    $gender = $data["gender"];
    $identityNumber = $data["identity_number"];
    $phone = $data["phone"];
    $address = $data["address"];
    $admissionDate = DateTime::createFromFormat('d/m/Y', $data["admission_date"])->format('Y-m-d');
    $lastLocation = $data["last_location"];
    $admittingStaff = $data["admitting_staff_code"];
    $nurseNumber = $data["nurse_code"];
    $roomNumber = $data["room_number"];
    $floorNumber = $data["floor_number"];
    $buildingNumber = $data["building_number"];
    $comorbidities = $data["comorbidities"];

    try {
        // Start a transaction
        pg_query($conn, "BEGIN");
        
        // Insert data into the 'patient' table
        $query = "INSERT INTO public.patient(patient_number, fullname, gender, identity_number, phone, address, discharge_date) VALUES (DEFAULT, $1, $2, $3, $4, $5, NULL) RETURNING patient_number;;";
        $result = pg_prepare($conn, "INSERT_PATIENT", $query);
        $result = pg_execute($conn, "INSERT_PATIENT", array($fullName, $gender, $identityNumber, $phone, $address));

        // Retrieve the patient_number of the inserted record
        $row = pg_fetch_assoc($result);
        $patientNumber = $row['patient_number'];

        // Insert data into the 'admit' table        
        $query = "INSERT INTO public.admit(patient_number, admission_date, staff_code, \"from\") VALUES ($1, $2, $3, $4);";
        $result = pg_prepare($conn, "INSERT_ADMIT", $query);
        $result = pg_execute($conn, "INSERT_ADMIT", array($patientNumber, $admissionDate, $admittingStaff, $lastLocation));

        // Insert data into the 'take_care_of' table
        $query = "INSERT INTO public.take_care_of(patient_number, nurse_code, start_date, end_date) VALUES ($1, $2, $3, NULL);";
        $result = pg_prepare($conn, "INSERT_TAKE_CARE_OF", $query);
        $result = pg_execute($conn, "INSERT_TAKE_CARE_OF", array($patientNumber, $nurseNumber, $admissionDate));

        // Insert data into the 'location_history' table
        $query = "INSERT INTO public.location_history(patient_number, building_id, floor_number, room_number, date_time) VALUES ($1, $2, $3, $4, $5);";
        $result = pg_prepare($conn, "INSERT_LOCATION_HISTORY", $query);
        $result = pg_execute($conn, "INSERT_LOCATION_HISTORY", array($patientNumber, $buildingNumber, $floorNumber, $roomNumber, $admissionDate));        

        $query = "INSERT INTO public.patient_comorbidity(patient_number, comorbidity) VALUES ($1, $2);";
        $result = pg_prepare($conn, "INSERT_COMORBIDITES", $query);

        foreach ($comorbidities as $comorbidity) {
            $result = pg_execute($conn, "INSERT_COMORBIDITES", array($patientNumber, $comorbidity));
        }
        // Commit the transaction
        pg_query($conn, "COMMIT");

    } catch (Exception $e) {
        // Rollback the transaction on error
        pg_query($conn, "ROLLBACK");

        // Output error message
        echo "Failed to insert record to the database: " . $e->getMessage();
        exit();
    }

    echo "Success";
    // Close the database connection
    pg_close($conn);
?>