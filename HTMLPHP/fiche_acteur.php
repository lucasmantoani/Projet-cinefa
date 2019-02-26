<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cinefa.css">
    <title>fiche acteur</title>
  </head>
  <body>
    <?php
      // Page de fiche individuelle de l'acteur, contenant les films dans lequels il à joué.

      ////////////////////////////////////////////////////////////////////////////////////////////////
      require_once 'connexion.php';                                 // Inclure le fichier de connexion
      ////////////////////////////////////////////////////////////////////////////////////////////////
      include 'header.php';

      if (isset($_GET['id'])) {

        $request = "SELECT * FROM actors WHERE id_actor =" . $_GET['id']; //Requette SQL
        $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL
        $db_field = mysqli_fetch_assoc($result_query);

        $request2 = "SELECT movies.title, movies.id_movies FROM plays_in, movies, actors WHERE plays_in.id_actor=actors.id_actor AND plays_in.id_movies = movies.id_movies AND plays_in.id_actor = " . $_GET['id'] . " ORDER BY plays_in.id_actor DESC LIMIT 3";
        $result_query2 = mysqli_query($db_handle, $request2);         //Resultat de la requette SQL
        //$db_field2 = mysqli_fetch_assoc($result_query2);



        $name = str_replace(" ", "_", $db_field['name']);
          echo "<h1>" . $db_field['name'] . "</h1>" ; //Titre de la page avec le nom du réalisateur cliqué

          echo '<img class="' . $name . '" src="' . $db_field['links'] . '">' ; // <img src avec le liens dans ma base de données

          echo "<ul class = 'liste'><li>" . $db_field['name'] . "</li>" .
               "<li>" . "Age : " . $db_field['age'] . " ans." . "</li>" .
               "<li>" . $db_field['gender'] . "</li></ul>" .
               '<li class = "liste">' . $db_field['name'] . ' apparait dans : <br><li>' ;
               while ($db_field2 = mysqli_fetch_assoc($result_query2))
               {
                 echo '<ul class = "liste"><li><a class = "liste" href="fiche_film.php?id=' . $db_field2['id_movies'] . '">' . $db_field2['title'] . '</a> </li> </ul>' ;
               }
        }

      else {
        echo "Acteur non présent dans la base de données";
      }
    ?>
  </body>
</html>

<?php echo '<a href=""></a>' ?>
