<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo BASE_URL ?>public/image/gym.png" type="image/png">
	<!--plugins-->
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/jquery-jvectormap-2.0.5.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/highcharts-white.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/imageuploadify.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
	<link href="<?php echo BASE_URL ?>public/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
	<!-- <link href="<?php echo BASE_URL ?>public/plugins/simplebar/css/simplebar.css" rel="stylesheet"> -->
	<!--font-->
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/font/fontawesome-free-5.15.3-web/">
	<link rel="stylesheet" href="<?php echo BASE_URL ?>public/font/fontawesome-free-5.15.3-web/css/all.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
	<!-- loader-->
	<link href="<?php echo BASE_URL ?>public/css/pace.min.css" rel="stylesheet">
	<script src="<?php echo BASE_URL ?>public/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo BASE_URL ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL ?>public/css/app.css" rel="stylesheet">


	<title>P229SHOP ADMIN</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo BASE_URL ?>public/image/gym.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">P229SHOP</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class="fas fa-arrow-circle-left"></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fas fa-home"></i>
						</div>
						<div class="menu-title">Home</div>
					</a>
					<ul>
						<li> <a href="index.html"></i>Default</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fab fa-whatsapp"></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="app-emailbox.html">Email</a>
						</li>
						<li> <a href="app-chat-box.html"></i>Chat Box</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">eCommerce</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"></i>Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"></i>Product Details</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"></i>Add New Products</a>
						</li>
						<li> <a href="ecommerce-orders.html"></i>Orders</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list"></div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">

								<div class="dropdown-menu dropdown-menu-end">

									<div class="header-message-list">

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo BASE_URL ?>public/image/ntt2.jpg" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $data['username']; ?></p>
								<p class="designattion mb-0"><?php if($data['type'] == 1)
								{
									echo 'Nhân viên';
								}
								else
								{
									echo 'Quản lí';
								} ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper" data-simplebar="true">
			<div class="page-content">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Flush Accordion</h5>
						<hr>
						<div class="accordion accordion-flush" id="accordionFlushExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
										Accordion Item #1
									</button>
								</h2>
								<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">
										<ul>
											<li>1</li>
											<li>1</li>
											<li>1</li>
											<li>1</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!--start overlay-->
		<!-- <div class="overlay toggle-icon"></div> -->
		<!--end overlay-->
		<!--End Back To Top Button-->

	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="<?php echo BASE_URL ?>public/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo BASE_URL ?>public/js/jquery.min.js"></script>
	<script src="<?php echo BASE_URL ?>public/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo BASE_URL ?>public/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo BASE_URL ?>public/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?php echo BASE_URL ?>public/js/index.js"></script>
	<script src="<?php echo BASE_URL ?>public/js/app.js"></script>
</body>

</html>