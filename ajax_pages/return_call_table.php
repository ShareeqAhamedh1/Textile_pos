<?php include '../backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>

      <th>Reference Number</th>
      <th>Date</th>
      <th>Payment Type</th>
      <th>Total Bill</th>
      <th>Delivery Charge</th>
      <th>Total</th>
      <th>View Details</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `tbl_order_customer` ORDER BY `tbl_order_customer`.`order_id` DESC";

    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $ref  = $row['id']; ?>
      <tr>

        <td>#<?= $row['date_added']; ?>-<?= $row['order_id'] ?></td>


        <td><?= $row['date_added']; ?></td>


        <td><?= getPayment($row['payment_type']) ?></td>
        <?php
        $sqlS = "SELECT SUM(tbl_order_temp.m_price*(1-tbl_order_temp.discount/100) * tbl_order_temp.quantity) AS total
                  FROM tbl_product
                  JOIN tbl_order
                  ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='p'";
        $rsS = $conn->query($sqlS);
        if($rsS->num_rows >0){
          while($rowS = $rsS->fetch_assoc()){
            $total_p = $rowS['total'];
         }}

         $sqlS = "SELECT SUM((tbl_order_temp.m_price-tbl_order_temp.discount) * tbl_order_temp.quantity) AS total
                   FROM tbl_product
                   JOIN tbl_order
                   ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='f'";
         $rsS = $conn->query($sqlS);
         if($rsS->num_rows >0){
           while($rowS = $rsS->fetch_assoc()){
             $total_a = $rowS['total'];
          }}
          $total = $total_p + $total_a;
          ?>
        <td><?= $total ?></td>
        <td><?= $row['delivery_charge'] ?></td>
        <td>
          <?= $total+$row['delivery_charge'] ?>
        </td>
        <td>
          <a href="print_bill_call.php?bill_id=<?= $row['id'] ?>" target="_blank"> <span style="color:#f74e05;font-weight:bold;">Print Bill</span> </a>
        </td>

      </tr>
    <?php }} ?>

  </tbody>

</table>
