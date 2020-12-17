<?php
$pass='';
$dbname='restaurant';
session_start();
$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

$id = $_GET['id']; // $id is now defined
$id_client=$_SESSION['id_client'];
// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM comenzi WHERE id='$id' AND id_client='$id_client'");

mysqli_close($conn);
header("Location:   Cos_client.php");
?>