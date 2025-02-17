<?php include './backend/conn.php'; ?>

<table class="table datanew">
  <thead>
    <tr>
      <th>
        <label class="checkboxs">
          <input type="checkbox" id="select-all">
          <span class="checkmarks"></span>
        </label>
      </th>
      <th>Brand ID</th>
      <th>Image</th>
      <th>Brand Name</th>
      <!-- <th>Brand Description</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_brand";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox">
            <span class="checkmarks"></span>
          </label>
        </td>
        <td><?= $row['id'] ?></td>

        <td>
          <a class="product-img">
            <img src="assets/img/brand/adidas.png" alt="product">
          </a>
        </td>

        <td><?= $row['name'] ?></td>
        <td>
          <a class="me-3" href="editbrand.html">
            <img src="assets/img/icons/edit.svg" alt="img">
          </a>
          <a onclick="del_prod(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>
      </tr>
    <?php }} ?>

  </tbody>
</table>
