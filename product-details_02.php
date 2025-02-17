

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
							<h4>Product List</h4>
							<h6>Manage your products</h6>
						</div>
						<div class="page-btn">
							<a href="addproduct.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
						</div>
					</div>


					<!-- /product list -->
					<div class="card">
						<div class="card-body">
							<div class="table-top">
								<div class="search-set">
									<div class="search-path">
										<a class="btn btn-filter" id="filter_search">
											<img src="assets/img/icons/filter.svg" alt="img">
											<span><img src="assets/img/icons/closes.svg" alt="img"></span>
										</a>
									</div>
									<div class="search-input">
										<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
									</div>
								</div>
								<div class="wordset">
									<ul>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Filter -->
							<div class="card mb-0" id="filter_inputs">
								<div class="card-body pb-0">
									<div class="row">
										<div class="col-lg-12 col-sm-12">
											<div class="row">
												<!-- <div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<input type="text" name="barcode" class="form-control" placeholder="Product Name" >
													</div>
												</div> -->
												<div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select id="select1" class="select">
															<option value="0">Choose Category</option>
															<?php
													    $sql = "SELECT * FROM tbl_category";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div>
												<div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select id="select2" class="select">
															<option value="0">Choose Sub Category</option>
															<?php
													    $sql = "SELECT * FROM tbl_sub_category";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div>
												<div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select id="select3" class="select">
															<option value="0">Choose Brand</option>
															<?php
													    $sql = "SELECT * FROM tbl_brand";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div>
												<div class="col-lg-1 col-sm-6 col-12">
													<div class="form-group">
														<a onclick="getResults()" class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Filter -->
							<div id="product_table" class="table-responsive">

							</div>
						</div>
					</div>
					<!-- /product list -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		<?php include './layouts/footer.php'; ?>

		<script type="text/javascript">

		$('#product_table').load('product_table.php');

		function selectCategory(){
			return document.getElementById('select1').value;
		}
		function selectSubCategory(){
			return document.getElementById('select2').value;
		}
		function selectBrand(){
			return document.getElementById('select3').value;
		}

		function getResults(){
			cat_id = selectCategory();
			sub_cat_id = selectSubCategory();
			brand_id = selectBrand();
			$('#product_table').load('product_table.php',{
				cat_id : cat_id,
				sub_cat_id : sub_cat_id,
				brand_id: brand_id
			});
		}

		function del_prod(id) {
			Swal.fire({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				type: "warning",
				showCancelButton: !0,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Yes, delete it!",
				confirmButtonClass: "btn btn-primary",
				cancelButtonClass: "btn btn-danger ml-1",
				buttonsStyling: !1,
			}).then(function (t) {

				t.value &&
				$.ajax({
						method: "POST",
						url: "./backend/del_product.php",
						data:{prod_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#product_table').load('product_table.php');
							}
						}
						});

				t.value &&
					Swal.fire({
						type: "success",
						title: "Deleted!",
						text: "Your file has been deleted.",
						confirmButtonClass: "btn btn-success",
					});



			});
		}

		</script>



    </body>
</html>
