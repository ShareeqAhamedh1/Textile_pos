<?php

include './conn.php';

$user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
$barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
// $expiry_date = mysqli_real_escape_string($conn, $_REQUEST['expiry_date']);
// $shipping_type = mysqli_real_escape_string($conn, $_REQUEST['shipping_type']);
$note = mysqli_real_escape_string($conn, $_REQUEST['note']);
$grm_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
// $box_num = mysqli_real_escape_string($conn, $_REQUEST['box']);
// $s_point = mysqli_real_escape_string($conn, $_REQUEST['s_point']);

$sql = "SELECT * FROM tbl_product WHERE barcode='$barcode' ";
$rs = $conn->query($sql);
if($rs->num_rows >0){
  $row = $rs->fetch_assoc();
  $p_id = $row['id'];
}else{
  $_SESSION['invalid_barcode'] = true;
  header("location:../update_stock.php");
  exit();
}

$sqlAddCustomer = "INSERT INTO tbl_expiry_date (product_id,quantity,barcode,note, grm_ref, user_id)
 VALUES('$p_id','$quantity','$barcode','$note','$grm_id','$user_id')";


$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  $_SESSION['barcode'] = $barcode;
  $_SESSION['shipping_type'] = $shipping_type;

  echo json_encode(array("statusCode"=>200));
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  echo json_encode(array("statusCode"=>300));
  exit();
}
