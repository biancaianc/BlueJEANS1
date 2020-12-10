<?php
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM meniu1 WHERE id='".$id."'");
mysqli_close($conn);
header("Location: Meniu_admin.php");
?>
<html>

</html>
