<?php
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

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
<div >

    <!-- Header -->
    <div id="header" class="skel-panels-fixed">
        <div id="logo">
            <h1><a href="Evenimente-speciale_admin.php">Back</a></h1>
        </div>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p>Cereri rezervari active</p>
        </section>
    </div>
    <style>
        table{
            border-collapse:collapse;
            width:100%;
            color:#ffffff;
            font-size: 25px;
            text-align: left;
        }
        th{
            background-color: #e1719d;
            color:#ffffff;
        }
        tr:nth-child(even) {background-color: #888888}
        tr:nth-child(odd) {background-color: #555555}
    </style>
<table>
<tr>
    <th>Numar_cerere</th>
    <th>Id_eveniment</th>
    <th>Nume_client</th>
    <th>Numar_locuri</th>
    <th>Numar_telefon</th>
    <th>Accepta/Respinge</th>
</tr>

    <?php
    $sql="SELECT id, id_eveniment, nume, numar_locuri, numar_telefon from cereri_evenimente";
    $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);

    if($resultCheck>0)
    while($row=mysqli_fetch_assoc($result)) {

        echo" <tr><td>".$row["id"]."</td><td>".$row["id_eveniment"]."</td><td>".$row["nume"]."</td><td>".$row["numar_locuri"]."</td><td>".$row["numar_telefon"]."</td><td><a style='color:#fff' href=\"accepta_cerere.php?id=".$row['id']."&id_eveniment=".$row['id_eveniment']."&numar_locuri=".$row['numar_locuri']."\" >Accepta</a>  <a style='color:#FF0000' href=\"respinge_cerere.php?id=".$row['id']."\" >Respinge</a>";
    }

?>
</table>
    <br><br>
    <table>
        <tr>
            <th>Cod_eveniment</th>
            <th>Nume_eveniment</th>
            <th>Locuri_ramase</th>

        </tr>
<div>
    <?php
        $sql="SELECT id, denumire, numar_locuri from evenimente";
        $result = mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0)

            while($row=mysqli_fetch_assoc($result)) {

                echo" <tr><td>".$row["id"]."</td><td>".$row["denumire"]."</td><td>".$row["numar_locuri"]."";
            }
    mysqli_close($conn);
    ?>
</table>
</div>

</body>
</html>