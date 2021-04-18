<?php
include "../connection.php"; 

$search = $_POST['search']['value']; 
$limit = $_POST['length']; 
$start = $_POST['start']; 

$sql = mysqli_query($connect, "SELECT id FROM markers ORDER BY id"); 
$sql_count = mysqli_num_rows($sql); 

$query = "SELECT * FROM markers WHERE (id LIKE '%".$search."%' OR nama LIKE '%".$search."%' OR alamat LIKE '%".$search."%')";
$order_index = $_POST['order'][0]['column']; 
$order_field = $_POST['columns'][$order_index]['data']; 
$order_ascdesc = $_POST['order'][0]['dir']; 
$order = " ORDER BY ".$order_field." ".$order_ascdesc;

$sql_data = mysqli_query($connect, $query.$order." LIMIT ".$limit." OFFSET ".$start); 
$sql_filter = mysqli_query($connect, $query); 
$sql_filter_count = mysqli_num_rows($sql_filter); 

$id = mysqli_query($connect, "SELECT id FROM markers ORDER BY id");
$idData = mysqli_fetch_all($id, MYSQLI_ASSOC); 

$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); 
$callback = array(
	'draw'=>$_POST['draw'], 
	'recordsTotal'=>$sql_count,
	'recordsFiltered'=>$sql_filter_count,
	'data'=>$data,
	'id'=>$idData
);

header('Content-Type: application/json');
echo json_encode($callback); 
?>
