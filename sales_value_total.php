<?php
include './backend/conn.php';

$prod_id = array();
if(isset($_REQUEST['sel_date'])){
  $date_today = $_REQUEST['sel_date'];
}
else {
  $date_today = date("Y-m-d");
}
$sql_order_call = "SELECT * FROM tbl_order_temp WHERE status = '2' AND date(bill_date) = '$date_today'";
$rs_order_call = $conn->query($sql_order_call);
if($rs_order_call->num_rows > 0){
  while($rowOrder = $rs_order_call->fetch_assoc()){
    array_push($prod_id,$rowOrder['product_id']);
    // echo $rowOrder['product_id']."<br>";
  }
}
$prod_id = array_unique($prod_id);
 ?>

 <?php
 $sales_value = 0;
 foreach ($prod_id as $id_call){
     $sql_prod = "SELECT sum(quantity) AS qnty,m_price FROM tbl_order_temp WHERE product_id = '$id_call' AND date(bill_date) = '$date_today'";
     $rs_prod = $conn->query($sql_prod);
     if($rs_prod->num_rows > 0){
       while($row_prod = $rs_prod->fetch_assoc()){
         $sales_value +=$row_prod['m_price'] * $row_prod['qnty'];
     } } } ?>

     <h4>Rs.<?= number_format($sales_value) ?>/-</h4>
     <h5>Total Sales Value(Call Center)</h5>
     <p>(<?= $date_today ?>)</p>
