<!DOCTYPE HTML>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="Meniu_admin.php">BlueJEANS</a></h1>
						
						</div>
						<nav id="nav">
							<ul>
								<li class="active"><a href="Meniu_admin.php">Meniu</a></li>
								<li><a href="Evenimente-speciale_admin.php">Evenimente speciale</a></li>
								<li><a href="Contact_admin.html">Contact</a></li>
								<li><a href="Parere_admin.php">Pareri</a></li>
                                <li><a href="Comenzi_admin.php">Comenzi</a></li>
								<li><a href="Logout_admin.html">Logout</a></li>
								
							</ul>
						</nav>
					</div>


                <!-- Banner -->

                <div id="banner" class="container">
                    <section>
                        <p>Restaurantul<strong> BlueJEANS</strong>, mâncare delicioasă pentru o lume într-o continuă schimbare</p>
                    </section>
                </div>
                <form action="Adaugare_mancare.php" method="post">
                    <input font size="6" color=00000  name="adauga" type="submit" value="ADAUGA"></font>
                </form>
                <br><br>

                <div id="extra">
                    <div class="container">
                        <div class='row no-collapse-1'>
                            <?php
                            $sql ="SELECT * FROM meniul_zilei";
                            $result = mysqli_query($conn,$sql);
                            $resultCheck=mysqli_num_rows($result);
                            $i=0;

                            if($resultCheck>0)
                                $row=mysqli_fetch_assoc($result);
                            $image = $row['poza'];
                            $image_src = "upload/".$image;
                            ?>


                            <section class='4u'> <a href='#' class='image featured'><img src='<?php echo $image_src ?>' height="248px">
                                </a>

                            </section>
                            <div style="height: 248px; width: 415px; background-color: floralwhite">
                                <strong>MENIUL ZILEI</strong><br><br>
                                <?php
                                echo $row['denumire'];
                                echo"<br><br>";
                                echo $row['descriere'];
                                echo"<br><br><strong>Pret: ";
                                echo $row['pret'];
                                echo" lei</strong>";
                                $id=$row['id'];
                                echo"
                    <br>
                    <a href=\"schimba_meniul_zilei.php?id=".$id."\" class='button'>Schimba</a>";
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
                <br><br>


                <div id="extra">
                    <div class="container">
                        <div class='row no-collapse-1'>



                            <?php
                            $pass='';
                            $dbname='restaurant';

                            $user='root';
                            $conn=mysqli_connect('localhost',$user,$pass,$dbname);


                $sql ="SELECT * FROM meniu1";
                $result = mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                $i=0;

                if($resultCheck>0)
                            while($row=mysqli_fetch_assoc($result)) {
                            if($i==3){
                            $i=0;
                                echo "</div>";
                            echo "<div class='row no-collapse-1'>";
                            }
                             {
                            $image = $row['poza'];
                            $image_src = "upload/".$image;
                            echo"
                            <section class='4u'> <a href='#' class='image featured'><img src='";
                            echo $image_src;  echo"'></a>";
                                echo"
                                <div class='box'>

                                    ";
                                    echo $row['denumire'];
                                    echo"</p>
                                    <p>
                                        ";
                                        echo $row['descriere'];
                                 echo"<br>Pret: ";
                                 echo $row['pret'];

                                 echo" lei</p>
                                        
                                    <a href=\"edit_mancare.php?id=".$row['id']."\" class='button'>Edit</a>
                                   
                                   <a href=\"delete_mancare.php?id=".$row['id']."\" class='button'>Delete</a>
                            </section>";
                            $i++;


                            }
                            }
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
	</body>
</html>