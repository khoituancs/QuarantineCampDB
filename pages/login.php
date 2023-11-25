<?php
    
    if (isset($_SESSION['user_id'])){
        header ("Location: /DB/index.php");
    }
?>

<!DOCTYPE	html>
<html>
    <head>
        <title>login</title>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("showPass").addEventListener("change", function() {
                    var passwordInput = document.getElementById("password");
                    if (this.checked) {
                        passwordInput.type = "text";
                    } else {
                        passwordInput.type = "password";
                    }
                });
            });
        </script>
        <script>
            function isEmailValid(email) {
                // Regular expression pattern for a valid email address
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return emailPattern.test(email);
            }
            function submitForm() {
                document.getElementById("loading").style.display = "block";

                var username = document.getElementById('username').value;
                var password = document.getElementById('password').value;

                document.getElementById('loginResponse').innerHTML = '';

                if (!isEmailValid(username)) {
                    // If validation fails, display an error message
                    document.getElementById('loginResponse').innerHTML = '<span style="color: red;"> Username must be an email.</span>';
                    document.getElementById("loading").style.display = "none"; // Hide loading animation on validation error
                } else {
                    // If validation succeeds, allow the form to submit via AJAX
                    var formData = new FormData(document.getElementById('login_form'));
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/DB/services/login_processing.php', true);
                    xhr.withCredentials = true;

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            document.getElementById("loading").style.display = "none"; // Hide loading animation when the request is complete

                            if (xhr.status === 200) {
                                // Handle the response from login_processing.php
                                if (xhr.responseText.trim() == '<span style="color: red;"> Username must be an email.</span>'){
                                    document.getElementById('loginResponse').innerHTML = xhr.responseText;
                                }
                                else if (xhr.responseText.trim() == 'Login successful!') {
                                    // Redirect to index.php when login is successful
                                    window.location.href = "/DB/index.php";
                                }
                                else {
                                    // Display the response from login_processing.php
                                    document.getElementById('loginResponse').innerHTML = xhr.responseText;
                                }
                            }
                        }
                    };
                    xhr.send(formData);
                }
            }
        </script>
    </head>
    <body>
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
    </body>
</html>