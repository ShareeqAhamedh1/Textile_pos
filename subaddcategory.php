

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
							<h4>Product Add sub Category</h4>
							<h6>Create new product Category</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/add_sub_category.php" method="post">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4 col-sm-6 col-12">
										<div class="form-group">
											<label>Parent Category</label>
											<select name="category_id"class="select">
												<option>Choose Category</option>
												<?php
												$sql = "SELECT * FROM tbl_category";
												$rs = $conn->query($sql);
												if($rs->num_rows >0){
													while($row = $rs->fetch_assoc()){ ?>
													 <option value="<?=$row['id'] ?>"><?= $row['name'] ?></option>
											 <?php }} ?>

											</select>
										</div>
									</div>
									<div class="col-lg-4 col-sm-6 col-12">
										<div class="form-group">
											<label>Sub Category Name</label>
											<input name="sub_cat_name" type="text" >
										</div>
									</div>


									<div class="col-lg-12">
										<button type="submit"  class="btn btn-submit me-2">Submit</button>
										<a href="subcategorylist.php" class="btn btn-cancel">Cancel</a>
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

		<!-- jQuery -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>

        <!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>

		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Sweetalert 2 -->
		<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
		<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

    </body>
</html>
