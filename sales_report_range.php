<?php  include './backend/conn.php'; ?>

<?php

    $date_today = date("Y-m-d");

 ?>

<table class="table datatable" id="table_id">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Unit Price</th>
      <th>Total Sold Qnty</th>
      <th>Total Value</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php

        $sql_prod = "SELECT * FROM tbl_order WHERE date(bill_date) BETWEEN '2023-03-1' AND '$date_today' ";
        $rs_prod = $conn->query($sql_prod);
        if($rs_prod->num_rows > 0){
          while($row_prod = $rs_prod->fetch_assoc()){
            $quantity = $row_prod['quantity'];
            $id_call = $row_prod['product_id'];
            $p_name = getDataBack($conn,'tbl_product','id',$id_call,'name');

       ?>
        <tr>
          <th><?= $p_name ?></th>
          <th>Rs.<?= $row_prod['m_price'] ?>/-</th>
          <th><?= $quantity ?></th>
          <th>Rs.<?= $quantity * $row_prod['m_price'] ?>/-</th>
          <th> <?= $row_prod['bill_date'] ?> </th>
        </tr>
     <?php } }  ?>

  </tbody>
</table>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">

  let today = new Date().toLocaleDateString();

  var htmltable = document.getElementById('table_id');
  var worksheet = XLSX.utils.table_to_book(htmltable);

  XLSX.writeFile(worksheet, today+'stocksheet.xlsx');

</script>
