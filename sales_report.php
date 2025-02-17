

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
						<div class="col-6">
							<label for="" style="font-weight:bold;font-size:15px;">Select Date From</label>
							<input type="date" class="form-control" name="" value="" id="sel_date_from">
							<br><br>
						</div>
						<div class="col-6">
							<label for="" style="font-weight:bold;font-size:15px;">Select Date To</label>
							<input type="date" class="form-control" name="" value="" id="sel_date_to">
							<br><br>
						</div>
						<div class="col-12">
							<button class="btn btn-success" name="button" onclick="changeSlot()">Sales</button> ||||
							<button class="btn btn-primary" name="button" onclick="selectDateFull()">Stock</button>
							<br><br>
							<button class="btn btn-success" name="button" onclick="ExportToExcel('xlsx')">Export To Excel</button>
							<br><br>


						</div>
					</div>

					<div class="row">

						<div class="col-lg-12 col-sm-12 col-12 d-flex">
							<div class="card flex-fill">

									<div class="table-responsive dataview" id="call_center_table">

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

		var table_id = 'sales_report_id';

		function ExportToExcel(type, fn, dl) {
			 var elt = document.getElementById(table_id);
			 var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
			 return dl ?
				 XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
				 XLSX.writeFile(wb, fn || ('sales_report.' + (type || 'xlsx')));
		}
			$('#call_center_table').load('sales_report_total.php');
			// $('#pos_table').load('sales_report_pos.php');
			//
			// $('#tot_sales_items').load('sales_item_total.php');
			// $('#tot_sales_items_value').load('sales_value_total.php');
			//
			// $('#tot_sales_items_pos').load('sales_item_total_pos.php');
			// $('#tot_sales_items_value_pos').load('sales_value_total_pos.php');
			//
			// $('#tot_sales_items_over').load('sales_item_total_over.php');
			// $('#tot_sales_items_value_over').load('sales_value_total_over.php');

			function changeSlot(){
				var sel_date_from = document.getElementById('sel_date_from').value;
				var sel_date_to = document.getElementById('sel_date_to').value;

				if(sel_date_from == ""){
					alert('From Value Cannot be empty');
					document.getElementById('sel_date_to').value = "";
					return false;
				}

				$('#call_center_table').load('sales_report_total.php',{
					sel_date_f:sel_date_from,
					sel_date_t:sel_date_to
				});
				table_id = 'sales_report_id';
			}

			function selectDateFull(){
				var sel_date_from = document.getElementById('sel_date_from').value;
				var sel_date_to = document.getElementById('sel_date_to').value;

				if(sel_date_from == ""){
					alert('From Value Cannot be empty');
					document.getElementById('sel_date_to').value = "";
					return false;
				}

								$('#call_center_table').load('sales_report_total_unique.php',{
									sel_date_f:sel_date_from,
									sel_date_t:sel_date_to
								});
								table_id = 'sales_report_uni_id';
			}
		</script>
	</body>
</html>
