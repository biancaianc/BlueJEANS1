<?php
if(isset($_POST['logout'])){

session_start();
session_unset();
session_destroy();
    unset($_SESSION["Username"]);
    unset($_SESSION["Parola"]);
    $_SESSION['valid'] = false;
header("location:Autentificare-administrator.html");
exit();}
?>
