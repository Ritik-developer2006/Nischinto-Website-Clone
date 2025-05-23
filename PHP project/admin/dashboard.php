<?php
// session start
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
	// Correctly close the JavaScript URL string
	echo "<script>
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
	exit(); // Ensure no further code runs after redirect
};

// Include the database connection file
include "connect.php"; // Corrected file name

// Check if the connection was successful
if ($conn->connect_error) {
	die("<h1 class='text-danger'>Connection with database failed!</h1>");
}

// fetching user data which is log in
$stmt = $conn->prepare("SELECT * FROM log_in WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);

// Execute the statement
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();
$data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Nischinto(dashboard)</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="uploads/4.png" />
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<!-- Style css -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

	<!--*******************
		Preloader start
	********************-->
	<div id="preloader">
		<div class="gooey">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!--*******************
		Preloader end
	********************-->

	<!--**********************************
		Main wrapper start
	***********************************-->
	<div id="main-wrapper">

		<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header">
			<a href="../index.php" class="brand-logo">
				<img id="short-logo" width="35" height="35" src="uploads/4.png" alt="">
				<img src="uploads/footer-logo1.png" alt="" class="brand-title text-center" width="140" height="35">
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
			Nav header end
		***********************************-->

		<!--**********************************
			Header start
		***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="nav-item">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here">
									<span class="input-group-text"><a href="javascript:void(0)"><i
												class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
						</div>
						<ul class="navbar-nav header-right">
							<li class="nav-item recipe">
								<a href="../index.php" class="btn btn-primary btn-rounded">Visit Website</a>
							</li>
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="uploads/<?php
									echo $data['photo'];
									?>" width="56" alt="" />
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="profile.php" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="logout.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12"></line>
										</svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>

						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
			Header end ti-comment-alt
		***********************************-->

		<!--**********************************
			Sidebar start
		***********************************-->
		<div class="deznav">
			<div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="javascript:void();" class="mm-active">Dashboard</a></li>
						</ul>

					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-072-printer"></i>
							<span class="nav-text">Forms</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="Appoinment/appoinment_form.php">Appoinment Form</a></li>
							<li><a href="Message/message_form.php">Message form</a></li>
							<li><a href="Subscribers/subscribe_form.php">Subscribe form</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Table</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="Appoinment/Appoinments_list.php">Appoinments</a></li>
							<li><a href="Messages/Messages_list.php">Messages</a></li>
							<li><a href="Subscribers/Subscribers_list.php">Suibscribers</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Pages</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="Pages/Header(edit).php">Navbar</a></li>
							<li><a href="Pages/Home(edit).php">Home</a></li>
							<li><a href="Pages/About(edit).php">About</a></li>
							<li><a href="Pages/Department(edit).php">Department</a></li>
							<li><a href="Pages/Doctor(edit).php">Doctor</a></li>
							<li><a href="Pages/Gallery(edit).php">Gallery</a></li>
							<li><a href="Pages/Pricing(edit).php">Pricing</a></li>
							<li><a href="Pages/Blog(edit).php">Blog</a></li>
							<li><a href="Pages/Footer(edit).php">Footer</a></li>
						</ul>
					</li>
				</ul>
				<div class="copyright" style="margin-top:18rem !important;">
					<p><strong>Nischinto Admin</strong> © 2024 All Rights Reserved</p>
					<p class="fs-12">Made with by Ritik kumar</p>
				</div>
			</div>
		</div>
		<!--**********************************
			Sidebar end
		***********************************-->

		<!--**********************************
			Content body start
		***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
					<h2 class="mb-3 me-auto">Dashboard</h2>
				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Staff Members</span>
											<h2>459</h2>
										</div>
										<div class="d-inline-block position-relative donut-chart-sale">
											<span class="donut1"
												data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/8</span>
											<small class="text-black">
												<svg xmlns="http://www.w3.org/2000/svg" width="31" height="30"
													fill="none" class="bi bi-person-video2" viewBox="0 0 16 16">
													<path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
														fill="#624FD1" />
													<path
														d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z"
														fill="#624FD1" />
												</svg>
											</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Total Revenue</span>
											<h2>$87,561</h2>
										</div>
										<div class="d-inline-block position-relative donut-chart-sale">
											<span class="donut1"
												data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/6</span>
											<small class="text-black">
												<svg width="19" height="36" viewBox="0 0 19 36" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M18.8469 24.36C18.8469 25.64 18.5269 26.8667 17.8869 28.04C17.2469 29.1867 16.3003 30.1467 15.0469 30.92C13.8203 31.6933 12.3403 32.1333 10.6069 32.24V35.48H8.44695V32.24C6.02028 32.0267 4.04695 31.2533 2.52694 29.92C1.00694 28.56 0.233612 26.84 0.206945 24.76H4.08695C4.19361 25.88 4.60695 26.8533 5.32695 27.68C6.07361 28.5067 7.11361 29.0267 8.44695 29.24V19.24C6.66028 18.7867 5.22028 18.32 4.12695 17.84C3.03361 17.36 2.10028 16.6133 1.32694 15.6C0.553612 14.5867 0.166945 13.2267 0.166945 11.52C0.166945 9.36 0.913612 7.57333 2.40695 6.16C3.92695 4.74666 5.94028 3.96 8.44695 3.8V0.479998H10.6069V3.8C12.8736 3.98667 14.7003 4.72 16.0869 6C17.4736 7.25333 18.2736 8.89333 18.4869 10.92H14.6069C14.4736 9.98667 14.0603 9.14667 13.3669 8.4C12.6736 7.62667 11.7536 7.12 10.6069 6.88V16.64C12.3669 17.0933 13.7936 17.56 14.8869 18.04C16.0069 18.4933 16.9403 19.2267 17.6869 20.24C18.4603 21.2533 18.8469 22.6267 18.8469 24.36ZM3.88695 11.32C3.88695 12.6267 4.27361 13.6267 5.04695 14.32C5.82028 15.0133 6.95361 15.5867 8.44695 16.04V6.8C7.06028 6.93333 5.95361 7.38667 5.12695 8.16C4.30028 8.90667 3.88695 9.96 3.88695 11.32ZM10.6069 29.28C12.0469 29.12 13.1669 28.6 13.9669 27.72C14.7936 26.84 15.2069 25.7867 15.2069 24.56C15.2069 23.2533 14.8069 22.2533 14.0069 21.56C13.2069 20.84 12.0736 20.2667 10.6069 19.84V29.28Z"
														fill="#624FD1" />
												</svg>
											</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Total Appoinments</span>
											<h2>247</h2>
										</div>
										<div class="d-inline-block position-relative donut-chart-sale">
											<span class="donut1"
												data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/8</span>
											<small class="text-black">
												<svg xmlns="http://www.w3.org/2000/svg" width="30" height="36"
													fill="none" class="bi bi-card-text" viewBox="0 0 16 16">
													<path
														d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"
														fill="#624FD1" />
													<path
														d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"
														fill="#624FD1" />
												</svg>
											</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Total Patients</span>
											<h2>872</h2>
										</div>
										<div class="d-inline-block position-relative donut-chart-sale">
											<span class="donut1"
												data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/7</span>
											<small class="text-black">
												<svg width="32" height="36" viewBox="0 0 32 36" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M11.0444 19.25C12.0362 19.25 13.0057 18.9568 13.8304 18.4074C14.6551 17.8579 15.2978 17.0771 15.6774 16.1634C16.0569 15.2498 16.1563 14.2445 15.9628 13.2746C15.7693 12.3046 15.2917 11.4137 14.5903 10.7145C13.889 10.0152 12.9955 9.539 12.0227 9.34608C11.0499 9.15315 10.0416 9.25217 9.12531 9.6306C8.20899 10.009 7.42579 10.6499 6.87476 11.4722C6.32374 12.2944 6.02962 13.2611 6.02962 14.25C6.03092 15.5757 6.55967 16.8467 7.49984 17.7841C8.44001 18.7215 9.71478 19.2487 11.0444 19.25ZM11.0444 11.75C11.5403 11.75 12.0251 11.8966 12.4374 12.1713C12.8497 12.446 13.1711 12.8365 13.3609 13.2933C13.5507 13.7501 13.6003 14.2528 13.5036 14.7377C13.4068 15.2227 13.168 15.6681 12.8174 16.0178C12.4667 16.3674 12.0199 16.6055 11.5335 16.702C11.0472 16.7984 10.543 16.7489 10.0848 16.5597C9.62668 16.3705 9.23508 16.0501 8.95957 15.6389C8.68405 15.2278 8.537 14.7445 8.537 14.25C8.53789 13.5872 8.80235 12.9519 9.27238 12.4832C9.74241 12.0146 10.3797 11.7509 11.0444 11.75Z"
														fill="#624FD1" />
													<path
														d="M30.632 22.4625C31.0458 21.9098 31.3223 21.2672 31.4388 20.5873C31.5552 19.9074 31.5082 19.2097 31.3017 18.5514L30.5058 15.9696C30.1322 14.7451 29.3726 13.6733 28.3398 12.9132C27.307 12.1531 26.0559 11.7452 24.7722 11.75H19.1468C18.8143 11.75 18.4954 11.8817 18.2603 12.1161C18.0252 12.3505 17.8931 12.6685 17.8931 13C17.8931 13.3315 18.0252 13.6495 18.2603 13.8839C18.4954 14.1183 18.8143 14.25 19.1468 14.25H24.7722C25.5192 14.2474 26.2471 14.485 26.8481 14.9274C27.449 15.3698 27.891 15.9935 28.1084 16.706L28.9043 19.2866C28.9921 19.5713 29.0117 19.8725 28.9615 20.1661C28.9114 20.4597 28.7928 20.7374 28.6154 20.977C28.438 21.2166 28.2067 21.4114 27.9401 21.5456C27.6735 21.6799 27.379 21.7499 27.0803 21.75H15.5853C15.5499 21.75 15.5201 21.7671 15.485 21.7701C15.4008 21.7669 15.3194 21.75 15.2339 21.75H7.37331C5.98015 21.7449 4.62249 22.1879 3.50187 23.0132C2.38125 23.8385 1.55741 25.0021 1.15264 26.3312L0.216641 29.3625C-0.00199068 30.0719 -0.0506583 30.8225 0.0745503 31.554C0.199759 32.2856 0.495352 32.9776 0.937568 33.5746C1.37979 34.1715 1.95629 34.6567 2.62075 34.9911C3.28521 35.3255 4.01908 35.4998 4.76339 35.5H17.843C18.5873 35.4999 19.3213 35.3256 19.9858 34.9912C20.6503 34.6569 21.2269 34.1717 21.6691 33.5748C22.1114 32.9778 22.4071 32.2857 22.5323 31.5542C22.6575 30.8226 22.6089 30.0719 22.3902 29.3625L21.4548 26.3315C21.2179 25.5767 20.8448 24.8713 20.354 24.25H27.0803C27.7718 24.2532 28.4543 24.0928 29.0717 23.7821C29.6891 23.4714 30.2238 23.0192 30.632 22.4625ZM19.6524 32.089C19.4445 32.3726 19.1721 32.6031 18.8576 32.7614C18.543 32.9198 18.1953 33.0015 17.843 33H4.76339C4.41135 32.9999 4.06424 32.9175 3.74996 32.7594C3.43569 32.6012 3.16303 32.3717 2.95391 32.0894C2.7448 31.807 2.60506 31.4796 2.54595 31.1336C2.48684 30.7876 2.51 30.4326 2.61357 30.0971L3.54894 27.0661C3.79744 26.2489 4.30376 25.5335 4.99265 25.0261C5.68155 24.5188 6.51624 24.2466 7.37269 24.25H15.2333C16.0897 24.2466 16.9244 24.5188 17.6133 25.0261C18.3022 25.5335 18.8085 26.2489 19.057 27.0661L19.9924 30.0971C20.0979 30.4323 20.1221 30.7877 20.063 31.134C20.0039 31.4804 19.8632 31.8078 19.6524 32.0894V32.089Z"
														fill="#624FD1" />
													<path
														d="M21.7007 9.24999C22.5685 9.24999 23.4169 8.9934 24.1385 8.51267C24.8601 8.03194 25.4225 7.34866 25.7546 6.54923C26.0867 5.74981 26.1736 4.87014 26.0043 4.02148C25.835 3.17281 25.4171 2.39326 24.8034 1.78141C24.1898 1.16955 23.4079 0.752876 22.5567 0.584066C21.7056 0.415256 20.8233 0.501896 20.0215 0.833029C19.2197 1.16416 18.5344 1.72492 18.0523 2.44438C17.5702 3.16384 17.3128 4.0097 17.3128 4.875C17.3142 6.03489 17.7769 7.14688 18.5995 7.96705C19.4221 8.78722 20.5374 9.2486 21.7007 9.24999ZM21.7007 3C22.0726 3 22.4362 3.10997 22.7455 3.31599C23.0547 3.52202 23.2958 3.81485 23.4381 4.15747C23.5804 4.50008 23.6177 4.87708 23.5451 5.24079C23.4725 5.6045 23.2934 5.9386 23.0304 6.20082C22.7674 6.46304 22.4324 6.64162 22.0676 6.71397C21.7028 6.78631 21.3247 6.74918 20.9811 6.60727C20.6374 6.46535 20.3437 6.22503 20.1371 5.91669C19.9305 5.60835 19.8202 5.24584 19.8202 4.875C19.8207 4.37789 20.019 3.9013 20.3716 3.54979C20.7241 3.19829 21.2021 3.00056 21.7007 3Z"
														fill="#624FD1" />
												</svg>
											</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card">
							<div class="card-header border-0 flex-wrap pb-0">
								<div class="mb-sm-0 mb-2">
									<h4 class="fs-20">Today’s Revenue</h4>
									<span>Lorem ipsum dolor sit amet, consectetur</span>
								</div>
								<div>
									<h2 class="font-w700 mb-0">$ 240.45</h2>
									<p class="mb-0 font-w700"><span class="text-success">0,5% </span>than last day</p>
								</div>
							</div>
							<div class="card-body py-0">
								<div id="revenueChart" class="revenueChart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-xxl-4 col-md-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0">
										<div>
											<h4 class="fs-20 mb-1">Trending Keyword</h4>
											<span>Lorem ipsum dolor sit amet, consectetur</span>
										</div>
									</div>
									<div class="card-body">
										<div class="progress default-progress">
											<div class="progress-bar bg-gradient-1 progress-animated"
												style="width: 45%; height:11px;" role="progressbar">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
										<div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
											<span class="fs-16 text-primary font-w600">#Emegency hospital</span>
											<span class="fs-14"><span class="text-black pe-2"></span>452 times</span>
										</div>
										<div class="progress default-progress">
											<div class="progress-bar bg-gradient-1 progress-animated"
												style="width: 30%; height:11px;" role="progressbar">
												<span class="sr-only">30% Complete</span>
											</div>
										</div>
										<div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
											<span class="fs-16 text-primary font-w600">#Best Hospital</span>
											<span class="fs-14"><span class="text-black pe-2"></span>97 times</span>
										</div>
										<div class="progress default-progress">
											<div class="progress-bar bg-gradient-1 progress-animated"
												style="width: 45%; height:11px;" role="progressbar">
												<span class="sr-only">45% Complete</span>
											</div>
										</div>
										<div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
											<span class="fs-16 text-primary font-w600">#Cardiologyst Hospital</span>
											<span class="fs-14"><span class="text-black pe-2"></span>61 times</span>
										</div>
										<div>
											<h4 class="fs-20 mb-3">Others tag</h4>
											<div>
												<a href="javascript:void(0);"
													class=" btn btn-outline-primary btn-rounded me-2 mb-3 btn-sm">#Neurologyst</a>
												<a href="javascript:void(0);"
													class=" btn btn-outline-primary btn-rounded mb-3  btn-sm">#Good
													doctors</a>
												<a href="javascript:void(0);"
													class=" btn btn-outline-primary btn-rounded me-2 mb-3 btn-sm">#Best
													treatment</a>
												<a href="javascript:void(0);"
													class=" btn btn-outline-primary btn-rounded btn-sm mb-3">106+</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card" style="height:32.5rem;">
									<div class="card-header border-0 d-flex">
										<div>
											<h4 class="fs-20 mb-1">Patients Map</h4>
											<span>Lorem ipsum dolor sit amet, consectetur</span>
										</div>
										<div class="d-flex mt-2">
											<div class="card-action coin-tabs mt-3 mt-sm-0">
												<ul class="nav nav-tabs" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-bs-toggle="tab" href="#Monthly"
															role="tab" style="margin-top:0px">Monthly</a>
													</li>
													<li class="nav-item">
														<a class="nav-link " data-bs-toggle="tab" href="#Daily"
															role="tab">Daily</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-bs-toggle="tab" href="#Today"
															role="tab">Today</a>
													</li>
												</ul>
											</div>
											<div class="dropdown custom-dropdown mb-0 ms-3">
												<div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z"
															stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
															stroke-linejoin="round" />
														<path
															d="M6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12Z"
															stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
															stroke-linejoin="round" />
														<path
															d="M20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12Z"
															stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
															stroke-linejoin="round" />
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0);">Details</a>
													<a class="dropdown-item text-danger"
														href="javascript:void(0);">Cancel</a>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body pb-2">
										<div class="tab-content">
											<div class="tab-pane fade show active" id="Monthly">
												<div id="chartTimeline1" class="chart-timeline"></div>
											</div>
											<div class="tab-pane fade " id="Daily">
												<div id="chartTimeline2" class="chart-timeline"></div>
											</div>
											<div class="tab-pane fade " id="Today">
												<div id="chartTimeline3" class="chart-timeline"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-xxl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card customer-wrapper" style="height:67.5rem;">
									<div class="card-header border-0">
										<div>
											<h4 class="fs-20 mb-1">Staff Members</h4>
											<span>Lorem ipsum dolor</span>
										</div>
										<div class="add-btn">
											<a href="javascript:void(0);"><i class="fas fa-plus"></i></a>
										</div>
									</div>
									<div class="card-body height400 loadmore-content dz-scroll pb-0 pt-0"
										id="CustomerListContent">
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c1.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Benny Chagur</span>
												<p class="font-w600 mb-0 text-primary">Spot boy</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c2.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Chynita Bella</span>
												<p class="font-w600 mb-0 text-primary">Chief guest</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c3.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">David Heree</span>
												<p class="font-w600 mb-0 text-primary">Doctor</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c4.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Evan D. Mas</span>
												<p class="font-w600 mb-0 text-primary">Servent</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c5.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Supratman</span>
												<p class="font-w600 mb-0 text-primary">Ambulence driver</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c6.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">John Kusnaidi</span>
												<p class="font-w600 mb-0 text-primary">Cleaner</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c1.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Benny Chagur</span>
												<p class="font-w600 mb-0 text-primary">Spot boy</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c2.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Chynita Bella</span>
												<p class="font-w600 mb-0 text-primary">Chief guest</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c3.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">David Heree</span>
												<p class="font-w600 mb-0 text-primary">Doctor</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c4.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Evan D. Mas</span>
												<p class="font-w600 mb-0 text-primary">Servent</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c5.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Supratman</span>
												<p class="font-w600 mb-0 text-primary">Ambulence driver</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c6.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">John Kusnaidi</span>
												<p class="font-w600 mb-0 text-primary">Cleaner</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c1.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Benny Chagur</span>
												<p class="font-w600 mb-0 text-primary">Spot boy</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c2.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Chynita Bella</span>
												<p class="font-w600 mb-0 text-primary">Chief guest</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c3.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">David Heree</span>
												<p class="font-w600 mb-0 text-primary">Doctor</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c4.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Evan D. Mas</span>
												<p class="font-w600 mb-0 text-primary">Servent</p>
											</div>
										</div>
										<div class="d-flex align-items-center mb-4">
											<div class="recent-customer me-3">
												<img src="images/contacts/c5.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">Supratman</span>
												<p class="font-w600 mb-0 text-primary">Ambulence driver</p>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<div class="recent-customer me-3">
												<img src="images/contacts/c6.jpg" width="50" alt="">
											</div>
											<div>
												<span class="c-name">John Kusnaidi</span>
												<p class="font-w600 mb-0 text-primary">Cleaner</p>
											</div>
										</div>
									</div>
									<div class="card-footer border-0 down-arrow pb-0">
										<a href="javascript:void(0);" class="dz-load-more fas fa-chevron-down"
											id="CustomerList" rel="ajax/customer-list.html"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0">
										<div>
											<h4 class="fs-20 mb-1">Our Branches</h4>
											<span>Lorem ipsum dolor sit amet, consectetur</span>
										</div>
										<div class="dropdown custom-dropdown mb-0 ms-3">
											<div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z"
														stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path
														d="M6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12Z"
														stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path
														d="M20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12Z"
														stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
												</svg>
											</div>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Details</a>
												<a class="dropdown-item text-danger"
													href="javascript:void(0);">Cancel</a>
											</div>
										</div>
									</div>
									<div class="card-body pb-0">
										<img src="images/map-city-with-small-pin_952832-131053.avif" class="w-100"
											alt="">
										<div class="d-flex align-items-center my-4">
											<svg class="me-2 vert-move" width="50" height="50" viewBox="0 0 50 50"
												fill="none" xmlns="http://www.w3.org/2000/svg">
												<path
													d="M44.0137 6.54388C42.2281 4.7611 39.4593 4.65722 36.8259 7.28777L28.7931 15.32C27.902 14.9411 26.9876 14.7305 26.2148 14.5211L10.4654 11.0694C7.87258 10.5022 5.30925 13.9917 9.24425 16.2661L21.0359 23.0772L13.5298 32.3533L8.5037 31.9028C6.79647 31.7522 5.41036 33.5628 7.28536 35.4389L15.1209 43.2711C16.9959 45.1461 18.8076 43.7628 18.6537 42.0555L18.2054 37.0294L27.4815 29.5206L34.2931 41.3144C36.5676 45.25 40.057 42.6839 39.4898 40.0939L36.0348 24.3439C35.8293 23.5711 35.6181 22.6572 35.2387 21.7639L43.2681 13.7339C45.9026 11.1011 45.7987 8.32944 44.0137 6.54388Z"
													fill="#624FD1" />
												<path
													d="M8.3045 18.5694C7.97728 18.5811 7.66784 18.7167 7.43895 18.9517L4.86339 21.5266C4.37228 22.0183 4.37228 22.8172 4.86117 23.3094C5.35339 23.8011 6.15173 23.8044 6.64339 23.3116L9.21895 20.7372C10.0495 19.9355 9.45617 18.5344 8.3045 18.5694Z"
													fill="#FD683E" />
												<path
													d="M13.8341 21.4261C13.5069 21.4339 13.1975 21.5733 12.9686 21.8072L7.5347 27.2416C7.04248 27.7333 7.0397 28.5283 7.53192 29.0233C8.02359 29.515 8.82192 29.515 9.31414 29.0233L14.748 23.5894C15.5764 22.7911 14.9864 21.3905 13.8341 21.4261Z"
													fill="#FD683E" />
												<path
													d="M27.8357 35.4295C27.5085 35.4411 27.1963 35.5772 26.9702 35.8117L21.5363 41.2456C21.0041 41.7295 20.9841 42.5595 21.493 43.0684C21.9996 43.5784 22.833 43.5578 23.3157 43.025L28.753 37.5911C29.5746 36.7906 28.9846 35.395 27.8357 35.4295Z"
													fill="#FD683E" />
												<path
													d="M30.6888 40.9594C30.3616 40.9683 30.0521 41.105 29.8233 41.3383L27.2477 43.9178C26.756 44.4094 26.756 45.2078 27.251 45.6961C27.7427 46.1889 28.541 46.1889 29.0333 45.6961L31.6088 43.1211C32.4305 42.3166 31.8377 40.9222 30.6888 40.9594Z"
													fill="#FD683E" />
											</svg>
											<h5 class="fs-20">Upcoming Branche's Schedule </h5>
										</div>
										<div class="loadmore-content dz-scroll" id="DelieveryListContent">
											<div class="d-sm-flex d-block border-bottom align-items-center mb-2">
												<div class="delivery-customer me-auto mb-2">
													<img src="images/contacts/c33.jpg" alt="">
													<div>
														<span class="font-w600 text-black fs-16">John Kusnaidi <span
																class="text-primary">(Surgien)</span></span>
														<span class="d-block fs-12 font-w600">Will be shipping on 11 :
															24 AM</span>
													</div>
												</div>
												<div
													class="d-flex align-items-center justify-content-end text-end location mb-2">
													<div>
														<span class="d-block f-s14 font-w400 text-black">Franklin Avenue
															St. London, ABC 12345</span>
														<span class="text-end f-s14 font-w400 text-black">United
															Kingdom</span>
													</div>
													<i class="fas fa-map-marker-alt"></i>
												</div>
											</div>
											<div class="d-sm-flex d-block border-bottom align-items-center mb-2">
												<div class="delivery-customer me-auto mb-2">
													<img src="images/contacts/c11.jpg" alt="">
													<div>
														<span class="font-w600 text-black fs-16">Margaretha <span
																class="text-primary">(Neurologyst)</span></span>
														<span class="d-block fs-12 font-w600">Will be shipping on 11 :
															24 AM</span>
													</div>
												</div>
												<div
													class="d-flex align-items-center justify-content-end text-end location mb-2">
													<div>
														<span class="d-block f-s14 font-w400 text-black">Groove Street
															Families, DEF 244125</span>
														<span class="text-end f-s14 font-w400 text-black">United
															Kingdom</span>
													</div>
													<i class="fas fa-map-marker-alt"></i>
												</div>
											</div>
											<div class="d-sm-flex d-block border-bottom align-items-center mb-2">
												<div class="delivery-customer me-auto mb-2">
													<img src="images/contacts/c22.jpg" alt="">
													<div>
														<span class="font-w600 text-black fs-16">Richard Lee <span
																class="text-primary">(Heart Specialist)</span></span>
														<span class="d-block fs-12 font-w600">Will be shipping on 11 :
															24 AM</span>
													</div>
												</div>
												<div
													class="d-flex align-items-center justify-content-end text-end location mb-2">
													<div>
														<span class="d-block f-s14 font-w400 text-black">Bossman St.
															21444 ABC</span>
														<span class="text-end f-s14 font-w400 text-black">United
															Kingdom</span>
													</div>
													<i class="fas fa-map-marker-alt"></i>
												</div>
											</div>
											<div class="d-sm-flex d-block border-bottom align-items-center mb-2">
												<div class="delivery-customer me-auto mb-2">
													<img src="images/contacts/c33.jpg" alt="">
													<div>
														<span class="font-w600 text-black fs-16">John Kusnaidi <span
																class="text-primary">(Surgien)</span></span>
														<span class="d-block fs-12 font-w600">Will be shipping on 11 :
															24 AM</span>
													</div>
												</div>
												<div
													class="d-flex align-items-center justify-content-end text-end location mb-2">
													<div>
														<span class="d-block f-s14 font-w400 text-black">Franklin Avenue
															St. London, ABC 12345</span>
														<span class="text-end f-s14 font-w400 text-black">United
															Kingdom</span>
													</div>
													<i class="fas fa-map-marker-alt"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer border-0 down-arrow pb-0"
										style="margin-top:-1.5rem !important;">
										<a href="javascript:void(0);" class="dz-load-more fas fa-chevron-down"
											id="DelieveryList"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon"><i class="fab fa-facebook-f"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">119</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-linkedin">
								<span class="s-icon"><i class="fab fa-linkedin-in"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">119</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-googleplus">
								<span class="s-icon"><i class="fab fa-google-plus-g"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">119</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon"><i class="fab fa-twitter"></i></span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">89</span> k</h4>
										<p class="m-0">Friends</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">119</span> k</h4>
										<p class="m-0">Followers</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	<!--**********************************
			Content body end
		***********************************-->

	<div class="footer">
		<div class="copyright">
			<p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/" target="_blank">Ritik kumar</a>
				2021</p>
		</div>
	</div>
	</div>

	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>


	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>

	<!-- Chart piety plugin files -->
	<script src="vendor/peity/jquery.peity.min.js"></script>

	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>

	<script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>
</body>

</html>