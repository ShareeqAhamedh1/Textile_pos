<?php include './layouts/header.php'; ?>

<?php include './layouts/sidebar.php'; ?>


			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>User Management</h4>
							<h6>Add/Update User</h6>
						</div>
					</div>
					<!-- /add -->
					<div class="card">
						<div class="card-body">
							<div class="row">
							<div class="col-6">
								<form class="" action="./backend/add_user.php" method="post">


								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>User Name</label>
										<input name="name" type="text" >
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Password</label>
										<div class="pass-group">
											<input name="password" type="password" class=" pass-input">
											<span class="fas toggle-password fa-eye-slash"></span>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-sm-6 col-12">
									<div class="form-group">
										<label>Sales Point</label>
										<div class="col-md-12">

											<select name="sale_point" class="form-control select" required>
												<option>Choose Sales point</option>
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
								</div>
								<div class="col-lg-12">
									<button type="submit" class="btn btn-submit me-2">Submit</button>
									<a href="userlist.html"  class="btn btn-cancel">Cancel</a>
								</div>
								</form>
							</div>
							<div class="col-6">
								<table class="table  datanew">
									<thead>
										<tr>
											<th>User</th>
											<th>Password</th>
											<th>Sales Point</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$sqlUsers = "SELECT * FROM tbl_user";
											$rsUsers = $conn->query($sqlUsers);

											if($rsUsers->num_rows > 0){
												while($rowUsers = $rsUsers->fetch_assoc()){
													$s_id = $rowUsers['sale_point'];
										 ?>
										<tr>
											<td> <?= $rowUsers['username'] ?> </td>
											<td> <?= $rowUsers['password'] ?> </td>
											<td> <?= getDataBack($conn,'tbl_sales_point','id',$s_id,'sale_point_name') ?> </td>
											<td> <a href="backend/del_user.php?id=<?= $rowUsers['user_id'] ?>"
                                             onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a> ||
                                              <a class="btn btn-warning btn-sm" onclick="editUser(<?= $rowUsers['user_id'] ?>)">Edit</a> </td>
										</tr>
								<?php } }else{ ?>
									<tr>
										<td colspan="4"> No users added yet </td>
									</tr>
								<?php } ?>
									</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					<!-- /add -->
                <div style=""class="modal fade" id="userDetails" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
				  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
				    <div style=""  class="modal-content">
				      <div class="modal-header">
				         <h5 class="modal-title" >Edit User Details</h5>
				        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">×</span>
				        </button>
				      </div>
				      <div class="modal-body" id="showUserDetails">
				        
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
        function editUser(userId){
            $('#userDetails').modal('show');
            $('#showUserDetails').load('ajax_pages/user_details.php',{
                user_id:userId
            });
        }
    </script>

    </body>
</html>
