<?php

include './conn.php';


$sqlAddCustomer = "UPDATE tbl_expiry_date SET user_id='4'";

$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  header("location:../sales_list.php");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../categorylist.php");
  exit();
}
