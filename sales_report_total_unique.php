<?php  include './backend/conn.php'; ?>

<?php
  if(isset($_REQUEST['sel_date_f'])){
  $date_sel_one = $_REQUEST['sel_date_f'];
  $date_sel_two = $_REQUEST['sel_date_t'];
  }
  else {
    $date_sel_one = date("Y-m-d");
    $date_sel_two = date("Y-m-d");
  }
  $prod_id = array();
  $sql_order_call = "SELECT * FROM tbl_order_temp WHERE status NOT IN (0,1) AND date(bill_date)
  BETWEEN '$date_sel_one' AND '$date_sel_two'";

  $rs_order_call = $conn->query($sql_order_call);
  if($rs_order_call->num_rows > 0){
    while($rowOrder = $rs_order_call->fetch_assoc()){
      array_push($prod_id,$rowOrder['product_id']);
      // echo $rowOrder['product_id']."<br>";
    }
  }
  $sql_order_pos = "SELECT * FROM tbl_order WHERE date(bill_date)
  BETWEEN '$date_sel_one' AND '$date_sel_two'";
  $rs_order_pos = $conn->query($sql_order_pos);
  if($rs_order_pos->num_rows > 0){
    while($rowOrderpos = $rs_order_pos->fetch_assoc()){
      array_push($prod_id,$rowOrderpos['product_id']);
      // echo $rowOrder['product_id']."<br>";
    }
  }

$prod_id = array_unique($prod_id);

 ?>

 <div class="card-header pb-0 d-flex justify-content-between align-items-center">
   <h5 class="card-title mb-0">Sales Report From <?= $date_sel_one ?> To <?= $date_sel_two  ?></h5>
   </div>
<table class="table datatable " id="sales_report_uni_id">
  <thead>
    <tr>
      <th>Product Name</th>
      <?php
      $start_date = new DateTime($date_sel_one);
      $end_date = new DateTime($date_sel_two);
      $current_date = clone $start_date;
      while ($current_date <= $end_date) {
        ?>
      <th><?= $current_date->format('Y-m-d') ?></th>
    <?php $current_date->add(new DateInterval('P1D')); } ?>
    </tr>
  </thead>
  <tbody>

    <?php
    foreach ($prod_id as $id_call){
      $p_name = getDataBack($conn,'tbl_product','id',$id_call,'name');
      ?>
      <tr>
        <td><?= $p_name ?></td>

      <?php
      $start_date = new DateTime($date_sel_one);
      $end_date = new DateTime($date_sel_two);
      $current_date = clone $start_date;
      while ($current_date <= $end_date) {
        $inc_date = $current_date->format('Y-m-d');
      $sql_prod = "SELECT SUM(quantity) AS qnty
FROM (
  SELECT product_id, quantity, bill_date FROM tbl_order WHERE product_id = '$id_call'
  UNION ALL
  SELECT product_id, quantity, bill_date FROM tbl_order_temp WHERE product_id = '$id_call'
) AS t
WHERE DATE(bill_date) = '$inc_date'";
      $rs_prod = $conn->query($sql_prod);

      if($rs_prod->num_rows > 0){
          $row_prod = $rs_prod->fetch_assoc();
          $qnty = $row_prod['qnty'];
          if($qnty == NULL){
            $qnty = 0;
          }
          ?>
          <td><?= $qnty ?></td>
          <?php
        }
        else {
          ?>
          <td>0</td>
          <?php
        }
        $current_date->add(new DateInterval('P1D')); }
   ?>
    </tr>

  <?php } ?>
  </tbody>
</table>

<script type="text/javascript">
  document.getElementById('tot_qnty').innerHTML = "<?= number_format($tot_qnty) ?>";
  document.getElementById('tot_sales').innerHTML = "Rs.<?= number_format($tot_bil) ?>/-";
</script>
