<div class="container-fluid my-3">
    <div class="container border border-dark rounded p-3" id="dashboard">
        <div class="row">
            <h3 class="title text-center p-2">Dashboard</h3>
            <p class="description text-center">Please choose one of the following services:</p>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <button class="btn btn-primary" onclick="window.location.href='<?= $HTML_PATH ?>/index.php?page=search_patient'">Search Patient</button>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <button class="btn btn-primary" onclick="window.location.href='<?= $HTML_PATH ?>/index.php?page=insert_patient'">Insert Patient</button>
            </div>
        </div>
    </div>
</div>