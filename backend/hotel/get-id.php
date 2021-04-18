<?php
include "../connection.php"; 

$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM markers WHERE id='$id'");

$rows = array();
while($row = mysqli_fetch_assoc($result)) {
	$rows[] = $row;
}

// header('Content-Type: application/json');
echo json_encode($rows); 

?>