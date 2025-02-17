<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];
$data = json_decode($_REQUEST['data']);

foreach($data as $key => $value){
  list($column, $id) = explode('[', rtrim($key, ']'));
  $query = "UPDATE tbl_order_temp SET $column = '$value' WHERE id = '$id'";
  mysqli_query($conn, $query);
}


  echo json_encode(array("statusCode"=>200));
  exit();
