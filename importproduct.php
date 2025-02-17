

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
							<h4>Import Products</h4>
							<h6>Bulk upload your products</h6>
						</div>
					</div>

					<!-- /product list -->
					<div class="card">
						<div class="card-body">
							<div class="requiredfield">
								<h4>Field must be in csv format</h4>
							</div>
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<a class="btn btn-submit w-100">Download Sample File</a>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>	Upload CSV File</label>
										<div class="image-upload">
											<input type="file">
											<div class="image-uploads">
												<img src="assets/img/icons/upload.svg" alt="img">
												<h4>Drag and drop a file to upload</h4>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="productdetails productdetailnew">
										<ul class="product-bar">
											<li>
												<h4>Product Name</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>Category</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>SKU code</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>Product Cost</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>Product Price</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>Product Unit</h4>
												<h6 class="manitorygreen">This Field is required</h6>
											</li>
											<li>
												<h4>Description</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="productdetails productdetailnew">
										<ul class="product-bar">
											<li>
												<h4>Minimum Qty</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
											<li>
												<h4>Quantity</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
											<li>
												<h4>Tax</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
											<li>
												<h4>Discount Type</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
											<li>
												<h4>Brand</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
											<li>
												<h4>Minimum Qty</h4>
												<h6 class="manitoryblue">Field optional</h6>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mb-0">
										<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
										<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /product list -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

    </body>
</html>
