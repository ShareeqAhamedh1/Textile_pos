

			<!-- Header -->
			<?php include './layouts/header.php';
			?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Orders</h4>
							<h6>Place an order</h6>
						</div>
					</div>
					<!-- /add -->

						<div class="card">
							<div class="card-body">
								<div class="row">

									<!-- <div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Enter New Order Reference</label>

												<input name="order_ref" type="text" id="order_ref" value="">

										</div>
									</div> -->
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="form-group">
											<label>Date</label>
											<input name="order_date" type="date" id="order_date" class="form-control">
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

				<div class="modal fade" style="" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
			    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" >
			      <div class="modal-content">
			        <div class="modal-header">
			           <h5 class="modal-title" >Create</h5>
			          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">×</span>
			          </button>
			        </div>
			        <div class="modal-body">
			          <div class="row">
			            <div class="col-lg-8">
			              <div id="pos_modal_form" class="table-responsive">

			              </div>
			              <div id="pos_modal_table" class="table-responsive">

			              </div><br>

			            </div>
			            <div class="col-lg-4">
			              <div id="pos_modal_form2" class="table-responsive">

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
		<!-- <script src="assets/plugins/select2/js/custom-select.js"></script> -->

		<script type="text/javascript">

		function update(order_id){

			var data = {};
		  $(".editable").each(function() {
		    data[this.name] = this.value;
		  });
			console.log(data);

			$.ajax({
				method: "POST",
		    url: "./backend/update_modal_order.php",
				data: {data: JSON.stringify(data)}, // data to be sent to the server

				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#pos_modal_table').load('pos_modal_table.php',{ grm_ref : order_id});
						$('#grm_table').load('pos_grm_table.php');
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

		function updateOrderDetails(order_id){

			// var del_charge = document.getElementById("del_charge_modal").value;
			var pay_type = document.getElementById("pay_type_modal").value;
			var grm_ref = document.getElementById('grm_ref_modal').value;
			// var pickup = document.getElementById('pickup_modal').value;
			var pay_st = document.getElementById('pay_st').value;

			$.ajax({
				method: "POST",
		    url: "./backend/update_modal_order2.php",
				data: { pay_type:pay_type, grm_ref:grm_ref, p_sta:pay_st }, // data to be sent to the server

				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#pos_modal_table').load('pos_modal_table.php',{ grm_ref : order_id});
						$('#grm_table').load('pos_grm_table.php');
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
						url: "./backend/del_order_modal.php",
						data:{order_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#pos_modal_table').load('pos_modal_table.php',{ grm_ref : order_id});
								$('#grm_table').load('pos_grm_table.php');
							}
						}
						});
			});
		}

		function addOrder(grm_ref){
			var u_id = <?= $u_id ?>;

			var select = document.getElementById("prod_name_modal");
		  var selectedOption = select.options[select.selectedIndex];
		  var prod_id = selectedOption.getAttribute("prod_id");


			var grm_ref = document.getElementById('grm_ref_modal').value;
			var quantity = document.getElementById('quantity_modal').value;
			var customer_id = document.getElementById('customer_id_modal').value;
			var price = document.getElementById('price_modal').value;
			var discount = document.getElementById('discount_modal').value;
			var discount_type = document.getElementById('discount_type_modal').value;

			$.ajax({
					method: "POST",
					url: "./backend/add_modal_order.php",
					data:{
						prod_id : prod_id,
						grm_ref: grm_ref,
						customer_id: customer_id,

						quantity:quantity,
						price:price,
						discount:discount,
						discount_type:discount_type
					},
					success: function(dataResult){
						var dataResult = JSON.parse(dataResult);
						if(dataResult.statusCode==200){
							$('#pos_modal_table').load('pos_modal_table.php',{ grm_ref : grm_ref});
							$('#grm_table').load('pos_grm_table.php');
							var quantity = document.getElementById('quantity_modal').value = '';
						}
					}
					});
		}
		function loadValue(id){
			// $.fn.modal.Constructor.prototype.enforceFocus = function() {};
			$('#pos_modal_table').load('pos_modal_table.php',{ grm_ref : id});
			$('#pos_modal_form').load('pos_modal_form.php',{ grm_ref : id}, function (){
				$('.prod_name_modal').select2();
				$('.prod_name_modal').select2({
				  dropdownParent: $('#create')
				});

			});
			$('#pos_modal_form2').load('pos_modal_form2.php',{ grm_ref : id});



		}

			function addValue(id){
				document.getElementById('getBarcode').value =id;
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
	$('#grm_table').load('pos_grm_table.php');
		function add_grm() {
			var order_date = document.getElementById('order_date').value;

			window.location.href = "pos.php?or_date="+order_date;

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
						url: "./backend/del_order.php",
						data:{order_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#grm_table').load('pos_grm_table.php');
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
