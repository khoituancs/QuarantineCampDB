
<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/QuarantineCampDB/config.php");

    // Create a connection to the MySQL server
    $conn = pg_connect("host=$host port=$port user=$username password=$password dbname=$dbname");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    $manager_code = 1;
    //stuti@gmail.com
    $username = "nct2309@gmail.com";
    $password = password_hash("123456", PASSWORD_DEFAULT);

    $query = "INSERT INTO public.mgr_authentication VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($manager_code, $username, $password));

    if ($result !== false) {
        echo "Insert sucess";
    } else echo "Error: " . pg_last_error();
    
    pg_close($conn);
?>