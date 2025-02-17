
<?php
include './backend/conn.php';

$order_id = $_REQUEST['order_id']; ?>
<table class="table  datanew">
  <thead>
    <tr>

      <th>Product Name</th>
      <th>Barcode</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Store</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order_temp WHERE order_ref='$order_id' ORDER BY id DESC ";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
      <tr>
        <?php
        $c_id = $row['product_id'];
        $sqls = "SELECT * FROM tbl_product WHERE id='$c_id' ";
        $rss = $conn->query($sqls);
        if($rss->num_rows >0){
          while($rows = $rss->fetch_assoc()){ ?>

        <td style="width:30 px"><?= $rows['name'] ?></td>
        <td><?= $rows['barcode']; ?></td>
        <td>Rs. <?= $rows['price']; ?></td>
        <?php }} ?>
        <td style="width:100px"><?= $row['quantity']; ?></td>
        <td id="store_id_modal"><?= $row['store']; ?></td>


      </tr>
    <?php }} ?>

  </tbody>
</table>
