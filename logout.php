<?php
   session_start(); //otvorenie session

   unset($_SESSION["username"]); //vymazanie session
   
   echo 'You have been logged out';

   header('Refresh: 2; URL = index.php'); // presmerovanie na prihlasenie
?>