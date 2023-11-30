<?php
    function printProducts($row){
        echo 
            '
            <tr>
            <th scope="row">'. $row["id"] . '</th>
            <td>' . $row["name"] . '</td>
            <td>' . $row["description"] . '</td>
            <td>' . $row["price"] . '</td>
            </tr>
            '
        ;
    }
?>
<?php
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

    if (isset($_POST["full_name"])){
        $product_name = $_POST["full_name"];
        if ($product_name === "all"){
            $sql = "SELECT * FROM products";
        } else{
            $sql = "SELECT * FROM products WHERE name='%$product_name%'";
        }

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                printProducts($row);
            }
        } else {
            echo '<span style="color: red;">No results found.</span>';
        }
    }
    else{
        echo '<span style="color: red;">Please try again.</span>';
    }

    // Close the MySQL connection
    $conn->close();
?>