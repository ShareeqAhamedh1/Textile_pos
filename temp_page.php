<?php include './layouts/header.php'; ?>

<?php include './layouts/sidebar.php'; ?>

<?php
$linksArray = [
		"index.php",
		"sales_report.php",
		"website_orders.php",
		"sales_report_filter.php",
		"pos.php",
		"view_stock_rep.php",
		"return_pos.php",
		"return_call.php",
		"return_tot.php",
		"call_center.php",
		"call_orders.php",
		"call_order_final.php",
		"productlist.php",
		"price_table.php",
		"productlist_02.php",
		"productlist_box.php",
		"product_bulk_edit.php",
		"update_stock_grm.php",
		"update_stock.php",
		"view_stock.php",
		"addproduct.php",
		"categorylist.php",
		"addcategory.php",
		"subcategorylist.php",
		"subaddcategory.php",
		"brandlist.php",
		"addbrand.php",
		"adddelivery.php",
		"transferlist.php",
		"addtransfer.php",
		"sales_list.php",
		"sales_report.php",
		"sales_report_call.php",
		"sales_report_filter.php",
		"sales_report_pos.php",
		"sales_report_range.php",
		"sales_report_table.php",
		"sales_value_total.php",
		"sales_value_total_over.php",
		"sales_value_total_pos.php",
		"stock_grm_table.php",
		"stock_table.php",
		"user_access.php",
		"add_user.php"
];
 ?>

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="page-title">
							<h4>Page Management</h4>
						</div>
					</div>
					<!-- /add -->
					<div class="card">
						<div class="card-body">
							<form class="" action="backend/add_pages_from_json.php" method="post">
								<div class="form-group">
									<select class="form-control" name="page_cat_id">
										<?php
											$sql_cat = "SELECT * FROM tbl_page_category";
											$rs_cat = $conn->query($sql_cat);
											if($rs_cat->num_rows > 0){
												while($row_cat = $rs_cat->fetch_assoc()){
										 ?>
										 <option value="<?= $row_cat['page_cat_id'] ?>"> <?= $row_cat['page_cat_name'] ?> </option>
									 <?php } } ?>
									</select>
								</div>
								<div class="form-group">
									<div class="row">

									<?php
										foreach ($linksArray as $link) {
									 ?>
									 <div class="col-lg-4">
										 <input type="checkbox" name="page_data[]" value="<?= $link ?>">
										 <label for=""><?= $link ?></label>
									 </div>
									<?php } ?>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-sm" name="button">Add</button>
							</form>
							<br>
							<hr>

							<div class="row">
							<?php
								$sql_link = "SELECT * FROM `tbl_page_category`";
								$rs_link=$conn->query($sql_link);

								if($rs_link->num_rows > 0){
									while($row_link = $rs_link->fetch_assoc()){
										$page_cat_id = $row_link['page_cat_id'];
							 ?>
							<div class="col-4">
								<h5><?= $row_link['page_cat_name'] ?></h5>
								<ul>
									<?php
										$sql_links = "SELECT * FROM `tbl_pages` WHERE page_cat_id='$page_cat_id'";
										$rs_links = $conn->query($sql_links);
										if($rs_links->num_rows > 0){
											while($row_p = $rs_links->fetch_assoc()){
									 ?>
									<li>----<?= $row_p['page_name'] ?> || <a href="backend/del_page.php?id=<?= $row_p['page_id'] ?>" onclick="return confirm('Confirm?')" class="btn btn-danger btn-sm">Remove</a> <hr> </li>
								<?php } }else{ ?>
									<li> No Links Added Yet </li>
								<?php } ?>
							</ul> <br><br>
							</div>
						<?php } } ?>
						</div>
					</div>
					<!-- /add -->

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
