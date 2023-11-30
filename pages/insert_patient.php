<?php
    if (!isset($_SESSION["user_id"])){
        header("Location: " . $HTML_PATH . "/index.php?page=login");
    }
?>
<div class="container">
    <link rel="stylesheet"  href="<?= $HTML_PATH ?>/css/insert_patient.css">
    <h3 class="title text-center p-2 text-uppercase">Insert New Patient Record</h3>
    <p class="description text-center">Please provide the following information about the new patient</p>


    <form class="insert-form container border border-dark rounded p-3" onsubmit="return false;">
        <div class="row">
            <div class="form-group col-9">
                <label class="control-label" for="full_name">Full name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" required>
            </div>
            <div class="form-group col-3">
                <label class="control-label" for="gender">Gender</label>
                <select id="gender" name="gender" class="form-select form-control" required>
                    <option hidden>Choose one</option>
                    <option value="F">Female</option>
                    <option value="M">Male</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="identity_number">Identity number</label>
                <input type="text" id="identity_number" name="identity_number" class="form-control"
                pattern="[0-9]{12}" placeholder="xxxxxxxxxxxx" required>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" class="form-control"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
        </div>



        <div class="row">
            <div class="form-group col-4">
                <label class="control-label" for="patient_status">Patient status</label>
                <select id="patient_status" name="patient_status" class="form-select form-control" required>
                    <option hidden>Choose one</option>
                    <option value="normal">Normal</option>
                    <option value="warning">Warning</option>
                </select>
            </div>


            <div class="form-group col-4">
                <label class="control-label" for="admission_date">Admission date</label>
                <input type="date" id="admission_date" name="admission_date" class="form-control" required>
            </div>  

            <div class="form-group col-4">
                <label class="control-label" for="discharge_date">Discharge date</label>
                <input type="date" id="discharge_date" name="discharge_date" class="form-control">
            </div>  
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="last_location">Last location</label>
                <input type="text" id="last_location" name="last_location" class="form-control" required>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="admitting_staff">Admitting staff</label>
                <input type="text" id="admitting_staff" name="admitting_staff" class="form-control"
                pattern="\d+"  required>
            </div>


            <div class="form-group col-6">
                <label class="control-label" for="nurse_number">Nurse</label>
                <input type="text" id="nurse_number" name="nurse_number" class="form-control"
                pattern="\d+" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-3">
                <label class="control-label" for="room_number">Room number</label>
                <input type="text" id="room_number" name="room_number" class="form-control"
                pattern="\d+" required>
            </div>

            <div class="form-group col-3">
                <label class="control-label" for="floor_number">Floor number</label>
                <input type="text" id="floor_number" name="floor_number" class="form-control"
                pattern="\d+" required>
            </div>

            <div class="form-group col-3">
                <label class="control-label" for="building_number">Building number</label>
                <input type="text" id="building_number" name="building_number" class="form-control"
                pattern="\d+" required>
            </div>

            <div class="form-group col-3">
                <label class="control-label" for="camp_number">Camp number</label>
                <input type="text" id="camp_number" name="camp_number" class="form-control"
                pattern="\d+" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="comorbidities">Comorbidities</label>
                <textarea id="comorbidities" name="comorbidities" class="form-control" rows="3" 
                placeholder="Write the comorbidities seperated by comma" required></textarea>
            </div>
        </div>


        <button class="btn">Insert</button>

        
    </form>

    <p> </p>
</div>