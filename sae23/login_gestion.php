<?php
session_start();

// Check if the request method is POST (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'mysql.php';

    // Get the form data
    $gestion = $_POST["gestion"];
    $mdp = $_POST["mdp"];

    // Query to check if the manager exists in the database
    $sql = "SELECT * FROM Gestionnaire WHERE id_gestion = '$gestion'";
    $result = $conn->query($sql);

    // Check if the query returned any results
    if ($result->num_rows > 0) {
        // Fetch the result row
        $row = $result->fetch_assoc();
        // Check if the entered password matches the stored password
        if ($mdp == $row["mdp"]) {
            // If the password is correct, store the manager ID in the session
            $_SESSION["gestion"] = $gestion;
            // Redirect to the management page
            header("Location: gestion.php");
            exit();
        } else {
            // If the password is incorrect, display an error message
            $error = "Mot de passe incorrect";
        }
    } else {
        // If the manager ID is not found, display an error message
        $error = "Identifiant de gestionnaire invalide";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="screen" />
    <!-- Link to the CSS file specific to the login page -->
    <link rel="stylesheet" type="text/css" href="styles/style_login.css" media="screen" />
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,500;0,600;0,800;1,600&family=Roboto+Condensed:wght@200&family=Roboto:wght@100;400&family=Rubik:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <a href="#">SAE23</a>
    <nav id="menu-links">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="administration.php">Administration</a></li>
            <!-- Active link for the current page -->
            <li class="active"><a href="login_gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
</header>

<section>
    <h2>Connexion Gestionnaire</h2>
    <!-- Display the error message if it exists -->
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <!-- Login form for managers -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="gestion">Identifiant Gestionnaire:</label>
        <input type="text" id="gestion" name="gestion" placeholder="Entrez votre identifiant" required><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</section>

<footer>
    <ul>
        <li>IUT de Blagnac</li>
        <li>Département Réseaux et Télécommunications</li>
        <li>BUT1</li>
    </ul>
</footer>

</body>
</html>

