

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
							<h4>Sales List</h4>
							<h6>Manage your sales</h6>
						</div>
						<div class="page-btn">
							<a href="add-sales.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add Sales</a>
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
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Name">
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<input type="text" placeholder="Enter Reference No">
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<select class="select">
													<option>Completed</option>
													<option>Paid</option>
												</select>
											</div>
										</div>
										<div class="col-lg-3 col-sm-6 col-12">
											<div class="form-group">
												<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Filter -->
							<div class="table-responsive">
								<table class="table  datanew">
									<thead>
										<tr>
											<th>
												<label class="checkboxs">
													<input type="checkbox" id="select-all">
													<span class="checkmarks"></span>
												</label>
											</th>
											<th>Date</th>
											<th>Customer Name</th>
											<th>Reference</th>
											<th>Status</th>
											<th>Payment</th>
											<th>Total</th>
											<th>Paid</th>
											<th>Due</th>
											<th>Biller</th>
											<th class="text-center">Action</th>
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
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0101</td>
											<td><span class="badges bg-lightgreen">Completed</span></td>
											<td><span class="badges bg-lightgreen">Paid</span></td>
											<td>0.00</td>
											<td>0.00</td>
											<td class="text-red">100.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0102</td>
											<td><span class="badges bg-lightgreen">Completed</span></td>
											<td><span class="badges bg-lightgreen">Paid</span></td>
											<td>0.00</td>
											<td>0.00</td>
											<td class="text-red">100.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0103</td>
											<td><span class="badges bg-lightgreen">Completed</span></td>
											<td><span class="badges bg-lightgreen">Paid</span></td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);"  data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Fred C. Rasmussen</td>
											<td>19 Nov 2022</td>
											<td>SL0104</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Thomas M. Martin</td>
											<td>19 Nov 2022</td>
											<td>SL0105</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td><td>0.00</td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Thomas M. Martin</td>
											<td>19 Nov 2022</td>
											<td>SL0106</td>
											<td><span class="badges bg-lightgreen">Completed</span></td>
											<td><span class="badges bg-lightgreen">Paid</span></td>
											<td>0.00</td>
											<td>0.00</td>
											<td class="text-red">100.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0107</td>
											<td><span class="badges bg-lightgreen">Completed</span></td>
											<td><span class="badges bg-lightgreen">Paid</span></td>
											<td>0.00</td>
											<td>0.00</td>
											<td class="text-red">100.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0108</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0109</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0110</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td>
											<td>0.00</td>
											<td class="text-green">100.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>walk-in-customer</td>
											<td>19 Nov 2022</td>
											<td>SL0111</td>
											<td><span class="badges bg-lightred">Pending</span></td>
											<td><span class="badges bg-lightred">Due</span></td>
											<td>0.00</td>
											<td>0.00</td>
											<td>0.00</td>
											<td>Admin</td>
											<td class="text-center">
												<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</a>
												<ul class="dropdown-menu"  >
													<li>
														<a href="sales-details.html" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
													</li>
													<li>
														<a href="edit-sales.html" class="dropdown-item"><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item"><img src="assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
													</li>
												</ul>
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

		<!-- show payment Modal -->
		<div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Show Payments</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Date</th>
										<th>Reference</th>
										<th>Amount	</th>
										<th>Paid By	</th>
										<th>Paid By	</th>
									</tr>
								</thead>
								<tbody>
									<tr class="bor-b1">
										<td>2022-03-07	</td>
										<td>INV/SL0101</td>
										<td>$ 0.00	</td>
										<td>Cash</td>
										<td>
											<a class="me-2" href="javascript:void(0);">
												<img src="assets/img/icons/printer.svg" alt="img">
											</a>
											<a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal" >
												<img src="assets/img/icons/edit.svg" alt="img">
											</a>
											<a class="me-2 confirm-text" href="javascript:void(0);">
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
		<!-- show payment Modal -->

		<!-- show payment Modal -->
		<div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Payment</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Customer</label>
									<div class="input-groupicon">
										<input type="text" value="2022-03-07" class="datetimepicker">
										<div class="addonset">
											<img src="assets/img/icons/calendars.svg" alt="img">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Reference</label>
									<input type="text" value="INV/SL0101">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Received Amount</label>
									<input type="text" value="0.00">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Paying Amount</label>
									<input type="text" value="0.00">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Payment type</label>
									<select class="select">
										<option>Cash</option>
										<option>Online</option>
										<option>Inprogress</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group mb-0">
									<label>Note</label>
									<textarea class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-submit">Submit</button>
						<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- show payment Modal -->

		<!-- edit payment Modal -->
		<div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Payment</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Customer</label>
									<div class="input-groupicon">
										<input type="text" value="2022-03-07" class="datetimepicker">
										<div class="addonset">
											<img src="assets/img/icons/datepicker.svg" alt="img">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Reference</label>
									<input type="text" value="INV/SL0101">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Received Amount</label>
									<input type="text" value="0.00">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Paying Amount</label>
									<input type="text" value="0.00">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Payment type</label>
									<select class="select">
										<option>Cash</option>
										<option>Online</option>
										<option>Inprogress</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group mb-0">
									<label>Note</label>
									<textarea class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-submit">Submit</button>
						<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- edit payment Modal -->


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

		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Sweetalert 2 -->
		<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
		<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

    </body>
</html>
