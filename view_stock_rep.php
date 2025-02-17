

			<!-- Header -->
			<?php include 'layouts/header.php'; ?>
			<!-- Header -->

           <!-- Sidebar -->
			<?php include 'layouts/sidebar.php'; ?>
			<!-- /Sidebar -->

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Tele Stock Report</h4>
						</div>
					</div>
          <div class="card">
						<?php if (isset($_SESSION['same_date'])): ?>
							<br>
							<div class="alert alert-warning" style="margin-left:10px;width:50%;">
								<h2> <?= $_SESSION['same_date'] ?> is already available   </h2>
							</div>
							<br>
							<?php unset($_SESSION['same_date']); ?>
						<?php endif; ?>
						<?php if (isset($_SESSION['succ'])): ?>
							<br>
							<div class="alert alert-success" style="margin-left:10px;width:50%;">
								<h2> Successfully Added </h2>
							</div>
							<br>
							<?php unset($_SESSION['succ']); ?>
						<?php endif; ?>

						<?php if (isset($_SESSION['err'])): ?>
							<br>
							<div class="alert alert-danger" style="margin-left:10px;width:50%;">
								<h2> Something Went Wrong Please Contact +94 76 555 65 75 </h2>
							</div>
							<br>
							<?php unset($_SESSION['err']); ?>
						<?php endif; ?>
            <div class="card-body">
              <div class="row">
								<form class="" action="backend/stock_tally_ref.php" method="post">

                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Enter New Stock Reference</label>

                      <input name="stock_ref" type="text" id="stock_ref" value="">

                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Date</label>
                    <input name="stock_date" type="date" id="stock_date" class="form-control">
                  </div>
                </div>



                <div class="col-lg-12">
                  <button type="submit" class="btn btn-submit me-2">Add</button>

                </div>

							</form>
              </div>
            </div>
          </div>

					<!-- /product list -->
					<div class="card">
						<div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Stock Date</th>
                    <th>Stock Reference </th>
										<th>ADD</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM tbl_stock_tally_date";
                  $rs = $conn->query($sql);
                  if($rs->num_rows >0){
                    while($row = $rs->fetch_assoc()){
                        $st_id = $row['st_tally_id'];

                      ?>
                  <tr>
                    <td> <?= $row['st_tally_date'] ?> </td>
                    <td> <?= $row['st_tally_ref'] ?> </td>
										<td>
											<a class="me-3" href="view_stock_rep_details.php?id=<?= $row['st_tally_id'] ?>">
												<img src="assets/img/icons/plus.svg" alt="img">
											</a>
										</td>
                    <td>
                      <a href="backend/st_ref_tally_del.php?id=<?= $row['st_tally_id'] ?>" onclick="return confirm('Do you really want to delete?')" class="me-3 confirm-text" href="javascript:void(0);">
                        <img src="assets/img/icons/delete.svg" alt="img">
                      </a>
                    </td>
                  </tr>
                <?php }} ?>
                </tbody>
              </table>
						</div>
					</div>
					<!-- /product list -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<?php include './layouts/footer.php' ?>



    </body>
</html>
