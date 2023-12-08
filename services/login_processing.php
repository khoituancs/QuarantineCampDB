
<?php
    session_start();
    include_once ("../config.php");

    $conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
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

            // $sql="SELECT * FROM public.mgr_authentication WHERE username = '$email' AND password = '$password'";
            // $result = pg_query($conn, $sql);

            $query = "SELECT * FROM public.mgr_authentication WHERE username = $1";
            $result = pg_prepare($conn, "SELECT_USER", $query);
            $result = pg_execute($conn, "SELECT_USER", array($email));

            if (pg_numrows($result) === 1) {
                // Output data for each row
                $row = pg_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {

                    $user_id_val = $row['manager_code'];
                    $username_val = $row['username'];

                    $expirationTime = time() + 3600; // 1 hour from now
                    setcookie("user_id", $user_id_val, $expirationTime);
                    setcookie("username", $username_val, $expirationTime);

                    $_SESSION['user_id']=$user_id_val;
                    $_SESSION['username']=$username_val;


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
    pg_close($conn);
?>