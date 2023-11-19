<?php
$host_name = "localhost";
$db_name = "testprojectsign";
$username = "root";
$password = "";

// Establish connection with the database server
$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form
    $ottusername = $_POST["ottusername"];
    $ottpassword = $_POST["ottpassword"];

    // Prepare the SQL query
    $sql = "SELECT * FROM client WHERE ottusername = ? AND ottpassword = ?";

    // Create a prepared statement using the function mysqli_prepare()
    $stmt = $conn->prepare($sql);

    // Bind the variables to the parameter as strings. 
    $stmt->bind_param("ss", $ottusername, $ottpassword);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result of the prepared statement
    $result = $stmt->get_result();

    // Check if a record was found
    if ($result->num_rows > 0) {
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>