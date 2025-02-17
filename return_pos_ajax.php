<?php include 'backend/conn.php'; ?>
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
    if(isset($_REQUEST['search_key'])){
      $skey = $_REQUEST['search_key'];
    $sql = "SELECT * FROM tbl_order_grm WHERE order_ref LIKE '%$skey%' ORDER BY id DESC";
    }
    else {
        $sql = "SELECT * FROM tbl_order_grm ORDER BY id DESC";
    }
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $ref  = $row['id']; ?>
      <tr>

        <td><?= $row['order_ref'] ?></td>


        <td><?= $row['order_date']; ?></td>


        <td><?= getPayment($row['payment_type']) ?></td>
        <?php
        $sqlS = "SELECT SUM(tbl_order.m_price*(1-tbl_order.discount/100) * tbl_order.quantity) AS total
                  FROM tbl_product
                  JOIN tbl_order
                  ON tbl_product.id = tbl_order.product_id WHERE tbl_order.grm_ref='$ref' AND tbl_order.discount_type='p'";
        $rsS = $conn->query($sqlS);
        if($rsS->num_rows >0){
          while($rowS = $rsS->fetch_assoc()){
            $total_p = $rowS['total'];
         }}

         $sqlS = "SELECT SUM((tbl_order.m_price-tbl_order.discount) * tbl_order.quantity) AS total
                   FROM tbl_product
                   JOIN tbl_order
                   ON tbl_product.id = tbl_order.product_id WHERE tbl_order.grm_ref='$ref' AND tbl_order.discount_type='f'";
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
          <a href="print_bill.php?bill_id=<?= $row['id'] ?>" target="_blank"> <span style="color:#f74e05;font-weight:bold;">Print Bill</span> </a>
        </td>
        <td>
          <a onclick="openModalReturn(<?= $row['id'] ?>)" class="btn btn-primary btn-sm"> <span style="font-weight:bold;">ADD TO RETURN</span> </a>
        </td>

      </tr>
    <?php }} ?>

  </tbody>

</table>
