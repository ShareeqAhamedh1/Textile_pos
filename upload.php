

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
							<h4>Brand ADD</h4>
							<h6>Create new Brand</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/upload.php" method="post" enctype="multipart/form-data">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Brand Name</label>
											<input name="name" type="text" >
										</div>
									</div>


									<div class="col-lg-12">
										<div class="form-group">
											<label>	Product Image</label>
											<div class="image-upload">
												<input name="csv_file" type="file">
												<div class="image-uploads">
													<img src="assets/img/icons/upload.svg" alt="img">
													<h4>Drag and drop a file to upload</h4>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<button type="submit"  class="btn btn-submit me-2">Submit</button>
										<a href="brandlist.php" class="btn btn-cancel">Cancel</a>
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
