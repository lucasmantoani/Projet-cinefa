<?php session_start(); ?>
<!DOCTYPE html>
  <html lang="fr" dir="ltr">
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../CSS/cinefa.css">
      <title></title>
    </head>
    <body> <!-- Espace personnel de l'utilisateur, uniquement accessible s'il est connecté  -->

      <?php
        require_once 'connexion.php';                                 // Inclure le fichier de connexion
        include 'header.php';

      ?>
      <h1>Club : Espace utilisateur</h1>

      <?php
      ini_set('display_errors', 1);

        if ($db && isset($_SESSION['id_user']))
          {
            //echo $db_name . " database found";
            $request = "SELECT categories.title as categoriestitle,
            movies.id_movies as moviesidmovies,
            movies.title as moviestitles
            FROM movies, categories, category_content
            WHERE movies.id_movies = category_content.id_movies
            AND categories.id_category = category_content.id_category
            AND categories.id_user =" . $_SESSION['id_user'] . " ORDER BY categories.id_category";  // Requette SQL de la moooooooooooort
            $result_query = mysqli_query($db_handle, $request);         //Resultat de la requette SQL

            echo "<p class='message_reussi' >Bien joué " . $_SESSION['pseudo'] . ", tu es connecté à l'espace membres !</p>";
            $bool =0;

            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////Bouton de déconnexion /////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            echo " <p class='message_reussi'> Se déconnecter : <a href='deconnexion.php'> <button class='accueil'> Deconnection </button> </p> </a>";
            // renvoie vers une page qui lance un script de déconnexion et envoie vers l'accueil .


            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////affichage des listes de l'utilisateur/////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            $requete_cat= 'SELECT id_category,title FROM categories WHERE id_user=' . $_SESSION['id_user'];
            $result_query = mysqli_query($db_handle, $requete_cat);

            while ($db_field = mysqli_fetch_assoc($result_query))
            {
              echo '<p class="liste" >' . $db_field['title'] . ' :</p>';

              $requete_films = 'SELECT * FROM movies, category_content WHERE movies.id_movies=category_content.id_movies AND category_content.id_category=' . $db_field['id_category'];
              $result_query2 = mysqli_query($db_handle, $requete_films);
              while ($db_field2 = mysqli_fetch_assoc($result_query2))
              {
                echo ' <li><a href="fiche_film.php?id='. $db_field2['id_movies'] . '">' . $db_field2['title'] .'</a></li>';
              }
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////Création d'une playlist //////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<br><br><br>";
            echo '<p class="message_reussi">ajoutez une liste de films : <form action="" method="POST">
                                              <input type="text" name="nom1" value="">
                                              <input type="submit" name="bouton1" value="Ajouter">
                                              </form></p>';

            $bool = 1;
            if( isset($_POST['nom1']) && isset($_POST['bouton1']) )
            {
              if( !empty( $_POST['nom1'] ) )
              {
                if ( isset($_POST['nom1']) == $db_field['categoriestitle'] )
                {
                  echo "<script>alert('déja inscrit bruh')</script>";
                }
                else
                {
                   $bool = 0;
                   $NomListe =  $_POST['nom1'];
                   $request = "INSERT INTO categories ( title, creation_date, id_user) VALUES ('" . $NomListe . "', '2019'," . $_SESSION['id_user'] . ")";

                   mysqli_query($db_handle, $request);
                   //echo $request;
                   echo '<script>alert("liste bien ajoutée à la base de données")</script>';
                }
              }
              else
              {
                echo "Veuillez bien entrer un nom pour créer une playlist";
              }

            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////Supression d'une playlist ////////////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            echo "<br><br><br>";
            echo '<p class="message_reussi">Supprimez une liste de films :</p>
                  <form action="" method="POST">
                  <input type="text" name="nom" value="">
                  <input type="submit" name="bouton" value="Supprimer">
                  </form></p>';

            if( isset($_POST['nom']) && isset($_POST['bouton']) )
            {
              $titre = $_POST['nom'];

              $requete_cat_supp= 'SELECT title FROM categories WHERE id_user=' . $_SESSION['id_user'];
              $result_query_supp = mysqli_query($db_handle, $requete_cat_supp);
              while ($db_field = mysqli_fetch_assoc($result_query_supp))
              {
                if ( $titre == $db_field['title'] )
                {

                  $requete_del= 'DELETE FROM categories WHERE title ="' . $titre . '" AND id_user= ' . $_SESSION['id_user'];
                  $result_query = mysqli_query($db_handle, $requete_del);
                  echo '<script>alert("liste bien supprimée de la base de données")</script>';
                  break;
                }
              }
            }

            /////////////////////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////ajout des films dans les playlist/////////////////////////////////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////

            echo "<br><br><br>";
            echo '<p class="message_reussi">ajoutez le film :

            <form action="" method="POST">
            <input type="text" name="ajout_film_list" value="">
            <p class="message_reussi"> à la liste : </p>
            <input type="text" name="ajout_liste" value="">
            <input type="submit" name="bouton1" value="Ajouter">

            </form></p>';

            if( isset($_POST['ajout_film_list']) && isset($_POST['ajout_liste']) && isset($_POST['bouton1']) )
            {
              $titre_film = $_POST['ajout_film_list'];
              $titre_liste = $_POST['ajout_liste'];
              $utilisateur = $_SESSION['id_user'];

              $request1 = 'SELECT * FROM categories WHERE title="' . $titre_liste . '" AND id_user=' . $utilisateur; // Requette pour tout récupérer des catégories de l'utilisateur
              $result_query_aj1 = mysqli_query($db_handle, $request1);
              $db_field = mysqli_fetch_assoc($result_query_aj1);

              $id_cat = $db_field['id_category'];

              $request2 = 'SELECT * FROM movies WHERE title ="' . $titre_film . '"'; // Requette pour tout récuperer du film suivant le nom rentré dans le FORM
              $result_query_aj2 = mysqli_query($db_handle, $request2);
              $db_field2 = mysqli_fetch_assoc($result_query_aj2);

              $id_movie = $db_field2['id_movies'];

              $request3 = 'INSERT INTO  category_content (id_movies, id_category) VALUES (' . $id_movie . ',' . $id_cat . ');'; // Requette pour tout récuperer du film suivant le nom rentré dans le FORM
              $result_query_aj3 = mysqli_query($db_handle, $request3);

              echo '<script>alert("film bien ajouté à la liste !")</script>';

            }
              /////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////supression des films dans les playlist/////////////////////////////////
              /////////////////////////////////////////////////////////////////////////////////////////////////////////

              echo "<br><br><br>";
              echo '<p class="message_reussi">Supprimer le film :</p>

              <form action="" method="POST">
              <input type="text" name="supp_film_list" value="">
              <p class="message_reussi"> de la liste : </p>
              <input type="text" name="supp_liste" value="">
              <input type="submit" name="bouton_supp" value="Supprimer">
              </form>';

              if( isset($_POST['supp_film_list']) && isset($_POST['supp_liste']) && isset($_POST['bouton_supp']) )
              {
                $titre_film = $_POST['supp_film_list'];
                $titre_liste = $_POST['supp_liste'];
                $utilisateur = $_SESSION['id_user'];

                $request_supp1 = 'SELECT * FROM categories WHERE title="' . $titre_liste . '" AND id_user=' . $utilisateur; // Requette pour tout récupérer des catégories de l'utilisateur
                $result_query_supp1 = mysqli_query($db_handle, $request_supp1);
                $db_field = mysqli_fetch_assoc($result_query_supp1);

                $id_cat = $db_field['id_category'];

                $request_supp2 = 'SELECT * FROM movies WHERE title ="' . $titre_film . '"'; // Requette pour tout récuperer du film suivant le nom rentré dans le FORM
                $result_query_supp2 = mysqli_query($db_handle, $request_supp2);
                $db_field2 = mysqli_fetch_assoc($result_query_supp2);

                $id_movie = $db_field2['id_movies'];

                // Requette pour suppimer le films de la categorie.
                $request_supp3 = 'DELETE FROM category_content WHERE id_category =' . $db_field['id_category'] . ' AND id_movies =' . $db_field2['id_movies'] ;
                $result_query_aj3 = mysqli_query($db_handle, $request_supp3);

                echo '<script>alert("film bien supprimé de la liste !")</script>';

              }
          }
          else {
            echo "<p class='accueil'>Pour accèder a cette page, vous devez faire partie du Club Cinefa. <br>
                  Vous pouvez créer un compte dans l'onglet 'Inscription' ou vous connecter dans l'onglet 'Connexion'.</p>";
          }
      ?>
    </body>
  </html>
