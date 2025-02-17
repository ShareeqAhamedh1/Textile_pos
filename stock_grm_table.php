<?php include './backend/conn.php';
$u_id = $_SESSION['u_id']; ?>
<table class="table  datanew">
  <thead>
    <tr>

      <th>Reference Number</th>
      <th>Date</th>
      <th>Add stock</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_stock_grm WHERE user_id='$u_id'  ORDER BY id DESC";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
      <tr>

        <td><?= $row['stock_ref'] ?></td>


        <td><?= $row['stock_date']; ?></td>


        <td>
          <a class="me-3" href="./backend/add_stock.php?stock_ref=<?= $row['stock_ref'] ?>&stock_date=<?= $row['stock_date'] ?>&id=<?= $row['id'] ?>">
            <img src="assets/img/icons/plus.svg" alt="img">
          </a>
        </td>
        <td>
          <a onclick="del_stock(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>
      </tr>
    <?php }} ?>
    <!-- <tr>
      <td>
        <label class="checkboxs">
          <input type="checkbox">
          <span class="checkmarks"></span>
        </label>
      </td>
      <td>
        <a class="product-img">
          <img src="assets/img/product/product10.jpg" alt="product">
        </a>
      </td>
      <td>Health Care	</td>
      <td>Health Care	</td>
      <td>CT0010</td>
      <td>Health Care Description</td>
      <td>Admin</td>
      <td>
        <a class="me-3" href="editsubcategory.html">
          <img src="assets/img/icons/edit.svg" alt="img">
        </a>
        <a class="me-3 confirm-text" href="javascript:void(0);">
          <img src="assets/img/icons/delete.svg" alt="img">
        </a>
      </td>
    </tr> -->
  </tbody>
</table>
