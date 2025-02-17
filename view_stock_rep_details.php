<?php include './layouts/header.php'; ?>


			<!-- Header -->


			<?php
			if(!isset($_REQUEST['id'])){
			  header('location:./view_stock_rep.php');
			  exit();
			}else{
			  $st_rep_id = $_REQUEST['id'];
			  $stock_date =  getDataBack($conn,'tbl_stock_tally_date','st_tally_id',$st_rep_id,'st_tally_date');
			  $stock_ref =  getDataBack($conn,'tbl_stock_tally_date','st_tally_id',$st_rep_id,'st_tally_ref');
			} ?>


			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="row">
							<div class="col-4">

								<div class="page-title">
									<h4>Telly Stock</h4>
									<h6>Telly Stock Reference: <?= $stock_ref ?></h6>
									<h6>Telly Stock Date: <?= $stock_date ?></h6>
								</div>
							</div>
							<div class="col-8">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label>BARCODE</label>
											<input name="barcode" id="barcode" type="text" class="form-control">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
										<label for="">Select Product</label>
											<select class="form-control"  name="" id="p_disable_id" disabled>
												<option value="">Select Product Using Barcode</option>
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
								</div>


							</div>
						</div>

					</div>
					<!-- /add -->



						<div class="card">
							<div class="card-body">
								<div class="row">
									<input type="hidden" name="id" id="stock_id" value="<?= $st_rep_id ?>">
									<div class="col-lg-12">
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
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
										<label for="">SELECT ADD OR SUBTRACT STOCK</label>
											<select class="form-control"  name="" id="add_sub">
												<option value="1">ADD</option>
												<option value="2">SUBTRACT</option>
											</select>
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
											<label>Expiry Date</label>
											<input id="expiry_date" name="expiry_date" type="date" class="form-control">
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Note</label>
											<input id="note" name="note" type="text" class="form-control">
										</div>
									</div><br><br>


									<div class="col-lg-12">
										<button onclick="addStock()" type="submit" class="btn btn-submit me-2">Add to Stock</button>||
										<a onclick="ExportToExcel('xlsx')" class="btn btn-success">Export To Excel</a>
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

		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>
		<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
		<script src="assets/plugins/select2/js/select2.min.js"></script>
				<script src="assets/plugins/select2/js/custom-select.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
  $('#stock_table').load('tally_stock_ajax.php',{st_ref_id:<?= $st_rep_id ?>});
});

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('tally_excel');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('tally_stock_sheet.' + (type || 'xlsx')));
        }
		jQuery(document).ready(function($) {
		// Your code using $ as a shortcut for jQuery
		$('.js-states').select2();
		});

		function addStock() {
		  var ref_id = document.getElementById('stock_id').value;
		  var p_id = document.getElementById('product_id').value;
		  var qnty = document.getElementById('quantity').value;
		  var exp_date = document.getElementById('expiry_date').value;
		  var note_date = document.getElementById('note').value;
		  var add_sub = document.getElementById('add_sub').value;

		  $.ajax({
		    method: "POST",
		    url: "./backend/add_table_tele_stock.php",
		    data: {
		      r_id: ref_id,
		      prod_id: p_id,
		      quantity: qnty,
		      expiry_date: exp_date,
		      note: note_date,
		      add_or_sub: add_sub
		    },
		    success: function(dataResult) {
		      var id = <?= $st_rep_id ?>;
		      var dataResult = JSON.parse(dataResult);
		      if (dataResult.statusCode == 200) {
		        $('#stock_table').load('tally_stock_ajax.php', { st_ref_id: id });
		      }
		    }
		  });
		}

		function del_stock_record(t_id) {
			var confirmed = confirm("Are you sure you want to delete this stock record?");
			 if (confirmed) {
								 $.ajax({
				   method: "POST",
				   url: "./backend/delete_table_tele_stock.php",
				   data: { tally_id: t_id },
				   async: true, // Set asynchronous behavior
				   success: function(dataResult) {
				     var dataResult = JSON.parse(dataResult);
						 if(dataResult.statusCode == 200){
							 jQuery(document).ready(function($) {
								  $('#stock_table').load('tally_stock_ajax.php', { st_ref_id: <?= $st_rep_id ?> });
								});
						 }
				   }
				 });

				}
		}






		</script>
		<script>
		document.getElementById('barcode').addEventListener('change', function() {
	  var barcode = this.value;

	  // Send an AJAX request to retrieve the product ID
	  var xhr = new XMLHttpRequest();
	  xhr.open('POST', 'get_product_id.php', true);
	  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	  xhr.onreadystatechange = function() {
	    if (xhr.readyState === 4 && xhr.status === 200) {
	      // Update the product_id input field with the retrieved product ID
	      var prod_id = xhr.responseText;

	      var prodName = document.getElementById('product_id');

	      setTimeout(function() {
	        for (var i = 0; i < prodName.options.length; i++) {
	          if (prodName.options[i].value === prod_id) {
	            prodName.options[i].selected = true;
	            break;
	          }
	        }
	      }, 0);

				var prodName_show = document.getElementById('p_disable_id');
				setTimeout(function() {
	        for (var i = 0; i < prodName_show.options.length; i++) {
	          if (prodName_show.options[i].value === prod_id) {
	            prodName_show.options[i].selected = true;
	            break;
	          }
	        }
	      }, 0);
	    }
	  };
	  xhr.send('barcode=' + barcode);
	});

</script>


    </body>
</html>
