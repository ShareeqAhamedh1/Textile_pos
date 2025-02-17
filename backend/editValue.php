<?php

include './conn.php';

$id=$_REQUEST['id'];
$page_id = $_REQUEST['page_id'];
$barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
// $expiry_date = mysqli_real_escape_string($conn, $_REQUEST['expiry_date']);
// $shipping_type = mysqli_real_escape_string($conn, $_REQUEST['shipping_type']);
// $bx_num = mysqli_real_escape_string($conn,$_REQUEST['bx_number']);
// $s_point = mysqli_real_escape_string($conn,$_REQUEST['sale_point']);

$sqlAddCustomer = "UPDATE tbl_expiry_date SET 
                                              -- expiry_date='$expiry_date',
                                              quantity='$quantity',
                                              barcode='$barcode'
                                              -- shipping_type='$shipping_type',
                                              -- box_number='$bx_num',
                                              -- s_point_id='$s_point'
                                              WHERE id = '$id'";
$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  header("location:../update_stock.php?id=".$page_id."&#$barcode");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../update_stock.php?id=".$page_id);
  exit();
}
