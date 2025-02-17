<?php include './backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>
      <th>Sales Point</th>
      <th>Location</th>

      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_sales_point";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
    <tr>
      <td><?= $row['sale_point_name'] ?></td>
      <td><?= $row['point_location'] ?></td>
      <td>
        <a class="me-3" href="edit_sales_point.php?id=<?= $row['id'] ?>">
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
