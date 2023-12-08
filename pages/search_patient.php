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


    <form class="search-form container border border-dark rounded p-3" id="search_form" method="post" onsubmit="search_query();return false;">
        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="fullname">Full name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nguyen Van A">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" class="form-control"
                placeholder="xxx-xxx-xxxx">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="replace_admission_date">Admission date</label>
                <input type="text" id="replace_admission_date" name="replace_admission_date" class="form-control" placeholder="DD/MM/YYYY">
                <input type="hidden" id="admission_date" name="admission_date">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="identity_number">Identity number</label>
                <input type="text" id="identity_number" name="identity_number" class="form-control"
                placeholder="xxxxxxxxxxxx">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="gender">Gender</label>
                <select id="gender" name="gender" class="form-select form-control">
                    <option value="" selected>Choose one</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
        </div>
        <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Search</button>
    </form>
    <?php
        include_once('components/search_result.php');
    ?>
</div>