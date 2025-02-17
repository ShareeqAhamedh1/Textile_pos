<?php
include 'backend/conn.php';

// $sql_order_call = "SELECT * FROM tbl_order_temp ORDER BY `order_ref` DESC";
// $rs_order_call = $conn->query($sql_order_call);
//
// while ($rowOrderCall = $rs_order_call->fetch_assoc()) {
//   $bill_date = $rowOrderCall['bill_date'];
//
//   $bill_date_formate = date("Y-m-d", strtotime($bill_date));
//
//   $order_ref = $rowOrderCall['order_ref'];
//
//   $sql_update = "UPDATE tbl_order_customer SET date_added='$bill_date_formate' WHERE order_id='$order_ref'";
//   $rs_update = $conn->query($sql_update);
//
// }

?>
