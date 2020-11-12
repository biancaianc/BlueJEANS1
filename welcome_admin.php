<?php
    session_start();
$Username="admin";
$Parola="admin";

if(isset($_POST['login']) && !empty($_POST['Username']) && !empty($_POST['Parola']) && !isset($S_SESSION['valid'])){
    if ($_POST['Username'] == $Username &&
        $_POST['Parola'] == $Parola) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $Username;
        header('Location:PaginaAdministrator.php');

    }else
        {
        header('Location:Autentificare-administrator.html');

    }
}

?>

