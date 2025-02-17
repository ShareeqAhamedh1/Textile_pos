<?php
include 'conn.php';


$date =mysqli_real_escape_string($conn,$_REQUEST['order_date']);
$ref =mysqli_real_escape_string($conn,$_REQUEST['order_ref']);

$id =mysqli_real_escape_string($conn,$_REQUEST['id']);

echo $date;




if($date && $ref){
  $_SESSION['order_date'] = $date;
  $_SESSION['order_ref'] = $ref;
  header("location:../pos.php?id=$id");
  exit();
}



 ?>
