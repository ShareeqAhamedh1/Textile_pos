

			<!-- Header -->
			<?php include './layouts/header.php'; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Cardamom Orders</h4>
							<h6>View Orders</h6>
						</div>
					</div>
					<!-- /add -->


						<div  class="table-responsive">
							<table class="table  datanew">
								<thead>
									<tr>

										<th style="width:20%">Customer Name</th>
										<th>Phone Number</th>
										<th>Delivery Address</th>
										<th>City</th>
										<th>District</th>
										<th>Delivery charge</th>
										<th>Payment Method</th>
										<th>Order Date</th>

										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sqls = "SELECT * FROM tbl_orders_card";
									$rss = $conn->query($sqls);
									if($rss->num_rows >0){
										while($rows = $rss->fetch_assoc()){
												$city_id = $rows['city_id'];
												$dist_id = $rows['district_id'];
												$py_st = $rows['payment_method'];

												$city = getDataBack($conn,'cities','id',$city_id,'name_en');
												$dist = getDataBack($conn,'districts','id',$dist_id,'name_en');

												if($py_st == 1){
													$payMode = "Direct Bank Transfer";
												}
												elseif ($py_st == 2) {
													$payMode = "Cash On Delivery";
												}
												else {
													$payMode ="Something Wrong";
												}
											?>
										<tr>


											<td style="width:20%"><?= $rows['customer_name'] ?></td>
											<td><?= $rows['phone_number'] ?></td>
											<td><?= $rows['delivery_address'] ?></td>
											<td><?= $city ?></td>
											<td><?= $dist ?></td>
											<td><?= $rows['delivery_charge'] ?> </td>
											<td><?= $payMode ?> </td>
											<td><?= $rows['order_date'] ?> </td>
											<td>
												<a class="confirm-text" onclick="viewOrderItems('<?= $rows['or_id'] ?>')" href="javascript:void(0);">
													<img src="assets/img/icons/eye.svg" alt="img">
												</a>
											</td>

										</tr>
									<?php }} ?>

								</tbody>
							</table>
						</div>


					<!-- /add -->
				</div>
			</div>
        </div>
				<div style=""class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
				  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
				    <div style=""  class="modal-content">
				      <div class="modal-header">
				         <h5 class="modal-title" >Order Items</h5>
				        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">×</span>
				        </button>
				      </div>
				      <div class="modal-body" id="order_items">

				      </div>
				    </div>
				  </div>
				</div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

		<script type="text/javascript">

		function viewOrderItems(order_id){
			$('#create').modal('show');
			$('#order_items').load('ajax_pages/order_items.php',{
				or_id:order_id
			});
		}


		</script>
    </body>
</html>
