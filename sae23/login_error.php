<?php
    // Start the session
    session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification erronée</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <!-- Link to the CSS file specific to the index page -->
    <link rel="stylesheet" type="text/css" href="styles/style_index.css" media="screen" />
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,500;0,600;0,800;1,600&family=Roboto+Condensed:wght@200&family=Roboto:wght@100;400&family=Rubik:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    // Reset the session array
    $_SESSION = array();
    // Destroy the session
    session_destroy();
    // Unset the session array
    unset($_SESSION);
    ?>

	
    <section>
		<h2>Message d'erreur !!!</h2>
        <p>
            <br />
            <em><strong>Administration de la base : Accès limité; aux personnes autorisées</strong></em>
            <br />
        </p>
        <br />
        <!-- Display an error message -->
        <p class="erreur">Mot de passe non saisi ou erroné !!!</p>
        <br />
    

        <div class="button-container">
            <!-- Button to the consultation page -->
            <a class="button" href="consultation.php">Retour à la page consultation</a>

            <!-- Button to the login form -->
            <a class="button" href="login_form.php">Retour à l'identification</a>
			<a class="button" href="index.php">Retour à l'accueil</a>
        </div>
    </section>
</body>
</html>

