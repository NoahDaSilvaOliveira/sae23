<?php
// Server name
$servername = "mysql-studyvore.alwaysdata.net";
// Username
$username = "studyvore_33610";
// Password
$password = "Football33610@";
// Database name
$dbname = "studyvore_33610";

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // If the connection fails, display an error message and exit
    die("Connection failed: " . $conn->connect_error);
}
?>

