<?php

$pass = '';
$dbname = 'restaurant';
$user = 'root';
$conn = mysqli_connect('localhost', $user, $pass, $dbname);
if (isset($_POST['trimite'])) {
    $username= $_POST['username'];
    $parola=$_POST['parola'];
    $numar_telefon=$_POST['numar_telefon'];
    $sql = "SELECT * FROM conturi where username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $resultCheck=mysqli_num_rows($result);
    if ( $resultCheck==0) {
        $query = "insert into conturi (username,parola,numar_telefon,numar_comenzi) values('$username ','$parola','$numar_telefon',0)";
        mysqli_query($conn, $query);
    }
    else echo "Acest username exista";
    mysqli_close($conn);
}


header('Inregistrare.php');


?>
<html>
<head>
    <title>Restaurant BlueJEANS</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>
    <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>

<body>

<!-- Wrapper -->
<div class="wrapper style1">

    <!-- Header -->
    <div id="header" class="skel-panels-fixed">
        <div id="logo">
            <h1><a href="Autentificare.php">Back</a></h1>
        </div>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p>Inregistrare</p>
        </section>
    </div>
    <form action="" method="post" >
        <font size="6" color=white><strong>Username<br></strong><br><input name="username" type="text" placeholder="nume..." size="25" required><br><br></font>
        <font size="6" color=white><strong>Parola<br></strong><br><input name="parola" type="password" size="50" required><br><br><br></font>
        <font size="6" color=white><strong>Numar_telefon<br></strong><br><input name="numar_telefon" type="text" size="25" required><br></font>
        <br>
        <input font size="6" color=00000  name="trimite" type="submit" value="Inregistrare"></font>
    </form>
    <br>
    <br>



</div>
</body>
</html>