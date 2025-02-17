<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];

$del_charge = $_REQUEST['del_charge'];
$del_method = $_REQUEST['pickup'];
$pay_type = $_REQUEST['pay_type'];
$ref = $_REQUEST['grm_ref'];
$pay_st = $_REQUEST['psta'];


  $query = "UPDATE tbl_order_customer SET  del_method='$del_method',
                                           delivery_charge= '$del_charge',
                                           payment_type='$pay_type',
                                           pay_st='$pay_st'
                                           WHERE order_id = '$ref'";
  mysqli_query($conn, $query);


  echo json_encode(array("statusCode"=>200));
  exit();
