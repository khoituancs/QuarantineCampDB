<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Invalid request method.";
        exit();
    }
    $data = json_decode(file_get_contents('php://input'), true);
    include_once($_SERVER["DOCUMENT_ROOT"] . "/DB/config.php");

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
        $conn->begin_transaction();
    
        // Insert data into the 'patient' table
        $stmt = $conn->prepare("INSERT INTO patient (fullname, gender, identity_number, phone, address, discharge_date) VALUES (?, ?, ?, ?, ?, NULL)");
        $stmt->bind_param("sssss", $fullName, $gender, $identityNumber, $phone, $address);
        $stmt->execute();
    
        // Retrieve the patient_number of the inserted record
        $patientNumber = $stmt->insert_id;
    
        // Insert data into the 'admit' table
        $stmt = $conn->prepare("INSERT INTO admit (patient_number, admission_date, staff_code, `from`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isis", $patientNumber, $admissionDate, $admittingStaff, $lastLocation);
        $stmt->execute();
    
        // Insert data into the 'take_care_of' table
        $stmt = $conn->prepare("INSERT INTO take_care_of (patient_number, nurse_code, start_date, end_date) VALUES (?, ?, ?, NULL)");
        $stmt->bind_param("iis", $patientNumber, $nurseNumber, $admissionDate);
        $stmt->execute();
    
        // Insert data into the 'location_history' table
        $stmt = $conn->prepare("INSERT INTO location_history (patient_number, building_id, floor_number, room_number, date_time) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $patientNumber, $buildingNumber, $floorNumber, $roomNumber, $admissionDate);
        $stmt->execute();
    
        // Insert data into the 'patient_comorbidity' table
        $stmt = $conn->prepare("INSERT INTO patient_comorbidity (patient_number, comorbidity) VALUES (?, ?)");
        $stmt->bind_param("is", $patientNumber, $comorbidity);
    
        foreach ($comorbidities as $comorbidity) {
            $stmt->execute();
        }
    
        // Commit the transaction
        $conn->commit();
    
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
    
        // Output error message
        echo "Failed to insert record to the database: " . $e->getMessage();
        exit();
    }    

    echo "Success";
    // Close the database connection
    $conn->close();
?>