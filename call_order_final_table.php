<?php include './backend/conn.php';
$store = $_REQUEST['store'];
$status = $_REQUEST['status'];

 ?>
<table class="table  datanew">
  <thead>
    <tr>


      <th>Customer Name</th>
      <th>Phone Number</th>
      <th>Date Added</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order_customer WHERE order_id IN (SELECT DISTINCT order_ref FROM tbl_order_temp WHERE status='$status' AND store='$store' ) ORDER BY order_id DESC ";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
        <tr>

          <?php
          $c_id = $row['customer_id'];
          $sqls = "SELECT * FROM tbl_customer WHERE c_id='$c_id' ";
          $rss = $conn->query($sqls);
          if($rss->num_rows >0){
            while($rows = $rss->fetch_assoc()){ ?>

          <td><?= $rows['c_name'] ?></td>
          <td><?= $rows['c_phone']; ?></td>

        <?php }}else{ ?>
          <td>N/A</td>
          <td>N/A</td>
        <?php } ?>
          <td style="width:100px"><?= $row['date_added']  ?></td>
          <td></td>
          <tr>

            <td></td>
          <td>
            <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>)">
              <img src="assets/img/icons/eye.svg" alt="img">
            </a>
            <?php

            if($status == '2'){
             ?>

              <button type="button" class="btn btn-success btn-sm" onclick="packOrder(<?= $row['order_id'] ?>)">Packed</button>


            <?php
          }elseif($status == '3'){
             ?>


             <button type="button" class="btn btn-success btn-sm" onclick="deliverOrder(<?= $row['order_id'] ?>)">Delivered</button>

           <?php
         }elseif($status == '4'){ ?>




        <?php } ?>
          </td>
          <td></td>

        </tr>

        </tr>
    <?php }} ?>

  </tbody>

</table>
