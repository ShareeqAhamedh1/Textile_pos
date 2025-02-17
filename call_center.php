<?php include './backend/conn.php'; ?>
<?php

	if(!isset($_SESSION['user_logged'])){
	header('location:./signin.php');
	exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="robots" content="noindex, nofollow">
        <title>Pos Admin</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- animation CSS -->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="assets/plugins/owlcarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/plugins/owlcarousel/owl.theme.default.min.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body onkeypress="handleKeyPress(event)">

		<div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div>

		<div class="main-wrappers">
			<div class="header">
				<!-- Logo -->
				 <div class="header-left border-0 ">

					<a href="index.php" class="logo logo-normal">
						<img src="logo/cardamum-logo.png"  alt="">
					</a>
					<a href="index.php" class="logo logo-white">
						<!-- <img src="assets/img/logo-white.png"  alt=""> -->
					</a>
					<a href="index.php" class="logo-small">
						<!-- <img src="assets/img/logo-small.png" alt=""> -->
					</a>

				</div>
				<!-- /Logo -->

				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Search -->
					<li class="nav-item">
						<div class="top-nav-search">

							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
						</a>
							<form action="#">
								<div class="searchinputs">
									<input type="text" placeholder="Search Here ...">
									<div class="search-addon">
										<span><img src="assets/img/icons/closes.svg" alt="img"></span>
									</div>
								</div>
								<a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
							</form>
						</div>
					</li>
					<!-- /Search -->

					<!-- Flag -->
					<!-- /Flag -->

					<!-- Notifications -->
					<!-- /Notifications -->

					<li class="nav-item dropdown has-arrow main-drop">
						<div class="dropdown-menu menu-drop-user">
							<div class="profilename">
								<div class="profileset">
									<span class="status online"></span></span>
									<div class="profilesets">
										<h6>Cardamum </h6>
										<h5>Admin</h5>
									</div>
								</div>
								<hr class="m-0">
								<a class="dropdown-item" href="profile.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
								<a class="dropdown-item" href="generalsettings.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings me-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Settings</a>
								<hr class="m-0">
								<a class="dropdown-item logout pb-0" href="backend/logout.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
							</div>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="generalsettings.html">Settings</a>
						<a class="dropdown-item" href="signin.html">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
			</div>

			<div class="page-wrapper ms-0">
				<div class="content">
					<div class="row">
						<div class="col-lg-8 col-sm-12 tabs_wrapper" >
							<div class="page-header ">
								<div class="page-title">

									<h4>Call Center Orders</h4><br>
									<a href="call_orders.php" class="btn btn-adds"  data-bs-target="#create">Go Back</a>
								</div>
							</div>
							<div id="" class="row form-group">
										<input id="search_name" style="width:45%; margin-right: 10px"  type="text" class="form-control "
										 placeholder="Product Name" onkeyup="searchProd()" aria-controls="">
										<!-- <input id="" style="width:45%" type="text" class="form-control "
										placeholder="Product Barcode" onkeyup="scanBarcode(this.value)" aria-controls=""> -->

										<a onclick="searchProd()" class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
							</div>
							<ul class="active  owl-carousel owl-theme owl-product  border-0 " >

                <?php

                $sqlSub = "SELECT * FROM tbl_category";
                $rsSub = $conn->query($sqlSub);
                if($rsSub->num_rows >0){
                  while($rowSub = $rsSub->fetch_assoc()){
										$name = $rowSub['name'];?>
    								<li class="" >
    									<div class="product-details product_cat" id="<?= $rowSub['name'] ?>" onclick="updateView(<?= $rowSub['id'] ?>,'<?= $name ?>')" >
    										<h6><?= $rowSub['name'] ?></h6>
    									</div>
    								</li>
                <?php }} ?>

							</ul>
							<div class="tabs_container" id="product_view">

							</div>
						</div>

							<div class="col-lg-4 col-sm-12 ">
								<div class="order-list">
									<div class="orderid">
										<h4>Order List</h4>

									</div>
									<div class="actionproducts">
										<!-- <ul>
											<li>
												<a href="javascript:void(0);" class="deletebg confirm-text"><img src="assets/img/icons/delete-2.svg" alt="img"></a>
											</li>
											<li>
												<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset" >
													<img src="assets/img/icons/ellipise1.svg" alt="img">
												</a>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-end">
													<li>
														<a href="#" class="dropdown-item">Action</a>
													</li>
													<li>
														<a href="#" class="dropdown-item">Another Action</a>
													</li>
													<li>
														<a href="#" class="dropdown-item">Something Elses</a>
													</li>
												</ul>
											</li>
										</ul> -->
									</div>
								</div>
						<form class="" action="./backend/order_temp.php" method="post">
									<input type="hidden" name="order_id" value="<?= $order_id ?>">

								<div class="card card-order">
									<div class="card-body">
										<div class="row">
											<div class="col-12">
												<a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
											</div>
											<div class="col-lg-12">
												<div class="text">
													<!-- <a class="btn btn-scanner-set"><img src="assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a> -->
													<input class="form-control" id="customer" name="customer" placeholder="Customer Name" readonly><br>
													<input class="form-control" id="customer_id" name="customer_id" placeholder="Customer Name" type="hidden">
												</div>
											</div>

											<div class="col-lg-12">
												<div class="select-split ">
													<div class="select-group w-100">
														<select name="store" class="select form-control">
															<option value="cardamom">Cardamum</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="select-split ">
													<div class="select-group w-100">
														<select class="select" id="discount_type_main" name='discount_type' onchange="setDiscount()">
														  <option value="percentage">Percentage</option>
														  <option value="fixed_amount">Fixed Amount</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="text">
													<!-- <a class="btn btn-scanner-set"><img src="assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a> -->
													<input class="form-control" type="text" name="discount_total" id="discount_total" onkeyup="setDiscount()" value="" placeholder="Discount"><br>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="text">
													<!-- <a class="btn btn-scanner-set"><img src="assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a> -->
													<input class="form-control" type="text" id="delivery_charge" onkeyup="totalValue()" name="delivery_charge" value="0" placeholder="Delivery Charge"><br>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="select-split ">
													<div class="select-group w-100">
														<select name="pickup" class="select">
															<option value="1">Daraz</option>
															<option value="2">Pick Me</option>
	                            <option value="3">Kiddoz</option>
	                            <option value="4">Website</option>
															<option value="8">Mint Pay</option>
															<option value="9">Koko Pay</option>
	                            <option value="5">Social Media</option>
	                            <option value="6">Call</option>
	                            <option value="7">Walk In Customer</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="select-split ">
													<div class="select-group w-100">
														<select name="d_method" class="select">
															<?php $sqlDel = "SELECT * FROM tbl_delivery_methods ORDER BY dlm_id DESC";
															$rsDel =$conn->query($sqlDel);
															if($rsDel->num_rows > 0){
																while($rowDelMeth = $rsDel->fetch_assoc()){
															 ?>
															<option value="<?= $rowDelMeth['dlm_id'] ?>"><?= $rowDelMeth['dlm_name'] ?></option>
														<?php } }else{ ?>
															<option value="0">No Delivery Method Added</option>
														<?php } ?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="text">
													<input id="" class="form-control" type="text" name="del_ref" value="" placeholder="Delivery Reference">
												</div>
											</div>

											<div class="col-12">
												<br>
												<div class="select-split ">
													<div class="select-group w-100">
														<select name="pay_st" class="select">
															<option value="2">PAID</option>
															<option value="1">NOT PAID</option>
														</select>
													</div>
												</div>
											</div>
											<br>

										</div>
									</div>
									<div class="split-card">
									</div>
									<div class="card-body pt-0">
										<div class="totalitem">
											<h4>Total items : <span id="total_items">0</span></h4>
											<a onclick="clearAll()" href="javascript:void(0);">Clear all</a>
										</div>
										<div id='orderlist' class="product-table">


										</div>
									</div>
									<div class="split-card">
									</div>
									<div class="card-body pt-0 pb-2">
										<div class="setvalue">
											<ul>
												<li class="total-value">
													<h5>Sub Total  </h5>
													<h6 >Rs <span id='sub_total'>00</span></h6>
												</li>

												<li class="total-value">
													<h5>Total  </h5>
													<h6 >Rs <span id='total'>00</span></h6>
												</li>

											</ul>
										</div>
										<!-- <div style="display:flex" class="">

											<button class="btn btn-success btn-lg" type="submit" name="button" value="confirm" style="margin-right:10px"><h5>Confirm</h5></button>
											<button  type="submit" class="btn btn-primary btn-lg" type="submit" value="pending" name="button"><h5>Pending</h5></button>

										</div> -->
										<div class="select-group w-100">
											<select name="button" class="select">
												<option value="pending">Pending</option>
												<option value="confirm">Confirmed</option>


											</select><br>
										</div><br>
										<div class="setvaluecash">
											<ul>
												<li style="margin-right: 0px">
													<button style="width:90px; height:62px" type="submit" class="btn btn-block btn-outline-success" type="submit" value="0" name="pay_type">
														<!-- <img src="assets/img/icons/cash.svg" alt="img" class="me-2"> -->
														Cash
													</button>
												</li>
												<li style="margin-right: 0px">
													<button style="width:90px; height:62px" type="submit" class="btn btn-block btn-outline-success" type="submit" value="1" name="pay_type">
														<!-- <img src="assets/img/icons/cash.svg" alt="img" class="me-2"> -->
														Online Payment
													</button>
												</li>
												<li style="margin-right: 0px">
													<button style="width:90px; height:62px" type="submit" class="btn btn-block btn-outline-success" type="submit" value="2" name="pay_type">
														<!-- <img src="assets/img/icons/cash.svg" alt="img" class="me-2"> -->
														Bank Transfer
													</button>
												</li>
											</ul><br>

											<ul>
												<li style="margin-right: 0px">
													<button style="width:90px; height:62px" type="submit" class="btn btn-block btn-outline-success" type="submit" value="3" name="pay_type">
														<!-- <img src="assets/img/icons/cash.svg" alt="img" class="me-2"> -->
														Credit
													</button>
												</li>
												<li style="margin-right: 0px">
													<button style="width:90px; height:62px" type="submit" class="btn btn-block btn-outline-success" type="submit" value="4" name="pay_type">
														<!-- <img src="assets/img/icons/cash.svg" alt="img" class="me-2"> -->
														Cash On Delivery
													</button>
												</li>

											</ul>
										</div>


										<!-- <div class="btn-pos">
											<ul>
												<li>
													<a class="btn"><img src="assets/img/icons/pause1.svg" alt="img" class="me-1">Hold</a>
												</li>
												<li>
													<a class="btn"><img src="assets/img/icons/edit-6.svg" alt="img" class="me-1">Quotation</a>
												</li>
												<li>
													<a class="btn"><img src="assets/img/icons/trash12.svg" alt="img" class="me-1">Void</a>
												</li>
												<li>
													<a class="btn"><img src="assets/img/icons/wallet1.svg" alt="img" class="me-1">Payment</a>
												</li>
												<li>
													<a class="btn"  data-bs-toggle="modal" data-bs-target="#recents"><img src="assets/img/icons/transcation.svg" alt="img" class="me-1"> Transaction</a>
												</li>
											</ul>
										</div> -->
									</div>
								</div>
								</form>
							</div>

					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="calculator" tabindex="-1"   aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Define Quantity</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="calculator-set">
							<div class="calculatortotal">
								<h4>0</h4>
							</div>
							<ul>
								<li>
									<a href="javascript:void(0);">1</a>
								</li>
								<li>
									<a href="javascript:void(0);">2</a>
								</li>
								<li>
									<a href="javascript:void(0);">3</a>
								</li>
								<li>
									<a href="javascript:void(0);">4</a>
								</li>
								<li>
									<a href="javascript:void(0);">5</a>
								</li>
								<li>
									<a href="javascript:void(0);">6</a>
								</li>
								<li>
									<a href="javascript:void(0);">7</a>
								</li>
								<li>
									<a href="javascript:void(0);">8</a>
								</li>
								<li>
									<a href="javascript:void(0);">9</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="btn btn-closes"><img src="assets/img/icons/close-circle.svg" alt="img"></a>
								</li>
								<li>
									<a href="javascript:void(0);">0</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="btn btn-reverse"><img src="assets/img/icons/reverse.svg" alt="img"></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="holdsales" tabindex="-1"    aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Hold order</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="hold-order">
							<h2>4500.00</h2>
						</div>
						<div class="form-group">
							<label>Order Reference</label>
							<input type="text">
						</div>
						<div class="para-set">
							<p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
						</div>
						<div class="col-lg-12">
							<a class="btn btn-submit me-2">Submit</a>
							<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="edit" tabindex="-1"    aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Edit Order</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Product Price</label>
									<input type="text" value="20">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Product Price</label>
									<select class="select">
										<option>Exclusive</option>
										<option>Inclusive</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label> Tax</label>
									<div class="input-group">
										<input type="text">
										<a class="scanner-set input-group-text">
											%
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Discount Type</label>
									<select class="select">
										<option>Fixed</option>
										<option>Percentage</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Discount</label>
									<input type="text" value="20">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Sales Unit</label>
									<select class="select">
										<option>Kilogram</option>
										<option>Grams</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<a class="btn btn-submit me-2">Submit</a>
							<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Create</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Customer Name</label>
									<input name="customer_name" id="customer_name" type="text">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Email</label>
									<input name="email" id="email" type="text">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Phone</label>
									<input name="phone" id="phone" type="text">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>City</label>
									<input name="city" id="city" type="text" >
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Address</label>
									<input name="address" id="address" type="text" >
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<a onclick="addCustomer()" class="btn btn-submit me-2">Submit</a>
							<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="delete" tabindex="-1"    aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Order Deletion</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="delete-order">
							<img src="assets/img/icons/close-circle1.svg" alt="img">
						</div>
						<div class="para-set text-center">
							<p>The current order will be deleted as no payment has been <br> made so far.</p>
						</div>
						<div class="col-lg-12 text-center">
							<a class="btn btn-danger me-2">Yes</a>
							<a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="recents" tabindex="-1"    aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title" >Recent Transactions</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="tabs-sets">
							<ul class="nav nav-tabs" id="myTabs" role="tablist">
								<li class="nav-item" role="presentation">
								  <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button"   aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
								</li>
								<li class="nav-item" role="presentation">
								  <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button"   aria-controls="payment" aria-selected="false" role="tab">Payment</button>
								</li>
								<li class="nav-item" role="presentation">
								  <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button"   aria-controls="return" aria-selected="false" role="tab">Return</button>
								</li>
							  </ul>
							  <div class="tab-content" >
								<div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
									<div class="table-top">
										<div class="search-set">
											<div class="search-input">
												<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
											</div>
										</div>
										<div class="wordset">
											<ul>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table datanew">
											<thead>
												<tr>
													<th>Date</th>
													<th>Reference</th>
													<th>Customer</th>
													<th>Amount	</th>
													<th class="text-end">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2022-03-07	</td>
													<td>INV/SL0101</td>
													<td>Walk-in Customer</td>
													<td>$ 1500.00</td>
													<td>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/eye.svg" alt="img">
														</a>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/edit.svg" alt="img">
														</a>
														<a class="me-3 confirm-text" href="javascript:void(0);">
															<img src="assets/img/icons/delete.svg" alt="img">
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="payment" role="tabpanel" >
									<div class="table-top">
										<div class="search-set">
											<div class="search-input">
												<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
											</div>
										</div>
										<div class="wordset">
											<ul>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table datanew">
											<thead>
												<tr>
													<th>Date</th>
													<th>Reference</th>
													<th>Customer</th>
													<th>Amount	</th>
													<th class="text-end">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2022-03-07	</td>
													<td>0101</td>
													<td>Walk-in Customer</td>
													<td>$ 1500.00</td>
													<td>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/eye.svg" alt="img">
														</a>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/edit.svg" alt="img">
														</a>
														<a class="me-3 confirm-text" href="javascript:void(0);">
															<img src="assets/img/icons/delete.svg" alt="img">
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="return" role="tabpanel" >
									<div class="table-top">
										<div class="search-set">
											<div class="search-input">
												<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
											</div>
										</div>
										<div class="wordset">
											<ul>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
												</li>
												<li>
													<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table datanew">
											<thead>
												<tr>
													<th>Date</th>
													<th>Reference</th>
													<th>Customer</th>
													<th>Amount	</th>
													<th class="text-end">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>2022-03-07	</td>
													<td>0101</td>
													<td>Walk-in Customer</td>
													<td>$ 1500.00</td>
													<td>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/eye.svg" alt="img">
														</a>
														<a class="me-3" href="javascript:void(0);">
															<img src="assets/img/icons/edit.svg" alt="img">
														</a>
														<a class="me-3 confirm-text" href="javascript:void(0);">
															<img src="assets/img/icons/delete.svg" alt="img">
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include './layouts/footer.php' ?>
	<script type="text/javascript">

	$('#product_view').load('pos_table.php');
	$('#orderlist').load('pos_order_table.php');


	function addCustomer(){
		var name= document.getElementById("customer_name").value;
		var email= document.getElementById("email").value;
		var phone= document.getElementById("phone").value;
		var city= document.getElementById("city").value;
		var address= document.getElementById("address").value;

		$.ajax({
				method: "POST",
				url: "./backend/add_customer.php",
				data:{
					name: name,
					email: email,
					phone: phone,
					city: city,
					address: address
				},
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						document.getElementById("customer").value = name;
						document.getElementById("customer_id").value = dataResult.customer_id;
						$('#create').modal('hide');
					}
				}
				});


	}


