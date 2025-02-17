

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
							<h4>Import Transfer</h4>
							<h6>Add/Update Transfer</h6>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>From</label>
										<select class="select">
											<option>Choose</option>
											<option>Store 1</option>
											<option>Store 2</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>To</label>
										<select class="select">
											<option>Choose</option>
											<option>Store 1</option>
											<option>Store 2</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label> Status </label>
										<select class="select">
											<option>Select</option>
											<option>Completed</option>
											<option>Inprogress</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12 col-sm-6 col-12">
									<div class="row">
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<a class="btn btn-submit w-100">Download Sample File</a>
											</div>
										</div>
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
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Shipping</label>
										<input type="text" value="0">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
									<a href="javascript:void(0);"  class="btn btn-cancel">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

    </body>
</html>
