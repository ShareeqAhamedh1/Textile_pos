<?php

include './conn.php';

$id=$_REQUEST['id'];
$barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
// $expiry_date = mysqli_real_escape_string($conn, $_REQUEST['expiry_date']);
// $shipping_type = mysqli_real_escape_string($conn, $_REQUEST['shipping_type']);
$note = mysqli_real_escape_string($conn, $_REQUEST['note']);

$sql = "SELECT * FROM tbl_product WHERE barcode='$barcode' ";
$rs = $conn->query($sql);
if($rs->num_rows >0){
  $row = $rs->fetch_assoc();
  $p_id = $row['id'];
}else{
  $_SESSION['invalid_barcode'] = true;
  header("location:../product-details.php?id=".$id);
  exit();
}

$sqlAddCustomer = "UPDATE tbl_expiry_date SET 
                                              quantity='$quantity',
                                              barcode='$barcode',
                                              note='$note' WHERE id = '$id'";
$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  header("location:../product-details.php?id=".$p_id);
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../product-details.php?id=".$p_id);
  exit();
}
