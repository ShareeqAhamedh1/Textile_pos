

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
							<h4>Pricing Adjustment</h4>
							<h6>Manage your product Price</h6>
						</div>
						<div class="page-btn">
							<a href="addproduct.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
						</div>
					</div>


					<!-- /product list -->
					<div class="card">
						<div class="card-body">
							<div class="table-top">
								<div class="wordset">
									<ul>
										<!-- <li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf" onclick="Export()"><img src="assets/img/icons/pdf.svg" alt="img"></a>
										</li> -->
										<li>
											<a href="backend/download_pricelist.php" data-bs-toggle="tooltip" data-bs-placement="top" title="excel" ><img src="assets/img/icons/excel.svg" alt="img"></a>
										</li>
										<!-- <li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
										</li> -->
									</ul>
								</div>
							</div>
							<!-- /Filter -->

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
			$('#product_table').load('product_price_table.php');

      function updatePrice(p_id,input_id){
        var card_price = document.getElementById('price_'+input_id).value;

        $.ajax({
          url: "backend/update_price.php",
          method: "POST",
          data: {
            cPrice:card_price,
            pId:p_id
          },
          success: function(response) {
            if (response === "success") {
               document.getElementById('update_status').style.display = "block";
            } else if (response === "change_error") {
              alert('Something Went Wrong With Your Update');
            }
          }
        });
      }

		</script>



    </body>
</html>
