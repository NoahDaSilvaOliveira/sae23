<?php
session_start();
include 'mysql.php';

// Check if the user is a manager
if (!isset($_SESSION['gestion']) || empty($_SESSION['gestion'])) {
    header("Location: login_gestion.php");
    exit();
}

$gestion = $_SESSION['gestion'];

// Retrieve the name of the building managed by the manager
$sql_bat = "SELECT nom_bat FROM Batiment WHERE gestion = '$gestion'";
$result_bat = $conn->query($sql_bat);

if ($result_bat->num_rows > 0) {
    $row_bat = $result_bat->fetch_assoc();
    $nom_bat = $row_bat['nom_bat'];
} else {
    echo "Aucun bâtiment trouvé pour ce gestionnaire.";
    exit();
}

// Retrieve the averages, min and max of the rooms in the building
$sql_stats = "SELECT s.nom_salle, AVG(m.valeur) AS moyenne, MIN(m.valeur) AS minimum, MAX(m.valeur) AS maximum
              FROM Mesure m
              JOIN Capteur c ON m.capteur = c.nom_capteur
              JOIN Salle s ON c.salle = s.nom_salle
              JOIN Batiment b ON s.batiment = b.id_bat
              WHERE b.nom_bat = '$nom_bat'
              GROUP BY s.nom_salle";

$result_stats = $conn->query($sql_stats);

// Retrieve the sensor measurements for the building
$sql_mesures = "SELECT c.nom_capteur, m.valeur, m.date_mesure
                FROM Mesure m
                JOIN Capteur c ON m.capteur = c.nom_capteur
                JOIN Salle s ON c.salle = s.nom_salle
                JOIN Batiment b ON s.batiment = b.id_bat
                WHERE b.nom_bat = '$nom_bat'
                ORDER BY m.date_mesure DESC";

$result_mesures = $conn->query($sql_mesures);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="screen" />
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
            <li class="active"><a href="gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
        </ul>
    </nav>
    <!-- Logout button -->
    <div class="logout-button">
        <a href="logout.php" class="btn">Se déconnecter</a>
    </div>
</header>

<section>
    <h2>Statistiques des salles du bâtiment <?php echo $nom_bat; ?></h2>
    <table>
        <tr>
            <th>Nom de la Salle</th>
            <th>Moyenne</th>
            <th>Minimum</th>
            <th>Maximum</th>
        </tr>
        <?php
        // Check if there are any results
        if ($result_stats->num_rows > 0) {
            // Loop through the results and display them in a table
            while($row = $result_stats->fetch_assoc()) {
                echo "<tr><td>" . $row["nom_salle"] . "</td><td>" . $row["moyenne"] . "</td><td>" . $row["minimum"] . "</td><td>" . $row["maximum"] . "</td></tr>";
            }
        } else {
            // Display a message if no results are found
            echo "<tr><td colspan='4'>Aucune statistique trouvée</td></tr>";
        }
        ?>
    </table>

    <h2>Mesures des capteurs du bâtiment <?php echo $nom_bat; ?></h2>
    <table>
        <tr>
            <th>Nom du Capteur</th>
            <th>Valeur</th>
            <th>Date et Heure</th>
        </tr>
        <?php
        // Check if there are any results
        if ($result_mesures->num_rows > 0) {
            // Loop through the results and display them in a table
            while($row = $result_mesures->fetch_assoc()) {
                echo "<tr><td>" . $row["nom_capteur"] . "</td><td>" . $row["valeur"] . "</td><td>" . $row["date_mesure"] . "</td></tr>";
            }
        } else {
            // Display a message if no results are found
            echo "<tr><td colspan='3'>Aucune mesure trouvée</td></tr>";
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

