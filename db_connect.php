<?php
// Database credentials
$servername = "localhost:4306"; // XAMPP default localhost
$username = "root"; // Correct default username for MySQL in XAMPP
$password = ""; // Default password is empty
$dbname = "contact_messages"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
