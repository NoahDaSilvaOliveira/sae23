<?php
session_start();

// Connect to the database
include 'mysql.php';

// Check if the request method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user input to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the user is an administrator
    $sql = "SELECT id_administration FROM Administration WHERE id_administration = '$username' AND mdp = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // If the query returns one row, the user is an administrator
        $row = $result->fetch_assoc();
        // Store the administrator ID in the session
        $_SESSION['id_administration'] = $row['id_administration'];
        // Redirect to the administration page
        header("Location: administration.php");
        exit();
    }

    // Check if the user is a manager
    $sql = "SELECT id_gestion FROM Gestionnaire WHERE id_gestion = '$username' AND mdp = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        // If the query returns one row, the user is a manager
        $row = $result->fetch_assoc();
        // Store the username and building ID in the session
        $_SESSION['username'] = $username;
        $_SESSION['building_id'] = $row['id_gestion'];
        // Redirect to the management page
        header("Location: gestion.php");
        exit();
    } else {
        // If the user is neither an administrator nor a manager, redirect to the login error page
        header("Location: login_error.php");
    }
}
// Close the database connection
$conn->close();
?>

