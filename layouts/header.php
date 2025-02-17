<?php include 'backend/conn.php'; ?>
<?php

	if(!isset($_SESSION['user_logged'])){
	header('location:./signin.php');
	exit();
}else{
	$u_id = $_SESSION['u_id'];
}  ?>


<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
		<meta name="author" content="Dreamguys - Bootstrap Admin Template">
		<meta name="robots" content="noindex, nofollow">
		<title>POS ADMIN</title>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

		<!-- Animation CSS -->
		<link rel="stylesheet" href="assets/css/animate.css">



		<!-- Datatable CSS -->
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css?new">





	</head>
	<body>
		<div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div>
		<!-- Main Wrapper -->
		<div class="main-wrapper">

<div class="header">

  <!-- Logo -->
   <div class="header-left active">

    <a href="index.php" class="logo logo-normal">
			<?php
 		 if($u_id=='4'){ ?>
      <img src="../assets/img/logo-22.png"  alt="">
		<?php }elseif($u_id=='2'){ ?>
			<h4>Cardamom</h4>
		<?php }elseif($u_id=='3'){ ?>
				<h4>Main stores</h4>
			<?php }else{ ?>
				<img src="../assets/img/logo-22.png"  alt="">
			<?php } ?>
    </a>

    <a href="index.php" class="logo logo-white">
      <!-- <img src="../assets/img/logo-white.png"  alt=""> -->
    </a>
    <a href="index.php" class="logo-small">
      <!-- <img src="../assets/img/logo-small.png"  alt=""> -->
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
    </a>
  </div>
  <!-- /Logo -->

  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>

  <!-- Header Menu -->
  <ul class="nav user-menu">

    <!-- Search -->
    <!-- <li class="nav-item">
      <div class="top-nav-search">

        <a href="javascript:void(0);" class="responsive-search">
          <i class="fa fa-search"></i>
      </a>
        <form action="#">
          <div class="searchinputs">
            <input type="text" placeholder="Search Here ...">
            <div class="search-addon">
              <span><img src="../assets/img/icons/closes.svg" alt="img"></span>
            </div>
          </div>
          <a class="btn"  id="searchdiv"><img src="../assets/img/icons/search.svg" alt="img"></a>
        </form>
      </div>
    </li> -->
    <!-- /Search -->

    <!-- Flag -->

    <!-- /Flag -->

    <!-- Notifications -->
    <li class="nav-item dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
        <img src="assets/img/icons/notification-bing.svg"   alt="img"> <span class="badge rounded-pill">0</span>
      </a>
      <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
          <span class="notification-title">Notifications</span>
          <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
        </div>
        <div class="noti-content">
          <ul class="notification-list">
            <li class="notification-message">
              <a href="#activities.html">
                <div class="media d-flex">
                  <div class="media-body flex-grow-1">
                    <p class="noti-details"><span class="noti-title">Notification Panel</span> </p>
                    <!-- <p class="noti-time"><span class="notification-time">4 mins ago</span></p> -->
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
    <!-- /Notifications -->

    <li class="nav-item dropdown has-arrow main-drop">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
        <span class="status online"></span></span>
      </a>
      <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
          <div class="profileset">
            <span class="status online"></span></span>
            <div class="profilesets">
              <!-- <h6>John Doe</h6> -->
							<?php
							$sql="SELECT * FROM tbl_user WHERE user_id = '$u_id'";
							$rs = $conn->query($sql);
							$row = $rs->fetch_assoc();
							 ?>
              <h5><?= $row['username'] ?></h5>
            </div>
          </div>
          <hr class="m-0">
          <!-- <a class="dropdown-item" href="profile.html"> <i class="me-2"  data-feather="user"></i> My Profile</a>
          <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a> -->
          <hr class="m-0">
          <a class="dropdown-item logout pb-0" href="backend/logout.php"><img src="../assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
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
