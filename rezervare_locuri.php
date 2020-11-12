<?php
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);
$id= $_GET['id'];
if( isset($_POST['trimite'])) {
    $nume=$_POST['nume'];
    $numar_locuri=$_POST['numar_locuri'];
    $numar_telefon=$_POST['numar_telefon'];
    $query = "insert into cereri_evenimente( id_eveniment, nume, numar_locuri, numar_telefon) values('$id','$nume','$numar_locuri','$numar_telefon')";
    mysqli_query($conn,$query);
}
mysqli_close($conn);

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
            <h1><a href="Evenimente-speciale.php">Back</a></h1>
        </div>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p>Rezervare eveniment</p>
        </section>
    </div>
    <form action="" method="post" >
        <font size="6" color=white><strong>Nume<br></strong><br><input name="nume" type="text" placeholder="nume..."  size="25" required><br><br></font>
        <font size="6" color=white><strong>Numar_locuri<br></strong><br><input name="numar_locuri" type="number" size="50" required><br><br><br></font>
        <font size="6" color=white><strong>Numar_telefon<br></strong><br><input name="numar_telefon" type="text"  size="25" required><br></font>
        <br>
        <input font size="6" color=00000  name="trimite" type="submit" value="trimite_cerere"></font>
    </form>
    <br>
    <br>



</div>
</body>
</html>