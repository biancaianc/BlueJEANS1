<?php
if(isset($_POST['logout'])){

session_start();
session_unset();
session_destroy();
    unset($_SESSION["username"]);
    unset($_SESSION["id_client"]);
    $_SESSION['logged-in'] = false;
header("location:Autentificare.php");
exit();}
?>
