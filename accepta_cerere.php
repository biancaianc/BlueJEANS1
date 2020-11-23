<?php
$pass='';
$dbname='restaurant';

$user='root';
$conn=mysqli_connect('localhost',$user,$pass,$dbname);

$id = $_GET['id'];
$id_eveniment= $_GET['id_eveniment'];
$numar_locuri=intval($_GET['numar_locuri']);

$sql ="SELECT * FROM evenimente where id='$id_eveniment'";
$result = mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck>0) {
    while ($row = mysqli_fetch_assoc($result))
        $locuri_eveniment = intval($row['numar_locuri']);

    $a = intval($locuri_eveniment - $numar_locuri);

    $sql = "UPDATE evenimente SET numar_locuri='$a' where id='$id_eveniment'";
    mysqli_query($conn, $sql);
}


mysqli_query($conn,"DELETE FROM cereri_evenimente WHERE id='".$id."'");
mysqli_close($conn);
header("Location: Cereri_rezervari.php");
?>

