

			<!-- Header -->
			<?php include './layouts/header.php';
			$product_id = $_REQUEST['id']; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Product Update</h4>
							<h6>Update Product Details</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/edit_product.php" method="post" enctype="multipart/form-data">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<?php
									$sql = "SELECT * FROM tbl_product WHERE id='$product_id'";
									$rs = $conn->query($sql);
									if($rs->num_rows >0){
										while($row = $rs->fetch_assoc()){ ?>
											<input type="hidden" name="id" value="<?= $row['id'] ?>">
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Product Name</label>
													<input name="name" value="<?= $row['name'] ?>" type="text" >
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Category</label>
													<select name="category_id"class="select">
														<option>Choose Category</option>
														<?php
														$cat_id = $row['category_id'];
														$sqlSub = "SELECT * FROM tbl_category";
														$rsSub = $conn->query($sqlSub);
														if($rsSub->num_rows >0){
															while($rowSub = $rsSub->fetch_assoc()){
																if($rowSub['id']==$cat_id){ ?>
																	<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }else{ ?>
																	<option value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }}} ?>
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Sub Category</label>
													<select name="sub_cat_id" class="select">
														<option>Choose Sub Category</option>
														<?php
														$cat_id = $row['sub_category_id'];
														$sqlSub = "SELECT * FROM tbl_sub_category";
														$rsSub = $conn->query($sqlSub);
														if($rsSub->num_rows >0){
															while($rowSub = $rsSub->fetch_assoc()){
																if($rowSub['id']==$cat_id){ ?>
																	<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }else{ ?>
																	<option value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }}} ?>
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Brand</label>
													<select name="brand_id"class="select">
														<option>Choose Brand</option>
														<?php
														$cat_id = $row['brand_id'];
														$sqlSub = "SELECT * FROM tbl_brand";
														$rsSub = $conn->query($sqlSub);
														if($rsSub->num_rows >0){
															while($rowSub = $rsSub->fetch_assoc()){
																if($rowSub['id']==$cat_id){ ?>
																	<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }else{ ?>
																	<option value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
																<?php }}} ?>
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Unit</label>
													<select name="unit_id"class="select">
														<option>Choose Unit</option>
														<?php
														$cat_id = $row['unit'];
														$sqlSub = "SELECT * FROM tbl_unit";
														$rsSub = $conn->query($sqlSub);
														if($rsSub->num_rows >0){
															while($rowSub = $rsSub->fetch_assoc()){
																if($rowSub['id']==$cat_id){ ?>
																	<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['unit_name'] ?></option>
																<?php }else{ ?>
																	<option value="<?= $rowSub['id'] ?>"><?= $rowSub['unit_name'] ?></option>
																<?php }}} ?>
													</select>
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Barcode</label>
													<input value="<?= $row['barcode'] ?>" name="barcode" type="text" >
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Minimum Qty</label>
													<input value="<?= $row['minimum_quantity'] ?>" name="minimum_quantity" type="text" >
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Quantity</label>
													<input value="<?= $row['quantity'] ?>" name="quantity" type="text" >
												</div>
											</div>
											
			                <div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Date </label>
													<div class="input-groupicon">
														<input name="manual_date" type="text" placeholder="Choose Date" value="<?= $row['manual_date'] ?>" class="datetimepicker">
														<div class="addonset">
															<img src="assets/img/icons/calendars.svg" alt="img">
														</div>
													</div>
												</div>
											</div>

											<div class="col-lg-12">
												<div class="form-group">
													<label>Description</label>
													<textarea name="description" class="form-control"><?= $row['description'] ?></textarea>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Stock Description</label>
													<textarea name="st_description" class="form-control"></textarea>
												</div>
											</div>

											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Discount</label>
													<input name="discount" value="<?= $row['discount'] ?>" type="text" >
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>Price</label>
													<input name="price" value="<?= $row['price'] ?>" type="text" >
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<label>	Status</label>
													<select name="status" class="select">
														<?php
														if($row['status']==1){ ?>
														<option selected value="1">Available</option>
														<option value="0">Unavailable</option>
													<?php }else{ ?>
														<option value="1">Available</option>
														<option selected value="0">Unavailable</option>
													<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>	Product Image</label>
													<div class="image-upload">
														<input name="image" type="file">
														<div class="image-uploads">
															<img src="assets/img/icons/upload.svg" alt="img">
															<h4>Drag and drop a file to upload</h4>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-submit me-2">Submit</button>
												<a href="productlist.php" class="btn btn-cancel">Cancel</a>
											</div>
									<?php }} ?>
								</div>
							</div>
						</div>
					</form>
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    <?php include './layouts/footer.php' ?>

    </body>
</html>
