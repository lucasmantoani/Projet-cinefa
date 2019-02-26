<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cinefa.css">
    <title></title>
  </head>
  <body> <!-- Liste de tout les acteurs présents dans la base de données -->
    <?php
      ////////////////////////////////////////////////////////////////////////////////////////////////
      require_once 'connexion.php';                                 // Inclure le fichier de connexion
      ////////////////////////////////////////////////////////////////////////////////////////////////

      include 'header.php';
    ?> <h1>Liste des acteurs</h1>

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
          $request_search = 'SELECT name, id_actor FROM actors where name like "%' . $recherche . '%"'; //Requette SQL
          $result_query2 = mysqli_query($db_handle, $request_search);
          $found = false;

              while ($db_field = mysqli_fetch_assoc($result_query2))
                 {
                  $found = true;
                  echo ' <ul class="message_reussi"> <li><a href="fiche_acteur.php?id='. $db_field['id_actor'] . '">' . $db_field['name'] .'</a></li></ul>';
                 }

                if ($found == false) {
                echo '<p class="message_reussi"><script>alert("Aucun resultat trouvé")</script></p>';
                }

          }
          else {
            echo "<p class='message_reussi'> Veuillez entrer le nom d'un acteur. </p>";
          }

          //////////////////////////////////////////////////////////////////////////////////////////////////
          //////////////////////////////////////////////////////////////////////////////////////////////////
          //////////////////////////////////////////////////////////////////////////////////////////////////

      if ($db)
        {
          //echo $db_name . " database found";
          $request = "SELECT * FROM actors"; //Requette SQL
          $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL

            while ($db_field = mysqli_fetch_assoc($result_query))       //Boucle pour parcourir la table transformée en tableau
            {
              $id = $db_field['id_actor'];
              echo ' <li><a href="fiche_acteur.php?id='. $id . '">' . $db_field['name'] .'</a></li>';
            }

        }
    ?>
  </body>
</html>
