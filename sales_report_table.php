<?php include 'backend/conn.php'; ?>
<?php $p_id = $_REQUEST['p_id']; ?>
<?php

$order_ref_call = array();
$order_ref_pos = array();

$sql_call = "SELECT * FROM tbl_order_temp WHERE product_id='$p_id'";
$rs_call =$conn->query($sql_call);
if($rs_call->num_rows > 0){
	while($row_call = $rs_call->fetch_assoc()){
		$order_ref_call[] = $row_call['order_ref'];
	}
}

$sql_pos = "SELECT * FROM tbl_order WHERE product_id='$p_id'";
$rs_pos =$conn->query($sql_pos);
if($rs_pos->num_rows > 0){
	while($row_pos = $rs_pos->fetch_assoc()){
		$order_ref_pos[] = $row_pos['grm_ref'];
	}
}

 ?>

									<table class="table datatable " id="sales_report_id">
										  <thead>
										    <tr>
										      <th>Product Name</th>
										      <th>Total Sold(CALL CENTER & POS)</th>
										      <th>Total Stock Entered</th>
													<th>Balance Stock </th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php
													$tot_entered_stock = 0;
													$tot_stock_sold = 0;

													$sql_exp = "SELECT SUM(quantity) AS qnty FROM tbl_expiry_date WHERE product_id='$p_id'";
													$rs_exp = $conn->query($sql_exp);
													if($rs_exp->num_rows > 0){
														$row_stock = $rs_exp->fetch_assoc();
														$tot_entered_stock = $row_stock['qnty'];
													}

													$sql_call = "SELECT SUM(quantity) AS qty FROM tbl_order_temp WHERE status NOT IN (0,1) AND product_id='$p_id'";
													$rs_call =$conn->query($sql_call);
													if($rs_call->num_rows > 0){
														$row_call = $rs_call->fetch_assoc();
														$tot_stock_sold += $row_call['qty'];
													}

													$sql_pos = "SELECT SUM(quantity) AS qty FROM tbl_order WHERE product_id='$p_id'";
													$rs_pos =$conn->query($sql_pos);
													if($rs_pos->num_rows > 0){
														$row_pos = $rs_pos->fetch_assoc();
														$tot_stock_sold += $row_pos['qty'];
													}

												 ?>
												 <tr>
												 	<td><?= getDataBack($conn,'tbl_product','id',$p_id,'name'); ?></td>
													<td><?= $tot_stock_sold ?></td>
													<td><?= $tot_entered_stock ?></td>
													<td> <?= $tot_entered_stock - $tot_stock_sold ?> </td>
												 </tr>
										  </tbody>
										</table>
										<br>
										<h4>&nbsp; Related Bills From POS</h4>
										<br>
										<table class="table  datanew">
										  <thead>
										    <tr>

										      <th>Reference Number</th>
										      <th>Customer Name</th>
										      <th>Date</th>
										      <th>Payment Type</th>
										      <th>Total Bill</th>
										      <th>Delivery Charge</th>
										      <th>Total</th>
										      <th>View Details</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php
												foreach ($order_ref_pos as $grm_id) {
										    $sql = "SELECT * FROM tbl_order_grm WHERE id ='$grm_id' ORDER BY id DESC";
										    $rs = $conn->query($sql);
										    if($rs->num_rows >0){
										      $row = $rs->fetch_assoc();
										        $ref  = $row['id']; ?>
										      <tr>

										        <td><?= $row['order_ref'] ?></td>
										        <?php
										        $c_id = $row['customer_id'];
										        $sqls = "SELECT * FROM tbl_customer WHERE c_id='$c_id' ";
										        $rss = $conn->query($sqls);
										        if($rss->num_rows >0){
										          while($rows = $rss->fetch_assoc()){ ?>

										        <td><?= $rows['c_name'] ?></td>

										      <?php }}else{ ?>

										        <td>N/A</td>

										      <?php } ?>

										        <td><?= $row['order_date']; ?></td>


										        <td><?= getPayment($row['payment_type']) ?></td>
										        <?php
										        $sqlS = "SELECT SUM(tbl_order.m_price*(1-tbl_order.discount/100) * tbl_order.quantity) AS total
										                  FROM tbl_product
										                  JOIN tbl_order
										                  ON tbl_product.id = tbl_order.product_id WHERE tbl_order.grm_ref='$ref' AND tbl_order.discount_type='p'";
										        $rsS = $conn->query($sqlS);
										        if($rsS->num_rows >0){
										          while($rowS = $rsS->fetch_assoc()){
										            $total_p = $rowS['total'];
										         }}

										         $sqlS = "SELECT SUM((tbl_order.m_price-tbl_order.discount) * tbl_order.quantity) AS total
										                   FROM tbl_product
										                   JOIN tbl_order
										                   ON tbl_product.id = tbl_order.product_id WHERE tbl_order.grm_ref='$ref' AND tbl_order.discount_type='f'";
										         $rsS = $conn->query($sqlS);
										         if($rsS->num_rows >0){
										           while($rowS = $rsS->fetch_assoc()){
										             $total_a = $rowS['total'];
										          }}
										          $total = $total_p + $total_a;
										          ?>
										        <td><?= $total ?></td>
										        <td><?= $row['delivery_charge'] ?></td>
										        <td>
										          <?= $total+$row['delivery_charge'] ?>
										        </td>
										        <td>
										          <a href="print_bill.php?bill_id=<?= $row['id'] ?>" target="_blank"> <span style="color:#f74e05;font-weight:bold;">Print Bill</span> </a>
										        </td>
										      </tr>
													<?php
													$sql_pos = "SELECT SUM(quantity) AS qty FROM tbl_order WHERE product_id='$p_id' AND grm_ref='$grm_id'";
													$rs_pos =$conn->query($sql_pos);
													if($rs_pos->num_rows > 0){
														$row_pos = $rs_pos->fetch_assoc();
														$stock_only_item = $row_pos['qty'];

													 ?>
													<tr>
														<td style="font-weight:bold;" colspan="4">
															Total Sold <?= getDataBack($conn,'tbl_product','id',$p_id,'name'); ?>
															on this bill: <span style="color:#6e8c0a;font-size:18px;"> (<?= $stock_only_item ?>) </span>  </td>
													</tr>
												<?php } ?>
										    <?php } } ?>

										  </tbody>

										</table>
										<br>
										<h4>&nbsp; Related Bills From Call Center</h4>
										<br>
										<table class="table  datanew">
										  <thead>
										    <tr>
										      <th>Order Id</th>
										      <th>Customer Name</th>
										      <th>Order Date</th>
										      <th>Total Bill</th>
										      <th>Delivery Charge</th>
										      <th>Total</th>
										      <th>Status</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?php
												foreach ($order_ref_call as $call_id) {

												$sql = "SELECT * FROM tbl_order_customer WHERE order_id='$call_id' ORDER BY order_id DESC";
										    $rs = $conn->query($sql);

												if($rs->num_rows >0){
										      $row = $rs->fetch_assoc();
										        $ref  = $row['order_id']; ?>
										      <tr>
										        <td> #<?= $row['date_added']; ?>-<?= $row['order_id'] ?> </td>
										        <?php
										        $c_id = $row['customer_id'];
										        $sqls = "SELECT * FROM tbl_customer WHERE c_id='$c_id' ";
										        $rss = $conn->query($sqls);
										        if($rss->num_rows >0){
										          while($rows = $rss->fetch_assoc()){ ?>

										        <td><?= $rows['c_name'] ?></td>

										      <?php }}else{ ?>

										        <td>N/A</td>

										      <?php } ?>


										        <td><?= $row['date_added']; ?></td>
										        <?php
										        $sqlS = "SELECT SUM(tbl_order_temp.m_price*(1-tbl_order_temp.discount/100) * tbl_order_temp.quantity) AS total
										                  FROM tbl_product
										                  JOIN tbl_order_temp
										                  ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='p'";
										        $rsS = $conn->query($sqlS);
										        if($rsS->num_rows >0){
										          while($rowS = $rsS->fetch_assoc()){
										            $total_p = $rowS['total'];
										         }}

										         $sqlS = "SELECT SUM((tbl_order_temp.m_price-tbl_order_temp.discount) * tbl_order_temp.quantity) AS total
										                   FROM tbl_product
										                   JOIN tbl_order_temp
										                   ON tbl_product.id = tbl_order_temp.product_id WHERE tbl_order_temp.order_ref='$ref' AND tbl_order_temp.discount_type='f'";
										         $rsS = $conn->query($sqlS);
										         if($rsS->num_rows >0){
										           while($rowS = $rsS->fetch_assoc()){
										             $total_a = $rowS['total'];
										          }}
										          $total = $total_p + $total_a;
										          ?>
										        <td><?= $total ?></td>
										        <td><?= $row['delivery_charge']; ?></td>
										        <td>
										          <?= $total+$row['delivery_charge'] ?>
										        </td>
										          <?php
										          $status = $row['status'];
															?>

										      </td>
										      <td> <a href="print_bill_call.php?or_id=<?= $row['order_id'] ?>" class="btn btn-warning btn-sm">Print Bill</a> </td>

										      </tr>
													<?php
													$sql_call = "SELECT SUM(quantity) AS qty FROM tbl_order_temp WHERE product_id='$p_id' AND order_ref='$call_id'";
													$rs_call =$conn->query($sql_call);
													if($rs_call->num_rows > 0){
														$row_call = $rs_call->fetch_assoc();
														$stock_only_call_item = $row_call['qty'];
													}
													 ?>
													 <tr>
 														<td style="font-weight:bold;" colspan="4">
 															Total Sold <?= getDataBack($conn,'tbl_product','id',$p_id,'name'); ?>
 															on this bill: <span style="color:#6e8c0a;font-size:18px;"> (<?= $stock_only_call_item ?>) </span>  </td>
 													</tr>
										    <?php }} ?>

										  </tbody>
										</table>
		<!-- /Main Wrapper -->
