<?php
include './backend/conn.php';

$sqlSub = "SELECT * FROM tbl_expiry_date";
$rsSub = $conn->query($sqlSub);
$quantity=0;
if($rsSub->num_rows > 0){
  while($rowSub = $rsSub->fetch_assoc()){
    $exp_barcode = $rowSub['barcode'];
    $exp_pid = $rowSub['product_id'];

    $original_pid = getDataBack($conn,'tbl_product','barcode',$exp_barcode,'id');

    if($exp_pid != $original_pid){
      echo getDataBack($conn,'tbl_product','id',$exp_pid,'name')."|$exp_pid|$exp_barcode|"."<br>";

    }
  }
}
