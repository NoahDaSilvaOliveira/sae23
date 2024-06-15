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
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="administration.php">Administration</a></li>
                <li><a href="gestion.php">Gestion</a></li>
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="gestion_projet.php">Gestion de projet</a></li>
            </ul>
        </nav>
    </header>
    <section class="content">
		<h1>Bienvenue sur le site de la sae 23 !</h1> 
		<p>Dans cette partie vous retrouverez les différents éléments réalisés lors de la conception du site web incluant : </p>
		<ol>
            <li><a href="#section-1" class="lien">La description de l'objectif </a></li>
            <li><a href="#section-2" class="lien">L' affichage des bâtiments gérés</a></li>
            <li><a href="#section-3" class="lien">L' affichage des salles gérés</a></li>
            <li><a href="#section-4" class="lien">Les mentions légales</a></li>
        </ol>
		<p>
    </section>

	 <section id="section-1">
        <h1>1 -Description de l'objectif </h1>
        <p>L'objectif principal était d' offrir aux gestionnaires des bâtiments de l’IUT une interface conviviale et simple pour la visualisation des 
		   données capteur</p>
		<p>Voici à quoi ressemblait les capteurs dans les différentes salles : </p>
		<img src="./Images/capteurAM107.png" alt="Image d'un capteur AM107" />
    </section>
	
	<section id="section-2">
        <h1>2 - Affichage des bâtiments gérés </h1>
		<?php
			/* database access */
			include ("mysql.php");
			$requete_bat="SELECT nom_bat FROM Batiment";
			$resultat_bat=mysqli_query($id_bd, $requete_bat)
				or die("Execution de la requete impossible : $requete_bat");

			$requete_salle="SELECT nom_salle FROM Salle";
			$resultat_salle=mysqli_query($id_bd, $requete_salle)
				or die("Execution de la requete impossible : $requete_salle");

			mysqli_close($id_bd);

			echo "<table><caption>Nom des bâtiments : </caption>";		
			while($ligne=mysqli_fetch_array($resultat_bat))
			{
				extract($ligne);
				echo "<tr><td>$nom_bat</td></tr>";
			}
			echo "</table>";
		?>
    </section>

	 <section id="section-3">
        <h1>3 - Affichage des salles gérées  </h1>
        <?php
		echo "<table><caption>Nom des salles : </caption>";		
			$i=true ;
			while($ligne=mysqli_fetch_array($resultat_salle))
			{
				extract($ligne);
				echo "<tr><td>$nom_salle</td></tr>";
			}
			echo "</table>";
		?>
    </section> 
	
	 <section id="section-4">
        <h1>4 - Mentions légales</h1>
        <h3>1 - Édition du site.</h3>
            <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, 
                il est précisé aux utilisateurs du site internet <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a> l'identité des différents intervenants dans le cadre de 
                sa réalisation et de son suivi:
            </p>    
            <p>Propriétaire du site : Da Silva Oliveira Noah  - Contact :<br>
                noah.dasilvaoliveira.iut@gmail.com  - Adresse : 30 Rue Vieussens, 12000 Rodez.
            </p>
            <p>
                Directeur de la publication : Da Silva Oliveira Noah  Contact :<br>
                noah.dasilvaoliveira.iut@gmail.com.
            </p>
            <p>Hébergeur : Eohost Kiel, Schleswig-Holstein, Allemagne. +49(431) 220 7240</p>
            <p>
                Autres contributeurs : Les mentions légales ont étés générées et offertes par la-webeuse.com
            </p>
            <h3>2 - Propriété intellectuelle et contrefaçons.</h3>
            <p>Da Silva Oliveira Noah est propriétaire des droits de propriété intellectuelle et détient les droits d’usage sur tous les éléments accessibles sur le site internet, 
                notamment les textes, images, graphismes, logos, vidéos, architecture, icônes et sons.
            </p>
            <p>   
                Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est 
                interdite, sauf autorisation écrite préalable de Da Silva Oliveira Noah .
            </p>
            <p>    
                Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie 
                conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.
            </p>
            <h3>3 - Limitations de responsabilité.</h3>
            <p>
                Da Silva Oliveira Noah ne pourra être tenu pour responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site 
                <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>.
            </p>
            <p>
                Da Silva Oliveira Noah décline toute responsabilité quant à l’utilisation qui pourrait être faite des informations et contenus présents sur 
                <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>.
            </p>
            <p>
                Da Silva Oliveira Noah s’engage à sécuriser au mieux le site <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>, 
                cependant sa responsabilité 
                ne pourra être mise en cause si des données indésirables sont importées et installées sur son site à son insu.
            </p>
            <p>
                Des espaces interactifs (espace contact ou commentaires) sont à la disposition des utilisateurs. Da Silva Oliveira Noah se réserve le droit de supprimer, 
                sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions 
                relatives à la protection des données.
            </p>
            <p>
                Le cas échéant, Da Silva Oliveira Noah se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, 
                notamment en cas de message à caractère raciste, injurieux, diffamant, ou suggestifs, quel que soit le support utilisé.
            </p>
            <h3>4 - CNIL et gestion des données personnelles.</h3>
            <p>
                En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, 
                l’article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.
                A l’occasion de l’utilisation du site <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>, 
                peuvent êtres recueillies : l’URL des liens 
                par l’intermédiaire desquels l’utilisateur a accédé au site <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>,
                le fournisseur d’accès de l’utilisateur, 
                l’adresse de protocole Internet (IP) de l’utilisateur.
            </p>
            <p>En tout état de cause Da Silva Oliveira Noah ne collecte  pas des informations personnelles relatives à l’utilisateur. </p>
            <p>
                Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, 
                tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, 
                accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.
            </p>
            <p>
                Aucune information personnelle de l’utilisateur du site  <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a> n’est publiée à l’insu de l’utilisateur, 
                échangée, transférée, cédée ou vendue sur un support quelconque à des tiers.
            </p>
            <p>Le site n’est pas déclaré à la CNIL car il ne recueille pas d’informations personnelles.</p>
            <h3>5 - Liens hypertextes et cookies</h3>
            <p>
                Le site <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a> contient des liens hypertextes 
                vers d’autres sites et dégage toute responsabilité à propos de ces liens externes ou des liens créés par d’autres sites vers 
                <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>.
            </p>
            <p>
                La navigation sur le site <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a> est susceptible de 
                provoquer l’installation de cookie(s) sur l’ordinateur 
                de l’utilisateur.
            </p>
            <p>
                Un "cookie" est un fichier de petite taille qui enregistre des informations relatives à la navigation d’un utilisateur sur un site. Les données ainsi 
                obtenues permettent d'obtenir des mesures de fréquentation, par exemple.
            </p>
            <p>Vous avez la possibilité d’accepter ou de refuser les cookies en modifiant les paramètres de votre navigateur. Aucun cookie ne sera déposé sans votre consentement.</p>
            <p>Les cookies ne sont pas enregistrés. </p>
            <h3>6 - Droit applicable et attribution de juridiction.</h3>
            <p>
                Tout litige en relation avec l’utilisation du site  <a href="http://da-silva-oliveira.atwebpages.com" class="lien">http://da-silva-oliveira.atwebpages.com</a>
                est soumis au droit français. En dehors des cas où la loi ne le permet pas, il est fait attribution exclusive de juridiction aux tribunaux compétents de Rodez.

            </p>
    </section>
       
    <footer>
        <p>Copyright &#169; 2024 Da Silva - Capel - Hom | Tout droits réservés</p>   
    </footer>
</body>
</html>
