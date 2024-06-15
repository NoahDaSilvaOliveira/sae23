<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Projet</title>
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
            <!-- Active link for the current page -->
            <li class="active"><a href="login_form.php">Administration</a></li>
            <li><a href="gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
</header>

    <section>
        <!-- Heading for the login section -->
        <h2>Connexion Administration</h2>
        <!-- Login form -->
        <form method="POST" action="login.php">
            <label for="username">Nom utilisateur:</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur..." required>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe..." required>
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

