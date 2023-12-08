<?php
  session_start();
?> 
<link rel="stylesheet" href="<?= $HTML_PATH ?>/css/navbar_style.css">

<div class="container-fluid text-center py-1" style="background-image: linear-gradient(to right, #ed1b2e,#fde7e9);">
    <div class="row">
        <div class="col-xxl-auto first-class align-self-center">
            <a href="index.php">
                <h1>QUARANTINE CAMP</h1>
            </a>
        </div>
        <div class="col-xxl-auto ms-5 align-self-center">
            <div class="row justify-content-center second-class">
                <div class="col-xxl-auto align-self-center">
                    <a href="<?= $HTML_PATH ?>/index.php?page=home">
                        Home
                    </a>
                </div>
                <div class="col-xxl-auto align-self-center">
                    <a href="<?= $HTML_PATH ?>/index.php?page=dashboard">
                        Dashboard
                    </a>
                </div>
                <div class="col-xxl-auto align-self-center">
                <a href="<?= $HTML_PATH ?>/index.php?page=guide">
                        Guide
                    </a>
                </div>
                <div class="col-xxl-auto align-self-center">
                <a href="<?= $HTML_PATH ?>/index.php?page=moreinfo">
                        More Information
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xxl-auto ms-auto me-5 align-self-center">
            <div class="row justify-content-center">
                <?php
                    if(isset($_SESSION['user_id'])) { 
                        echo'
                        <div class="col-xxl-auto align-self-center">
                            <div class="dropdown">
                                <button class="button-login dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ' . $_SESSION['username'] . '
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="ms-3" style="color: #7f181b;">
                                            User ID: '. $_SESSION['user_id'] . ' <br>
                                            Username: '. $_SESSION['username'] .' <br>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xxl-auto align-self-center">
                            <a href="' . $HTML_PATH . '/index.php?page=logout">
                                <button type="button" class="button-login">
                                Logout
                                </button>
                            </a>
                        </div>';
                    } else { 
                        echo'
                        <div class="col-xxl-auto align-self-center">
                            <a href="' . $HTML_PATH . '/index.php?page=register">
                                <button type="button" class="button-signup">
                                Register
                                </button>
                            </a>
                        </div>
                        <div class="col-xxl-auto align-self-center">
                            <a href="' . $HTML_PATH . '/index.php?page=login">
                                <button type="button" class="button-login">
                                Login
                                </button>
                            </a>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>
  </div>