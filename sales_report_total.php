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

  $sql_order_call = "SELECT * FROM tbl_order_temp WHERE status NOT IN (0,1) AND date(bill_date)
  BETWEEN '$date_sel_one' AND '$date_sel_two' ORDER BY `tbl_order_temp`.`bill_date` DESC";
  $rs_order_call = $conn->query($sql_order_call);


  $sql_order_pos = "SELECT * FROM tbl_order WHERE date(bill_date)
  BETWEEN '$date_sel_one' AND '$date_sel_two' ORDER BY `tbl_order`.`bill_date` DESC";
  $rs_order_pos = $conn->query($sql_order_pos);

 ?>
 <div class="row">
   <div class="col-4 d-flex">
     <div class="dash-count">
       <div class="dash-counts">
         <h4 id="tot_qnty"></h4>
         <h5>Total Quantity</h5>
         <p>(From <?= $date_sel_one ?> To <?= $date_sel_two  ?>) </p>
       </div>
       <div class="dash-imgs">
         <i data-feather="activity"></i>
       </div>
     </div>
   </div>
   <div class="col-4 d-flex">
     <div class="dash-count das1">

       <div class="dash-counts">
         <h4 id="tot_sales"></h4>
         <h5>Total Sales Value</h5>
         <p>(From <?= $date_sel_one ?> To <?= $date_sel_two  ?>) </p>
       </div>
       <div class="dash-imgs">
         <i data-feather="dollar-sign"></i>
       </div>
     </div>
   </div>
   <div class="col-4 d-flex">
     <div class="dash-count das2">

       <div class="dash-counts">
         <h4 id="tot_sales_b_discount"></h4>
         <h5>Total Sales Value Before Discount</h5>
         <p>(From <?= $date_sel_one ?> To <?= $date_sel_two  ?>) </p>
       </div>
       <div class="dash-imgs">
         <i data-feather="dollar-sign"></i>
       </div>
     </div>
   </div>

 </div>
 <div class="card-header pb-0 d-flex justify-content-between align-items-center">
   <h5 class="card-title mb-0">Sales Report From <?= $date_sel_one ?> To <?= $date_sel_two  ?></h5>
   </div>
<table class="table datatable " id="sales_report_id">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Unit Price</th>
      <th>After Discount</th>
      <th>Total Sold Qnty</th>
      <th>Total Value</th>
      <th>Bill Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $data = 4;
    $data_two =1;
    $tot_bill = 0;
    $tot_bill_dis = 0;
    $tot_qnty = 0;
    $dis_amount =0;
    $dis_amount_pos = 0;

      if($rs_order_call->num_rows > 0){
        while($row_order_call = $rs_order_call->fetch_assoc()){
          $p_id = $row_order_call['product_id'];
          $p_name = getDataBack($conn,'tbl_product','id',$p_id,'name');
          $qnty = $row_order_call['quantity'];
          $date_bill = $row_order_call['bill_date'];
          $date_billed = date("Y-m-d", strtotime($date_bill));
          $tot_qnty +=$qnty;
          $discount = $row_order_call['discount'];

          $p_price = $row_order_call['m_price'];
          if($discount != 0){
            $d_type = $row_order_call['discount_type'];
            if($d_type == "p"){
              $dis_amount = ($p_price * $discount) / 100;
            }
            elseif($d_type == "f"){
              $dis_amount = $discount;
            }
            $p_price = $p_price - $dis_amount;
            $p_price = floor($p_price);
          }
          $dis_amount = floor($dis_amount);



     ?>
        <tr>
          <th><?= $p_name ?>(Call Center)</th>
          <th>Rs.<?= $row_order_call['m_price'] ?>/-</th>
          <th>  Rs.<?= $p_price ?>/-  </th>
          <th><?= $qnty ?></th>
          <th>Rs.<?= $qnty * $p_price ?>/-
          </th>

          <th><?= $date_billed ?></th>
        </tr>
      <?php
        $tot_bill_dis += $qnty * $p_price;
        $tot_bil +=$qnty * $row_order_call['m_price'];
     } }else {
        $data = 0;
      }?>
      <?php
        if($rs_order_pos->num_rows > 0){
          while($row_order_pos = $rs_order_pos->fetch_assoc()){
            $p_id = $row_order_pos['product_id'];
            $p_name = getDataBack($conn,'tbl_product','id',$p_id,'name');
            $qnty = $row_order_pos['quantity'];
            $date_bill = $row_order_pos['bill_date'];
            $date_billed = date("Y-m-d", strtotime($date_bill));
            $tot_qnty +=$qnty;

            $discount = $row_order_pos['discount'];

            $p_price = $row_order_pos['m_price'];
            if($discount != 0){
              $d_type = $row_order_pos['discount_type'];
              if($d_type == "p"){
                $dis_amount = ($p_price * $discount) / 100;
              }
              elseif($d_type == "a"){
                $dis_amount = $discount;
              }
              $p_price = $p_price - $dis_amount;
              $p_price = floor($p_price);
            }
            $dis_amount = floor($dis_amount);
       ?>
          <tr>
            <th><?= $p_name ?>(POS)</th>
            <th>Rs.<?= $row_order_pos['m_price'] ?>/-</th>
            <th>  Rs.<?= $p_price ?>/-  </th>
            <th><?= $qnty ?></th>
            <th>Rs.<?= $qnty * $row_order_pos['m_price'] ?>/-</th>
            <th><?= $date_billed ?></th>
          </tr>
        <?php
        $tot_bill_dis += $qnty * $p_price;
        $tot_bil += $qnty * $row_order_pos['m_price'];
      } }else {
          $data_two = 0;
        }?>

        <?php if($data == 0 && $data_two == 0){ ?>
        <tr>
          <td colspan="5"> <span style="font-size:25px;font-weight:bold;">NO DATA FOUND</span> </td>
        </tr>
      <?php } ?>

  </tbody>
</table>

<script type="text/javascript">
  document.getElementById('tot_qnty').innerHTML = "<?= number_format($tot_qnty) ?>";
  document.getElementById('tot_sales').innerHTML = "Rs.<?= number_format($tot_bill_dis) ?>/-";
  document.getElementById('tot_sales_b_discount').innerHTML = "Rs.<?= number_format($tot_bil) ?>/-";
</script>
