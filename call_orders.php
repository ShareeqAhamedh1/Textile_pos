

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
							<h4>Orders</h4>
							<h6>View Orders</h6>
						</div>
					</div>
					<!-- /add -->
						<button class="btn btn-success" name="button" onclick="ExportToExcel('xlsx')">Export To Excel</button>

						<div id="call_table" class="table-responsive">

						</div>


					<!-- /add -->
				</div>
			</div>
        </div>
				<div style=""class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
				  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
				    <div style=""  class="modal-content">
				      <div class="modal-header">
				         <h5 class="modal-title" >Order Details</h5>
				        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">×</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="row">
									<div class="col-lg-8">
					          <div id="call_modal_form" class="">

					          </div>
					          <div id="call_modal_table" class="table-responsive">

					          </div><br>
									</div>
									<div class="col-lg-4">
			              <div id="call_modal_form2" class="table-responsive">

			              </div>

			            </div>
				        </div>
				        <!-- <div class="col-lg-12">
				          <a onclick="addCustomer()" class="btn btn-submit me-2">Submit</a>
				          <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
				        </div> -->
				      </div>
				    </div>
				  </div>
				</div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>
		<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script type="text/javascript">
		var table_id = 'call_orders';

		function ExportToExcel(type, fn, dl) {
			 var elt = document.getElementById(table_id);
			 var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
			 return dl ?
				 XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
				 XLSX.writeFile(wb, fn || ('sales_invoice.' + (type || 'xlsx')));
		}

		function update(order_id){

			var data = {};
		  $(".editable").each(function() {
		    data[this.name] = this.value;
		  });

			$.ajax({
				method: "POST",
		    url: "./backend/update_modal_order_temp.php",
				data: {data: JSON.stringify(data)}, // data to be sent to the server

				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#call_modal_table').load('call_modal_table.php',{ order_id : order_id});
						$('#call_table').load('call_order_table.php');
						Swal.fire({
							type: "success",
							title: "Updated!",
							text: "The quantities are updated",
							confirmButtonClass: "btn btn-success",
						});
					}
				}
		  });
		}

		function addOrder(){
			var u_id = <?= $u_id ?>;

			var select = document.getElementById("prod_name_modal");
		  var selectedOption = select.options[select.selectedIndex];
		  var prod_id = selectedOption.getAttribute("prod_id");


			var order_id = document.getElementById('order_id_modal').value;
			var quantity = document.getElementById('quantity_modal').value;
			var customer_id = document.getElementById('customer_id_modal').value;
			var store = document.getElementById('store_modal').value;
			var price = document.getElementById('price_modal').value;
			var discount = document.getElementById('discount_modal').value;
			var discount_type = document.getElementById('discount_type_modal').value;

			console.log(customer_id);

			$.ajax({
					method: "POST",
					url: "./backend/add_modal_order_temp.php",
					data:{
						prod_id: prod_id,
						order_id: order_id,
						customer_id: customer_id,
						store: store,
						user_id: u_id,
						quantity:quantity,
						price:price,
						discount:discount,
						discount_type:discount_type
					},
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$('#call_modal_table').load('call_modal_table.php',{ order_id : order_id});
							$('#call_table').load('call_order_table.php');
							var quantity = document.getElementById('quantity_modal').value = '1';
						}
					}
					});
		}
			function addValue(id){
				document.getElementById('getBarcode').value =id;
				// var price = document.getElementById('price_value').innerText;

				const selectElement = document.getElementById("prod_name_modal");
				const selectedOption = selectElement.options[selectElement.selectedIndex];
				const price = selectedOption.getAttribute("price");
				document.getElementById('price_modal').value = price;
			}

			$(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  		});
		$('#call_table').load('call_order_table.php');

		function add_grm() {
			var order_ref = document.getElementById('order_ref').value;
			var order_date = document.getElementById('order_date').value;
			$.ajax({
					method: "POST",
					url: "./backend/pos_grm.php",
					data:{order_ref: order_ref, order_date:order_date},
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$('#grm_table').load('pos_grm_table.php');
						}
					}
					});

		}
		function updateOrderDetails(order_id){

			var del_charge = document.getElementById("del_charge_modal").value;
			var pay_type = document.getElementById("pay_type_modal").value;
			var grm_ref = document.getElementById('grm_ref_modal').value;
			var pickup = document.getElementById('pickup_modal').value;
			var pay_st =document.getElementById('pay_st').value;


			$.ajax({
				method: "POST",
		    url: "./backend/call_modal_order2.php",
				data: {del_charge: del_charge,  grm_ref:grm_ref, pickup:pickup , pay_type:pay_type,psta:pay_st}, // data to be sent to the server

				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){

						$('#call_table').load('call_order_table.php');
						Swal.fire({
							type: "success",
							title: "Updated!",
							text: "The details are updated",
							confirmButtonClass: "btn btn-success",
						});
					}
				}
		  });
		}
		function loadValue(id, customer_id, store){
			$('#call_modal_table').load('call_modal_table.php',{ order_id : id});
			$('#call_modal_form2').load('call_modal_form2.php',{ order_id : id},);
			$('#call_modal_form').load('call_modal_form.php',{ order_id : id, store: store, customer_id:customer_id},function (){
				$('.prod_name_modal').select2();
				$('.prod_name_modal').select2({
				  dropdownParent: $('#create')
				});
			});

			$('#prod_name_modal').select2();

		}

		function del_prod(id,order_id) {
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
						url: "./backend/del_order_temp.php",
						data:{order_temp_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#call_modal_table').load('call_modal_table.php',{ order_id : order_id});
								$('#call_table').load('call_order_table.php');
							}
						}
						});
			});
		}

		function cancelOrder(id) {
			Swal.fire({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				type: "warning",
				showCancelButton: !0,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Yes!",
				confirmButtonClass: "btn btn-primary",
				cancelButtonClass: "btn btn-danger ml-1",
				buttonsStyling: !1,
			}).then(function (t) {

				t.value &&
				$.ajax({
						method: "POST",
						url: "./backend/cancel_temp_order.php",
						data:{order_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#call_table').load('call_order_table.php');
							}
						}
						});

				t.value &&
					Swal.fire({
						type: "success",
						title: "Canceled!",
						text: "Your order has been canceled.",
						confirmButtonClass: "btn btn-success",
					});



			});
		}
		function confirmOrder(id) {
			Swal.fire({
				title: "Are you sure?",
				text: "You won't be able to revert this!",
				type: "warning",
				showCancelButton: !0,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Yes!",
				confirmButtonClass: "btn btn-primary",
				cancelButtonClass: "btn btn-danger ml-1",
				buttonsStyling: !1,
			}).then(function (t) {

				t.value &&
				$.ajax({
						method: "POST",
						url: "./backend/confirm_temp_order.php",
						data:{order_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#call_table').load('call_order_table.php');
							}
						}
						});

				t.value &&
					Swal.fire({
						type: "success",
						title: "Confirmed!",
						text: "Your order has been confirmed.",
						confirmButtonClass: "btn btn-success",
					});



			});
		}
		function del_order(id) {
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
						url: "./backend/del_order_call_orders.php",
						data:{order_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#call_table').load('call_order_table.php');
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
