

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
							<h4>Add Sale Point</h4>
							<h6>Create new sale point</h6>
						</div>
					</div>
					<!-- /add -->
          <form class="" action="./backend/add_sales_point.php" method="post">


					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Sales Point Name</label>
										<input name="sales_name" type="text" >
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Sales Point Location</label>
                    <input name="location" type="text" >
                  </div>
								</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Add</button>
								</div>
							</div>

						</div>
					</div>
          </form>
					<!-- /add -->
					<div class="card">
						<div class="card-body">
							<div id="sales_list_table" class="table-responsive">

							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    <?php include './layouts/footer.php' ?>
		<script type="text/javascript">

		$('#sales_list_table').load('sales_list_table.php');

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
						url: "./backend/del_sales.php",
						data:{sales_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#sales_list_table').load('sales_list_table.php');
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
