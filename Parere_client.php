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
    <form action="" method="post" >
        <font size="6" color=white><strong>Comentariu<br></strong><br><input name="comentariu" type="text" placeholder="introdu parerea ta..."  size="25" required><br><br></font>

        <input font size="6" color=00000  name="trimite" type="submit" value="trimite"></font>
    </form>
    <div id="extra">
        <div class="container">
            <div class='row no-collapse-1'>

                <section class='4u'>

                </section>

               
            </div>
        </div>
    </div>


</div>
</body>
</html>
