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
    session_start();
$USERNAME="admin";
$PAROLA="admin";

if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['parola']) && !isset($S_SESSION['valid'])){
    if ($_POST['username'] == $USERNAME &&
        $_POST['parola'] == $PAROLA) {
        $_SESSION['username'] = $USERNAME;
        $_SESSION["logged_in"] = true;
        header('Location:Meniu_admin.php');

    }else
        {
          $user=$_POST['username'];
            $sql ="SELECT * FROM conturi where username='$user'";
            $result = mysqli_query($conn,$sql);


            $resultCheck=mysqli_num_rows($result);

            if($resultCheck>0) {
                $row = mysqli_fetch_assoc($result);
                $hash=password_hash($row['parola'],PASSWORD_DEFAULT);
                if (password_verify($_POST['parola'],$hash)) {
                    $_SESSION["username"] = $user;
                    $_SESSION["id_client"]=$row['id'];
                    $_SESSION["logged_in"] = true;
                    header('Location:Meniu_client.php');

                }
                else echo("Username sau parola incorecta");

            }
            else echo("Utilizatorul nu exista!");



    }

}

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
							<h1><a href="index.php">BlueJEANS</a></h1>
						
						</div>
						<nav id="nav">
							<ul>
								<li class="active"><a href="index.php">Meniu</a></li>
								<li><a href="Evenimente-speciale_vizitator.php">Evenimente speciale</a></li>
								<li><a href="Contact_vizitator.html">Contact</a></li>
								<li><a href="Parereri.html">Păreri</a></li>
								<li><a href="Autentificare.php">Autentificare</a></li>
							</ul>
						</nav>
					</div>


				<!-- Banner -->

					<div id="banner" class="container">
						<section>
							<p>Autentificare administrator</p>
						</section>
					</div>
      <form action="" method="post">
      <font size="6" color=white><strong>Username</strong><br><input name="username" type="text" placeholder="Username..."  size="25" required><br></font>
      <font size="6" color=white><strong>Parola</strong><br><input name="parola" type="password" placeholder="Parola..." size="25" required><br></font>
		  <br> <a  color=white href="Inregistrare.php">Inregistrare</a><br><br><br>
     <input font size="6" color=00000  name="login" type="submit" value="login"></font>

</form> 

	  <br>
	  <br>


				
</div>
	</body>
</html>