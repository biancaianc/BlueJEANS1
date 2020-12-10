<?php


$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);
$id = $_GET['id']; // $id is now defined
// or assuming your column is indeed an int
// $id = (int)$_GET['id'];
if (isset($_POST['salveaza']) && isset($_FILES['file'])) {

    $name = $_FILES['file']['name'];
    $denumire = $_POST['denumire'];
    $descriere = $_POST['descriere'];
    $pret=$_POST['pret'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
// Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    // Insert record

// Check extension
   if (in_array($imageFileType, $extensions_arr)) {

        // Insert record

        $sql="UPDATE meniu1 SET denumire='$denumire', descriere='$descriere', poza='$name', pret='$pret' where id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }


        mysqli_close($conn);

        // Upload file
        //move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);

   }




}
else if(isset($_POST['salveaza']) && empty($_FILES['file'])){
    $denumire = $_POST['denumire'];
    $descriere = $_POST['descriere'];
    $pret= $_POST['pret'];
    $sql="UPDATE meniu1 SET denumire='$denumire', descriere='$descriere' , pret='$pret' where id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully '$denumire'";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

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





<div class="wrapper style1">

    <!-- Header -->
    <div id="header" class="skel-panels-fixed">
        <div id="logo">
            <h1><a href="Meniu_admin.php">Back</a></h1>
        </div>
    </div>


    <!-- Banner -->

    <div id="banner" class="container">
        <section>
            <p>Editare meniu</p>
        </section>
    </div>
    <form action="" method="post" >
     <?php
     $pass='';
     $dbname='restaurant';

     $user='root';
     $conn=mysqli_connect('localhost',$user,$pass,$dbname);


     $id = $_GET['id']; // $id is now defined

     $sql ="SELECT * FROM meniu1 where id='$id'";
        $result = mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
         if($resultCheck>0)
            $row=mysqli_fetch_assoc($result);
           mysqli_close($conn);

     ?>
        <font size="6" color=white><strong>Denumire</strong><br><br><input name="denumire" type="text" value="<?php echo $row['denumire']?>" size="25"><br><br></font>
        <font size="6" color=white><strong>Descriere</strong><br><br><input name="descriere" type="text" value="<?php echo $row['descriere']?>" size="25"><br><br></font><br>
        <font size="6" color=white><strong>Pret</strong><br><br><input name="pret" type="float" value="<?php echo $row['pret']?>" size="25"><br><br></font><br>
        <?php
        $image = $row['poza'];
        $image_src = "upload/".$image;
        echo"
        <section class='4u'> <a href='#' class='image featured'><img src='";
                            echo $image_src;  echo"'></a>"; ?>
        <br>
        <font size="6" color=white><strong>Imagine noua</strong><br><br><input name="file" type="file"   size="25"><br><br></font>

        <br><br><br>
        <input font size="6" color=00000  name="salveaza" type="submit" value="Salveaza"></font>
    </form>
    <br>
    <br>



</div>
</body>
</html>
