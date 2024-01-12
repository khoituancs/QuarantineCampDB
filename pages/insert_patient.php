<?php
    if (!isset($_SESSION["user_id"])){
        header("Location: " . $HTML_PATH . "/index.php?page=login");
    }
?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="successfulToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="fas fa-check fa-lg" style="color: #1bee6c;"></i>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Insert successfully.
    </div>
  </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="failedToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="fas fa-times fa-lg" style="color: #ff2929;"></i>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Insert failed.
    </div>
  </div>
</div>

<div class="container">
    <link rel="stylesheet" href="<?= $HTML_PATH ?>/css/insert_patient.css">
    <h3 class="title text-center p-2 text-uppercase">Insert New Patient Record</h3>
    <p class="description text-center">Please provide the following information about the new patient</p>


    <form class="insert-form container border border-dark rounded p-3" id="insert-form" onsubmit="return false;">
        <div class="row">
            <div class="form-group col-9">
                <label class="control-label" for="full_name">Full name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Nguyen Van A" required>
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
                placeholder="xxxxxxxxxxxx" required>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" class="form-control"
                placeholder="090955789" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder= "123 Ly Thuong Kiet, Phuong 12, Quan 5, TP.HCM "required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-8">
                <label class="control-label" for="last_location">Last location</label>
                <input type="text" id="last_location" name="last_location" class="form-control" placeholder="123 Ly Thuong Kiet, Phuong 12, Quan 5, TP.HCM" required>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="admission_date">Admission date</label>
                <input type="text" id="admission_date" name="admission_date" class="form-control" placeholder="DD/MM/YYYY">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="admitting_staff">Admitting staff</label>
                <select id="admitting_staff" name="admitting_staff" class="form-control form-select" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
                <input type="hidden" id="admitting_staff_code" name="admitting_staff_code">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="nurse_number">Nurse</label>
                <select id="nurse_number" name="nurse_number" class="form-control form-select" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
                <input type="hidden" id="nurse_code" name="nurse_code">
            </div>

        </div>

        <div class="row">

            <div class="form-group col-4">
                <label class="control-label" for="building">Building number</label>
                <select id="building" name="building" class="form-control form-select" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
                <input type="hidden" id="building_number" name="building_number">
            </div>

            <div class="form-group col-4">
                <label class="control-label" for="floor">Floor number</label>
                <select id="floor" name="floor" class="form-control form-select" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
                <input type="hidden" id="floor_number" name="floor_number">
            </div>
            
            <div class="form-group col-4">
                <label class="control-label" for="room">Room number</label>
                <select id="room" name="room" class="form-control form-select" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
                <input type="hidden" id="room_number" name="room_number">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-12 comorbidities-inputs">
                <label class="control-label" for="comorbidities">Comorbidities</label>
                <button class="btn btn-add px-2 m-1" onclick="addComorbidities()">Add</button>
                <button class="btn btn-remove px-2 m-1" onclick="removeComorbidities()">Remove</button>
                <textarea id="comorbidities" name="comorbidities" class="form-control my-1" rows="1" 
                placeholder="Write the comorbidity" required></textarea>
            </div>
        </div>

        <button class="btn" onclick="handle_insert();">Insert</button>    
    </form>

    <p> </p>
</div>

<script src="<?= $HTML_PATH ?>/js/insert_patient.js"></script>