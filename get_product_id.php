<?php
include 'backend/conn.php';

$barcode = $_POST['barcode'];

$p_id = getDataBack($conn,'tbl_product','barcode',$barcode,'id');

echo $p_id;
 ?>
