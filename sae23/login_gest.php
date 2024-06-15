<?php
// Start the session
session_start();

// Connect to the database
include 'mysql.php';

// Check if the request method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data (username and password)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is a manager
    $sql = "SELECT * FROM Gestionnaire WHERE id_gestion = $username AND mdp = '$password'";
    $result = $conn->query($sql);
    
    // Check if the query returned any results
    if ($result->num_rows == 1) {
        // If the query returns one row, the user is a manager
        $row = $result->fetch_assoc();
        
        // Store the username and building ID in the session
        $_SESSION['username'] = $username;
        $_SESSION['building_id'] = $row['id_gestion'];
        
        // Redirect to the manager page
        header("Location: gestionnaire.php");
        exit();
    } else {
        // If the user is not a manager, redirect to the login error page
        header("Location: login_error.php");
    }
}

// Close the database connection
$conn->close();
?>

