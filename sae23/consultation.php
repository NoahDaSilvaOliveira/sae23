<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sae23"> 
    <meta name="description" content="Bienvenue sur ce site ! Sur ce site, vous retrouverez tout ce qui concerce la Sae23."> 
    <link rel="stylesheet" type="text/css" href="./Styles/style.css">
    <title>SAE 23</title>
</head>
<body>

    <header>
        <h1><a href="#">SAE 23</a></h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="administration.php">Administration</a></li>
                <li><a href="gestion.php">Gestion</a></li>
                <li><a href="#" class="active">Consultation</a></li>
                <li><a href="gestion_projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
		<h1>Bienvenue dans la page consultation !</h1>
		<p>Vous pouvez consulter les dernières mesures des capteurs ici avec le tableau suivant :</p>
		<?php
			/* database access */
			include ("mysql.php");
			$requete_nb_capteur="SELECT COUNT(nom_capteur) FROM Capteur";
			$resultat_nb_capteur=mysqli_query($id_bd, $requete_nb_capteur)
				or die("Execution de la requete impossible : $requete_nb_capteur");

			$nb_capteur= mysqli_fetch_array($resultat_nb_capteur);

			$requete_last_value="SELECT capteur,valeur,date_mesure FROM Mesure ORDER BY date_mesure DESC LIMIT $nb_capteur[0]"; 

			$resultat_last_value=mysqli_query($id_bd, $requete_last_value)
				or die("Execution de la requete impossible : $requete_last_value");
			
			mysqli_close($id_bd);

			echo "<table><caption>Affichage des dernières mesures de tous les capteurs gérés</caption>
				 <tr> 
		            <th> Nom Capteur</th> 
		            <th> Température </th> 
					<th> Date </th>
		        </tr>";
			while($ligne3=mysqli_fetch_array($resultat_last_value))
			{
				extract($ligne3);
				echo "<tr>
						<td>$capteur</td>
						<td>$valeur °C</td>
						<td>$date_mesure</td>
					 </tr>";
			}
			echo "</table>";
		?>	
    </section>
    <footer>
        <p>Copyright &#169; 2024 Da Silva - Capel - Hom | Tout droits réservés</p>   
    </footer>
</body>
</html>        
