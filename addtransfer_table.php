<?php include './backend/conn.php';

if(isset($_REQUEST['sale_point'])){
  $sale_id = $_REQUEST['sale_point'];
}else{
  $sale_id = 0;
} ?>

<table class="table">
  <thead>
    <tr>
      <th>
        <label class="checkboxs">
          <input type="checkbox" id="select-all">
          <span class="checkmarks"></span>
        </label>
      </th>
      <th>Product Name</th>
      <th>Quantity to Transfer</th>
      <th>Available in Sale Point</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if($sale_id){
      $sql = "SELECT * FROM tbl_product WHERE id IN (SELECT p_id FROM tbl_quantity WHERE sale_point_id='$sale_id')";
    }else{
      $sql = "SELECT * FROM tbl_product";
    }
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
        <tr class="bor-b1">

              <td>
                <label class="checkboxs">
                  <input type="checkbox" value="<?= $row['id'] ?>" name="id[]">
                  <span class="checkmarks"></span>
                </label>
              </td>

              <td ><?= $row['name'] ?></td>
              <td>
                <div class="input-group form-group mb-0">


                  <input type="text" name="<?= $row['id'] ?>" value="0" class="calc-no">

                </div>
              </td>
              <?php
              $p_id = $row['id'];

              $sqlSub = "SELECT * FROM tbl_quantity WHERE p_id='$p_id' AND sale_point_id='$sale_id'";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                while($rowSub = $rsSub->fetch_assoc()){ ?>
                  <td><?= $rowSub['quantity'] ?></td>
              <?php }} ?>
        </tr>
    <?php }} ?>
  </tbody>
</table>
