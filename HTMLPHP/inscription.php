<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="../CSS/cinefa.css">
			<title>Inscription</title>
		</head>
		<body>
			<section> <!-- Page d'inscription du site -->
				<?php include 'header.php'; ?>
				<h1>Inscription</h1>
				<p>
				<p class="message_reussi">Veuillez entrer les informations nécessaires à l'inscription.</p>
				</p>
				<form name="form1" method="POST" action="#" required>
					<input type="text" name="pseudo" placeholder="Pseudo" required ><br>
					<input type="password" name="motdepasse" placeholder="Mot de passe" required ><br>
					<input type="text" name="address" placeholder="Votre adresse" required><br>
					<input type="text" name="mail" placeholder="mail" required><br>
					<input type="text" name="phone" placeholder="Téléphone" required><br>
					<input id="valid_button" type="submit" name="submit1" placeholder="Inscription" required>
				</form>
			</section>
		<section>

		<?php
			require_once 'connexion.php';

			if (isset($_POST['submit1']))
			{
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$mdp = htmlspecialchars($_POST['motdepasse']);
				$address = htmlspecialchars($_POST['address']);
				$mail = htmlspecialchars($_POST['mail']);
				$phone = htmlspecialchars($_POST['phone']);

					if($db)
					{
						$request_pseudo = "SELECT * FROM users WHERE pseudo = '" . $pseudo . "';";
						$result_query = mysqli_query($db_handle, $request_pseudo);
						$db_field = mysqli_fetch_assoc($result_query);

							if ($db_field)
							{
							echo 'Ce pseudo existe déjà bruh !';
						  }
							else
							{
								$rqt =
								'INSERT INTO users ( pseudo, motdepasse, address, mail, phone) VALUES ("' . $pseudo . '","' . $mdp . '","' . $address . '","' . $mail . '","' . $phone . '");';
								$result_query = mysqli_query($db_handle, $rqt);

								if ($result_query)
								{
								echo '<script>alert("Vous êtes désormais inscrit au club, félicitation !")</script>';
								}
							}
					}
			 }
		?>
		</section>
		</body>
	</html>
