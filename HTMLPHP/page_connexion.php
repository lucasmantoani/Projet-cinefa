<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="../CSS/cinefa.css">
			<title>Connection</title>
		</head>
		<body>
			<section> <!-- Page ou l'utilisateur se connecte au site  -->
        <?php include 'header.php'; ?>

				<h1>Connection</h1>

				<p class="message_reussi">
				Veuillez entrer vos informations personnelles pour vous connecter.
				</p>

				<form name="form1" method="POST" action="#" required>
					<input type="text" name="pseudo" placeholder="Pseudo" required ><br>
					<input type="password" name="motdepasse" placeholder="Mot de passe" required ><br>
					<input id="valid_button" type="submit" name="submit1" placeholder="Inscription" required>
				</form>
			</section>
			<section>

				<?php
					require_once 'connexion.php';

					if (isset($_POST['submit1']))
					{

						if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse']))
						{
							$pseudo = htmlspecialchars(trim($_POST['pseudo']));
							$mdp = htmlspecialchars(trim($_POST['motdepasse']));

							if($db)
							{
								$request_pseudo = "SELECT * FROM users WHERE pseudo = '" . $pseudo . "';";
								$result_query = mysqli_query($db_handle, $request_pseudo);
								$db_field = mysqli_fetch_assoc($result_query);

									if ($pseudo == $db_field['pseudo'] && $mdp == $db_field['motdepasse'])
									{
									  echo '<script>alert("Vous êtes désormais connecté !")</script>'; // ICI je vais ouvrir la $_SESSION

										session_start();
										$_SESSION['pseudo'] = $pseudo;
										$_SESSION['id_user'] = $db_field['ref_users'];
									}
									else
									{
				            echo '<h1 class="message_reussi"> try again bruh </h1> !'; // ICI rien ne change
									}

							}
					  }
					}
				?>
		</section>
		</body>
	</html>
