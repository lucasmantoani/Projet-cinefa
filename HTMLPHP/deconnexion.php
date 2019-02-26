<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php // Page servant à la déconnexion de l'utilisateur en cliquant sur un bouton dans son espace personnel.
    
    ////////////////////////////////////////////////////////////////////////////////////////////////
    require_once 'connexion.php';                                 // Inclure le fichier de connexion
    ////////////////////////////////////////////////////////////////////////////////////////////////
    include 'header.php';

    	session_destroy();
    	header('Location: ../HTMLPHP/index.php');
    ?>

  </body>
</html>
