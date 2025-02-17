<?php include './backend/conn.php'; ?>
<table class="table  datanew" id="call_orders">
  <thead>
    <tr>
      <th>Order Id</th>
      <th>Customer Name</th>
      <th>Order Date</th>
      <th>Total Bill</th>
      <th>Delivery Charge</th>
      <th>Total</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order_customer ORDER BY order_id DESC";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $ref  = $row['order_id']; ?>
      <tr>
        <td> #<?= $row['date_added']; ?>-<?= $row['order_id'] ?> </td>
        <?php
        $c_id = $row['customer_id'];
        $sqls = "SELECT * FROM tbl_customer WHERE c_id='$c_id' ";
        $rss = $conn->query($sqls);
        if($rss->num_rows >0){
          while($rows = $rss->fetch_assoc()){ ?>

        <td><?= $rows['c_name'] ?></td>

      <?php }}else{ ?>

        <td>N/A</td>

      <?php } ?>


        <td><?= $row['date_added']; ?></td>
        <?php
        $sqlS = "SELECT SUM(tbl_order_temp.m_price*(1-tbl_order_temp.discount/100) * tbl_order_temp.quantity) AS total
                  FROM tbl_product
                  JOIN tbl_order_temp
                  ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='p'";
        $rsS = $conn->query($sqlS);
        if($rsS->num_rows >0){
          while($rowS = $rsS->fetch_assoc()){
            $total_p = $rowS['total'];
         }}

         $sqlS = "SELECT SUM((tbl_order_temp.m_price-tbl_order_temp.discount) * tbl_order_temp.quantity) AS total
                   FROM tbl_product
                   JOIN tbl_order_temp
                   ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='f'";
         $rsS = $conn->query($sqlS);
         if($rsS->num_rows >0){
           while($rowS = $rsS->fetch_assoc()){
             $total_a = $rowS['total'];
          }}
          $total = $total_p + $total_a;
          ?>
        <td><?= $total ?></td>
        <td><?= $row['delivery_charge']; ?></td>
        <td>
          <?= $total+$row['delivery_charge'] ?>
        </td>
          <?php
          $status = $row['status'];
          if($status == '0'){
           ?>
            <td> Cancelled  </td>
            <td>
              <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>,<?= $row['customer_id'] ?>,<?= $row['store'] ?>)">
                <img src="assets/img/icons/eye.svg" alt="img">
              </a>
            <button type="button" class="btn btn-success btn-sm" disabled>Confirm</button>
            <button type="button" class="btn btn-danger btn-sm" disabled>Cancelled</button>

          <?php
        }elseif($status == '1'){
           ?>
           <td> Pending  </td>
           <td>
             <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>,<?= $row['customer_id'] ?>,<?= $row['store'] ?>)">
               <img src="assets/img/icons/eye.svg" alt="img">
             </a>
           <button type="button" class="btn btn-success btn-sm" onclick="confirmOrder(<?= $row['order_id'] ?>)">Confirm</button>
           <button type="button" class="btn btn-danger btn-sm" onclick="cancelOrder(<?= $row['order_id'] ?>)">Cancel</button>

         <?php
       }elseif($status == '2'){
          ?>
          <td> Confirmed  </td>
          <td>
            <a class="me-3" href="javascript:void(0);"
             data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>,<?= $row['customer_id'] ?>,<?= $row['store'] ?>)">
              <img src="assets/img/icons/eye.svg" alt="img">
            </a>
          <button type="button" class="btn btn-success btn-sm" disabled>Confirmed</button>
          <button type="button" class="btn btn-danger btn-sm" onclick="cancelOrder(<?= $row['order_id'] ?>)">Cancel</button>
          <?php
        }elseif($status == '3'){
           ?>
           <td> Packed  </td>
           <td>
             <a class="me-3" href="javascript:void(0);"
              data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>,<?= $row['customer_id'] ?>,<?= $row['store'] ?>)">
               <img src="assets/img/icons/eye.svg" alt="img">
             </a>
           <button type="button" class="btn btn-success btn-sm" disabled>Packed</button>
           <button type="button" class="btn btn-danger btn-sm" onclick="cancelOrder(<?= $row['order_id'] ?>)">Cancel</button>
           <?php
         }elseif($status == '4'){
            ?>
            <td> Our for Delivery  </td>
            <td>
              <a class="me-3" href="javascript:void(0);"
               data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['order_id'] ?>,<?= $row['customer_id'] ?>,<?= $row['store'] ?>)">
                <img src="assets/img/icons/eye.svg" alt="img">
              </a>
            <button type="button" class="btn btn-success btn-sm" disabled>Out for delivery</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="cancelOrder(<?= $row['order_id'] ?>)">Cancel</button>

      <?php } ?>

      </td>
      <td> <a href="print_bill_call.php?or_id=<?= $row['order_id'] ?>" class="btn btn-warning btn-sm">Print Bill</a> </td>
      <td><a onclick="del_order(<?= $row['order_id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
        <img src="assets/img/icons/delete.svg" alt="img">
      </a></td>
      </tr>
    <?php }} ?>

  </tbody>
</table>
