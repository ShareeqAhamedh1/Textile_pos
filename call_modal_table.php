
<?php
include './backend/conn.php';

$order_id = $_REQUEST['order_id']; ?>




<table class="table  datanew">
  <thead>
    <tr>

      <th>Product Name</th>
      <th>Barcode</th>
      <th>Original Price</th>
      <th>Final Price</th>
      <th>Quantity</th>
      <th>Discount</th>
      <th>Discount Type</th>
      <!-- <th>Store</th> -->
      <th>Actions</th>
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
        <td style="width:100px"><input type="text" name="m_price[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['m_price']; ?>"></td>
        <td style="width:100px"><input type="text" name="quantity[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['quantity']; ?>"></td>
        <td style="width:100px"><input type="text" name="discount[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['discount']; ?>"></td>
        <td style="width:100px">
          <select name="discount_type[<?= $row['id'] ?>]"  class="select editable form-control">
            <?php
              if($row['discount_type']=='p'){
             ?>
              <option selected value="p">Percentage</option>
              <option value="f">Fixed Amount</option>
            <?php }else{ ?>
              <option value="p">Percentage</option>
              <option selected value="f">Fixed Amount</option>
            <?php } ?>
          </select>
        </td>
        <!-- <td id="store_id_modal"><?= $row['store']; ?></td> -->
        <td>
          <a class="confirm-text" onclick="del_prod(<?= $row['id'] ?>,<?= $order_id ?>)" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>

      </tr>
    <?php }} ?>

  </tbody>
</table>
