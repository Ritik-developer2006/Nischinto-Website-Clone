<?php

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
include "../connect.php"; // Corrected file name

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
	<link rel="shortcut icon" type="image/png" href="../uploads/4.png" />

	<!-- Datatable -->
	<link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

	<!-- required vendors -->
	<link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">
	<link href="../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<!-- Style css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">

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
			<a href="../../index.php" class="brand-logo">
				<img id="short-logo" width="35" height="35" src="../uploads/4.png" alt="">
				<img src="../uploads/footer-logo1.png" alt="" class="brand-title text-center" width="140" height="35">
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
								<a href="../../index" class="btn btn-primary btn-rounded">Visit Website</a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link  ai-icon" href="javascript:void(0);" role="button"
									data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z"
											fill="#9B9B9B" />
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">12</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3"
										style="height:380px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="../images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="../images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<a class="all-notification" href="javascript:void(0);">See all notifications <i
											class="ti-arrow-end"></i></a>
								</div>
							</li>
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="../uploads/<?php 
									echo $data['photo'];
									?>" width="56"
										alt="" />
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="../profile.php" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="../logout.php" class="dropdown-item ai-icon">
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
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="../dashboard.php">Dashboard</a></li>
						</ul>

					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-072-printer"></i>
							<span class="nav-text">Forms</span>
						</a>
						<ul aria-expanded="false">
						<li><a href="appoinment_form.php">Appoinment Form</a></li>
							<li><a href="../Messages/message_form.php">Message form</a></li>
							<li><a href="../Subscribers/subscribe_form.php">Subscribe form</a></li>
						</ul>
					</li>
					<li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Table</span>
						</a>
						<ul aria-expanded="false">
							<li class="mm-active"><a href="Appoinments_list.php">Appoinments</a></li>
							<li><a href="../Messages/Messages_list.php">Messages</a></li>
							<li><a href="../Subscribers/Subscribers_list.php">Suibscribers</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Pages</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="../Pages/Header(edit).php">Navbar</a></li>
							<li><a href="../Pages/Home(edit).php">Home</a></li>
							<li><a href="../Pages/About(edit).php">About</a></li>
							<li><a href="../Pages/Department(edit).php">Department</a></li>
							<li><a href="../Pages/Doctor(edit).php">Doctor</a></li>
							<li><a href="../Pages/Gallery(edit).php">Gallery</a></li>
							<li><a href="../Pages/Pricing(edit).php">Pricing</a></li>
							<li><a href="../Pages/Blog(edit).php">Blog</a></li>
							<li><a href="../Pages/Footer(edit).php">Footer</a></li>
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
					<h2 class="mb-3 me-auto">Appoiments</h2>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Total Appoinments are <?php
								include "../connect.php";
								$query = "SELECT * FROM appoinments";
								$data = mysqli_query($conn, $query);
								$total = mysqli_num_rows($data);
								echo $total;
								?>.</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example3" class="display" style="min-width: 845px">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Department</th>
												<th>Email</th>
												<th>Doctor</th>
												<th>Contact no.</th>
												<th>Booking Date</th>
												<th>Message</th>
												<th>Operation</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include "../connect.php";
											$query = "SELECT * FROM appoinments";
											$data = mysqli_query($conn, $query);
											$total = mysqli_num_rows($data);
											if ($total != 0) {
												while ($result = mysqli_fetch_assoc($data)) {
													echo "<tr>
															<td width='50px' class='text-nowrap'>" . $result['id'] . "</td>
															<td width='150px' class='text-nowrap'>" . $result['name'] . "</td>
															<td width='150px' class='text-nowrap'>" . $result['department'] . "</td>
															<td width='180px' class='text-nowrap'>" . $result['email'] . "</td>
															<td width='200px' class='text-nowrap'>" . $result['doctor'] . "</td>
															<td width='150px' class='text-nowrap'>" . $result['number'] . "</td>
															<td width='150px' class='text-nowrap'>" . $result['date'] . "</td>
															<td width='150px' class='text-wrap'>" . $result['message'] . "</td>
															<td class='d-flex justify-content-center'>
																<div class='d-flex'>" .
														// trigger for edit data
														"<a role='button' data-bs-toggle='modal' data-bs-target='#exampleModalCenter" . $result['id'] + $result['id'] . "' class='btn btn-primary shadow btn-xs sharp me-1'><i
																	class='fas fa-pencil-alt'></i></a>" .

														// trigger for delete data 
														"<a role='button' data-bs-toggle='modal' data-bs-target='#exampleModalCenter" . $result['id'] . "' class='btn btn-danger shadow btn-xs sharp'><i
																		class='fa fa-trash'></i></a>
																</div>" .
														// modal for delete data
														"<div class='modal fade' id='exampleModalCenter" . $result['id'] . "'>
                                        							<div class='modal-dialog modal-dialog-centered' role='document'>
                                        							    <div class='modal-content'>
                                        							        <div class='modal-header'>
                                        							            <h5 class='modal-title'>Confirmation</h5>
                                        							            <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        							            </button>
                                        							        </div>
                                        							        <div class='modal-body'>
                                        							            <p>Are you sure you want to delete this record.</p>
                                        							        </div>
                                        							        <div class='modal-footer'>
																			<button type='button' data-bs-dismiss='modal' class='btn btn-warning light'>Cancel</button>
																			<a href='delete.php?id=" . $result['id'] . "' role='button' class='btn btn-danger light'>Delete</a>
                                        							        </div>
                                        							    </div>
                                        							</div>
                                    							</div>" .

														// modal for edit data
														"<div class='modal fade' id='exampleModalCenter" . $result['id'] + $result['id'] . "'>
                                        							<div class='modal-dialog modal-dialog-centered' role='document'>
                                        							    <div class='modal-content'>
                                        							        <div class='modal-header'>
                                        							            <h5 class='modal-title'>Edit Record</h5>
                                        							            <button type='button' class='btn-close' data-bs-dismiss='modal'>
                                        							            </button>
                                        							        </div>
                                        							        <div class='modal-body'>
																			<form class='row g-3 needs-validation' method='post' action='edit_appoinment.php?id=" . $result['id'] . "' novalidate>
																			<div class='col-md-6'>
																			  <label for='validationCustom01' class='form-label'>Name</label>
																			  <input type='text' name='name' class='form-control border-1 rounded-4' id='validationCustom01' value='" . $result['name'] . "' required>
																			  <div class='invalid-feedback'>
																			  	Please fill this!.
																			  </div>
																			</div>
																			<div class='col-md-6'>
																			  <label for='validationCustom02' class='form-label'>Email-id</label>
																			  <input type='email'  name='email' class='form-control border-1' id='validationCustom02' value='" . $result['email'] . "' required>
																			  <div class='invalid-feedback'>
																			  	Please fill this!.
																			  </div>
																			</div>
																			<div class='col-md-6'>
																			  <label for='validationCustom03' class='form-label'>Number</label>
																			  <input type='text' name='number' class='form-control border-1 rounded-4' id='validationCustom03' value='" . $result['number'] . "' required>
																			  <div class='invalid-feedback'>
																			  	Please fill this!.
																			  </div>
																			</div>
																			<div class='col-md-6'>
																			  <label for='validationCustom04' class='form-label'>Booking Date</label>
																			  <input type='date' name='date' class='form-control w-100' id='validationCustom04' value='" . $result['date'] . "' required>
																			  <div class='invalid-feedback'>
																			  	Please fill this!.
																			  </div>
																			</div>
																			<div class='col-md-6'>
																			  <label for='validationCustom05' class='form-label'>Department</label>
																			  <select name='department' class='form-select py-3 border-1 rounded-4' id='validationCustom05' required>
																				<option selected value='" . $result['department'] . "'>" . $result['department'] . "</option>
																				<option value=''>Deantal cara</option>
																				<option value=''>Neurology</option>
																				<option value=''>Crutches</option>
																				<option value=''>Cardiology</option>
																				<option value=''>X-ray</option>
																				<option value=''>Pulmonary</option>
																			  </select>
																			  <div class='invalid-feedback'>
																				Please select a department.
																			  </div>
																			</div>
																			<div class='col-md-6'>
																			  <label for='validationCustom06' class='form-label'>Department</label>
																			  <select name='doctor' class='form-select py-3 border-1 rounded-4' id='validationCustom06' required>
																				<option selected value='" . $result['doctor'] . "'>" . $result['doctor'] . "</option>
																				<option value='Dr. Jhon Doe'>Dr. Jhon Doe</option>
																				<option value='Dr. Mak Roshi'>Dr. Mak Roshi</option>
																				<option value='Dr. Mohoshin kabir'>Dr. Mohoshin kabir</option>
																				<option value='Dr. Nayan Borua'>Dr. Nayan Borua</option>
																				<option value='Dr. Rashed Islam'>Dr. Rashed Islam</option>
																				<option value='Dr. Rasid Islam'>Dr. Rasid Islam</option>
																			  </select>
																			  <div class='invalid-feedback'>
																				Please select a doctor.
																			  </div>
																			</div>
																			<div class='col-md-12'>
																			  <label for='validationCustom07' class='form-label'>Message</label>
																			  <textarea type='date' name='message' class='form-control w-100' id='validationCustom07' required>
																			  " . $result['message'] . "
																			  </textarea>
																			  <div class='invalid-feedback'>
																			  	Please fill this!.
																			  </div>
																			</div>
                                        							        <div class='modal-footer'>
																				<button type='button' data-bs-dismiss='modal' class='btn btn-warning light'>Cancel</button>
																				<button type='submit' name='submit' class='btn btn-primary light'>Edit</button>
                                        							        </div>
																			</form>
                                        							    </div>
                                        							</div>
                                    							</div>
															</td>
														</tr>";
												}
											} else {
												echo "<tr>
														<td colspan='9' class='text-center fw-bold text-warning'>No Record is present!</td>
													</tr>";
											}
											?>
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
	</div>
	<!--**********************************
			Content body end
		***********************************-->



	<!--**********************************
			Footer start
		***********************************-->
	<div class="footer">

		<div class="copyright">
			<p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/" target="_blank">Ritik kumar</a>
				2021</p>
		</div>
	</div>
	<!--**********************************
			Footer end
		***********************************-->

	</div>
	<!--**********************************
		Main wrapper end
	***********************************-->

	<!--**********************************
		Scripts
	***********************************-->
	<!-- form validation -->
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()
	</script>

	<!-- Required vendors -->
	<script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

	<!-- Datatable -->
	<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../js/plugins-init/datatables.init.js"></script>


	<script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
</body>

</html>