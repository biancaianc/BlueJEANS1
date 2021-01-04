<?php
session_start();
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

if (isset($_POST['adresa'])) {
    $id=$_SESSION["id_client"];
    $sql ="SELECT * FROM conturi where id='$id'";
    $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>0)
        $row=mysqli_fetch_assoc($result);
    $numar_comenzi=$row['numar_comenzi']+1;
    $sql="UPDATE conturi SET numar_comenzi='$numar_comenzi' where id='$id'";
    mysqli_query($conn, $sql);



    $id_client=$_SESSION['id_client'];

    $query = "insert into comenzi_livrate(id_client, numar_comanda, livrat) values('".$id_client."','".$numar_comenzi."',false)";
    mysqli_query($conn,$query);

    $sql="SELECT * from comenzi where id_client='$id_client'";
    $result = mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);

    if($resultCheck>0)
        while($row=mysqli_fetch_assoc($result)) {
            $id_produs=$row["id_produs"];
            $data=date("Y-m-d");
            if($id_produs==1){
                $sql2 = "SELECT * from meniul_zilei where id='$id_produs'";
                $result2 = mysqli_query($conn, $sql2);

                $resultCheck2=mysqli_num_rows($result2);
                if($resultCheck2==1){
                    $row2 = mysqli_fetch_assoc($result2);

                    $query = "insert into mancare_plasata(id_client, numar_comanda, denumire, pret,data) values('".$id_client."','".$numar_comenzi."','".$row2["denumire"]."','".$row2["pret"]."','$data')";
                    mysqli_query($conn,$query);

                }
            }
            $sql="SELECT * from meniu1 where id='$id_produs'";
            $result1 = mysqli_query($conn,$sql);

            $resultCheck1=mysqli_num_rows($result1);
            if($resultCheck1==1){
                $row1=mysqli_fetch_assoc($result1);

                $query = "insert into mancare_plasata(id_client, numar_comanda, denumire, pret,data) values('".$id_client."','".$numar_comenzi."','".$row1["denumire"]."','".$row1["pret"]."','$data')";
                mysqli_query($conn,$query);


            }

            mysqli_query($conn,"DELETE FROM comenzi WHERE id_client='".$id_client."'");
        }




}

?>
<html>
<head>
    <title>Restaurant BlueJEANS</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
 <script> function myFunction() {
        alert('This is an Alert!');
        } </script>
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
                <li><a href="Parere_client.php">Pareri</a></li>
                <li><a href="Cos_client.php">Cos</a></li>
                <li><a href="Comenzi_client.php">Comenzi</a></li>
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

            <th>Nume_produs</th>
            <th>Pret</th>
            <th></th>

        </tr>

        <?php
        $id_client=$_SESSION['id_client'];
        $sql="SELECT * from comenzi where id_client='$id_client'";
        $result = mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        $total=0;
        if($resultCheck>0)
            while($row=mysqli_fetch_assoc($result)) {
                $id_produs=$row["id_produs"];
               if($id_produs==1)
               {
                   $sql2 = "SELECT * from meniul_zilei where id='$id_produs'";
                   $result2 = mysqli_query($conn, $sql2);

                   $resultCheck2=mysqli_num_rows($result2);
                   if($resultCheck2==1){
                       $row2 = mysqli_fetch_assoc($result2);
                       $total = $total + $row2["pret"];
                       echo " <tr align='center'><td>" . $row2["denumire"] . "</td><td>" . $row2["pret"] . "</td><td>   <a button href=\"delete_cos.php?id=".$row2['id']."\" style='color: black'>Sterge</button></a></td></tr> ";
                   }
               }
                $sql="SELECT * from meniu1 where id='$id_produs'";
                $result1 = mysqli_query($conn,$sql);

                $resultCheck1=mysqli_num_rows($result1);
                if($resultCheck1==1){
                    $row1=mysqli_fetch_assoc($result1);
                    $total=$total+$row1["pret"];
                    echo" <tr align='center'><td>".$row1["denumire"]."</td><td>".$row1["pret"]."</td><td>   <a button href=\"delete_cos.php?id=".$row['id']."\" style='color: black'>Sterge</button></a></td></tr> ";
                }

            }

        ?>

    </table>

        <div style=" background-color: #d84780; align-content: center; width:150px ; font-size: xx-large"> <br></br>Total<br><p ><strong><?php echo $total ?></strong></p></div>





    <div>
        <form action="" method="post" >

    <font size="6" color=white ><strong>Adresa</strong><br><br><input style="width:50%" name="adresa" type="text" placeholder="adresa..."  size="25" required><br></font>
        <font size="6" color=white><strong>Mentiuni*</strong><br><br><input style="width:50%" name="mentiuni" type="text" placeholder="adaugati mentiuni..."  size="25" ><br></font>
    <br>
    <input font size="6" color=00000  name="confirma" type="submit" value="Trimite comanda" align="center">
        </div>
    </form>
</div> </div>
</body>
</html>