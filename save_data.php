<?php
// Retrieve data sent from JavaScript
// Retrieve data sent from JavaScript
$email = $_POST['email'];
$password = $_POST['password'];

echo "Received data: Email=$email, Password=$password"; // Debug output

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO login (email, password) VALUES ('$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
