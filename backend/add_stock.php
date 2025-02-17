<?php
include 'conn.php';


$date =mysqli_real_escape_string($conn,$_REQUEST['stock_date']);
$ref =mysqli_real_escape_string($conn,$_REQUEST['stock_ref']);

$id =mysqli_real_escape_string($conn,$_REQUEST['id']);



if($date && $ref){
  $_SESSION['stock_date'] = $date;
  $_SESSION['stock_ref'] = $ref;
  header("location:../update_stock.php?id=$id");
  exit();
}else{
  if(!$date){
    echo "Date not found";
  }else{
    echo "Reference not found";
  }
}



 ?>
