<?php include 'backend/conn.php'; ?>
<div class="card">
  <div class="card-body">
    <table class="table" id="tally_excel">
      <thead>
        <tr>
          <th>Product</th>
          <th>Expiry Date</th>
          <th>Updated Quantity</th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $t_s_id = $_REQUEST['st_ref_id'];
        $sql = "SELECT * FROM tbl_tally_stock WHERE st_ref_id='$t_s_id' ORDER BY `tbl_tally_stock`.`id` DESC";
        $rs = $conn->query($sql);
        if($rs->num_rows >0){
          while($row = $rs->fetch_assoc()){
              $p_id = $row['product_id'];

              $date_set = date('Y-m-d', strtotime($up_date));

              $product = getDataBack($conn,'tbl_product','id',$p_id,'name');
              $exp_date = $row['exp_date'];

              $add_minus = $row['add_minus'];

              if($add_minus == 1){
                $text = "Stock Added";
              }
              elseif ($add_minus == 2) {
                $text = "Stock Deducted";
              }
              else {
                $text = "Something Went Wrong Please delete this and add again";
              }
            ?>
        <tr>
          <td> <?= $product ?> </td>
          <td> <?= $exp_date ?></td>
          <td><?= $row['new_quantity']." ".$text ?></td>
          <td><?= $row['manual_note'] ?></td>
          <td>
            <a onclick="del_stock_record('<?= $row['id'] ?>')"class="me-3 confirm-text" href="javascript:void(0);">
              <img src="assets/img/icons/delete.svg" alt="img">
            </a>
          </td>
        </tr>
      <?php }}else{ ?>
        <tr>
          <td colspan="8"> NO DATA FOUND </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
