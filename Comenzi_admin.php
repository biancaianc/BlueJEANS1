<?php
session_start();
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
<div class="wrapper style1">

    <!-- Header -->
    <div id="header" class="skel-panels-fixed">
        <div id="logo">
            <h1><a href="Meniu_client.php">BlueJEANS</a></h1>

        </div>
        <nav id="nav">
            <ul>
                <li ><a href="Meniu_admin.php">Meniu</a></li>
                <li><a href="Evenimente-speciale_admin.php">Evenimente speciale</a></li>
                <li><a href="Contact_admin.html">Contact</a></li>
                <li><a href="Parere_admin.php">Pareri</a></li>
                <li><a href="Comenzi_admin.php">Comenzi</a></li>
                <li><a href="Logout_admin.html">Logout</a></li>

            </ul>
        </nav>
    </div>
    <div id="extra">
        <div class="container">

            <?php

            $numar_comanda=1;
            //$id_client=$_SESSION['id_client'];
            $sql3="SELECT * from conturi ";
            $result3 = mysqli_query($conn,$sql3);
            $resultCheck3=mysqli_num_rows($result3);
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $id_client = $row3['id'];


                $sql = "SELECT * from conturi where id='$id_client'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['numar_comenzi'] > 0) {
                        $nr = $row['numar_comenzi'];


                        for ($i = $nr; $i >= 1; $i--) {
                            $total = 0;
                            $sql = "SELECT * from mancare_plasata where id_client='$id_client' AND numar_comanda='$i'";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if ($resultCheck > 0) {
                                echo "<div style='  width: 1200px;
                                                          padding: 10px;
                                                          border: 5px solid black;
                                                          margin: 5px; 
                                                          align-content: center;
                                                          background-color: lightskyblue'><strong>Client "; echo $row3['username']; echo"<br>Comanda  ";
                                echo $i;
                                echo "<span><br> </span>";
                                $row = mysqli_fetch_assoc($result);
                                echo $row['data'];
                                echo "</strong><br><br>";
                                echo $row['denumire'];
                                echo "  ";
                                echo $row['pret'];
                                echo " lei<br>";
                                $total += $row['pret'];


                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<br><br>";
                                    echo $row['denumire'];
                                    echo "  ";
                                    echo $row['pret'];
                                    echo " lei<br>";
                                    $total += $row['pret'];


                                }

                                echo "<br><br><strong>Total: ";
                                echo $total;
                                echo " lei</strong>";
                                $sql1 = "SELECT * from comenzi_livrate where id_client='$id_client' AND numar_comanda='$i'";
                                $result1 = mysqli_query($conn, $sql1);

                                $row1 = mysqli_fetch_assoc($result1);
                                if($row1['livrat']==false)

                                 echo"<br><br><a href=\"confirma_livrarea.php?id=".$id_client."&numar=".$i."\"  style='color: crimson; font-size: larger'><strong>Confirma livrarea</strong></a>";
                                else echo"<br><span style='color: forestgreen; font-size: larger' ><strong>Livrat</strong></span>";

                                echo "</div><br><br>";

                            }
                        }


                    }


                }

            }
            ?>
        </div>
    </div>
</div>

</div>
</body>
</html>