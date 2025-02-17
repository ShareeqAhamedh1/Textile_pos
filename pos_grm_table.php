<?php include './backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>

      <th>Reference Number</th>
      <th>Customer Name</th>
      <th>Date</th>
      <th>Payment Type</th>
      <th>Total Bill</th>
      <!-- <th>Delivery Charge</th> -->
      <!-- <th>Total</th> -->
      <th>View Details</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order_grm ORDER BY id DESC";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $ref  = $row['id']; ?>
      <tr>

        <td><?= $row['order_ref'] ?></td>
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
        
        
        <td>
          <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['id'] ?>)">
            <img src="assets/img/icons/eye.svg" alt="img">
          </a>
          <a href="print_bill.php?bill_id=<?= $row['id'] ?>" target="_blank"> <span style="color:#f74e05;font-weight:bold;">Print Bill</span> </a>
        </td>
        <td>
          <a onclick="del_order(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>
      </tr>
    <?php }} ?>

  </tbody>

</table>
<script type="text/javascript">
$('#create').on('shown.bs.modal', function () {
  $(".js-states").select2();
});
</script>
