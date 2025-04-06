﻿<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
	<meta name="description" content="POS - Bootstrap Admin Template" />
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
	<meta name="author" content="Dreamguys - Bootstrap Admin Template" />
	<meta name="robots" content="noindex, nofollow" />
	<title>Dreams Pos admin template</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg" />

	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

	<link rel="stylesheet" href="assets/css/animate.css" />

	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

	<link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
	<div id="global-loader">
		<div class="whirly-loader"></div>
	</div>

	<div class="main-wrapper">
		<div class="header">
			<div class="header-left active">
				<a href="index.html" class="logo">
					<img src="assets/img/logo.png" alt="" />
				</a>
				<a href="index.html" class="logo-small">
					<img src="assets/img/logo-small.png" alt="" />
				</a>
				<a id="toggle_btn" href="javascript:void(0);"> </a>
			</div>

			<a id="mobile_btn" class="mobile_btn" href="#sidebar">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>

			<ul class="nav user-menu">
				<li class="nav-item">
					<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search">
							<i class="fa fa-search"></i>
						</a>
						<form action="#">
							<div class="searchinputs">
								<input type="text" placeholder="Search Here ..." />
								<div class="search-addon">
									<span><img src="assets/img/icons/closes.svg" alt="img" /></span>
								</div>
							</div>
							<a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img" /></a>
						</form>
					</div>
				</li>

				<li class="nav-item dropdown has-arrow flag-nav">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
						role="button">
						<img src="assets/img/flags/us1.png" alt="" height="20" />
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/us.png" alt="" height="16" /> English
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/fr.png" alt="" height="16" /> French
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/es.png" alt="" height="16" /> Spanish
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/de.png" alt="" height="16" /> German
						</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<img src="assets/img/icons/notification-bing.svg" alt="img" />
						<span class="badge rounded-pill">4</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar flex-shrink-0">
												<img alt="" src="assets/img/profiles/avatar-02.jpg" />
											</span>
											<div class="media-body flex-grow-1">
												<p class="noti-details">
													<span class="noti-title">John Doe</span> added new
													task
													<span class="noti-title">Patient appointment booking</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">4 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar flex-shrink-0">
												<img alt="" src="assets/img/profiles/avatar-03.jpg" />
											</span>
											<div class="media-body flex-grow-1">
												<p class="noti-details">
													<span class="noti-title">Tarah Shropshire</span>
													changed the task name
													<span class="noti-title">Appointment booking with payment
														gateway</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">6 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar flex-shrink-0">
												<img alt="" src="assets/img/profiles/avatar-06.jpg" />
											</span>
											<div class="media-body flex-grow-1">
												<p class="noti-details">
													<span class="noti-title">Misty Tison</span> added
													<span class="noti-title">Domenic Houston</span> and
													<span class="noti-title">Claire Mapes</span> to
													project
													<span class="noti-title">Doctor available module</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">8 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar flex-shrink-0">
												<img alt="" src="assets/img/profiles/avatar-17.jpg" />
											</span>
											<div class="media-body flex-grow-1">
												<p class="noti-details">
													<span class="noti-title">Rolland Webber</span>
													completed task
													<span class="noti-title">Patient and Doctor video
														conferencing</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">12 mins ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.html">
										<div class="media d-flex">
											<span class="avatar flex-shrink-0">
												<img alt="" src="assets/img/profiles/avatar-13.jpg" />
											</span>
											<div class="media-body flex-grow-1">
												<p class="noti-details">
													<span class="noti-title">Bernardo Galaviz</span>
													added new task
													<span class="noti-title">Private chat module</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">2 days ago</span>
												</p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="activities.html">View all Notifications</a>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown has-arrow main-drop">
					<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
						<span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="" />
							<span class="status online"></span></span>
					</a>
					<div class="dropdown-menu menu-drop-user">
						<div class="profilename">
							<div class="profileset">
								<span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="" />
									<span class="status online"></span></span>
								<div class="profilesets">
									<h6>John Doe</h6>
									<h5>Admin</h5>
								</div>
							</div>
							<hr class="m-0" />
							<a class="dropdown-item" href="profile.html">
								<i class="me-2" data-feather="user"></i> My Profile</a>
							<a class="dropdown-item" href="generalsettings.html"><i class="me-2"
									data-feather="settings"></i>Settings</a>
							<hr class="m-0" />
							<a class="dropdown-item logout pb-0" href="signin.html"><img
									src="assets/img/icons/log-out.svg" class="me-2" alt="img" />Logout</a>
						</div>
					</div>
				</li>
			</ul>

			<div class="dropdown mobile-user-menu">
				<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
					aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="profile.html">My Profile</a>
					<a class="dropdown-item" href="generalsettings.html">Settings</a>
					<a class="dropdown-item" href="signin.html">Logout</a>
				</div>
			</div>
		</div>

		<?php
		include_once("./navbar.php")
		?>

		<div class="page-wrapper">
			<div class="content">
				<div class="page-header">
					<div class="page-title">
						<h4>Sales Order List</h4>
						<h6>Manage your Sales orders</h6>
					</div>
					<div class="page-btn">
						<a href="createsalesreturn.php" class="btn btn-added"><img src="assets/img/icons/plus.svg"
								alt="img" class="me-2" />Add New Sales Order</a>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<div class="table-top">
							<div class="search-set">
								<div class="search-path">
									<a class="btn btn-filter" id="filter_search">
										<img src="assets/img/icons/filter.svg" alt="img" />
										<span><img src="assets/img/icons/closes.svg" alt="img" /></span>
									</a>
								</div>
								<div class="search-input">
									<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
											alt="img" /></a>
								</div>
							</div>
							<div class="wordset">
								<ul>
									<li>
										<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
												src="assets/img/icons/pdf.svg" alt="img" /></a>
									</li>
									<li>
										<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
												src="assets/img/icons/excel.svg" alt="img" /></a>
									</li>
									<li>
										<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
												src="assets/img/icons/printer.svg" alt="img" /></a>
									</li>
								</ul>
							</div>
						</div>

						<div class="card" id="filter_inputs">
							<div class="card-body pb-0">
								<div class="row">
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="form-group">
											<input type="text" class="datetimepicker cal-icon"
												placeholder="Choose Date" />
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="form-group">
											<input type="text" placeholder="Enter Reference" />
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="form-group">
											<select class="select">
												<option>Choose Customer</option>
												<option>Customer</option>
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
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="form-group">
											<select class="select">
												<option>Choose Payment Status</option>
												<option>Payment Status</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-sm-6 col-12">
										<div class="form-group">
											<a class="btn btn-filters ms-auto"><img
													src="assets/img/icons/search-whites.svg" alt="img" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table datanew">
								<thead>
									<tr>
										<th>
											<label class="checkboxs">
												<input type="checkbox" id="select-all" />
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Product Name</th>
										<th>Date</th>
										<th>Customer</th>
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
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product1.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Macbook pro</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Thomas</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>550</td>
										<td>120</td>
										<td>550</td>
										<td><span class="badges bg-lightgreen">Paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product2.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Orange</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Benjamin</td>
										<td><span class="badges bg-lightred">Pending</span></td>
										<td>550</td>
										<td>120</td>
										<td>550</td>
										<td><span class="badges bg-lightred">Unpaid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product3.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Pineapple</a>
										</td>
										<td>19 Nov 2022</td>
										<td>James</td>
										<td><span class="badges bg-lightred">Pending</span></td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightred">Unpaid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product4.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Strawberry</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Bruklin</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightgreen">Paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product5.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Avocat</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Beverly</td>
										<td><span class="badges bg-lightred">Pending</span></td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightred">UnPaid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product6.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Macbook Pro</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Best Power Tools</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightgreen">paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product7.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Apple Earpods</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Apex Computers</td>
										<td>
											<span class="badges bg-lightyellow">Ordered</span>
										</td>
										<td>1000</td>
										<td>500</td>
										<td>1000</td>
										<td>
											<span class="badges bg-lightyellow">Partial</span>
										</td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product1.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Macbook pro</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Thomas</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>550</td>
										<td>120</td>
										<td>550</td>
										<td><span class="badges bg-lightgreen">Paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product2.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Orange</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Benjamin</td>
										<td>
											<span class="badges bg-lightyellow">Pending</span>
										</td>
										<td>550</td>
										<td>120</td>
										<td>550</td>
										<td>
											<span class="badges bg-lightyellow">Partial</span>
										</td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product3.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Pineapple</a>
										</td>
										<td>19 Nov 2022</td>
										<td>James</td>
										<td><span class="badges bg-lightred">Pending</span></td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightred">Unpaid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product4.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Strawberry</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Bruklin</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightgreen">Paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product5.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Avocat</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Beverly</td>
										<td><span class="badges bg-lightred">Pending</span></td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightred">UnPaid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product6.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Macbook Pro</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Best Power Tools</td>
										<td>
											<span class="badges bg-lightgreen">Received</span>
										</td>
										<td>210</td>
										<td>120</td>
										<td>210</td>
										<td><span class="badges bg-lightgreen">paid</span></td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<label class="checkboxs">
												<input type="checkbox" />
												<span class="checkmarks"></span>
											</label>
										</td>
										<td class="productimgname">
											<a href="javascript:void(0);" class="product-img">
												<img src="assets/img/product/product7.jpg" alt="product" />
											</a>
											<a href="javascript:void(0);">Apple Earpods</a>
										</td>
										<td>19 Nov 2022</td>
										<td>Apex Computers</td>
										<td>
											<span class="badges bg-lightyellow">Ordered</span>
										</td>
										<td>1000</td>
										<td>500</td>
										<td>1000</td>
										<td>
											<span class="badges bg-lightyellow">Partial</span>
										</td>
										<td>
											<a class="me-3" href="editsalesreturns.html">
												<img src="assets/img/icons/edit.svg" alt="img" />
											</a>
											<a class="me-3 confirm-text" href="javascript:void(0);">
												<img src="assets/img/icons/delete.svg" alt="img" />
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

	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/feather.min.js"></script>

	<script src="assets/js/jquery.slimscroll.min.js"></script>

	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>

	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
	<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

	<script src="assets/js/script.js"></script>
</body>

</html>