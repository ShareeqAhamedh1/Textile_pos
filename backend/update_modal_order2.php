<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];

// $del_charge = $_REQUEST['del_charge'];
$pay_type = $_REQUEST['pay_type'];
$ref = $_REQUEST['grm_ref'];
// $pickup = $_REQUEST['pickup'];
$pay_st = $_REQUEST['p_sta'];


  $query = "UPDATE tbl_order_grm SET   payment_type= '$pay_type',pay_st='$pay_st' WHERE id = '$ref'";
  mysqli_query($conn, $query);


  echo json_encode(array("statusCode"=>200));
  exit();
