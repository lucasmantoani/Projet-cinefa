<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cinefa.css">
    <title>fiche réalisateur</title>
  </head>
  <body>
    <?php

      // Fiche individuelle d'un réalisateur, contenant les films qui a réalisé.

      ////////////////////////////////////////////////////////////////////////////////////////////////
      require_once 'connexion.php';                                 // Inclure le fichier de connexion
      ////////////////////////////////////////////////////////////////////////////////////////////////
      include 'header.php';

      if (isset($_GET['id'])) {

        $request = "SELECT * FROM directors WHERE id_director = " . $_GET['id']; //Requette SQL
        $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL
        $db_field = mysqli_fetch_assoc($result_query);

        $request_movie = "SELECT * FROM movies WHERE id_director =" . $_GET['id'];
        $result_query2 = mysqli_query($db_handle, $request_movie);         //Resultat de la requette SQL
        //$db_field2 = mysqli_fetch_assoc($result_query2);
        //print_r($db_field);
        //print_r($db_field2);

        $name = str_replace(" ", "_", $db_field['name']);
          echo "<h1>" . $db_field['name'] . "</h1>" ; //Titre de la page avec le nom du réalisateur cliqué

          echo '<img class="' . $name . '" src="' . $db_field['links'] . '">' ; // <img src avec le liens dans ma base de données

          echo "<ul class = 'liste'><li>" . $db_field['name'] . "</li>" .
               "<li>" . "Age : " . $db_field['age'] . " ans." . "</li>" .
               "<li>" . $db_field['gender'] . "</li>" .
               "<li>" . $db_field['name'] . "</li></ul>";
               while ($db_field2 = mysqli_fetch_assoc($result_query2)){
                 echo '<ul class = "liste"><li class = "liste"> est le réalisateur de  :' . '<a href="fiche_film.php?id=' . $db_field2['id_movies'] . '">' . $db_field2['title'] . '</a> </li></ul>';
             }
        }
      else {
        echo "Réalisateur non présent dans la base de données";
      }
    ?>
  </body>
</html>

<?php echo '<a href=""></a>' ?>
