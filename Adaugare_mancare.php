<?php
$pass='';
$dbname='restaurant';

$user='root';$conn=mysqli_connect('localhost',$user,$pass,$dbname);

if (isset($_POST['adauga'])&&(isset($_FILES['file'])) &&isset($_POST['denumire'])&&isset($_POST['descriere'])){
    $name=$_FILES['file']['name'];
    $denumire=$_POST['denumire'];
    $descriere=$_POST['descriere'];
    $target_dir = "upload/";
    $target_file=$target_dir . basename($_FILES['file']['name']);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Insert record
        $query = "insert into meniu(poza, denumire, descriere) values('".$name."','$denumire','$descriere')";
        mysqli_query($conn,$query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

    mysqli_close($conn);
}



?>


<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

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
            <h1><a href="PaginaAdministrator.php">Back</a></h1>
</div>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p>Adaugare mancare</p>
        </section>
    </div>
            <form action="" method="post" enctype='multipart/form-data'>
                <font size="6" color=white><strong>Denumire</strong><br><input name="denumire" type="text" placeholder="denumire..."  size="25" required><br></font>
                <font size="6" color=white><strong>Descriere</strong><br><input name="descriere" type="text" placeholder="descriere..." size="50" required><br></font>
                <font size="6" color=white><strong>Imagine</strong><br><br><input name="file" type="file"  size="25" required><br></font>
                <br>
                <input font size="6" color=00000  name="adauga" type="submit" value="adauga"></font>
            </form>
            <br>
    <br>



</div>
</body>
</html>