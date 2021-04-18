<?php
   session_start();
   unset($_SESSION["login"]);
   unset($_SESSION["password"]);
   
   echo 'DECONNEXION EFFECTUE  !!!';
   header('Refresh: 2; URL = index.php');
?>