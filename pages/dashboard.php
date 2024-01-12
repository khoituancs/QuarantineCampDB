<?php
    if (!isset($_SESSION["user_id"])){
        header("Location: " . $HTML_PATH . "/index.php?page=login");
    }
?>
<style>
    .button-dash {
        background-color: transparent; /* Set the background color of the button */
        color: #3396ff; /* Set the text color of the button */
        font-weight: bold;
        padding: 40px 35px; /* Add padding to the button for better appearance */
        border: 1px solid #4da6ff; /* Remove the default border */
        border-radius: 1px; /* Optional: Add rounded corners */
        cursor: pointer; /* Change the cursor to a pointer on hover */
        transition: background-color 0.3s;
    }
    .button-dash:hover {
        background-color: #f5faff;
    }
</style>

<div class="container-fluid my-3" id="dashboard">
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="my-2 ms-2" style="color: #026fd4; font-size: 30px; font-weight: 700; letter-spacing: 1px;">DASHBOARD</h3>
                </div>
                <div class="card-body">
                    <div class="row my-5 mx-5 justify-content-center">
                        <div class="col-xxl-auto">
                            <button type="button" class="button-dash" onclick="window.location.href='<?= $HTML_PATH ?>/index.php?page=search_patient'">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </div>
                                    <div class="col-xxl-auto align-self-center">
                                        Search Patient
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-xxl-1"></div>
                        <div class="col-xxl-auto">
                            <button type="button" class="button-dash" onclick="window.location.href='<?= $HTML_PATH ?>/index.php?page=insert_patient'">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                        </svg>
                                    </div>
                                    <div class="col-xxl-auto align-self-center">
                                        Insert Patient
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-xxl-1"></div>
                        <div class="col-xxl-auto">
                            <button type="button" class="button-dash">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alphabet-uppercase" viewBox="0 0 16 16">
                                        <path d="M1.226 10.88H0l2.056-6.26h1.42l2.047 6.26h-1.29l-.48-1.61H1.707l-.48 1.61ZM2.76 5.818h-.054l-.75 2.532H3.51zm3.217 5.062V4.62h2.56c1.09 0 1.808.582 1.808 1.54 0 .762-.444 1.22-1.05 1.372v.055c.736.074 1.365.587 1.365 1.528 0 1.119-.89 1.766-2.133 1.766h-2.55ZM7.18 5.55v1.675h.8c.812 0 1.171-.308 1.171-.853 0-.51-.328-.822-.898-.822zm0 2.537V9.95h.903c.951 0 1.342-.312 1.342-.909 0-.591-.382-.954-1.095-.954H7.18Zm5.089-.711v.775c0 1.156.49 1.803 1.347 1.803.705 0 1.163-.454 1.212-1.096H16v.12C15.942 10.173 14.95 11 13.607 11c-1.648 0-2.573-1.073-2.573-2.849v-.78c0-1.775.934-2.871 2.573-2.871 1.347 0 2.34.849 2.393 2.087v.115h-1.172c-.05-.665-.516-1.156-1.212-1.156-.849 0-1.347.67-1.347 1.83Z"/>
                                        </svg>
                                    </div>
                                    <div class="col-xxl-auto align-self-center">
                                        Third button
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>