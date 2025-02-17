<?php include '/home/posfkpop/public_html/backend/conn.php';
 ?>
<?php

	if((!isset($_SESSION['user_logged_final'])) AND (!isset($_SESSION['user_logged'])) ){
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
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

		<!-- Animation CSS -->
		<link rel="stylesheet" href="../assets/css/animate.css">



		<!-- Datatable CSS -->
		<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css?new">





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
     <span><h3 id="countdown"></h3>Seconds Until Refresh</span>
  </div>
  <!-- /Logo -->



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
        <img src="../assets/img/icons/notification-bing.svg"   alt="img"> <span class="badge rounded-pill">0</span>
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
        <span class="user-img"><img src="../assets/img/profiles/avator1.jpg" alt="">
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

      <a class="dropdown-item" href="signin.html">Logout</a>
    </div>
  </div>
  <!-- /Mobile Menu -->
</div>


<div class="">
  <div class="content"><br><br>
    <div class="row">
      <div style="padding:50px"class="col-lg-6 col-sm-6 col-12">
        <div class="page-title">

          <h3 style="text-align:center">Fivestories</h3><hr>
          <h6>Confirmed Orders</h6>
        </div>
        <div id="confirmed_fivestories" class="table-responsive">

        </div><br><hr> <br>
        <div class="page-title">
          <h6>Packed Orders</h6>
        </div>
        <div id="packed_fivestories" class="table-responsive">

        </div><br><hr> <br>
        <div class="page-title">
          <h6>Out For Delivery</h6>
        </div>
        <div id="delivered_fivestories" class="table-responsive">

        </div>
      </div>
      <div style="padding:50px" class="col-lg-6 col-sm-6 col-12">
        <div id="grm_table" class="table-responsive">
          <div class="page-title">

            <h3 style="text-align:center">Cardamom</h3><hr>
            <h6>Confirmed Orders</h6>
          </div>
          <div id="confirmed_cardamom" class="table-responsive">

          </div><br><hr> <br>
          <div class="page-title">
            <h6>Packed Orders</h6>
          </div>
          <div id="packed_cardamom" class="table-responsive">

          </div><br><hr> <br>
          <div class="page-title">
            <h6>Out For Delivery</h6>
          </div>
          <div id="delivered_cardamom" class="table-responsive">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" >Order Details</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="call_modal_table" class="table-responsive">

          </div>

        </div>
        <!-- <div class="col-lg-12">
          <a onclick="addCustomer()" class="btn btn-submit me-2">Submit</a>
          <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
        </div> -->
      </div>
    </div>
  </div>
</div>



  <?php include './layouts/footer.php'; ?>
  <script type="text/javascript">
  window.addEventListener("load", refreshFiveTables);
  window.addEventListener("load", refreshCardamomTables);
  function loadValue(id){
    console.log(id);
    $('#call_modal_table').load('call_final_modal_table.php',{ order_id : id});
  }
  function refreshFiveTables(){
    $('#confirmed_fivestories').load('call_order_final_table.php',{ store : 'fivestories', status: 2});
    $('#packed_fivestories').load('call_order_final_table.php',{ store : 'fivestories', status: 3});
    $('#delivered_fivestories').load('call_order_final_table.php',{ store : 'fivestories', status: 4});
  }
  function refreshCardamomTables(){
    $('#confirmed_cardamom').load('call_order_final_table.php',{ store : 'cardamom', status: 2});
    $('#packed_cardamom').load('call_order_final_table.php',{ store : 'cardamom', status: 3});
    $('#delivered_cardamom').load('call_order_final_table.php',{ store : 'cardamom', status: 4});
  }
  function cancelOrder(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: !0,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
      confirmButtonClass: "btn btn-primary",
      cancelButtonClass: "btn btn-danger ml-1",
      buttonsStyling: !1,
    }).then(function (t) {

      t.value &&
      $.ajax({
          method: "POST",
          url: "./backend/cancel_temp_order.php",
          data:{order_id: id},
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              refreshFiveTables();
              refreshCardamomTables();
            }
          }
          });

      t.value &&
        Swal.fire({
          type: "success",
          title: "Canceled!",
          text: "Your order has been canceled.",
          confirmButtonClass: "btn btn-success",
        });



    });
  }

  function deliverOrder(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: !0,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
      confirmButtonClass: "btn btn-primary",
      cancelButtonClass: "btn btn-danger ml-1",
      buttonsStyling: !1,
    }).then(function (t) {

      t.value &&
      $.ajax({
          method: "POST",
          url: "./backend/deliver_temp_order.php",
          data:{order_id: id},
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              refreshFiveTables();
              refreshCardamomTables();
            }
          }
          });

      t.value &&
        Swal.fire({
          type: "success",
          title: "Confirmed!",
          text: "Your order has been confirmed.",
          confirmButtonClass: "btn btn-success",
        });



    });
  }

  function packOrder(id) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: !0,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes!",
      confirmButtonClass: "btn btn-primary",
      cancelButtonClass: "btn btn-danger ml-1",
      buttonsStyling: !1,
    }).then(function (t) {

      t.value &&
      $.ajax({
          method: "POST",
          url: "./backend/pack_temp_order.php",
          data:{order_id: id},
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              refreshFiveTables();
              refreshCardamomTables();
            }
          }
          });

      t.value &&
        Swal.fire({
          type: "success",
          title: "Confirmed!",
          text: "Your order has been confirmed.",
          confirmButtonClass: "btn btn-success",
        });



    });
  }

  function ajaxFunction() {
    console.log('refreshed');
    refreshFiveTables();
    refreshCardamomTables();
  }

// Function to update the countdown


// Set the interval to run the AJAX function every 2 minutes
setInterval(ajaxFunction, 10000);
setInterval(updateCountdown, 1000);
// Set the interval to update the countdown every second
// Variable to keep track of the remaining time

var remainingTime = 10;
// Function to update the countdown
function updateCountdown() {

  // Decrement the remaining time
  remainingTime--;

  // Get the countdown element from the HTML
  var countdown = document.getElementById("countdown");

  // Update the countdown element with the remaining time
  countdown.innerHTML = remainingTime ;

  // If the remaining time reaches 0, stop the countdown
  if (remainingTime === 0) {
    remainingTime = 10;
  }
}


  </script>
  </body>
</html>
