<?php
    if (!isset($_SESSION["user_id"])){
        header("Location: " . $HTML_PATH . "/index.php?page=login");
    }
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="<?= $HTML_PATH ?>/js/search_patient.js"></script>
<div class="container">
    <link rel="stylesheet" href="<?= $HTML_PATH ?>/css/search_patient.css">

    <h3 class="title text-center p-2 text-uppercase">Search Patient</h3>
    <p class="description text-center">Look up patient information by filling out the following fields</p>


    <form class="search-form container border border-dark rounded p-3" id="search-form" onsubmit="handle_query();return false;">
        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="full_name">Full name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" class="form-control"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="admission_date">Admission date</label>
                <input type="text" id="admission_date" name="admission_date" class="form-control" placeholder="DD/MM/YYYY">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="identity_number">Identity number</label>
                <input type="text" id="identity_number" name="identity_number" class="form-control"
                pattern="[0-9]{12}" placeholder="xxxxxxxxxxxx">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="patient_status">Gender</label>
                <select id="patient_status" name="patient_status" class="form-select form-control">
                    <option hidden>Choose one</option>
                    <option value="normal">Male</option>
                    <option value="warning">Female</option>
                    <option value="warning">Other</option>
                </select>
            </div>
        </div>
        <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Search</button>
    </form>
    <?php
        include_once('components/search_result.php');
    ?>
</div>