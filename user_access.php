<?php include './layouts/header.php'; ?>

<?php include './layouts/sidebar.php'; ?>


			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>User Management</h4>
						</div>
					</div>
					<!-- /add -->
					<div class="row">
						<?php
							$sql_users = "SELECT * FROM tbl_user";
							$rs_users = $conn->query($sql_users);
							if($rs_users->num_rows > 0){
								while($row_users = $rs_users->fetch_assoc()){
									$u_id = $row_users['user_id'];

									$sql_sel_acc = "SELECT * FROM tbl_page_access WHERE u_id='$u_id'";
									$rs_ac = $conn->query($sql_sel_acc);

						 ?>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<h4 class="text-center"><?= $row_users['username'] ?></h4>
									<hr>
									<div class="row">
										<div class="col-6">
											<h5 style="color:#5e13b0;"> Access Pages </h5>
											<hr>
											<ul>
												<?php
												if($rs_ac->num_rows > 0){
													while($row_ac = $rs_ac->fetch_assoc()){
														$page_link_id = $row_ac['pa_link_id'];

												 ?>
												<li> <h6>- <?= getDataBack($conn,'tbl_pages','page_id',$page_link_id,'page_name'); ?></h6> </li>
											<?php } } ?>
											</ul>
										</div>
										<div class="col-6 text-center">
											<br> <br> <br> <br>
											<button type="button" class="btn btn-primary btn-sm" onclick="openUserAccessDataModal(<?= $row_users['user_id'] ?>)" name="button">
												 Give Access
											 </button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } } ?>
						<!-- user details end -->
					</div>
					<!-- /add -->
        <div style=""class="modal fade" id="user_access_data" tabindex="-1" aria-labelledby="user_access_data"  aria-hidden="true">
				  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
				    <div style=""  class="modal-content">
				      <div class="modal-header">
				         <h5 class="modal-title" >User Access</h5>
				        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">×</span>
				        </button>
				      </div>
				      <div class="modal-body" id="showUserAcess">

				      </div>
				    </div>
				  </div>
				</div>

				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    <?php include './layouts/footer.php'; ?>
    <script>
			function openUserAccessDataModal(uid){
				$('#user_access_data').modal('show');
				$('#showUserAcess').load('ajax_pages/load_user_access_details.php',{
					user_id:uid
				});
			}
    </script>

    </body>
</html>
