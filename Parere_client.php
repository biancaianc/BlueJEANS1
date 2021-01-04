<?php
session_start();
$username=$_SESSION["username"];
$pass='';
$dbname='restaurant';

$user='root'; $conn=mysqli_connect('localhost',$user,$pass,$dbname);

if (isset($_POST['trimite'])&&isset($_POST['comentariu'])){
    $sql ="SELECT * FROM conturi where username='$username'";
    $result = mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($result);
    $data=date("Y-m-d");
    $comentariu=$_POST['comentariu'];

    $query = "insert into pareri(id_client,data,comentariu) values('".$row['id']."','$data','$comentariu')";
    mysqli_query($conn,$query);

    mysqli_close($conn);
    header('Location:Parere_client.php');
}
?>

<!-- Banner -->

<div <html>
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
                <li><a href="Parere_client.php">Păreri</a></li>
                <li><a href="Cos_client.php">Cos</a></li>
                <li><a href="Comenzi_client.php">Comenzi</a></li>
                <li><a href="Logout_client.html">Logout</a></li>
            </ul>
        </nav>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p><?php echo $username; ?>, poți scrie un comentariu!</p>
        </section>
    </div>




    <div id="extra">
        <div class="container">

                <?php
                $sql ="SELECT * FROM pareri";
                $result = mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                $i=0;

                if($resultCheck>0)
                while($row=mysqli_fetch_assoc($result)) {

                    echo "<div  style='  width: 1200px;
                                                          padding: 10px;
                                                          border: 5px solid black;
                                                          margin: 5px; 
                                                          align-content: center;
                                                          background-color: lightskyblue'>";


                    echo"
                    <section  > 
                    <span style='color: white' >Nume:";
                    $id_client=$row["id_client"];
                    $sql1 ="SELECT username FROM conturi where id='$id_client'";
                    $result1 = mysqli_query($conn,$sql1);
                    $resultCheck1=mysqli_num_rows($result1);

                    if($resultCheck1==1){
                        $row1=mysqli_fetch_assoc($result1);

                        echo $row1["username"];  }
                    echo"  </span><br>  Data:";
                    echo $row['data'];

                    echo" <br><br>
                    <span style='color: black' ><strong>"; echo $row['comentariu']; echo"</strong></span>
                    </section></div>";

                }

                ?>

        </div>

            </div>




<br><br>
<form action="" method="post" >
    <font size="6" color=white><strong>Adaugă comentariu<br></strong><br><input name="comentariu" type="text" placeholder="introdu parerea ta..."  size="25" required><br><br></font>

    <input font size="6" color=00000  name="trimite" type="submit" value="trimite"></font>
</form>
</div>
</body>
</html>
