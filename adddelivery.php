

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
							<h4>Delivery Methods</h4>
							<h6>Create new product Category</h6>
						</div>
					</div>
					<!-- /add -->
					<form class="" action="./backend/add_del_method.php" method="post" enctype="multipart/form-data">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-12">
										<div class="form-group">
											<label>Delivery Method Name</label>
											<input name="dlm_name" type="text" >
										</div>
									</div>

									<div class="col-lg-12">
										<button type="submit" class="btn btn-submit me-2">Submit</button>
										<a href="categorylist.php" class="btn btn-cancel">Cancel</a>
									</div>
								</div>
							</div>
						</div>

					</form>
					<!-- /add --> <br><br>
					<table class="table  datanew">
					  <thead>
					    <tr>

					      <th>Delivery Method Name</th>
					      <th>Delete</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					    $sql = "SELECT * FROM tbl_delivery_methods ORDER BY dlm_id DESC";
					    $rs = $conn->query($sql);
					    if($rs->num_rows >0){
					      while($row = $rs->fetch_assoc()){ ?>
					      <tr>

					        <td><?= $row['dlm_name'] ?></td>
					        <td>
					          <a class="me-3 confirm-text" href="backend/del_del.php?id=<?= $row['dlm_id'] ?>">
					            <img src="assets/img/icons/delete.svg" alt="img">
					          </a>
					        </td>
					      </tr>
					    <?php }} ?>

					  </tbody>
					</table>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>

    </body>
</html>
