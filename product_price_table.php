<?php include './backend/conn.php';
$u_id = $_SESSION['u_id'];

 ?>
<table class="table  datanew" id="table_id">
  <thead>
    <tr>

      <th>Product Name</th>
      <th>Cardamum Price </th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT * FROM tbl_product";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      $inid = 1;
      while($row = $rs->fetch_assoc()){ ?>
            <tr>

              <td >
                <?= $row['name'] ?> <br>
                <span id="update_status"
                 style="display:none;color:#000;font-weight:bold;">(Updated)</span>
              </td>
              <td> <input type="text" class="form-control" id="price_<?=$inid ?>" value="<?= $row['price'] ?>"> </td>
              <td> <button type="button" class="btn btn-primary btn-xs" name="button" onclick="updatePrice(<?= $row['id'] ?>,'<?= $inid ?>')">Update</button> </td>


            </tr>
    <?php $inid++; } } ?>

  </tbody>
</table>
