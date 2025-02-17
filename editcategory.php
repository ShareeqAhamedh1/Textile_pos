

			<!-- Header -->
			<?php include './layouts/header.php';
			$cat_id = $_REQUEST['cat_id']; ?>

			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Product Add Category</h4>
							<h6>Create new product Category</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/edit_category.php" method="post">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-12">
										<div class="form-group">

											<label>Category Name</label>
											<?php
											$sql = "SELECT * FROM tbl_category WHERE id='$cat_id'";
											$rs = $conn->query($sql);
											if($rs->num_rows >0){
												while($row = $rs->fetch_assoc()){ ?>
													<input name="name" type="text" value="<?= $row['name'] ?>" >
													<input type="hidden" name="id" value="<?= $row['id'] ?>">
											<?php }} ?>
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group">
											<label>	New Category Image</label>
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
										<button type="submit" class="btn btn-submit me-2">Update</button>
										<a href="categorylist.php" class="btn btn-cancel">Cancel</a>
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
