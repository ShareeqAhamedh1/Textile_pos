<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];

$return_date = $_REQUEST['return_date'];
$grm_id = $_REQUEST['grm_id'];

$query = "SELECT * FROM tbl_return_pos WHERE grm_ref='$grm_id' AND status=1";
$rs = $conn->query($query);
if($rs->num_rows>0){
  echo json_encode(array("statusCode"=>300));
  exit();
}

  $query = "INSERT INTO tbl_return_pos (grm_ref,status,return_date) VALUES('$grm_id',1,'$return_date')";
  mysqli_query($conn, $query);


  echo json_encode(array("statusCode"=>200));
  exit();
