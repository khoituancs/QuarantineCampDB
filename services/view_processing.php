<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/QuarantineCampDB/config.php");

// Establish a connection to the PostgreSQL database
$conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the "username" and "password" fields are set in the POST data
    if (isset($_POST['type']) && isset($_POST['patient_id'])) {
        if ($_POST['type']==1){ // view testing
            echo'
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Testing
                            </div>
                            <div class="card-body">
            ';
            view_testing($conn);
            echo'
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        else if ($_POST['type']==2){ // view all
            echo'
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Full Information
                            </div>
                            <div class="card-body">
                                <div class="row g-3 justify-content-center">
            ';
            view_all($conn);
            echo'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        else echo '<span style="color: red;">Please try again.</span>';
    } else {
        echo '<span style="color: red;">Please try again.</span>';
    }
}

// define function for view

function view_testing($conn){
    $query_name='
    SELECT
        p.fullname
    FROM
        patient p
    WHERE
        p.patient_number = '.$_POST["patient_id"].';
    ';
    $result = pg_query($conn, $query_name);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    $row = pg_fetch_assoc($result);
    echo'
<div class="row mb-3 justify-content-center">
    <div class="my-3 row">
        <div class="col-lg-12">
            <div class="row">
                <label for="test_pat_name" class="col-lg-2 col-form-label form-size">Patient Name</label>
                <div class="col-lg-10 align-self-center">
                    <input type="text" readonly class="form-control border-1" style="width: 100%;" id="test_pat_name" value="'.$row["fullname"].'">
                </div>
            </div>
        </div>
    </div>
    ';
    
    // quick test
    $query_quick='
    SELECT
        p.fullname,
        t.*,
        qui.ct_value AS quick_ct_value,
        qui.result AS quick_result
    FROM
        testing t
    LEFT JOIN
        patient p ON t.patient_number = p.patient_number
    LEFT JOIN
        quick_test qui ON t.test_id = qui.test_id
    WHERE
        t.patient_number = '.$_POST["patient_id"].' AND t.test_id = qui.test_id;
    ';
    $result = pg_query($conn, $query_quick);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo'
    <div class="container-fluid table-responsive" id="">
        <table class="table table-light table-striped table-hover table-bordered">
        <caption class="caption-top">Quick test</caption>
            <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Quick ct value</th>
                    <th>Quick result</th>
                </tr>
            </thead>
            <tbody>
    ';
    while ($row = pg_fetch_assoc($result)) {
        echo '
                <tr>
                    <td>'.$row["test_id"].'</td>
                    <td>'.(new DateTime($row["date"]))->format('d/m/Y').'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["quick_ct_value"].'</td>
                    <td>'.$row["quick_result"].'</td>
                </tr>
        ';
    }
    echo'
            </tbody>
        </table>
    </div>
    ';
    
    // pcr test

    $query_pcr='
    SELECT
        p.fullname,
        t.*,
        pcr.ct_value AS pcr_ct_value,
        pcr.result AS pcr_result
    FROM
        testing t
    LEFT JOIN
        patient p ON t.patient_number = p.patient_number
    LEFT JOIN
        pcr_test pcr ON t.test_id = pcr.test_id
    WHERE
        t.patient_number = '.$_POST["patient_id"].' AND t.test_id = pcr.test_id;
    ';
    $result = pg_query($conn, $query_pcr);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo'
    <div class="container-fluid table-responsive" id="">
        <table class="table table-light table-striped table-hover table-bordered">
        <caption class="caption-top">Pcr test</caption>
            <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Pcr ct value</th>
                    <th>Pcr result</th>
                </tr>
            </thead>
            <tbody>
    ';
    while ($row = pg_fetch_assoc($result)) {
        echo '
                <tr>
                    <td>'.$row["test_id"].'</td>
                    <td>'.(new DateTime($row["date"]))->format('d/m/Y').'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["pcr_ct_value"].'</td>
                    <td>'.$row["pcr_result"].'</td>
                </tr>
        ';
    }
    echo'
            </tbody>
        </table>
    </div>
    ';

    // spo test

    $query_spo='
    SELECT
        p.fullname,
        t.*,
        spo.blood_oxygen_level
    FROM
        testing t
    LEFT JOIN
        patient p ON t.patient_number = p.patient_number
    LEFT JOIN
        spo_test spo ON t.test_id = spo.test_id
    WHERE
        t.patient_number = '.$_POST["patient_id"].' AND t.test_id = spo.test_id;
    ';
    $result = pg_query($conn, $query_spo);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo'
    <div class="container-fluid table-responsive" id="">
        <table class="table table-light table-striped table-hover table-bordered">
        <caption class="caption-top">Spo test</caption>
            <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Spo blood oxygen level</th>
                </tr>
            </thead>
            <tbody>
    ';
    while ($row = pg_fetch_assoc($result)) {
        echo '
                <tr>
                    <td>'.$row["test_id"].'</td>
                    <td>'.(new DateTime($row["date"]))->format('d/m/Y').'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["blood_oxygen_level"].'</td>
                </tr>
        ';
    }
    echo'
            </tbody>
        </table>
    </div>
    ';

    // res test

    $query_res='
    SELECT
        p.fullname,
        t.*,
        respiratory.breaths_per_minute
    FROM
        testing t
    LEFT JOIN
        patient p ON t.patient_number = p.patient_number
    LEFT JOIN
        respiratory_test respiratory ON t.test_id = respiratory.test_id
    WHERE
        t.patient_number = '.$_POST["patient_id"].' AND t.test_id = respiratory.test_id;
    ';
    $result = pg_query($conn, $query_res);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    echo'
    <div class="container-fluid table-responsive" id="">
        <table class="table table-light table-striped table-hover table-bordered">
        <caption class="caption-top">Respiratory test</caption>
            <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Respitory breaths per minute</th>
                </tr>
            </thead>
            <tbody>
    ';
    while ($row = pg_fetch_assoc($result)) {
        echo '
                <tr>
                    <td>'.$row["test_id"].'</td>
                    <td>'.(new DateTime($row["date"]))->format('d/m/Y').'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["breaths_per_minute"].'</td>
                </tr>
        ';
    }
    echo'
            </tbody>
        </table>
    </div>
</div>
    ';
}

function view_all($conn){
    $query_patient='
    SELECT
        *
    FROM
        patient
    WHERE
        patient.patient_number = '.$_POST["patient_id"].';
    ';

    $result = pg_query($conn, $query_patient);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }

    $row = pg_fetch_assoc($result);
    echo'
    <div class="my-3 row">
        <div class="col-lg-6">
            <label for="fullname" class="form-label form-size fw-bold">Full Name</label>
            <input type="text" readonly class="form-control border-1" id="fullname" value="'.$row["fullname"].'">
        </div>
        <div class="col-lg-6">
            <label for="id_number" class="form-label form-size fw-bold">Identity Number</label>
            <input type="text" readonly class="form-control border-1" id="id_number" value="'.$row["identity_number"].'">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-lg-4">
            <label for="gender" class="form-label form-size small fw-bold">Gender</label>
            <input type="text" readonly class="form-control-sm border-1" id="gender" value="'.$row["gender"].'">
        </div>
        <div class="col-lg-4">
            <label for="phone" class="form-label form-size fw-bold small">Phone</label>
            <input type="text" readonly class="form-control-sm border-1" id="phone" value="'.$row["phone"].'">
        </div>
        <div class="col-lg-4">
            <label for="address" class="form-label form-size fw-bold small">Address</label>
            <input type="text" readonly class="form-control-sm border-1" id="address" value="'.$row["address"].'">
        </div>
    </div>
    ';

    $query_como='
    SELECT
        patient.*,
        patient_comorbidity.comorbidity
    FROM
        patient
    LEFT JOIN
        patient_comorbidity ON patient.patient_number = patient_comorbidity.patient_number
    WHERE
        patient.patient_number = '.$_POST["patient_id"].';
    ';
    $result = pg_query($conn, $query_como);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    while ($row = pg_fetch_assoc($result)) {
    echo'
    <div class="mb-3 row">
        <label for="comorbidity" class="col-lg-2 col-form-label form-size fw-bold">Comorbidity</label>
        <div class="col-lg-10 align-self-center">
            <input type="text" readonly class="form-control-sm border-1" id="comorbidity" style="width: 100%;" value="'.$row["comorbidity"].'">
        </div>
    </div>
    ';
    }
    
    $query_sym='
    SELECT
        patient.*,
        symptom.date_time,
        symptom.description
    FROM
        patient
    LEFT JOIN
        symptom ON patient.patient_number = symptom.patient_number
    WHERE
        patient.patient_number = '.$_POST["patient_id"].';
    ';
    $result = pg_query($conn, $query_sym);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    while ($row = pg_fetch_assoc($result)) {
    echo'
    <div class="mb-3 row">
        <div class="fw-bold">Symptoms</div>
        <div class="col-lg-auto ms-3">
            <div class="row">
                <label for="sym_date_time" class="col-lg-4 col-form-label form-size small">Date time</label>
                <div class="col-lg-8 align-self-center">
                    <input type="text" readonly class="form-control-sm border-1" style="width: 100%;" id="sym_date_time" value="'.(new DateTime($row["date_time"]))->format('H:i:s d/m/Y').'">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <label for="sym_desc" class="col-lg-2 col-form-label form-size small">Description</label>
                <div class="col-lg-10 align-self-center">
                    <input type="text" readonly class="form-control-sm border-1" style="width: 100%;" id="sym_desc" value="'.$row["description"].'">
                </div>
            </div>
        </div>
    </div>
    ';
    }

    echo'
    <div class="mb-3 row">
        <div class="fw-bold">Testing</div>
    ';
    view_testing($conn);
    echo'
    </div>
    ';

    $query_treatment='
    SELECT
        patient.*,
        treatment.start_date,
        treatment.end_date,
        treatment.result
    FROM
        patient
    LEFT JOIN
        treatment ON patient.patient_number = treatment.patient_number
    WHERE
        patient.patient_number = '.$_POST["patient_id"].';
    ';
    $result = pg_query($conn, $query_treatment);
    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    while ($row = pg_fetch_assoc($result)) {
    echo '
    <div class="row">
        <div class="fw-bold">Treatment</div>
        <div class="row mb-2">
            <div class="col-lg-auto ms-3">
                <div class="row">
                    <label for="treat_start_date" class="col-lg-4 col-form-label form-size small">Start date</label>
                    <div class="col-lg-8 align-self-center">
                        <input type="text" readonly class="form-control-sm border-1" style="width: 100%;" id="treat_start_date" value="'.(new DateTime($row["start_date"] ))->format('d/m/Y').'">
                    </div>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="row">
                    <label for="treat_end_date" class="col-lg-4 col-form-label form-size small">End date</label>
                    <div class="col-lg-8 align-self-center">
                        <input type="text" readonly class="form-control-sm border-1" style="width: 100%;" id="treat_end_date" value="'.(new DateTime($row["end_date"] ))->format('d/m/Y').'">
                    </div>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="row">
                    <label for="treat_result" class="col-lg-auto col-form-label form-size small">Result</label>
                    <div class="col-lg-auto align-self-center">
                        <input type="text" readonly class="form-control-sm border-1" style="width: 100%;" id="treat_result" value="'.$row["result"].'">
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    }
}

// close conn db
pg_close($conn);
?>