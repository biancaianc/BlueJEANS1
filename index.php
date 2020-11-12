
<?php
include_once 'Conectare_baza_de_date.php';
?>
<!DOCTYPE html>
<!--
	Phase Shift by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html >
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
	<body >

		<!-- Wrapper -->
			<div class="wrapper style1">

				<!-- Header -->
					<div id="header" class="skel-panels-fixed">
						<div id="logo">
							<h1><a href="index.php">BlueJEANS</a></h1>
						
						</div>
						<nav id="nav">
							<ul>
								<li class="active"><a href="index.php">Meniu</a></li>
								<li><a href="Evenimente-speciale.php">Evenimente speciale</a></li>
								<li><a href="Contact.html">Contact</a></li>
								<li><a href="Parerea-dumnevoastra.html">Părerea dumneavoastră</a></li>
								<li><a href="Autentificare-administrator.html">Autentificare administrator</a></li>
							</ul>
						</nav>
					</div>


				<!-- Banner -->

					<div id="banner" class="container">
						<section>
							<p>Restaurantul<strong> BlueJEANS</strong>, mâncare delicioasă pentru o lume într-o continuă schimbare</p>
						</section>
					</div>
                <div id="extra">
                    <div class="container">
                        <div class='row no-collapse-1'>
                <?php
                $sql ="SELECT * FROM meniu";
                $result = mysqli_query($conn,$sql);
                $resultCheck=mysqli_num_rows($result);
                $i=0;

                if($resultCheck>0)
                    while($row=mysqli_fetch_assoc($result)) {
                        if($i==3){
                            $i=0;

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

                            echo"</p>
                                    <a href='#' class='button'>Read More</a> </div>

                            </section>";
                             $i++;
                             if($i==3) echo "</div>";

                            }
                }

                ?>
                </div>
                </div>




	</body>
</html>