<?php include './layouts/header.php'; ?>

			<?php
			if(!isset($_SESSION['stock_ref']) || !isset($_SESSION['stock_date'])){
				header('location:./update_stock_grm.php');
				exit();
			}else{
				$stock_date = $_SESSION['stock_date'];
				$stock_ref = $_SESSION['stock_ref'];
				$stock_id = $_REQUEST['id'];
			} ?>


			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Update Stock</h4>
							<h6>Stock Reference: <?= $stock_ref ?></h6>
							<h6>Stock Date: <?= $stock_date ?></h6>
						</div>
						<a href="addproduct.php?redir=1" class="btn btn-primary">Add Product</a>

					</div>
					<!-- /add -->

						<?php
						if( isset($_SESSION["barcode"])  ){
							$barcode = $_SESSION["barcode"];
							$shipping_type = $_SESSION["shipping_type"];
						}else{
							$barcode = "";
							$shipping_type = "";
						}

						if(isset($_SESSION['barcode_new'])){
							$barcode = $_SESSION['barcode_new'];
						}
						 ?>
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
									<input type="hidden" name="id" value="<?= $stock_id ?>">
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
										<label for="">Select Product</label>
											<select class=" js-states form-control"  name="" onchange="addValue(this.value)">
												<option value="">Select Product</option>
												<?php
													$sql_product = "SELECT * FROM tbl_product WHERE barcode!= ''";
													$rs_prod = $conn->query($sql_product);

													if($rs_prod->num_rows > 0){
														while($row_prod = $rs_prod->fetch_assoc()){
												 ?>
												<option value="<?= $row_prod['barcode'] ?>"><?= $row_prod['name'] ?></option>
											<?php } } ?>
											</select>
									</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Barcode</label>

												<input name="barcode" type="text" id="getBarcode" value="<?= $barcode ?>">

										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Quantity</label>
											<input name="quantity" id="quantity" type="number" class="form-control">
										</div>
									</div>
									
									
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Note</label>
											<input id="note" name="note" type="text" class="form-control">
										</div>
									</div>
									
									
									<div class="col-lg-12 col-sm-12 col-12">
										<select class="form-control" id="pbarc" name="" disabled>
											<option value="">View Product By Barcode Scan</option>
											<?php
												$sql_product = "SELECT * FROM tbl_product WHERE barcode!= ''";
												$rs_prod = $conn->query($sql_product);

												if($rs_prod->num_rows > 0){
													while($row_prod = $rs_prod->fetch_assoc()){
											 ?>
											<option value="<?= $row_prod['barcode'] ?>"><?= $row_prod['name'] ?></option>
										<?php } } ?>
										</select>
									</div> <br> <br><br>


									<div class="col-lg-12">
										<button onclick="addStock()" type="submit" class="btn btn-submit me-2">Add to Stock</button>
										<!-- <a href="javascript:void(0)" class="btn btn-cancel">Cancel</a> -->
									</div>
								</div>
							</div>
						</div>



					<div id="stock_table" class="table-responsive" style="height:300px;">

					</div>
					<!-- /add -->
				</div>
			</div>
        </div>
				<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								 <h5 class="modal-title" >Edit Stock Value</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">
								<div id="editView">

								</div>

							</div>
						</div>
					</div>
				</div>
		<!-- /Main Wrapper -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/plugins/select2/js/custom-select.js"></script>
		<?php include './layouts/footer.php' ?>

		<script type="text/javascript">
		$(document).ready(function() {
    $('.js-states').select2();
	});


			$('#stock_table').load('stock_table.php',{id:<?= $stock_id ?>});

			function addStock(){
				var u_id = <?= $u_id ?>;
				var id = <?= $stock_id ?>;
				var barcode = document.getElementById('getBarcode').value;
				var quantity = document.getElementById('quantity').value;
				// var shipping_type = document.getElementById('shipping_type').value;/
				// var expiry_date = document.getElementById('expiry_date').value;
				var note = document.getElementById('note').value;
				// var box_num = document.getElementById('box_num').value;
				// var sPoint =document.getElementById('s_point').value;
				document.getElementById('quantity').value ="";
				// document.getElementById('expiry_date').value="";
				document.getElementById('note').value="";

				$.ajax({
						method: "POST",
						url: "./backend/update_stock.php",
						data:{
							user_id: u_id,
							id: id,
							barcode: barcode,
							quantity:quantity,
							// shipping_type:shipping_type,
							// expiry_date:expiry_date,
							note:note,
							// box:box_num,
							// s_point:sPoint
						},
						success: function(dataResult){
							var id = <?= $stock_id ?>;
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#stock_table').load('stock_table.php',{id:id});
							}
							else {
								alert('something went wrong');
							}
						}
						});
			}
			function del_stock_record(rec_id) {
				var id = <?= $stock_id ?>;
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
							url: "./backend/del_stock_rec.php",
							data:{stock_id: rec_id},
							success: function(dataResult){
								var dataResult = JSON.parse(dataResult);
								if(dataResult.statusCode==200){
									$('#stock_table').load('stock_table.php',{id:id});
								}
								else {
									alert('something went wrong');
								}
							}
							});

				});
			}

			function addValue(id){
				document.getElementById('getBarcode').value =id;
			}

			$(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  		});

			let code = "";
			let reading = false;

			document.addEventListener('keypress', e => {
			  //usually scanners throw an 'Enter' key at the end of read
			   if (e.keyCode === 13) {
			          if(code.length > 10) {
			            document.getElementById('barcode-input').value = code;
									$('#product_view').load('pos_table.php',{ barcode : code });
			            /// code ready to use
			            code = "";
			         }
			    } else {
			        code += e.key; //while this is not an 'enter' it stores the every key
			    }

			    //run a timeout of 200ms at the first read and clear everything
			    if(!reading) {
			        reading = true;
			        setTimeout(() => {
			            code = "";
			            reading = false;
			        }, 200);  //200 works fine for me but you can adjust it
			    }
			});

			const elem = document.getElementById("getBarcode");

elem.addEventListener("keypress", (event)=> {
    if (event.keyCode === 13) { // key code of the keybord key
	 		document.getElementById("pbarc").value = elem.value;
    }
  });

			// function selectProd(barc){
			// 	document.getElementById("pbarc").value = barc;
			// }

			function loadValue(id){
				$('#editView').load('editStockValue.php',{ st_id : id, page_id:<?= $stock_id ?> });
			}
		</script>

    </body>
</html>
