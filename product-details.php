<?php include './layouts/header.php';
$product_id = $_REQUEST['id'];
$u_id = $_SESSION['u_id'];
?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Product Details</h4>
							<h6>Full details of a product</h6>
						</div>
					</div>
					<!-- /add -->
					<?php
					$sql = "SELECT * FROM tbl_product WHERE id='$product_id'";
					$rs = $conn->query($sql);
						$row = $rs->fetch_assoc(); ?>
					<div class="row">
						<div class="col-lg-8 col-sm-12">
							<div class="card">
								<div class="card-body">

    									<div class="productdetails">
    										<ul class="product-bar">
    											<li>
    												<h4>Product</h4>
    												<h6><?= $row['name'] ?></h6>
    											</li>
    											<li>
    												<h4>Category</h4>
                            <?php
                            $cat_id = $row['category_id'];
          									$sqlSub = "SELECT * FROM tbl_category WHERE id='$cat_id'";
          									$rsSub = $conn->query($sqlSub);
          									if($rsSub->num_rows >0){
          										while($rowSub = $rsSub->fetch_assoc()){ ?>
    												    <h6><?= $rowSub['name'] ?></h6>
                            <?php }} ?>
    											</li>
    											<li>
    												<h4>Sub Category</h4>
                            <?php
                            $cat_id = $row['sub_category_id'];
          									$sqlSub = "SELECT * FROM tbl_sub_category WHERE id='$cat_id'";
          									$rsSub = $conn->query($sqlSub);
          									if($rsSub->num_rows >0){
          										while($rowSub = $rsSub->fetch_assoc()){ ?>
    												    <h6><?= $rowSub['name'] ?></h6>
                            <?php }} ?>
    											</li>
    											<li>
    												<h4>Brand</h4>
                            <?php
                            $cat_id = $row['brand_id'];
          									$sqlSub = "SELECT * FROM tbl_brand WHERE id='$cat_id'";
          									$rsSub = $conn->query($sqlSub);
          									if($rsSub->num_rows >0){
          										while($rowSub = $rsSub->fetch_assoc()){ ?>
    												    <h6><?= $rowSub['name'] ?></h6>
                            <?php }} ?>
    											</li>
    											<li>
    												<h4>Unit</h4>
                            <?php
                            $cat_id = $row['unit'];
          									$sqlSub = "SELECT * FROM tbl_unit WHERE id='$cat_id'";
          									$rsSub = $conn->query($sqlSub);
          									if($rsSub->num_rows >0){
          										while($rowSub = $rsSub->fetch_assoc()){ ?>
    												    <h6><?= $rowSub['unit_name'] ?></h6>
                            <?php }} ?>
    											</li>
    											<li>
    												<h4>Barcode</h4>
    												<h6><?= $row['barcode'] ?></h6>
    											</li>
    											<li>
    												<h4>Minimum Qty</h4>
    												<h6><?= $row['minimum_quantity'] ?></h6>
    											</li>

    											<li>
    												<h4>Discount </h4>
    												<h6><?= $row['discount'] ?></h6>
    											</li>
    											<li>
    												<h4>Price</h4>
    												<h6><?= $row['price'] ?></h6>
    											</li>
    											<li>
    												<h4>Status</h4>
                            <?php if ($row['status']==1){ ?>
                              <h6>Available</h6>
                            <?php }else{ ?>
    												  <h6>Unavailable</h6>
                            <?php } ?>
    											</li>
    											<li>
    												<h4>Description</h4>
    												<h6><?= $row['description'] ?></h6>
    											</li>
                          <li>
							</div>

								</div>
							</div>
						</div>
						<?php if($row['image'] != ""){ ?>
						<div class="col-lg-4 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="slider-product-details">
										<div class="owl-carousel owl-theme product-slide">
											<div class="slider-product">
												<img src="<?= $row['image'] ?>" alt="img">

											</div>
											<!-- <div class="slider-product">
												<img src="assets/img/product/product69.jpg" alt="img">
												<h4>macbookpro.jpg</h4>
												<h6>581kb</h6>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="container">
						<table class="table">
							<thead>
								<tr>
									<th>Quantity</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$id = $product_id;
							    $redStoc = 0;
							    $redStocCall = 0;

						      $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$id'";
						      $rsMinStock = $conn->query($sqlMinStock);

						      if($rsMinStock->num_rows > 0){
						        $rowMinStock = $rsMinStock->fetch_assoc();
						        $redStoc = $rowMinStock['qnty'];
						      }

						      $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$id' AND status !='0' AND status !='1'";
						      $rsMinStockCall = $conn->query($sqlMinStockCall);

						      if($rsMinStockCall->num_rows > 0){
						        $rowMinStockCall = $rsMinStockCall->fetch_assoc();
						        $redStocCall = $rowMinStockCall['qnty_call'];
						      }

						      $redStoc +=$redStocCall;

							   $st_tot = 0;
							   $cat_id = $row['sub_category_id'];

								 $exp_hold_date =array();
								 $current_stock = 0;
								 $tally_qnty =0;
								 $stop_status = 0;
								 $hold_qnty = 0;

								 $tot_stock_do =0;


								 								 $sql_tally_one = "SELECT SUM(new_quantity) AS qnty_add FROM tbl_tally_stock WHERE product_id='$product_id' AND add_minus='1' AND exp_date ='0000-00-00'";
								 									$rs_tally_one = $conn->query($sql_tally_one);
								 									$row_tally_one = $rs_tally_one->fetch_assoc();

								 									$tot_stock_do +=$row_tally_one['qnty_add'];

								 									$sql_tally_one = "SELECT SUM(new_quantity) AS qnty_minus FROM tbl_tally_stock WHERE product_id='$product_id' AND add_minus='2' AND exp_date ='0000-00-00'";
								 									$rs_tally_one = $conn->query($sql_tally_one);
								 									$row_tally_one = $rs_tally_one->fetch_assoc();

								 									$tot_stock_do -=$row_tally_one['qnty_minus'];

							   $sqlSub = "SELECT * FROM tbl_expiry_date WHERE product_id='$product_id' AND user_id='3' ORDER BY `tbl_expiry_date`.`expiry_date` ASC";
							   $rsSub = $conn->query($sqlSub);
							   if($rsSub->num_rows >0){

							     while($rowSub = $rsSub->fetch_assoc()){
										 $current_stock = $rowSub['quantity'];
										 $stock_exp_date = $rowSub['expiry_date'];


										 if($redStoc != 0){
										 		if($current_stock <= $redStoc){
										 			$redStoc =$redStoc - $current_stock;
										 			$current_stock = 0;
										 		}
										 	  else {
										 			$current_stock -= $redStoc;
										 			$redStoc = 0;
										 	  }
										 }
										 //end of Sales

										 if($stock_exp_date == ""){
											 if($tot_stock_do > 0){
												 $current_stock += $tot_stock_do;
												 $tot_stock_do = 0;
											 }
											 elseif ($tot_stock_do < 0) {
												 $tot_stock_do_temp = $tot_stock_do;
												 $pos_value = abs($tot_stock_do_temp);

											 if($pos_value > $current_stock){
												 $tot_stock_do +=$current_stock;
												 $current_stock =0;

											 }
											 elseif($current_stock > $pos_value){
												 $current_stock -=$pos_value;
												 $tot_stock_do = 0;
											 }

											 }
									 }
									 else {
										 if(!in_array($stock_exp_date,$exp_hold_date)){
											 $sql_tally_two = "SELECT SUM(new_quantity) AS qnty_add FROM tbl_tally_stock WHERE product_id='$product_id'
											AND add_minus='1' AND exp_date='$stock_exp_date'";
												$rs_tally_two = $conn->query($sql_tally_two);
												$row_tally_two = $rs_tally_two->fetch_assoc();

												 $tot_stock_do +=$row_tally_two['qnty_add'];


											 $sql_tally_one = "SELECT SUM(new_quantity) AS qnty_minus FROM tbl_tally_stock WHERE product_id='$product_id' AND
											 add_minus='2' AND exp_date='$stock_exp_date'";
											 $rs_tally_one = $conn->query($sql_tally_one);
											 $row_tally_one = $rs_tally_one->fetch_assoc();

											 $tot_stock_do -=$row_tally_one['qnty_minus'];
											 if($tot_stock_do > 0){
												 $current_stock += $tot_stock_do;
												 $tot_stock_do = 0;
												 $exp_hold_date[] =$stock_exp_date;
											 }
											 elseif ($tot_stock_do < 0) {
												$tot_stock_do_temp = $tot_stock_do;
												$pos_value = abs($tot_stock_do_temp);
												if($hold_qnty > 0){
													$pos_value = $hold_qnty;
												}

											if($pos_value > $current_stock){
												$hold_qnty = $pos_value - $current_stock;
												$tot_stock_do +=$current_stock;
												$current_stock =0;

											}
											elseif($current_stock >= $pos_value){
												 $current_stock -=$pos_value;
												 $tot_stock_do = 0;
												 $hold_qnty =0;
												 $exp_hold_date[] =$stock_exp_date;
											}

											}

										 }

									 }




										 //end of tally stock




										 $st_tot +=$current_stock;
							        ?>
							        <tr>
							          
							          <td>
							              <?= $current_stock ?><?= $unit ?>
							          </td>
							          <td>
													<?php if($u_id == 3){ ?>
 							           <a href="editStock.php?barcode=<?= $rowSub['barcode'] ?>&id=<?= $rowSub['id'] ?>"
 							              onclick="return confirm('Are you sure want to edit this?')"> <img src="assets/img/icons/edit.svg" alt="img"> </a>
 							           <a href="backend/delStock.php?id=<?= $rowSub['id'] ?>&pid=<?= $product_id ?>" onclick="return confirm('Are you sure want to delete this?')" > <img src="assets/img/icons/delete.svg" alt="img"> </a>
 							         <?php } ?>
							          </td>
							        </tr>
							       <?php }
										 ?>

										 <tr>
											 <td colspan="4">Total Stock Quantity: <?= $st_tot ?> </td>
										 </tr>
										 <?php
									 } ?>
							</tbody>
						</table>
					</div>

						</div>

					</div>
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

    </body>
</html>
