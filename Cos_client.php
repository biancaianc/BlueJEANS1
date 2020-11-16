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
                <li ><a href="Meniu_client.php">Meniu</a></li>
                <li><a href="Evenimente-speciale_client.php">Evenimente speciale</a></li>
                <li><a href="Contact_client.html">Contact</a></li>
                <li><a href="Parerea-dumnevoastra_client.html">Părerea dumneavoastră</a></li>
                <li><a href="Cos_client.php">Cos</a></li>
                <li><a href="Logout_client.html">Logout</a></li>
            </ul>
        </nav>
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
    <div align="center">
    <table style="width:50%" align="center">
        <tr align="center">
            <th>Id</th>
            <th>Nume_produs</th>
            <th></th>

        </tr>

        <?php
        $id_client=$_SESSION['id_client'];
        $sql="SELECT * from comenzi where id_client='$id_client'";
        $result = mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0)
            while($row=mysqli_fetch_assoc($result)) {
                $id_produs=$row["id_produs"];
                $sql="SELECT * from meniu where id='$id_produs'";
                $result1 = mysqli_query($conn,$sql);
                $row1=mysqli_fetch_assoc($result1);
                if($row1!=NULL){
                echo" <tr align='center'><td>".$row["id"]."</td><td>".$row1["denumire"]."</td><td>   <a button href=\"delete_cos.php?id=".$row['id']."\" >Sterge</button></a></td></tr> "; }
            }

        ?>

    </table>
    <div>
    <font size="6" color=white ><strong>Adresa</strong><br><br><input style="width:50%" name="denumire" type="text" placeholder="adresa..."  size="25" required><br></font>
        <font size="6" color=white><strong>Mentiuni*</strong><br><br><input style="width:50%" name="denumire" type="text" placeholder="adaugati mentiuni..."  size="25" ><br></font>
    <br>
    <input font size="6" color=00000  name="confirma" type="submit" value="Confirma comanda" align="center"></font>
        </div>

</div> </div>
</body>
</html>