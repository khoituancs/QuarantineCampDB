<div class="container">
    <link rel="stylesheet" href="<?= $HTML_PATH ?>/css/search_patient.css">

    <h3 class="title text-center p-2 text-uppercase">Search Patient</h3>
    <p class="description text-center">Look up patient information by filling out the following fields</p>


    <form class="search-form container border border-dark rounded p-3" onsubmit="return false;">
        <div class="row">
            <div class="form-group col-12">
                <label class="control-label" for="full_name">Full name</label>
                <input type="text" id="full_name" name="full_name" class="form-control">
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
                <input type="date" id="admission_date" name="admission_date" class="form-control" placeholder="YYYY-MM-DD">
            </div>  
        </div>


        <div class="row">
            <div class="form-group col-6">
                <label class="control-label" for="identity_number">Identity number</label>
                <input type="text" id="identity_number" name="identity_number" class="form-control"
                pattern="[0-9]{12}" placeholder="xxxxxxxxxxxx">
            </div>

            <div class="form-group col-6">
                <label class="control-label" for="patient_status">Status</label>
                <select id="patient_status" name="patient_status" class="form-select form-control">
                    <option hidden>Choose one</option>
                    <option value="normal">Normal</option>
                    <option value="warning">Warning</option>
                </select>
            </div>
        </div>


        <button class="btn">Search</button>
    </form>
    <p> </p>

    <?php
        include_once('components/modal.php');
    ?>
</div>