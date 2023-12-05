<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "QuarantineCampDB";

    // Create a MySQLi connection
    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Check if the connection is successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query to select all patients from the "patient" table
    $query = "SELECT * FROM personnel";
    $result = $mysqli->query($query);

    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . $mysqli->error);
    }

    // Display the results in HTML
    $row = $result->fetch_assoc();
    $columnNames = array_keys($row);
    echo '
    <table class="table table-light table-striped table-hover table-bordered">
    <caption class="caption-top"><div>Click "View" to view patient info</div></caption>
    <thead>
        <tr>
    ';
    foreach ($columnNames as $columnName) {
        echo "<th>$columnName</th>";
    }
    echo "<th>View info</th>";
    echo "
        </tr>
    </thead>
    ";

    // Fetch and display each row of the result set
    $result->data_seek(0);
    echo '
        <tbody>
    ';
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        foreach ($columnNames as $columnName) {
            echo "<td>{$row[$columnName]}</td>";
        }
        echo '
        <td>
            <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">View</button>
        </td>
        ';
        echo "</tr>";
    }

    echo "
        </tbody>
    </table>
    ";

    // Close the database connection
    $mysqli->close();
?>
