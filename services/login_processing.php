
        <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "OnlineStore";

            // Create a connection to the MySQL server
            $conn = new mysqli($servername, $username, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            function isEmailValid($email) {
                // Use filter_var with the FILTER_VALIDATE_EMAIL filter
                return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Check if the "username" and "password" fields are set in the POST data
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $email = $_POST["username"];
                    if (!isEmailValid($email)) {
                        echo '<span style="color: red;"> Username must be an email.</span>';
                        exit;
                    }
                    $password = $_POST["password"];
                    $sql="SELECT * FROM users WHERE email = '$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows === 1) {
                        // Output data for each row
                        $row = $result->fetch_assoc();
                        if (password_verify($password, $row['password'])) {
                            $user_id = "user_id";
                            $user_id_val = $row['id'];
                            $username = "username";
                            $username_val = $row['username'];
                            $user_level = "user_level";
                            $user_level_val = $row['user_level'];
                            $expirationTime = time() + 3600; // 1 hour from now
                            setcookie($user_id, $user_id_val, $expirationTime);
                            setcookie($username, $username_val, $expirationTime);
                            setcookie($user_level, $user_level_val, $expirationTime);
                            $_SESSION['user_id']=$user_id_val;
                            $_SESSION['username']=$username_val;
                            $_SESSION['user_level']=$user_level_val;
                            header('Content-Type: text/plain');
                            echo 'Login successful!';
                        } else {
                            // Incorrect password.
                            session_unset();
                            echo '<span style="color: red;">Incorrect password. Please try again.</span>';
                        }
                    } else {
                        session_unset();
                        echo '<span style="color: red;">Incorect username. Please try again.</span>';
                    }
                } else {
                    // Handle the case where the "username" or "password" fields are missing in the POST data.
                    session_unset();
                    echo '<span style="color: red;">Please try again.</span>';
                }
            }

            // Close the MySQL connection
            $conn->close();
        ?>