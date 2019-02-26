<?php
  // Page servant à la connexion à ma base de données, que j'include partout ou j'en ai besoin.
  
  define('DB_SERVER','localhost');
  define('DB_USER','root');
  define('DB_PASS','');

  $db_handle = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);       //Se connecter à la base de données
  $db_name = 'cinefa';
  $db = mysqli_select_db($db_handle, $db_name);                 //Infos de la base de données dans une variable
  mysqli_set_charset($db_handle, "utf8");

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>
