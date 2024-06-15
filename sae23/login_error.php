<?php
	// Start the session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	   <meta charset="UTF-8" />
	   <title>Identification erron&eacute;e</title>
	   <!-- Link to the CSS file -->
	   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	 </head>

	<body>
		<!-- Display header -->
		<?php 
			// Reset the session array
			$_SESSION = array();
			// Destroy the session
			session_destroy();
			// Unset the session array
			unset($_SESSION);
		?>
		<section>
			<p>
				<br />
				<em><strong>Administration de la base : Accès limité; aux personnes autorisées</strong></em>
				<br />
			</p>
			<br />
			<!-- Display an error message -->
			<p class="erreur">Mot de passe non saisi ou erroné !!!</p>
			<br />
			<hr />
		</section>
		<footer>
			<!-- Link to the consultation page -->
			<p><a href="consultation.php">Retour à la page consultation</a></p>
			<!-- Link to the login form -->
			<p><a href="login_form.php">Retour à l'identification</a></p>
		</footer>
	</body>
</html>

