

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
								<h4>Purchase Return List</h4>
								<h6>Manage your Returns</h6>
							</div>
							<div class="page-btn">
								<a href="createpurchasereturn.html" class="btn btn-added">
									<img src="assets/img/icons/plus.svg" alt="img" class="me-2">Add Purchase Return
								</a>
							</div>
						</div>
						<!-- /product list -->
						<div class="card">
							<div class="card-body">
								<div class="table-top">
									<div class="search-set">
										<div class="search-path">
											<a class="btn btn-filter" id="filter_search">
												<img src="assets/img/icons/filter.svg" alt="img">
												<span><img src="assets/img/icons/closes.svg" alt="img"></span>
											</a>
										</div>
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
								<!-- /Filter -->
								<div class="card" id="filter_inputs">
									<div class="card-body pb-0">
										<div class="row">
											<div class="col-lg-2 col-sm-6 col-12">
												<div class="form-group">
													<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date" >
												</div>
											</div>
											<div class="col-lg-2 col-sm-6 col-12">
												<div class="form-group">
													<input type="text" placeholder="Enter Reference">
												</div>
											</div>
											<div class="col-lg-2 col-sm-6 col-12">
												<div class="form-group">
													<select class="select">
														<option>Choose Supplier</option>
														<option>Supplier</option>
													</select>
												</div>
											</div>
											<div class="col-lg-2 col-sm-6 col-12">
												<div class="form-group">
													<select class="select">
														<option>Choose Status</option>
														<option>Inprogress</option>
													</select>
												</div>
											</div>
											<div class="col-lg-1 col-sm-6 col-12 ms-auto">
												<div class="form-group">
													<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Filter -->
								<div class="table-responsive">
									<table class="table datanew">
										<thead>
											<tr>
												<th>
													<label class="checkboxs">
														<input type="checkbox" id="select-all">
														<span class="checkmarks"></span>
													</label>
												</th>
												<th>Image</th>
												<th>Date</th>
												<th>Supplier</th>
												<th>Reference</th>
												<th>Status</th>
												<th>Grand Total ($)</th>
												<th>Paid ($)</th>
												<th>Due ($)</th>
												<th>Payment Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product1.jpg" alt="product">
													</a>
												</td>
												<td>2/27/2022</td>
												<td>Apex Computers </td>
												<td>PT001</td>
												<td><span class="badges bg-lightgreen">Received</span></td>
												<td>550</td>
												<td>120</td>
												<td>550</td>
												<td><span class="badges bg-lightgreen">Paid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product2.jpg" alt="product">
													</a>
												</td>
												<td>1/15/2022</td>
												<td>Modern Automobile</td>
												<td>PT002</td>
												<td><span class="badges bg-lightyellow">Ordered</span></td>
												<td>550</td>
												<td>120</td>
												<td>550</td>
												<td><span class="badges bg-lightyellow">Partial</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product3.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>AIM Infotech</td>
												<td>PT003</td>
												<td><span class="badges bg-lightred">Pending</span></td>
												<td>210</td>
												<td>120</td>
												<td>210</td>
												<td><span class="badges bg-lightred">Unpaid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product4.jpg" alt="product">
													</a>
												</td>
												<td>1/15/2022</td>
												<td>Best Power Tools</td>
												<td>PT004</td>
												<td><span class="badges bg-lightgreen">Received</span></td>
												<td>210</td>
												<td>120</td>
												<td>210</td>
												<td><span class="badges bg-lightgreen">Paid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product5.jpg" alt="product">
													</a>
												</td>
												<td>1/15/2022</td>
												<td>AIM Infotech</td>
												<td>PT005</td>
												<td><span class="badges bg-lightred">Pending</span></td>
												<td>210</td>
												<td>120</td>
												<td>210</td>
												<td><span class="badges bg-lightred">UnPaid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product6.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>Best Power Tools</td>
												<td>PT006</td>
												<td><span class="badges bg-lightgreen">Received</span></td>
												<td>210</td>
												<td>120</td>
												<td>210</td>
												<td><span class="badges bg-lightgreen">paid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product7.jpg" alt="product">
													</a>
												</td>
												<td>1/15/2022</td>
												<td>Apex Computers</td>
												<td>PT007</td>
												<td><span class="badges bg-lightyellow">Ordered</span></td>
												<td>1000</td>
												<td>500</td>
												<td>1000</td>
												<td><span class="badges bg-lightyellow">Partial</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product8.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>Best Power Tools</td>
												<td>PT008</td>
												<td><span class="badges bg-lightgreen">Received</span></td>
												<td>210</td>
												<td>120</td>
												<td>210</td>
												<td><span class="badges bg-lightgreen">paid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product9.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>Hatimi Hardware & Tools</td>
												<td>PT009</td>
												<td><span class="badges bg-lightred">Pending</span></td>
												<td>5500</td>
												<td>550</td>
												<td>5500</td>
												<td><span class="badges bg-lightred">Unpaid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product10.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>Best Power Tools</td>
												<td>PT0010</td>
												<td><span class="badges bg-lightred">Pending</span></td>
												<td>2580</td>
												<td>1250</td>
												<td>2580</td>
												<td><span class="badges bg-lightred">Unpaid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
														<img src="assets/img/icons/edit.svg" alt="img">
													</a>
													<a class="me-3 confirm-text" href="javascript:void(0);">
														<img src="assets/img/icons/delete.svg" alt="img">
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<label class="checkboxs">
														<input type="checkbox">
														<span class="checkmarks"></span>
													</label>
												</td>
												<td>
													<a class="product-img">
														<img src="assets/img/product/product5.jpg" alt="product">
													</a>
												</td>
												<td>3/24/2022</td>
												<td>Best Power Tools</td>
												<td>PT0011</td>
												<td><span class="badges bg-lightred">Pending</span></td>
												<td>2580</td>
												<td>1250</td>
												<td>2580</td>
												<td><span class="badges bg-lightred">Unpaid</span></td>
												<td>

													<a class="me-3" href="editpurchasereturn.html">
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
						<!-- /product list -->
					</div>
				</div>
			</div>
			<!-- /Main Wrapper -->

			<!-- jQuery -->
			<script src="assets/js/jquery-3.6.0.min.js"></script>

			<!-- Feather Icon JS -->
			<script src="assets/js/feather.min.js"></script>

			<!-- Slimscroll JS -->
			<script src="assets/js/jquery.slimscroll.min.js"></script>

			<!-- Datatable JS -->
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/dataTables.bootstrap4.min.js"></script>

			<!-- Bootstrap Core JS -->
			<script src="assets/js/bootstrap.bundle.min.js"></script>

			<!-- Datetimepicker JS -->
			<script src="assets/js/moment.min.js"></script>
			<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

			<!-- Select2 JS -->
			<script src="assets/plugins/select2/js/select2.min.js"></script>

			<!-- Sweetalert 2 -->
			<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
			<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

			<!-- Custom JS -->
			<script src="assets/js/script.js"></script>

		</body>
	</html>
