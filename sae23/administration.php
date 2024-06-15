<?php
session_start();
include 'mysql.php';

// Check if the user is an administrator
if (!isset($_SESSION['id_administration'])) {
    header("Location: login_form.php");
    exit();
}

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add a building
    if (isset($_POST['add_building'])) {
        $nom_bat = $_POST['nom_bat'];
        $gestion = $_POST['gestion'];
        $sql = "INSERT INTO Batiment (nom_bat, gestion) VALUES ('$nom_bat', '$gestion')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouveau bâtiment ajouté avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Delete a building
    if (isset($_POST['delete_building'])) {
        $id_bat = $_POST['id_bat'];
        $sql = "DELETE FROM Batiment WHERE id_bat='$id_bat'";
        if ($conn->query($sql) === TRUE) {
            echo "Bâtiment supprimé avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Add a room
    if (isset($_POST['add_room'])) {
        $nom_salle = $_POST['nom_salle'];
        $type_salle = $_POST['type_salle'];
        $capacite = $_POST['capacite'];
        $batiment = $_POST['batiment'];
        $sql = "INSERT INTO Salle (nom_salle, type_salle, capacite, batiment) VALUES ('$nom_salle', '$type_salle', '$capacite', '$batiment')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouvelle salle ajoutée avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Delete a room
    if (isset($_POST['delete_room'])) {
        $id_salle = $_POST['id_salle'];
        $sql = "DELETE FROM Salle WHERE id_salle='$id_salle'";
        if ($conn->query($sql) === TRUE) {
            echo "Salle supprimée avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Add a sensor
    if (isset($_POST['add_sensor'])) {
        $nom_capteur = $_POST['nom_capteur'];
        $type_capteur = $_POST['type_capteur'];
        $unite = $_POST['unite'];
        $salle = $_POST['salle'];
        $sql = "INSERT INTO Capteur (nom_capteur, type_capteur, unite, salle) VALUES ('$nom_capteur', '$type_capteur', '$unite', '$salle')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouveau capteur ajouté avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Delete a sensor
    if (isset($_POST['delete_sensor'])) {
        $id_capteur = $_POST['id_capteur'];
        $sql = "DELETE FROM Capteur WHERE id_capteur='$id_capteur'";
        if ($conn->query($sql) === TRUE) {
            echo "Capteur supprimé avec succès.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <!-- Link to the main CSS file -->
    <link rel="stylesheet" type="text/css" href="styles/style.css" media="screen" />
    <!-- Link to the CSS file specific to the administration page -->
    <link rel="stylesheet" type="text/css" href="styles/admin.css" media="screen" />
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
            <li class="active"><a href="administration.php">Administration</a></li>
            <li><a href="gestion.php">Gestion</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestion.html">Gestion de Projet</a></li>
            <li><a href="modification.php">A savoir</a></li>
            <!-- Logout button -->
            <div class="logout-button">
                <a href="logout_admin.php" class="btn">Se déconnecter</a>
            </div>
        </ul>
    </nav>
</header>

<section>
    <h2>Administration</h2>

    <div class="form-container">
        <!-- Form to add a building -->
        <form method="post" action="" class="styled-form">
            <h3>Ajouter un bâtiment</h3>
            <label for="nom_bat">Nom du bâtiment:</label>
            <input type="text" id="nom_bat" name="nom_bat" placeholder="Entrez le nom du bâtiment..." required><br>
            <label for="gestion">ID du gestionnaire:</label>
            <input type="text" id="gestion" name="gestion" placeholder="Entrez l'id gestion..." required><br>
            <button type="submit" name="add_building">Ajouter</button>
        </form>

        <!-- Form to delete a building -->
        <form method="post" action="" class="styled-form">
            <h3>Supprimer un bâtiment</h3>
            <label for="id_bat">ID du bâtiment:</label>
            <input type="text" id="id_bat" name="id_bat" placeholder="Entrez l'id du bâtiment..." required><br>
            <button type="submit" name="delete_building">Supprimer</button>
        </form>

        <!-- Form to add a room -->
        <form method="post" action="" class="styled-form">
            <h3>Ajouter une salle</h3>
            <label for="nom_salle">Nom de la salle:</label>
            <input type="text" id="nom_salle" name="nom_salle" placeholder="Entrez le nom de la salle..." required><br>
            <label for="type_salle">Type de la salle:</label>
            <input type="text" id="type_salle" name="type_salle" placeholder="Entrez le type de salle..." required><br>
            <label for="capacite">Capacité:</label>
            <input type="number" id="capacite" name="capacite" placeholder="Entrez la capacité..." required><br>
            <label for="batiment">ID du bâtiment:</label>
            <input type="text" id="batiment" name="batiment" placeholder="Entrez l'id du bâtiment..." required><br>
            <button type="submit" name="add_room">Ajouter</button>
        </form>

        <!-- Form to delete a room -->
        <form method="post" action="" class="styled-form">
            <h3>Supprimer une salle</h3>
            <label for="id_salle">ID de la salle:</label>
            <input type="text" id="id_salle" name="id_salle" placeholder="Entrez l'id de la salle..." required><br>
            <button type="submit" name="delete_room">Supprimer</button>
        </form>

        <!-- Form to add a sensor -->
        <form method="post" action="" class="styled-form">
            <h3>Ajouter un capteur</h3>
            <label for="nom_capteur">Nom du capteur:</label>
            <input type="text" id="nom_capteur" name="nom_capteur" placeholder="Entrez le nom du capteur..." required><br>
            <label for="type_capteur">Type du capteur:</label>
            <input type="text" id="type_capteur" name="type_capteur" placeholder="Entrez le type de capteur..." required><br>
            <label for="unite">Unité:</label>
            <input type="text" id="unite" name="unite" placeholder="Entrez l'unité..." required><br>
            <label for="salle">ID de la salle:</label>
            <input type="text" id="salle" name="salle" placeholder="Entrez l'id de la salle..." required><br>
            <button type="submit" name="add_sensor">Ajouter</button>
        </form>

        <!-- Form to delete a sensor -->
        <form method="post" action="" class="styled-form">
            <h3>Supprimer un capteur</h3>
            <label for="id_capteur">ID du capteur:</label>
            <input type="text" id="id_capteur" name="id_capteur" placeholder="Entrez l'id du capteur..." required><br>
            <button type="submit" name="delete_sensor">Supprimer</button>
        </form>
    </div>
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

