<?php
  include '../backend/conn.php';

  $or_id = $_REQUEST['or_id'];

  $sqlItems = "SELECT * FROM tbl_order_products WHERE or_id='$or_id'";
  $rsItems = $conn->query($sqlItems);

  if($rsItems->num_rows > 0){
    while ($rowItems = $rsItems->fetch_assoc()) {
      $p_id = $rowItems['p_id'];
      $qnty = $rowItems['p_qty'];

      $product = getDataBack($conn,'tbl_product','id',$p_id,'name');

      ?>
      <h5> <?= $product ?> x <?= $qnty ?> </h5>
      <hr>
      <?php
    }
  }

 ?>
