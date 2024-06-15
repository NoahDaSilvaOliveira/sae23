<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <!-- Link to the CSS file specific to the index page -->
    <link rel="stylesheet" type="text/css" href="styles/style_index.css" media="screen" />
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,500;0,600;0,800;1,600&family=Roboto+Condensed:wght@200&family=Roboto:wght@100;400&family=Rubik:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <a href="#">SAE23</a>
    <nav id="menu-links">
        <ul>
            <!-- Active link for the current page -->
            <li class="active"><a href="index.php">Accueil</a></li>
            <li><a href="administration.php">Administration</a></li>
            <li><a href="gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>Bienvenue sur le site de gestion des capteurs de l'IUT</h2>
	  <div class="button-container">
      <a href="consultation.php" class="button">Consulter les mesures</a>
      <a href="login_form.php" class="button">Administration</a>
    </div>
    <p>Objectif : Visualiser les données des capteurs installés dans les bâtiments de l'IUT et offrir aux gestionnaires des bâtiments de l’IUT 
	une interface conviviale et simple pour la visualisation des données capteur.</p>
    <p>Liste des bâtiments gérés :</p>
    <?php
    // Connect to the database
    include 'mysql.php';

    // Retrieve buildings
    $sql_bat = "SELECT * FROM Batiment";
    $result_bat = $conn->query($sql_bat);

	// Retrive rooms
	$sql_salle = "SELECT * FROM Salle";
    $result_salle = $conn->query($sql_salle);
		
    if ($result_bat->num_rows > 0) {
        // Display buildings in a table
        echo "<table>";
        echo "<tr><th>Nom du Bâtiment</th></tr>";
        while ($row_bat = $result_bat->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row_bat["nom_bat"]) . "</td></tr>";
        }
		echo "</table>";
    } else {
        echo "Aucun bâtiment trouvé.";
    }

    $conn->close();
    ?>
	<p>Liste des salles gérées :</p>
	<?php
	if ($result_salle->num_rows > 0) {
        // Display buildings in a table
        echo "<table>";
        echo "<tr><th>Nom des salles </th></tr>";
        while ($row_salle = $result_salle->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row_salle["nom_salle"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Aucune salle trouvée.";
    }	
	?> 
</main>

<!-- ============ BOTTOM OF PAGE ============== -->
<aside class="fin"></aside>

<footer>
    <ul>
        <li>IUT de Blagnac</li>
        <li>Département Réseaux et Télécommunications</li>
        <li>BUT1</li>
    </ul>
</footer>

</body>
</html>
