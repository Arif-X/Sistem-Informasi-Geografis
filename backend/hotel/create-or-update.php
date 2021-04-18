<?php
include "../connection.php"; 

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$tipe = $_POST['tipe'];

$check = mysqli_query($connect, "SELECT * FROM markers WHERE id='$id'");

if($check->num_rows == 0){
	$result = mysqli_query($connect, "INSERT INTO markers(`nama`, `alamat`, `longitude`, `latitude`, `tipe`) VALUES ('$nama', '$alamat', '$longitude', '$latitude', '$tipe')");
	header('Content-Type: application/json');
	echo json_encode($result); 
} else {
	$result = mysqli_query($connect, "UPDATE markers SET nama='$nama', alamat='$alamat', longitude='$longitude', latitude='$latitude', tipe='$tipe' WHERE id = $id");
	header('Content-Type: application/json');
	echo json_encode($result); 
}
?>