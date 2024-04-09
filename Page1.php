<?php
   session_start(); //otvorenie session

   unset($_SESSION["username"]); //vymazanie session
   
   echo 'Macka';

   echo '<br> <br>';
   echo 'Click here to <a href = "logout.php" tite = "Logout">logout.'; // presmerovanie na prihlasenie
?>