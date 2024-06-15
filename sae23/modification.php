<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A savoir</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="screen" />
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
            <li><a href="gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <!-- Active link for the current page -->
            <li class="active"><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
</header>

<!-- ============ TOP OF PAGE ============== -->

<section>
    <h2>Modifications apportées</h2>

    <h3>Ajout de la page Gestion.php</h3>

    <p>Une nouvelle page nommée "Gestion.php" a été ajoutée au projet. Cette page est accessible uniquement aux gestionnaires et offre les fonctionnalités suivantes :</p>

    <ul>
        <li><strong>- Affichage des mesures des capteurs</strong> : Les gestionnaires peuvent visualiser les mesures des capteurs installés dans leur bâtiment.</li>
        <li><strong>- Affichage des moyennes, minimums et maximums</strong> : La page affiche les valeurs moyennes, minimales et maximales des mesures pour chaque salle de leur bâtiment.</li>
    </ul>

    <p>Cette fonctionnalité permet aux gestionnaires d'avoir une vue d'ensemble des données de leur bâtiment, facilitant ainsi le suivi et la gestion des conditions environnementales.</p>

    <h3>Ajout de la page d'authentification</h3>

    <p>De nouvelles pages nommée "login_form.php" et "login_gestion.php" ont été ajoutée au projet. Ces pages servent de redirection vers la page "administration.php" et "gestion.php" après une authentification réussie.</p>

    <h3>Ajout du style.css</h3>

    <p>Les fichiers PHP et HTML ont été modifiés pour intégrer le CSS (Cascading Style Sheets) à chaque page. Cette mise à jour apporte une présentation cohérente et attrayante à l'ensemble du site.</p>

</section>

<!-- ============ BOTTOM OF PAGE ============== -->
<aside class="fin">

</aside>

<footer>
    <ul>
        <li>IUT de Blagnac</li>
        <li>Département Réseaux et Télécommunications</li>
        <li>BUT1</li>
    </ul>
</footer>

</body>
</html>

