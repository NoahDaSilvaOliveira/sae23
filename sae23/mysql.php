<?php
// Server name
$servername = "localhost";
// Username
$username = "noah";
// Password
$password = "rt";
// Database name
$dbname = "sae23";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set the characters encodage to utf8
mysqli_query($conn, "SET NAMES 'utf8'");

// Check the connection
if ($conn->connect_error) {
    // If the connection fails, display an error message and exit
    die("Connection failed: " . $conn->connect_error);
}
?>

