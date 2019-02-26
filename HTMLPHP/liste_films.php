<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cinefa.css">
    <title></title>
  </head>
  <body> <!-- Liste de tout les films présents -->
    <?php
      ////////////////////////////////////////////////////////////////////////////////////////////////
      require_once 'connexion.php';                                 // Inclure le fichier de connexion
      ////////////////////////////////////////////////////////////////////////////////////////////////
      include 'header.php';
    ?> <h1>Liste des films</h1>

    <form name="form1" method="POST" action="#" required>
      <input type="text" name="recherche" placeholder="Recherche" required ><br>
      <input id="valid_button" type="submit" name="submit1" placeholder="Inscription" required>
    </form>
    <p class="message_reussi">Resultat de la recherche :</p>

    <?php
    ////////////////////////////////////////////////////////////////////////////////
    //////////////////////////// formulaire de recherche ///////////////////////////
    ////////////////////////////////////////////////////////////////////////////////
    if (isset($_POST['submit1']))
    {
      $recherche = $_POST['recherche'];
      $request = 'SELECT title, id_movies FROM movies where title like "%' . $recherche . '%"'; //Requette SQL
      $result_query2 = mysqli_query($db_handle, $request);
      $found = false;


          while ($db_field = mysqli_fetch_assoc($result_query2))
             {
              $found = true;
              echo ' <ul class = "message_reussi"> <li><a href="fiche_film.php?id='. $db_field['id_movies'] . '">' . $db_field['title'] .'</a></li> </ul>';
             }

            if ($found == false) {
              echo '<script>alert("Aucun film trouvé")</script>';
            }

      }
      else {
        echo "<p class='message_reussi'> Veuillez entrer le nom d'un film. </p>";
      }


      ////////////////////////////////////////////////////////////////////////////////
      //////////////////////////// Liste des films ///////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////
      if ($db)
        {
          //echo $db_name . " database found";
          $request = "SELECT * FROM movies"; //Requette SQL
          $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL

            while ($db_field = mysqli_fetch_assoc($result_query))       //Boucle pour parcourir la table transformée en tableau
            {
              $id = $db_field['id_movies'];
              echo ' <li><a href="fiche_film.php?id='. $id . '">' . $db_field['title'] .'</a></li>';
            }

        }

      if ($_SESSION['pseudo'])
        {
          echo '<input type="submit" name="bouton" value="Films avec notes">';
          'SELECT * FROM movies INNER JOIN movie_notes ON movies.id_movie = movie_notes.' . $_GET['id'];
        }

    ?>
  </body>
</html>