// 	function handleKeyPress(e){
//  var key=e.keyCode || e.which;
//   if (key==13){
//      alert('asf');
//   }
// }
	function clearAll(){
		cart.length =0;
		quantities.length =0;
		$('#orderlist').load('pos_order_table.php',{
			prod_ids : JSON.stringify(cart)
		});
		document.getElementById("total").textContent = '00';
		document.getElementById("sub_total").textContent = '00';
		document.getElementById("total_items").textContent = 0;
	}

	function searchProd(){
		var word = document.getElementById('search_name').value;
		$('#product_view').load('pos_table.php',{
			word : word
		});
	}

	function updateView(cat_id, cat_name){
		const categories = document.querySelectorAll(".product_cat");
		categories.forEach(function(category) {
			  category.classList.remove("active");
			});
			document.getElementById(cat_name).classList.add("active");



		$('#product_view').load('pos_table.php',{
			cat_id : cat_id
		});
	}

	let cart = [];
	let quantities = [];


	function selectProduct(prodId){
		console.log(cart);
		if(cart.length > 0){
			cart.forEach(function(id) {
				var quantity_val = document.getElementById(`quantity${id}`).value;
				var discount_val = document.getElementById(`discount${id}`).value;
				var price_val = document.getElementById(`m_price${id}`).value;
				var dis_type = document.getElementById(`discount_type${id}`).value;
				var final_price = document.getElementById(`final_price${id}`).value;
				// console.log(final_price);

				exist= false;
				for (var i = 0; i < quantities.length; i++) {
					if (quantities[i].id === id) {
						exist = true;
						break;
					}
				}
				if(!exist){
					quantities.push({ 'id' : id, 'quantityValue': quantity_val,'discountValue': discount_val, 'm_price': price_val, 'final_price':final_price, 'dis_type':dis_type});

				}else{
					quantities[i].dis_type = dis_type;
					quantities[i].quantityValue = quantity_val;
					quantities[i].m_price = price_val;
					quantities[i].discountValue = discount_val;
					quantities[i].final_price = final_price;
				}

			});
			// console.log(quantities);
			if(!cart.includes(prodId)) {
		    cart.unshift(prodId);
			}else{

					for (var i = 0; i < quantities.length; i++) {
				    if (quantities[i].id === prodId) {
				      quantities[i].quantityValue++;
				      break;
				    }
				  }
			}
		}else{
			cart.push(prodId);
		}
		$('#orderlist').load('pos_order_table.php',{
			prod_ids : JSON.stringify(cart)
		}, function (){
			if(quantities.length > 0){

				quantities.forEach(function(quantity) {
					var id = quantity.id;
					var q_value = quantity.quantityValue;
					var m_price = quantity.m_price;
					var d_value = quantity.discountValue;
					var d_type = quantity.dis_type;
					var final_price = quantity.final_price;

					document.getElementById(`quantity${id}`).value = q_value;
					document.getElementById(`m_price${id}`).value = m_price;
					document.getElementById(`discount${id}`).value = d_value;
					document.getElementById(`discount_type${id}`).value = d_type;
					document.getElementById(`final_price${id}`).value = final_price;
				});

			}
			var items = document.querySelectorAll('.price').length;
			document.getElementById("total_items").textContent = items;
			setDiscount();
			totalValue();
		});


	}
