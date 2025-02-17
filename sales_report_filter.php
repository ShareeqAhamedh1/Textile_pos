

			<!-- Header -->
			<?php include 'layouts/header.php'; ?>
			<!-- Header -->

			<!-- Sidebar -->
			<?php include 'layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">

					<!-- Button trigger modal -->
					<div class="row">
						<div class="col-lg-8">
							<div class="form-group">
							<label for="">Select Product</label>
								<select class=" js-states form-control"  name="" id="product_id">
									<option value="">Select Product</option>
									<?php
										$sql_product = "SELECT * FROM tbl_product";
										$rs_prod = $conn->query($sql_product);

										if($rs_prod->num_rows > 0){
											while($row_prod = $rs_prod->fetch_assoc()){
									 ?>
									<option value="<?= $row_prod['id'] ?>"><?= $row_prod['name'] ?></option>
								<?php } } ?>
								</select>
						</div>
						</div>
						<div class="col-12">
							<button class="btn btn-success" name="button" onclick="searchSlot()">Search Item</button>


						</div>
					</div>

					<div class="row">

						<div class="col-lg-12 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">
								<br><br>
									<div class="table-responsive dataview" id="filter_product">

									</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
		<!-- /Main Wrapper -->

		<?php include 'layouts/footer.php' ?>
		<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script type="text/javascript">


				jQuery(document).ready(function($) {
				// Your code using $ as a shortcut for jQuery
				$('.js-states').select2();
				});

				function searchSlot(){
				 var prodd_id = document.getElementById('product_id').value;

				 $('#filter_product').load('sales_report_table.php',{
					  p_id:prodd_id
					}
				);
				}
		</script>
	</body>
</html>
