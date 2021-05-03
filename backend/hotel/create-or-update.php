<?php
session_start();
include "../connection.php"; 
$id = $_POST['id'];
$check = mysqli_query($connect, "SELECT * FROM markers WHERE id='$id'");

$temp = "../../files/";
if (!file_exists($temp))
	mkdir($temp);

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tipe = $_POST['tipe'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

if (!empty($upload)){

	$upload = $_FILES['upload']['tmp_name'];
	$ImageName = $_FILES['upload']['name'];
	$ImageType = $_FILES['upload']['type'];
	$acak = rand(11111111, 99999999);
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt = str_replace('.','',$ImageExt);
	$ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = str_replace(' ', '', $acak.'.'.$ImageExt);
	$filePath = $temp . $NewImageName;

	move_uploaded_file($temp, $NewImageName);

	$check = mysqli_query($connect, "SELECT * FROM markers WHERE id='$id'");

	if($check->num_rows == 0){
		$username = $_SESSION['username'];
		$result = mysqli_query($connect, "INSERT INTO markers(`username`, `nama`, `alamat`, `longitude`, `latitude`, `tipe`, `foto`) VALUES ('$username', '$nama', '$alamat', '$longitude', '$latitude', '$tipe', '$filePath')");
		header('Content-Type: application/json');
		echo json_encode($result); 
	} else {
		$result = mysqli_query($connect, "UPDATE markers SET nama='$nama', alamat='$alamat', longitude='$longitude', latitude='$latitude', tipe='$tipe', foto='$filePath' WHERE id = $id");
		header('Content-Type: application/json');
		echo json_encode($result); 
	}
} elseif (empty($upload)) {
	$check = mysqli_query($connect, "SELECT * FROM markers WHERE id='$id'");

	if($check->num_rows == 0){
		$username = $_SESSION['username'];
		$result = mysqli_query($connect, "INSERT INTO markers(`username`, `nama`, `alamat`, `longitude`, `latitude`, `tipe`, `foto`) VALUES ('$username', '$nama', '$alamat', '$longitude', '$latitude', '$tipe')");
		header('Content-Type: application/json');
		echo json_encode($result); 
	} else {
		$result = mysqli_query($connect, "UPDATE markers SET nama='$nama', alamat='$alamat', longitude='$longitude', latitude='$latitude', tipe='$tipe' WHERE id = $id");
		header('Content-Type: application/json');
		echo json_encode($result); 
	}
}
?>