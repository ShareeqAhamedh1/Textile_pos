

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
							<h4>Stock List By Location</h4>
						</div>
					</div>


					<!-- /product list -->
					<div class="card">
						<div class="card-body">
							<div class="table-top">
								<div class="search-set">
									<div class="search-path">
										<a class="btn btn-filter" id="filter_search">
											<img src="assets/img/icons/filter.svg" alt="img">
											<span><img src="assets/img/icons/closes.svg" alt="img"></span>
										</a>
									</div>
									<div class="search-input" style="margin-right:10px">
										<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
									<div id="DataTables_Table_0_filter" class="dataTables_filter">
										<label>
											<input id="myInput" onkeyup="myFunction()" type="search" class="form-control form-control-sm" placeholder="Search Product" aria-controls="DataTables_Table_0">
										</label>
									</div>
								</div>
								<div class="search-input">
									<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
								<div id="DataTables_Table_0_filter" class="dataTables_filter">
									<label>
										<input id="myInput2" onkeyup="myFunction2()" type="search" class="form-control form-control-sm" placeholder="Search Barcode" aria-controls="DataTables_Table_0">
									</label>
								</div>
								</div>
							</div>
								<div class="wordset">
									<ul>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf" onclick="Export()"><img src="assets/img/icons/pdf.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel" onclick="ExportToExcel('xlsx')"><img src="assets/img/icons/excel.svg" alt="img"></a>
										</li>
										<li>
											<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Filter -->
							<div class="card mb-0" id="filter_inputs">
								<div class="card-body pb-0">
									<div class="row">
										<div class="col-lg-12 col-sm-12">
											<div class="row">
												<!-- <div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<input type="text" name="barcode" class="form-control" placeholder="Product Name" >
													</div>
												</div> -->
												<div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select onchange="myFunction3(this)" id="select1" class="select">
															<option value="0">Choose GRM ref</option>
															<?php
													    $sql = "SELECT * FROM tbl_stock_grm";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['id'] ?>"><?= $row['stock_ref'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div>
												<div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select onchange="myFunction4(this)" id="select2" class="select">
															<option value="0">Choose Box Number</option>
															<?php
													    $sql = "SELECT DISTINCT box_number FROM tbl_expiry_date";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['box_number'] ?>"><?= $row['box_number'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div>
												<!-- <div class="col-lg col-sm-6 col-12">
													<div class="form-group">
														<select id="select3" class="select">
															<option value="0">Choose Brand</option>
															<?php
													    $sql = "SELECT * FROM tbl_brand";
													    $rs = $conn->query($sql);
													    if($rs->num_rows >0){
													      while($row = $rs->fetch_assoc()){ ?>
																	<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
																<?php }} ?>
														</select>
													</div>
												</div> -->
												<div class="col-lg-1 col-sm-6 col-12">
													<div class="form-group">
														<a onclick="getResults()" class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
		function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();

		  tr = document.querySelectorAll("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 1; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];


		    if (td) {
		      txtValue = td.textContent || td.innerText;

		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    	}
		  	}
			}
			function myFunction2() {
			  // Declare variables
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput2");
			  filter = input.value.toUpperCase();

			  tr = document.querySelectorAll("tr");

			  // Loop through all table rows, and hide those who don't match the search query
			  for (i = 1; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[1];


			    if (td) {
			      txtValue = td.textContent || td.innerText;

			      if (txtValue.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    	}
			  	}
				}
				function myFunction3(sel) {
				  // Declare variables
				  var input, filter, table, tr, td, i, txtValue;

				  filter = sel.options[sel.selectedIndex].text.toUpperCase();
					console.log(filter);
				  tr = document.querySelectorAll("tr");

				  // Loop through all table rows, and hide those who don't match the search query
				  for (i = 1; i < tr.length; i++) {
				    td = tr[i].getElementsByTagName("td")[6];


				    if (td) {
				      txtValue = td.textContent || td.innerText;

				      if (txtValue.toUpperCase().indexOf(filter) > -1) {
				        tr[i].style.display = "";
				      } else {
				        tr[i].style.display = "none";
				      }
				    	}
				  	}
					}
					function myFunction4(sel) {
					  // Declare variables
					  var input, filter, table, tr, td, i, txtValue;

					  filter = sel.options[sel.selectedIndex].text.toUpperCase();
						console.log(filter);
					  tr = document.querySelectorAll("tr");

					  // Loop through all table rows, and hide those who don't match the search query
					  for (i = 1; i < tr.length; i++) {
					    td = tr[i].getElementsByTagName("td")[5];


					    if (td) {
					      txtValue = td.textContent || td.innerText;

					      if (txtValue.toUpperCase().indexOf(filter) > -1) {
					        tr[i].style.display = "";
					      } else {
					        tr[i].style.display = "none";
					      }
					    	}
					  	}
						}

		$('#product_table').load('view_stock_table.php');


		function selectCategory(){
			return document.getElementById('select1').value;
		}
		function selectSubCategory(){
			return document.getElementById('select2').value;
		}
		function selectBrand(){
			return document.getElementById('select3').value;
		}

		function getResults(){
			cat_id = selectCategory();
			sub_cat_id = selectSubCategory();
			brand_id = selectBrand();
			$('#product_table').load('view_stock_table.php',{
				cat_id : cat_id,
				sub_cat_id : sub_cat_id,
				brand_id: brand_id
			});
		}

		function del_prod(id) {
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
						url: "./backend/del_product.php",
						data:{prod_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#product_table').load('view_stock_table.php');
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
	<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
	<script type="text/javascript">
	function ExportToExcel(type, fn, dl) {
		 var elt = document.getElementById('table_id');
		 var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
		 return dl ?
			 XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
			 XLSX.writeFile(wb, fn || ('StockSheet.' + (type || 'xlsx')));
	}


	 function Export() {
            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 1000
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
	</script>



    </body>
</html>
