

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
							<h4>Stock</h4>
							<h6>Update Stock</h6>
						</div>
					</div>
					<!-- /add -->

						<?php
						// if( isset($_SESSION["barcode"])  ){
						// 	$barcode = $_SESSION["barcode"];
						// 	$shipping_type = $_SESSION["shipping_type"];
						// }else{
						// 	$barcode = "";
						// 	$shipping_type = "";
						// }
						 ?>
						<!-- <?php
		          if (isset($_SESSION['invalid_barcode'])) {
		         ?>
		        <div class="alert alert-warning">
		          <h2>Invalid barcode</h2>
		        </div>
		        <?php unset($_SESSION['invalid_barcode']); } ?> -->

						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Enter New Stock Reference</label>

												<input name="stock_ref" type="text" id="stock_ref" value="<?= $barcode ?>">

										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Date</label>
											<input name="stock_date" type="date" id="stock_date" class="form-control">
										</div>
									</div>



									<div class="col-lg-12">
										<button type="button" onclick="add_grm()" class="btn btn-submit me-2">Add</button>

									</div>
								</div>
							</div>
						</div>
						<div id="grm_table" class="table-responsive">

						</div>


					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>
		<script type="text/javascript">
			function addValue(id){
				document.getElementById('getBarcode').value =id;
			}

			$(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
	$('#grm_table').load('stock_grm_table.php');
		function add_grm() {

			var stock_ref = document.getElementById('stock_ref').value;
			var stock_date = document.getElementById('stock_date').value;
			document.getElementById('stock_ref').value = "";
			document.getElementById('stock_date').value = "";

			$.ajax({
					method: "POST",
					url: "./backend/stock_grm.php",
					data:{stock_ref: stock_ref, stock_date:stock_date},
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$('#grm_table').load('stock_grm_table.php');
						}
					}
					});

		}

		function del_stock(id) {
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
						url: "./backend/del_stock.php",
						data:{stock_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#grm_table').load('stock_grm_table.php');
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
