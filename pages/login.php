<?php
    if (isset($_SESSION['user_id'])){
        header("Location: " . $HTML_PATH . "/index.php");
    }
?>

<script src="<?= $HTML_PATH ?>/js/login.js"></script>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form id="login_form" onsubmit="submitForm(); return false;">
                        <div class="mt-0">
                            <label for="username">Username (E-mail address)</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your E-mail address" required>
                        </div>
                        <div class="mt-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="showPass">
                            <label class="form-check-label" for="showPass">
                                Show password
                            </label>
                        </div>
                        <div class="mt-3 d-flex">
                            <button type="submit" id="login_button" class="btn btn-primary">Login</button>
                            <div class="spinner-border text-primary m-1" style="width: 1.5rem; height: 1.5rem; display: none" role="status" id="loading" aria-hidden="true">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </form>
                    <div id="loginResponse"></div>
                </div>
            </div>
        </div>
    </div>
</div>
