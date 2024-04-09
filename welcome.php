<?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['username']) ) {
     
    echo 'Welcome '.$_SESSION['username'].'<br>';

    header('Refresh: 2; URL = Page1.php');
}
?>