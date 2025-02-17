

			<!-- Header -->
			<?php include './layouts/header.php';
			$sales_id = $_REQUEST['id']; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include './layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Edit Sale Point</h4>
							<h6>Update Sale Point</h6>
						</div>
					</div>
					<!-- /add -->
          <form class="" action="./backend/edit_sales_point.php" method="post">


					<div class="card">
						<div class="card-body">
							<div class="row">
								<?php
								$sql = "SELECT * FROM tbl_sales_point WHERE id='$sales_id'";
								$rs = $conn->query($sql);
								if($rs->num_rows >0){
									while($row = $rs->fetch_assoc()){ ?>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Sale Point Name</label>
										<input value="<?= $row['sale_point_name'] ?>" name="sales_name" type="text" >
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Sales Point Location</label>
										<input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input value="<?= $row['point_location'] ?>" name="location" type="text" >
                  </div>
								</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-success">Update Sale Point</button>
								</div>
							<?php }} ?>
							</div>
						</div>
					</div>
          </form>
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    <?php include './layouts/footer.php' ?>

    </body>
</html>
