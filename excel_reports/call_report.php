<?php include '../backend/conn.php'; ?>
<table class="table  datanew" id="call_orders">
  <thead>
    <tr>
      <th>Invoice Id</th>
      <th>Order Date</th>
      <th>Total Bill</th>
      <th>Delivery Charge</th>
      <th>Total</th>
      <th>Company</th>
      <th>Payment Method</th>
      <th>Delivery Method</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order_customer ORDER BY order_id DESC";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $pay_m = $row['payment_type'];
        $del_method = $row['del_method'];
        $store_id = $row['store_id'];

        $ref  = $row['order_id']; ?>
      <tr>
        <td> #<?= $row['date_added']; ?>-<?= $row['order_id'] ?> </td>


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
        <td>
          <?php if($store_id == 1){ echo "Five Stories"; }else{ echo "Cardamom"; } ?>
        </td>
        <td> <?= getPayment($pay_m) ?> </td>
        <td> <?= getDataBack($conn,'tbl_delivery_methods','dlm_id',$del_method,'dlm_name') ?> </td>
      </tr>
    <?php }} ?>

  </tbody>
</table>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
var table_id = 'call_orders';

function ExportToExcel(type, fn, dl) {
   var elt = document.getElementById(table_id);
   var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
   return dl ?
     XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
     XLSX.writeFile(wb, fn || ('sales_report.' + (type || 'xlsx')));
}
ExportToExcel();
</script>
