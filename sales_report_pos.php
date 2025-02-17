<?php  include './backend/conn.php'; ?>

<?php
  $prod_id = array();
  if(isset($_REQUEST['sel_date'])){
  $date_today = $_REQUEST['sel_date'];
  }
  else {
    $date_today = date("Y-m-d");
  }

  $sql_order_call = "SELECT * FROM tbl_order WHERE date(bill_date) = '$date_today'";
  $rs_order_call = $conn->query($sql_order_call);
  if($rs_order_call->num_rows > 0){
    while($rowOrder = $rs_order_call->fetch_assoc()){
      array_push($prod_id,$rowOrder['product_id']);
      // echo $rowOrder['product_id']."<br>";
    }
  }
  $prod_id = array_unique($prod_id);
 ?>

<table class="table datatable ">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Unit Price</th>
      <th>Total Sold Qnty</th>
      <th>Total Value</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($prod_id as $id_call){
        $sql_prod = "SELECT sum(quantity) AS qnty,m_price FROM tbl_order WHERE product_id = '$id_call' AND date(bill_date) = '$date_today'";
        $rs_prod = $conn->query($sql_prod);
        if($rs_prod->num_rows > 0){
          while($row_prod = $rs_prod->fetch_assoc()){
            $quantity = $row_prod['qnty'];
            $p_name = getDataBack($conn,'tbl_product','id',$id_call,'name');

       ?>
        <tr>
          <th><?= $p_name ?></th>
          <th>Rs.<?= $row_prod['m_price'] ?>/-</th>
          <th><?= $quantity ?></th>
          <th>Rs.<?= $quantity * $row_prod['m_price'] ?>/-</th>
        </tr>
     <?php } } } ?>

  </tbody>
</table>
