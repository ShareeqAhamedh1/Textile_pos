

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
								<h4>Brand List</h4>
								<h6>Manage your Brand</h6>
							</div>
							<div class="page-btn">
								<a href="addbrand.php" class="btn btn-added"><img src="assets/img/icons/plus.svg"  class="me-2" alt="img">Add Brand</a>
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
								<div class="card" id="filter_inputs">
									<div class="card-body pb-0">
										<div class="row">
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<input type="text" placeholder="Enter Brand Name">
												</div>
											</div>
											<div class="col-lg-3 col-sm-6 col-12">
												<div class="form-group">
													<input type="text" placeholder="Enter Brand Description">
												</div>
											</div>
											<div class="col-lg-1 col-sm-6 col-12 ms-auto">
												<div class="form-group">
													<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Filter -->
								<div id="brand_table" class="table-responsive">

								</div>
							</div>
						</div>
						<!-- /product list -->
					</div>
				</div>
			</div>
			<!-- /Main Wrapper -->

			<?php include './layouts/footer.php' ?>

			<script type="text/javascript">

			$('#brand_table').load('brand_table.php');

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
							url: "./backend/del_brand.php",
							data:{brand_id: id},
							success: function(dataResult){
								var dataResult = JSON.parse(dataResult);
								if(dataResult.statusCode==200){
									$('#brand_table').load('brand_table.php');
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
