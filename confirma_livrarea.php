<?php
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

$id_client = $_GET['id'];
$numar= $_GET['numar'];
$sql = "UPDATE comenzi_livrate SET livrat='1' where id_client='$id_client' AND numar_comanda='$numar'";
mysqli_query($conn, $sql);
header("Location: Comenzi_admin.php");

?>