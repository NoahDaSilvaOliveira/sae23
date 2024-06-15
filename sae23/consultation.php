<?php
include 'mysql.php';

// Query to retrieve the latest measurement for each sensor
$sql = "SELECT c.nom_capteur, m.valeur, m.date_mesure, m.date_mesure AS horaire FROM Mesure m JOIN Capteur c ON m.capteur = c.nom_capteur;";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
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
            <!-- Active link for the current page -->
            <li class="active"><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
</header>

<!-- ============ TOP OF PAGE ============== -->

<section>
    <h2>Dernières mesures de tous les capteurs</h2>
    <table>
        <tr>
            <th>Nom du Capteur</th>
            <th>Valeur</th>
            <th>Date</th>
            <th>Horaire</th>
        </tr>
        <?php
        // Check if there are any results
        if ($result->num_rows > 0) {
            // Loop through the results and display them in a table
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nom_capteur"] . "</td><td>" . $row["valeur"] . "</td><td>" . $row["date_mesure"] . "</td><td>" . $row["horaire"] . "</td></tr>";
            }
        } else {
            // Display a message if no results are found
            echo "<tr><td colspan='4'>Aucune mesure trouvée</td></tr>";
        }
        $conn->close();
        ?>
    </table>
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
