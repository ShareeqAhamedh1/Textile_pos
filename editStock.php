

			<!-- Header -->
			<?php include './layouts/header.php'; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<?php
			$idexp = $_REQUEST['id'];
				$sql_exp = "SELECT * FROM tbl_expiry_date WHERE id = '$idexp'";
				$rs_exp =$conn->query($sql_exp);

				if($rs_exp->num_rows > 0){
					$rowExp = $rs_exp->fetch_assoc();
				}
			 ?>

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Edit Stock</h4>
							<h6>Edit Stock of product</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/edit_stock.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $rowExp['id'] ?>">
						<?php
		          if (isset($_SESSION['invalid_barcode'])) {
		         ?>
		        <div class="alert alert-warning">
		          <h2>Invalid barcode</h2>
		        </div>
		        <?php unset($_SESSION['invalid_barcode']); } ?>

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Barcode</label>

												<input name="barcode" type="text" id="getBarcode" value="<?= $rowExp['barcode'] ?>">

										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Quantity</label>
											<input name="quantity" type="number" class="form-control" value="<?= $rowExp['quantity'] ?>">
										</div>
									</div>
									
									
									<div class="col-lg-12">
										<div class="form-group">
											<label>Note</label>
											<textarea name="note" class="form-control"><?= $rowExp['note'] ?></textarea>
										</div>
									</div>


									<div class="col-lg-12">
										<button type="submit" class="btn btn-submit me-2">Change Stock</button>
										<!-- <a href="update_stock.php" class="btn btn-cancel">Cancel</a> -->
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
