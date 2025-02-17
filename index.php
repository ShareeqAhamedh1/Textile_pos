			<!-- Header -->
			<?php include 'layouts/header.php'; ?>
			<!-- Header -->

			<!-- Sidebar -->
			<?php include 'layouts/sidebar.php'; ?>
			<!-- /Sidebar -->
        


			<?php
			$stock_value = 0;
			$sql_products = "SELECT * FROM tbl_product";
			$rs_prod = $conn->query($sql_products);
			if($rs_prod->num_rows > 0){
				while ($rowProd =$rs_prod->fetch_assoc()) {
					$prod_id = $rowProd['id'];
					$price = $rowProd['price'];
					$tot_qnty = currentStockCount($conn,$prod_id);
					$stock_value +=$price * $tot_qnty;
				}
			}


			  $sql_order_call = "SELECT * FROM tbl_order_temp WHERE status NOT IN (0,1)";
			  $rs_order_call = $conn->query($sql_order_call);


			  $sql_order_pos = "SELECT * FROM tbl_order";
			  $rs_order_pos = $conn->query($sql_order_pos);

			 ?>

			 			 <?php
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

			 					 $tot_bill_dis += $qnty * $p_price;
			 					 $tot_bil +=$qnty * $row_order_call['m_price'];
			 				} }
			 				?>
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
			 					 $tot_bill_dis += $qnty * $p_price;
			 					 $tot_bil += $qnty * $row_order_pos['m_price'];
			 				 } } ?>



			<div class="page-wrapper">
				<div class="content">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-12">
							<div class="dash-widget">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash1.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >Rs.<?= number_format($stock_value) ?>/-</h5>
									<h6>Total Stock Value</h6>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-4 col-sm-6 col-12">
							<div class="dash-widget dash1">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash2.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >Rs.<span class="counters" data-count="0.00">0.00</span></h5>
									<h6>Total Sales Due</h6>
								</div>
							</div>
						</div> -->
						<div class="col-lg-6 col-sm-6 col-12">
							<div class="dash-widget dash2">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash3.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >Rs.<?= number_format($tot_bill_dis) ?>/-</h5>
									<h6>Total Sales Value</h6>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-3 col-sm-6 col-12">
							<div class="dash-widget dash3">
								<div class="dash-widgetimg">
									<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
								</div>
								<div class="dash-widgetcontent">
									<h5 >Rs.<span class="counters" data-count="0.00">0.00</span></h5>
									<h6>Total Sale Amount</h6>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count">
								<div class="dash-counts">
									<h4>0</h4>
									<h5>Customers</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="user"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das1">
								<div class="dash-counts">
									<h4>0</h4>
									<h5>Unchecked Reports</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file-text"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das2">
								<div class="dash-counts">
									<h4>0</h4>
									<h5>Purchase Invoice</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file-text"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12 d-flex">
							<div class="dash-count das3">
								<div class="dash-counts">
									<h4>0</h4>
									<h5>Sales Invoice</h5>
								</div>
								<div class="dash-imgs">
									<i data-feather="file"></i>
								</div>
							</div>
						</div> -->
					</div>
					<!-- Button trigger modal -->

					<div class="row">
						<div class="col-lg-7 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header pb-0 d-flex justify-content-between align-items-center">
									<h5 class="card-title mb-0">Expired Products</h5>
									</div>
									<div class="table-responsive dataview">
										<table class="table datatable ">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Barcode</th>
													<th>Quantity</th>
													<th>Expiry Date</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$expiry = date('Y-m-d');
												$sql = "SELECT tbl_product.id AS id,tbl_product.name AS name,tbl_product.barcode AS barcode,tbl_expiry_date.expiry_date AS expiry,tbl_expiry_date.quantity AS quantity
												 					FROM tbl_product INNER JOIN tbl_expiry_date ON tbl_product.id = tbl_expiry_date.product_id
												 					WHERE date(tbl_expiry_date.expiry_date) <= '$expiry' AND user_id='$u_id' ORDER BY tbl_expiry_date.expiry_date ASC  ";
												$rs = $conn->query($sql);
												if($rs->num_rows >0){
													while($row = $rs->fetch_assoc()){
														if($row['expiry'] != ""){
														 ?>
														<tr>

															<td>
																<?= $row['name'] ?>
															</td>
															<td><?= $row['barcode'] ?></td>
															<td><?= $row['quantity'] ?></td>

															<td><?= $row['expiry'] ?></td>
														</tr>
											<?php  } }} ?>
												<!-- <tr>
													<td>1</td>

													<td class="productimgname">
														<a class="product-img" href="productlist.html">
															<img src="assets/img/product/product2.jpg" alt="product">
														</a>
														<a href="productlist.html">Orange</a>
													</td>
													<td>N/D</td>
													<td>Fruits</td>
													<td>12-12-2022</td>
												</tr> -->

											</tbody>
										</table>
									</div>




							</div>
						</div>
						<div class="col-lg-5 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header pb-0 d-flex justify-content-between align-items-center">
									<h4 class="card-title mb-0">Recently Added Products</h4>
									<div class="dropdown">
										<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
											<i class="fa fa-ellipsis-v"></i>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
											<li>
												<a href="productlist.html" class="dropdown-item">Product List</a>
											</li>
											<li>
												<a href="addproduct.html" class="dropdown-item">Product Add</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive dataview">
										<table class="table datatable ">
											<thead>
												<tr>
													<th>Product ID</th>
													<th>Product Name</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT 4";
												$rs = $conn->query($sql);
												if($rs->num_rows >0){
													while($row = $rs->fetch_assoc()){ ?>
														<tr>
															<td><?= $row['id'] ?></td>
															<td class="productimgname">
																<a href="productlist.php"><?= $row['name'] ?></a>
															</td>
															<td><?= $row['price'] ?></td>
														</tr>
											<?php }} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="card mb-0">
						<div class="card-body">
							<h4 class="card-title">Stock & Sales</h4>
							<div class="table-responsive dataview">
								<div class="graph-sets">
									<ul>
										<li>
											<span>Sales</span>
										</li>
										<li>
											<span>Stock</span>
										</li>
									</ul>
									<div class="dropdown">
										<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
											2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<li>
												<a href="javascript:void(0);" class="dropdown-item">2022</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item">2021</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item">2020</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div id="sales_charts"></div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>

		</div>
		<!-- /Main Wrapper -->

		<?php include 'layouts/footer.php' ?>


	</body>
</html>
