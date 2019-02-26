<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cinefa.css">
    <title>fiche Film</title>
  </head>
  <body>
    <?php
      // Fiche individuelle d'un film, présentant les acteurs et le réalisateur s'ils sont présents.

      require_once 'connexion.php';                                 // Inclure le fichier de connexion
      include 'header.php';

      if (isset($_GET['id']))
      {

        $request = "SELECT *,movies.links as linkmovies FROM movies INNER JOIN directors ON directors.id_director = movies.id_director WHERE id_movies =" . $_GET['id']; //Requette SQL
        $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL pour les films
        $db_field = mysqli_fetch_assoc($result_query);

        $request = "SELECT * FROM actors INNER JOIN plays_in ON actors.id_actor = plays_in.id_actor WHERE id_movies =" . $_GET['id'];
        $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL pour les données acteurs
        $db_field2 = mysqli_fetch_assoc($result_query);


        $sql_query3 = 'SELECT AVG(note) FROM movies INNER JOIN movie_notes ON movies.id_movies =' .$_GET['id'];
        $result_query3 = mysqli_query($db_handle, $sql_query3);

        $db_field3 = mysqli_fetch_assoc($result_query3);
        $moyenne = $db_field3['AVG(note)'];
        echo $moyenne;

        $name = str_replace(" ", "_", $db_field['title']); // Sert à utiliser le nom de la personne pour faire une classe CSS

          echo "<h1>" . $db_field['title'] . "</h1>" ; //Titre de la page avec le nom du réalisateur cliqué
          echo '<img class="' . $name . '" src="' . $db_field['linkmovies'] . '">' ; // <img src avec le liens dans ma base de données
          echo "<ul class = 'liste'><li>" . $db_field['title'] . "</li>" .
               "<li>" . "Date de sortie : " . $db_field['year_released'] . "</li>" .
               "<li>" . "Genre: " . $db_field['Genre'] . "</li>" .
               "<li>" . "Note du film : " . $moyenne . "</li>" .
               '<li>' . "Fiche du réalisateur :" . '<a href="fiche_realisateur.php?id=' . $db_field['id_director'] . '">' . $db_field['name'] . '</a> </li>' .
               '<li>' . "Fiche de l'acteur :" . '<a href="fiche_acteur.php?id=' . $db_field2['id_actor'] . '">' . $db_field2['name'] . '</a> </li> </ul>' ;

      }
      else
      {
        echo "Film non présent dans la base de données";
      }
//----------------------- ajout d'une note a un film --------------------------
      ?>

            <h1>Notez Le film:</h1>

      <form action="" method="POST">
       <select name="note">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
       </select>
       <input type="submit" name="boutton_note" value="GO">
      </form>

      <?php // Première requète pour update la note si elle existe déja, sinon seconde requète pour la créer.
      	 	if (isset($_POST['boutton_note']))
      	 	{
      	 		if (!isset($_SESSION['pseudo'])) {
      	 			echo '<script>alert("Veuillez vous connecter pour noter le film !")</script>';
      	 		}
      	 		elseif (isset($db_field_note['note'])) {
      	 			if ($db) {
      	 				$note = $_POST['note'];
      	 				$id_movie = $_GET['id'];
      	 				$id_user = $_SESSION['id_user'];
      	 				$requete_note =' UPDATE movie_notes SET note = '. $note .' WHERE id_user = '. $id_user .' ';


                //echo $requete_note;
      	 				$result_query_note = mysqli_query($db_handle, $requete_note);
      	 				if ($result_query_note) {
      	 					echo '<script> alert("Votre vote à bien été pris en compte !") </script>';
      	 				}
      	 			}
      	 		}
      	 		else {
      	 			if ($db) {
      	 				$id_user = $_SESSION['id_user'];
      	 				$id_movie = $_GET['id'];
      	 				$note = $_POST['note'];
      	 				$requete_note2 = 'INSERT INTO movie_notes (id_movies, id_user, note) VALUES ('. $id_movie . ',' . $id_user . ',' . $note . ');';
              //  var_dump($requete_note2);

      					$result_query_note = mysqli_query($db_handle, $requete_note2);
      					if ($result_query_note) {
      						echo '<script> alert("Vous avez bien noté ce film !") </script>';
      					}
      				}
      			}
      		}

    ?>
  </body>
</html>
