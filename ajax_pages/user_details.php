<?php
    include '../backend/conn.php';

    $id = $_REQUEST['user_id'];

    $sqlUsers = "SELECT * FROM tbl_user WHERE user_id='$id'";
    $rsUsers = $conn->query($sqlUsers);

    if($rsUsers->num_rows > 0){
       $rowUsers = $rsUsers->fetch_assoc();
       $s_id = $rowUsers['sale_point'];
    }
?>
<div class="container">
                           <form action="backend/edit_user.php" method="POST">
                            <input type="hidden" name="u_id" id="" value="<?= $rowUsers['user_id'] ?>">
                             <div class="form-group">
                                <label for=""> User Name </label>
                                <input type="text" class="form-control" name="u_name" id="" value="<?= $rowUsers['username'] ?>">
                             </div>
                             <div class="form-group">
                                <label for=""> Password </label>
                                <input type="text" class="form-control" name="u_pass" id="" value="<?= $rowUsers['password'] ?>">
                             </div>
                             <div class="form-group">
										<label>Sales Point</label>
										<div class="col-md-12">

											<select name="sale_point" class="form-control select" >
												<option value="<?= $rowUsers['sale_point'] ?>"><?= getDataBack($conn,'tbl_sales_point','id',$s_id,'sale_point_name') ?></option>
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
                                <button type="submit" class="btn btn-primary btn-sm"> Update User Details  </button>
                           </form>
                        </div>