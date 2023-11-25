<h1>Welcome to homepage, <?php if (isset($_SESSION["authenticated"])) echo $_COOKIE["user"]; else echo 'user'?>!</h1>
<?php if (!isset($_SESSION["authenticated"])) echo '<p class="text-center p-2">You have to login to use the application.<p>'?>

<?php if (!isset($_SESSION["authenticated"]))
    echo '
        <div class="container-fluid">
            <div class="container border border-dark rounded p-3" id="dashboard">
                <div class="row">
                    <h3 class="title text-center p-2">Dashboard</h3>
                    <p class="description text-center">Please choose one of the following services:</p>
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <button class="btn btn-primary" onclick="window.location.href=\'' . $HTML_PATH . '/index.php?page=search_patient\'">Search Patient</button>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <button class="btn btn-primary" onclick="window.location.href=\'' . $HTML_PATH . '/index.php?page=insert_patient\'">Insert Patient</button>
                    </div>
                </div>
            </div>
        </div>
    ';
?>

