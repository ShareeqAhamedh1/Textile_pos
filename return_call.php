

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

								<div class="col-12">
								
									<div id="load">

									</div>
								</div>
								</div>
							</div>
						</div>


					<!-- /add -->
				</div>
			</div>
        </div>

				<div class="modal fade" style="" id="return_modal" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
			    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" >
			      <div class="modal-content">
			        <div class="modal-header">
			           <h5 class="modal-title" >ADD TO RETURN</h5>
			          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">×</span>
			          </button>
			        </div>
			        <div class="modal-body">
			         <hr><hr>
							 <div class="row">
								 <div class="col-4">
									<input class="form-control"type="date" id="return_date" name="return_date" value="0">
								</div>
							 	<div class="col-4">
									<a onclick="fullReturn()" href="#" class="btn btn-success">FULL RETURN/Cash Return</a>
							 	</div>
								<div class="col-4">

	 							 <a onclick="exchange()" href="#" class="btn btn-warning">EXCHANGE</a>
								</div>
							 </div>
							 <hr><hr>


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
			function openModalReturn(grm_id){
				$('#return_modal').data('grm-id', grm_id);
				$('#return_modal').modal('show');
			}
			$('#load').load('ajax_pages/return_call_table.php');

			const searchInput = document.getElementById("search_key");

			function search_ref(skey){
				$('#load').load('ajax_pages/return_call_table.php',{
					search_key:skey
				});
			}

			searchInput.addEventListener("input", () => {
			  if (searchInput.value === "") {
			    // text has been removed from the search input field
			    $('#load').load('ajax_pages/return_call_table.php');
			  }
			});

			function fullReturn(){
				var grmId = $('#return_modal').data('grm-id');
				var ret_date = document.getElementById('return_date').value;
				if(ret_date!=0){
					$.ajax({
					    url: './backend/return_pos.php',
					    type: 'POST',
					    data: { grm_id: grmId, return_date: ret_date },
					    success: function(response) {
								var dataResult = JSON.parse(response);
								if(dataResult.statusCode==300){
									alert('This has already been added to return list');
								}else if (dataResult.statusCode==200) {
									$('#return_modal').modal('hide');
								}

					    },
					    error: function(error) {
					      // Handle the error response
					    }
					  });
				}else{
					alert('Please Enter Return Date');
				}
			}

			function exchange(){
				var grmId = $('#return_modal').data('grm-id');
				var ret_date = document.getElementById('return_date').value;
				if(ret_date!=0){
					$.ajax({
					    url: './backend/exchange_pos.php',
					    type: 'POST',
					    data: { grm_id: grmId, return_date: ret_date },
					    success: function(response) {
					      $('#return_modal').modal('hide');
					    },
					    error: function(error) {
					      // Handle the error response
					    }
					  });
				}else{
					alert('Please Enter Return Date');
				}
			}
		</script>

    </body>
</html>
