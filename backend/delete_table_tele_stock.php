<?php include 'conn.php';

$r_id = $_REQUEST['tally_id'];

$sql_add = "DELETE FROM tbl_tally_stock WHERE id='$r_id'";
$rs_add = $conn->query($sql_add);

if($rs_add == 1){
  echo json_encode(array("statusCode"=>200));
  exit();
}

 ?>
