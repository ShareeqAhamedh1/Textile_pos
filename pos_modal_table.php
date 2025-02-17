
<?php
include './backend/conn.php';

$grm_ref = $_REQUEST['grm_ref']; ?>

<table class="table  datanew">
  <thead>
    <tr>

      <th style="width:20%">Product Name</th>
      <th>Barcode</th>
      <th>Original Price</th>
      <th>Final Price</th>
      <th>Quantity</th>
      <th>Discount</th>
      <th>Discount Type</th>

      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_order WHERE grm_ref='$grm_ref' ";
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

        <td style="width:20%"><?= $rows['name'] ?></td>
        <td><?= $rows['barcode']; ?></td>
        <td>Rs. <?= $rows['price']; ?></td>
        <?php }} ?>
        <td style="width:100px"><input type="text" name="m_price[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['m_price']; ?>"></td>

        <td><input type="number" name="quantity[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['quantity']; ?>"></td>

        <td style="width:100px"><input type="text" name="discount[<?= $row['id'] ?>]" class="editable form-control" value="<?= $row['discount']; ?>"></td>

        <td style="width:75px">
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

        <td>
          <a class="confirm-text" onclick="del_prod(<?= $row['id'] ?>,<?= $grm_ref ?>)" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>

      </tr>
    <?php }} ?>

  </tbody>
</table><br>
