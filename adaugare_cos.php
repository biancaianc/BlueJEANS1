<?php
session_start();
$pass='';
$dbname='restaurant';
$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);
$id_produs= $_GET['id'];
if(!isset($_SESSION['logged-in']) ) $username=$_SESSION["username"];
$sql ="SELECT * FROM conturi where username='$username'";
$result = mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

$query = "insert into comenzi(id_client,id_produs) values('".$row['id']."','".$id_produs."')";
mysqli_query($conn,$query);

mysqli_close($conn);
header('Location:Meniu_client.php');
?>
