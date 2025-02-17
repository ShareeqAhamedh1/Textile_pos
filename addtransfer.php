

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
							<h4>ADD Transfer</h4>
							<h6>Transfer your stocks to one store another store.</h6>
						</div>
					</div>
					<div class="card">
						<form class="" action="./backend/add_transfer.php" method="post">

								<div class="card-body">
									<div class="row">
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<label>Date </label>
												<div class="input-groupicon">
													<input name="date" type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
													<div class="addonset">
														<img src="assets/img/icons/calendars.svg" alt="img">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<label>From</label>
												<select required onchange="refresh_table()" name="from_point" class="select" id="from_select">
													<option>Choose</option>
													<?php
													$sql = "SELECT * FROM tbl_sales_point";
													$rs = $conn->query($sql);
													if($rs->num_rows >0){
														while($row = $rs->fetch_assoc()){ ?>
														 <option value="<?=$row['id'] ?>"><?= $row['sale_point_name'] ?></option>
												 <?php }} ?>
												</select>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<label>To</label>
												<select required  name="to_point" class="select">
													<option>Choose</option>
													<?php
													$sql = "SELECT * FROM tbl_sales_point";
													$rs = $conn->query($sql);
													if($rs->num_rows >0){
														while($row = $rs->fetch_assoc()){ ?>
														 <option value="<?=$row['id'] ?>"><?= $row['sale_point_name'] ?></option>
												 <?php }} ?>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-sm-6 col-12">
											<div class="form-group">
												<label>Product Name</label>
												<div class="input-groupicon">
													<input type="text" placeholder="Scan/Search Product by code and select...">
													<div class="addonset">
														<img src="assets/img/icons/scanners.svg" alt="img">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div id="add_transfer" class="table-responsive ">

										</div>
									</div>
									<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label>Description</label>
												<textarea name="description" class="form-control"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<button type="submit" class="btn btn-submit me-2">Submit</button>
											<a href="transferlist.html"  class="btn btn-cancel">Cancel</a>
										</div>
									</div>

							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

		<script type="text/javascript">

		$('#add_transfer').load('addtransfer_table.php');

		function refresh_table(){
			var sale_point = document.getElementById('from_select').value;
			$('#add_transfer').load('addtransfer_table.php',{
				sale_point : sale_point
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
						url: "./backend/del_brand.php",
						data:{brand_id: id},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								$('#brand_table').load('brand_table.php');
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
