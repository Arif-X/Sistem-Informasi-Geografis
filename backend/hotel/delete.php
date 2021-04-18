<?php
include "../connection.php"; 

$id = $_POST['id'];

$result = mysqli_query($connect, "DELETE FROM markers WHERE id='$id'");

header('Content-Type: application/json');
echo json_encode($result); 

?>