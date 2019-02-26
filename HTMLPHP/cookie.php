<?php
  // Je démarre ma session
  session_start();
  ////////////////////////////////////////////////////////////////////////////////////////////////
  require_once 'connexion.php';                                 // Inclure le fichier de connexion
  ////////////////////////////////////////////////////////////////////////////////////////////////
  // Je met à jour ou je crée une entrée session
  if (isset($_SESSION['pseudo'])) {
    $_SESSION['page_views'] += 100;
  } else {
    $_SESSION['page_views'] = 100;
  }

?>
