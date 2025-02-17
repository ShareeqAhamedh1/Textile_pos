<?php

include 'conn.php';

$pId=$_REQUEST['pId'];
$fPrice = $_REQUEST['fPrice'];
$cPrice = $_REQUEST['cPrice'];

$sqlPrice = "UPDATE tbl_product SET price='$fPrice',
                                              price_two='$cPrice' WHERE id = '$pId'";
$rsPrice = $conn->query($sqlPrice);

if($rsPrice > 0){
  echo "success";
}else{
  echo "change_error";
}