function changePrice(price,p_id){

	document.getElementById('m_price_'+p_id).innerHTML = price;
}

	function totalValue(qnty,ent_value,res_id){
		if(ent_value > qnty){
			document.getElementById('quantity'+res_id).value=qnty;
			alert('Quantity cannot exceed with available stock');
		}
		// var discount_type = document.getElementById('discount_type').value;

		total = 0.00;
		var prices = document.querySelectorAll('.price');
		var quantity_vals = document.querySelectorAll('.quantity_val');
		var discounts = document.querySelectorAll('.discount');
		var discount_types = document.querySelectorAll('.discount_type');

		var ori_prices = document.querySelectorAll('.original_price');
		var final_prices = document.querySelectorAll('.final_price');

		var del_charge = parseInt(document.getElementById('delivery_charge').value);

		// for(i=0; i <prices.length; i++){
		// 	price = parseInt(prices[i].value);
		// 	// ori_price = parseInt(ori_prices[i].innerText);
		// 	if(quantity_vals[i].value){
		// 		quantity = parseInt(quantity_vals[i].value);
		// 	}else{
		// 		quantity = 0;
		// 	}
		// 	if(discounts[i].value){
		// 		discount = parseInt(discounts[i].value);
		// 	}else{
		// 		discount = 0.00;
		// 	}
		// 	if(discount[i].value){
		// 		if(discount_types[i].value == "percentage"){
		// 			newPrice = price*(1-discount/100)
		// 			total = total + price*quantity*(1-discount/100);
		// 		}else{
		// 			newPrice = (price-discount)
		// 			total = total + quantity*price - discount;
		// 		}
		// 	}else{
		// 		total = total + price;
		// 	}
		//
		// 	if(price != newPrice){
		// 		let newPriceElem = ori_prices[i].nextElementSibling;
		// 		if (!newPriceElem || newPriceElem.id !== 'new-price') {
		// 		  // Create a new price element if it doesn't already exist
		// 		  newPriceElem = document.createElement('span');
		// 		  newPriceElem.id = 'new-price';
		// 		  ori_prices[i].after(newPriceElem);
		// 		}
		//
		// 		newPriceElem.innerText = ` Rs ${newPrice.toFixed(2)}`;
		// 		prices[i].value = newPrice.toFixed(2);
		// 		ori_prices[i].style.textDecoration = 'line-through';
		// 		ori_prices[i].after(newPriceElem);
		// 	}
		// }
		for(i=0; i <prices.length; i++){
			price = parseInt(prices[i].value);
			ori_price = parseInt(ori_prices[i].innerText);
			if(quantity_vals[i].value){
				quantity = parseInt(quantity_vals[i].value);
			}else{
				quantity = 0;
			}
			if(discounts[i].value){
				discount = parseInt(discounts[i].value);
			}else{
				discount = 0.00;
			}

			if(discount_types[i].value == "percentage"){
				newPrice = Math.round(price*(1-discount/100))
				total = total + Math.round(price*quantity*(1-discount/100));
			}else{
				newPrice = Math.round(price-discount)
				total = total + Math.round(quantity*(price - discount));
			}
			// console.log(ori_price);
			if(ori_price != newPrice){
				let newPriceElem = ori_prices[i].nextElementSibling;
				if (!newPriceElem || newPriceElem.id !== 'new-price') {
				  // Create a new price element if it doesn't already exist
				  newPriceElem = document.createElement('span');
				  newPriceElem.id = 'new-price';
				  ori_prices[i].after(newPriceElem);
				}

				newPriceElem.innerText = ` Rs ${newPrice.toFixed(2)}`;
				final_prices[i].value = newPrice.toFixed(2);
				ori_prices[i].style.textDecoration = 'line-through';
				ori_prices[i].after(newPriceElem);
			}
		}
		total = total + del_charge;
		document.getElementById("total").textContent = total;
		document.getElementById("sub_total").textContent = total;
	}

	function del_prod(id) {
		if(cart.length > 0){
			cart.forEach(function(sub_id) {
				var quantity_val = document.getElementById(`quantity${sub_id}`).value;
				var discount_val = document.getElementById(`discount${sub_id}`).value;
				var price_val = document.getElementById(`m_price${sub_id}`).value;
				var dis_type = document.getElementById(`discount_type${sub_id}`).value;
				var final_price = document.getElementById(`final_price${sub_id}`).value;
				// console.log(final_price);

				exist= false;
				for (var i = 0; i < quantities.length; i++) {
					if (quantities[i].id === sub_id) {
						exist = true;
						break;
					}
				}
				if(exist){
					quantities[i].dis_type = dis_type;
					quantities[i].quantityValue = quantity_val;
					quantities[i].m_price = price_val;
					quantities[i].discountValue = discount_val;
					quantities[i].final_price = final_price;
				}

			});
		}
			// console.log(quantities);


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

			if(t.value){
				const index = cart.indexOf(id);
				if (index > -1) { // only splice array when item is found
				  cart.splice(index, 1); // 2nd parameter means remove one item only
				}
				for (var i = quantities.length - 1; i >= 0; --i) {
				    if (quantities[i].id == id) {
				        quantities.splice(i,1);
				    }
				}

				$('#orderlist').load('pos_order_table.php',{
					prod_ids : JSON.stringify(cart)
				}, function (){
					// console.log(quantities);
					if(quantities.length > 0){
						quantities.forEach(function(quantity) {
							var id = quantity.id;
							var m_price = quantity.m_price;
							var q_value = quantity.quantityValue;
							var d_value = quantity.discountValue;
							var final_price = quantity.final_price;
							var dis_type = quantity.dis_type;


							document.getElementById(`quantity${id}`).value = q_value;
							document.getElementById(`m_price${id}`).value = m_price;
							document.getElementById(`discount${id}`).value = d_value;
							document.getElementById(`final_price${id}`).value = final_price;
							document.getElementById(`discount_type${id}`).value = dis_type;


						});
					}
					setDiscount();
					totalValue();

					var items = document.querySelectorAll('.price').length;
					document.getElementById("total_items").textContent = items;
				});

			}
		});
	}
	// function del_order_grm(id) {
	// 	Swal.fire({
	// 		title: "Are you sure?",
	// 		text: "You won't be able to revert this!",
	// 		type: "warning",
	// 		showCancelButton: !0,
	// 		confirmButtonColor: "#3085d6",
	// 		cancelButtonColor: "#d33",
	// 		confirmButtonText: "Yes, delete it!",
	// 		confirmButtonClass: "btn btn-primary",
	// 		cancelButtonClass: "btn btn-danger ml-1",
	// 		buttonsStyling: !1,
	// 	}).then(function (t) {
	//
	// 		if(t.value){
	// 			const index = cart.indexOf(id);
	// 			if (index > -1) { // only splice array when item is found
	// 			  cart.splice(index, 1); // 2nd parameter means remove one item only
	// 			}
	// 			for (var i = quantities.length - 1; i >= 0; --i) {
	// 			    if (quantities[i].id == id) {
	// 			        quantities.splice(i,1);
	// 			    }
	// 			}
	//
	// 			$('#orderlist').load('pos_order_table.php',{
	// 				prod_ids : JSON.stringify(cart)
	// 			}, function (){
	// 				if(quantities.length > 0){
	// 					quantities.forEach(function(quantity) {
	// 						var id = quantity.id;
	// 						var q_value = quantity.quantityValue;
	// 						var d_value = quantity.discountValue;
	//
	// 						document.getElementById(`quantity${id}`).value = q_value;
	// 						document.getElementById(`discount${id}`).value = d_value;
	//
	// 					});
	// 				}
	// 				setDiscount();
	// 				totalValue();
	//
	// 				var items = document.querySelectorAll('.price').length;
	// 				document.getElementById("total_items").textContent = items;
	// 			});
	//
	// 		}
	// 	});
	// }

	function setDiscount(){
		var discount = document.getElementById('discount_total').value;
		var discount_type = document.getElementById('discount_type_main').value;

		// if(quantities.length > 0 && discount){
		// 	quantities.forEach(function(quantity) {
		// 		var id = quantity.id;
		// 		document.getElementById(`discount${id}`).value = discount;
		//
		// 	});
		// }
		if(discount){

			document.querySelectorAll('.discount').forEach((item, i) => {
				item.value = discount;
			});
			document.querySelectorAll('.discount_type').forEach((item, i) => {

				for(var i = 0; i < item.options.length; i++) {
				  if(item.options[i].value == discount_type) {
				    item.selectedIndex = i;
				    break;
				  }
				}
			});



		}
		totalValue();

	}

// barcode
let code = "";
let reading = false;

document.addEventListener('keypress', e => {
  //usually scanners throw an 'Enter' key at the end of read
   if (e.keyCode === 13) {
          if(code.length > 10) {
            document.getElementById('search_name').value=code;
						searchProd();
            /// code ready to use
            code = "";
         }
    } else {
        code += e.key; //while this is not an 'enter' it stores the every key
    }

    //run a timeout of 200ms at the first read and clear everything
    if(!reading) {
        reading = true;
        setTimeout(() => {
            code = "";
            reading = false;
        }, 200);  //200 works fine for me but you can adjust it
    }
});
	</script>

    </body>
</html>
