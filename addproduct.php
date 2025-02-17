

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
							<div  style="display:flex" >
								<div style="width:100%" class="">
									<h4>Product Add</h4>
									<h6>Create new product</h6>
								</div>

							</div>

						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/add_product.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="redir" value="<?php if(isset($_REQUEST['redir'])){ echo $_REQUEST['redir']; } ?>">
						<div class="card">
							<div class="card-body">
								<div class="row">

									<?php
									if( isset($_SESSION["category"])  ){
										$category_id = $_SESSION["category"];
										$sub_category_id = $_SESSION["sub_category"];
									}else{
										$category_id = 0;
										$sub_category_id = 0;
									}
									 ?>
									<div class="col-lg-6 col-sm-6 col-12">
										<div class="form-group">
											<label>Category</label>
											<select name="category_id"class="select" required>
												<option>Choose Category</option>
												<?php

												$sqlSub = "SELECT * FROM tbl_category";
												$rsSub = $conn->query($sqlSub);
												if($rsSub->num_rows >0){
													while($rowSub = $rsSub->fetch_assoc()){
														if($rowSub['id']==$category_id){ ?>
															<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
														<?php }else{ ?>
															<option value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
														<?php }}} ?>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6 col-12">
										<div class="form-group">
											<label>Sub Category</label>
											<select name="sub_cat_id"class="select">
												<option>Choose Sub Category</option>
												<?php

												$sqlSub = "SELECT * FROM tbl_sub_category";
												$rsSub = $conn->query($sqlSub);
												if($rsSub->num_rows >0){
													while($rowSub = $rsSub->fetch_assoc()){
														if($rowSub['id']==$sub_category_id){ ?>
															<option selected value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
														<?php }else{ ?>
															<option value="<?= $rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
														<?php }}} ?>
											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Product Name</label>
											<input name="name" type="text" required>
										</div>
									</div>

									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Brand</label>
											<select name="brand_id" class="select" required>
												<option>Choose Brand</option>
												<?php
												$sql = "SELECT * FROM tbl_brand";
												$rs = $conn->query($sql);
												if($rs->num_rows >0){
													while($row = $rs->fetch_assoc()){ ?>
													 <option value="<?=$row['id'] ?>"><?= $row['name'] ?></option>
											 <?php }} ?>

											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Size</label>
											<select name="unit_id" class="select" required>
												<option>Choose Size</option>
												<?php
												$sql = "SELECT * FROM tbl_unit";
												$rs = $conn->query($sql);
												if($rs->num_rows >0){
													while($row = $rs->fetch_assoc()){ ?>
													 <option value="<?=$row['id'] ?>"><?= $row['unit_name'] ?></option>
											 <?php }} ?>

											</select>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Barcode</label>
											<input name="barcode" type="text" autofocus required>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Minimum Qty</label>
											<input name="minimum_quantity" type="text" required>
										</div>
									</div>
									
								
	                <div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Date </label>
											<div class="input-groupicon">
												<input name="manual_date" type="date" placeholder="Choose Date" value="<?= date('m-d-Y') ?>"class="form-control" required>
												<!-- <div class="addonset">
													<img src="assets/img/icons/calendars.svg" alt="img">
												</div> -->
											</div>
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>Description</label>
											<textarea name="description" class="form-control"></textarea>
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>Stock Description</label>
											<textarea name="st_description" class="form-control"></textarea>
										</div>
									</div>

									<div class="col-lg-4 col-sm-6 col-12">
										<div class="form-group">
											<label>Discount Type</label>
											<input name="discount" type="text" required>
										</div>
									</div>
									<div class="col-lg-4 col-sm-6 col-12">
										<div class="form-group">
											<label>Price</label>
											<input name="price" type="text" required>
										</div>
									</div>
									<div class="col-lg-4 col-sm-6 col-12">
										<div class="form-group">
											<label>	Status</label>
											<select name="status" class="select" required>
												<option value="1">Available</option>
												<option value="0">Unavailable</option>
											</select>
										</div>
									</div>
									
									
									<!-- <div class="col-lg-12">
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
									</div> -->
									<div class="col-lg-12">
										<button type="submit" class="btn btn-submit me-2">Submit</button>
										<a href="productlist.php" class="btn btn-cancel">Cancel</a>
									</div>
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
