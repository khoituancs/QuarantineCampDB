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
    include_once ("../config.php");
    
    // Create a connection to the MySQL server
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (isset($_POST["products"])) {
        $product_name = $_POST["products"];
    
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
        $param = '%' . $product_name . '%';
        $stmt->bind_param('s', $param);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $products = array();
    
            while ($row = $result->fetch_assoc()) {
                // Add each product to the $products array
                $products[] = $row;
            }
    
            // Return the array as JSON
            echo json_encode($products);
        } else {
            // Return a JSON-encoded message indicating no results found
            echo json_encode(array("message" => "No results found."));
        }
    
        $stmt->close();
    } else {
        // Return a JSON-encoded message indicating a problem with the request
        echo json_encode(array("message" => "Please try again."));
    }
    
    // Close the MySQL connection
    $conn->close();    
?>