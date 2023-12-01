import {path} from '../path_config.js';
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
        xhr.open('POST', path + '/services/login_processing.php', true);
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
                        window.location.href = path + '/index.php';
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
