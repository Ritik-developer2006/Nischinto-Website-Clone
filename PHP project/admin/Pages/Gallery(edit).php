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
            <a href="../index.php" class="brand-logo">
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
                                <a href="../../index.php" class="btn btn-primary btn-rounded">Visit Website</a>
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
                        <li><a href="../Appoinment/appoinment_form.php">Appoinment Form</a></li>
                            <li><a href="../Messages/message_form.php">Message form</a></li>
                            <li><a href="../Subscribers/subcsriber_form.php">Subscribe form</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-043-menu"></i>
                            <span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="../Appoinment/Appoinments_list.php">Appoinments</a></li>
                            <li><a href="../Messages/Messages_list.php">Messages</a></li>
                            <li><a href="../Subscribers/Subscribers_list.php">Suibscribers</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                            <i class="flaticon-022-copy"></i>
                            <span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="true">
                            <li><a href="Header(edit).php">Navbar</a></li>
                            <li><a href="Home(edit).php">Home</a></li>
                            <li><a href="About(edit).php">About</a></li>
                            <li><a href="Department(edit).php">Department</a></li>
                            <li><a href="Doctor(edit).php">Doctor</a></li>
                            <li><a href="Gallery(edit).php">Gallery</a></li>
                            <li><a href="Pricing(edit).php">Pricing</a></li>
                            <li><a href="Blog(edit).php">Blog</a></li>
                            <li><a href="Footer(edit).php">Footer</a></li>
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
                    <h2 class="mb-3 me-auto">Edit Gallery Page</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="">
                            <div class="card-header">
                                <h2>Gallery Page Items</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?php
                                    // Include the database connection file
                                    include "../connect.php";

                                    // Check if the connection was successful
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Define the SQL query
                                    $sql = "SELECT * FROM gallery WHERE id = 1";
                                    // Execute the query
                                    $result = $conn->query($sql);

                                    // Check if the query was successful
                                    if ($result && $result->num_rows > 0) {
                                        // Fetch the result as an associative array
                                        $row = $result->fetch_assoc();
                                    } else {
                                        echo "No results found or query failed.";
                                    }

                                    // Close the database connection
                                    $conn->close();
                                    ?>

                                    <form class="needs-validation" novalidate method="post"
                                        enctype="multipart/form-data">
                                        <div class="row">

                                            <div
                                                class='col-12 fs-4 alert alert-light border-dark rounded-0 py-2 fw-bold text-dark mt-4'>
                                                View our gallery</div>

                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img1'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img1" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img2'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img2" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img3'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img3" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img4'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img4" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img5'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img5" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img6'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img6" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['hospital_img7'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="hospital_img7" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Title :-
                                                </label>
                                                <textarea type="text" name="heading1" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['heading1'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Sub Title :-
                                                </label>
                                                <textarea type="text" name="sub_heading1" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['sub_heading1'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image link icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['image_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image
                                                    link icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="image_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class='col-12 fs-4 alert alert-light border-dark rounded-0 py-2 fw-bold text-dark mt-4'>
                                                Before and after procedures</div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Title :-
                                                </label>
                                                <textarea type="text" name="heading2" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['heading2'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Sub Title :-
                                                </label>
                                                <textarea type="text" name="sub_heading2" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['sub_heading2'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>


                                            <h3 class="mt-3">Card 1</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image of Person
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['card1_img'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image of
                                                    Person :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="card1_img" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name of
                                                    Person<span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card1_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card1_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label"
                                                    for="validationCustom04">Specialisation<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card1_skill" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card1_skill'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    About this :-
                                                </label>
                                                <textarea type="text" name="card1_detail" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['card1_detail'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>

                                            <h3 class="mt-3">Card 2</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image of Person
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['card2_img'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image of
                                                    Person :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="card2_img" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name of
                                                    Person<span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card2_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card2_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label"
                                                    for="validationCustom04">Specialisation<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card2_skill" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card2_skill'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    About this :-
                                                </label>
                                                <textarea type="text" name="card2_detail" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['card2_detail'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>


                                            <h3 class="mt-3">Card 3</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Image of Person
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['card3_img'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Image of
                                                    Person :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="card3_img" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name of
                                                    Person<span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card3_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card3_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label"
                                                    for="validationCustom04">Specialisation<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="card3_skill" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['card3_skill'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    About this :-
                                                </label>
                                                <textarea type="text" name="card3_detail" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['card3_detail'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>

                                            <div
                                                class='col-12 fs-4 alert alert-light border-dark rounded-0 py-2 fw-bold text-dark mt-4'>
                                                What people say?</div>

                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Title :-
                                                </label>
                                                <textarea type="text" name="heading3" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['heading3'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    Sub Title :-
                                                </label>
                                                <textarea type="text" name="sub_heading3" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['sub_heading3'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>


                                            <h3 class="mt-3">Card 1</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['box1_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="box1_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box1_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box1_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Counting<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box1_count" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box1_count'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <h3 class="mt-3">Card 2</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['box2_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="box2_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box2_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box2_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Counting<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box2_count" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box2_count'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <h3 class="mt-3">Card 3</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['box3_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="box3_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box3_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box3_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Counting<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box3_count" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box3_count'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <h3 class="mt-3">Card 4</h3>
                                            <hr>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['box4_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New Icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="box4_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Name<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box4_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box4_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Counting<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="box4_count" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['box4_count'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <h3 class="mt-3">Advertisnment</h3>
                                            <hr>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Advertisement
                                                    Icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['adver_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New
                                                    Advertisement Icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="adver_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Advertisement
                                                    Picture
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['adver_img'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 mb-3">
                                                <label class="col-form-label" for="validationCustom02">Set New
                                                    Advertisement Picture :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="adver_img" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3 d-flex justify-content-center mt-5">
                                                <div>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
</body>

</html>

<?php
include "../connect.php";
// Function to handle file uploads
function handleFileUpload($fileInputName, &$fileName, $uploadDir)
{
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        $fileName = $_FILES[$fileInputName]['name']; // Adding timestamp to avoid conflicts
        $destination = $uploadDir . $fileName;

        // Create the upload directory if it does not exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // check for duplicate file
        if (file_exists($destination)) {
            echo "<script>
                    alert('File with the same name already exists for $fileInputName. Please rename your file and try again.');
                </script>";
        } else {
            if (move_uploaded_file($fileTmpPath, $destination)) {
                return $fileName;
            } else {
                echo "<script>
                        alert('Error in uploading $fileInputName. Please try again.');
                    </script>";
            }
        }
    }
    return $fileName;
}

if (isset($_POST['submit'])) {
    // Initialize with existing image file names if needed
    $fileName = isset($row['hospital_img1']) ? $row['hospital_img1'] : '';
    $fileName1 = isset($row['hospital_img2']) ? $row['hospital_img2'] : '';
    $fileName2 = isset($row['hospital_img3']) ? $row['hospital_img3'] : '';
    $fileName3 = isset($row['hospital_img4']) ? $row['hospital_img4'] : '';
    $fileName4 = isset($row['hospital_img5']) ? $row['hospital_img5'] : '';
    $fileName5 = isset($row['hospital_img6']) ? $row['hospital_img6'] : '';
    $fileName6 = isset($row['hospital_img7']) ? $row['hospital_img7'] : '';
    $fileName7 = isset($row['image_icon']) ? $row['image_icon'] : '';
    $fileName8 = isset($row['card1_img']) ? $row['card1_img'] : '';
    $fileName9 = isset($row['card2_img']) ? $row['card2_img'] : '';
    $fileName10 = isset($row['card3_img']) ? $row['card3_img'] : '';
    $fileName11 = isset($row['adver_img']) ? $row['adver_img'] : '';
    $fileName12 = isset($row['adver_icon']) ? $row['adver_icon'] : '';
    $fileName13 = isset($row['box1_icon']) ? $row['box1_icon'] : '';
    $fileName14 = isset($row['box2_icon']) ? $row['box2_icon'] : '';
    $fileName15 = isset($row['box3_icon']) ? $row['box3_icon'] : '';
    $fileName16 = isset($row['box4_icon']) ? $row['box4_icon'] : '';

    // Define upload directory
    $uploadDir = '../uploads/';

    // Handle file uploads
    $fileName = handleFileUpload('hospital_img1', $fileName, $uploadDir);
    $fileName1 = handleFileUpload('hospital_img2', $fileName1, $uploadDir);
    $fileName2 = handleFileUpload('hospital_img3', $fileName2, $uploadDir);
    $fileName3 = handleFileUpload('hospital_img4', $fileName3, $uploadDir);
    $fileName4 = handleFileUpload('hospital_img5', $fileName4, $uploadDir);
    $fileName5 = handleFileUpload('hospital_img6', $fileName5, $uploadDir);
    $fileName6 = handleFileUpload('hospital_img7', $fileName6, $uploadDir);
    $fileName7 = handleFileUpload('image_icon', $fileName7, $uploadDir);
    $fileName8 = handleFileUpload('card1_img', $fileName8, $uploadDir);
    $fileName9 = handleFileUpload('card2_img', $fileName9, $uploadDir);
    $fileName10 = handleFileUpload('card3_img', $fileName10, $uploadDir);
    $fileName11 = handleFileUpload('adver_img', $fileName11, $uploadDir);
    $fileName12 = handleFileUpload('adver_icon', $fileName12, $uploadDir);
    $fileName13 = handleFileUpload('box1_icon', $fileName13, $uploadDir);
    $fileName14 = handleFileUpload('box2_icon', $fileName14, $uploadDir);
    $fileName15 = handleFileUpload('box3_icon', $fileName15, $uploadDir);
    $fileName16 = handleFileUpload('box4_icon', $fileName16, $uploadDir);

    // Sanitize and validate inputs
    $heading1 = $conn->real_escape_string($_POST['heading1']);
    $heading2 = $conn->real_escape_string($_POST['heading2']);
    $heading3 = $conn->real_escape_string($_POST['heading3']);
    $sub_heading1 = $conn->real_escape_string($_POST['sub_heading1']);
    $sub_heading2 = $conn->real_escape_string($_POST['sub_heading2']);
    $sub_heading3 = $conn->real_escape_string($_POST['sub_heading3']);
    $card1_name = $conn->real_escape_string($_POST['card1_name']);
    $card2_name = $conn->real_escape_string($_POST['card2_name']);
    $card3_name = $conn->real_escape_string($_POST['card3_name']);
    $card1_skill = $conn->real_escape_string($_POST['card1_skill']);
    $card2_skill = $conn->real_escape_string($_POST['card2_skill']);
    $card3_skill = $conn->real_escape_string($_POST['card3_skill']);
    $card1_detail = $conn->real_escape_string($_POST['card1_detail']);
    $card2_detail = $conn->real_escape_string($_POST['card2_detail']);
    $card3_detail = $conn->real_escape_string($_POST['card3_detail']);
    $box1_count = $conn->real_escape_string($_POST['box1_count']);
    $box2_count = $conn->real_escape_string($_POST['box2_count']);
    $box3_count = $conn->real_escape_string($_POST['box3_count']);
    $box4_count = $conn->real_escape_string($_POST['box4_count']);
    $box1_name = $conn->real_escape_string($_POST['box1_name']);
    $box2_name = $conn->real_escape_string($_POST['box2_name']);
    $box3_name = $conn->real_escape_string($_POST['box3_name']);
    $box4_name = $conn->real_escape_string($_POST['box4_name']);

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("UPDATE `gallery` SET `heading1`=?,`heading2`=?,`heading3`=?,`sub_heading1`=?,`sub_heading2`=?,`sub_heading3`=?,`hospital_img1`=?,`hospital_img2`=?,`hospital_img3`=?,`hospital_img4`=?,`hospital_img5`=?,`hospital_img6`=?,`hospital_img7`=?,`image_icon`=?,`card1_img`=?,`card2_img`=?,`card3_img`=?,`card1_name`=?,`card2_name`=?,`card3_name`=?,`card1_skill`=?,`card2_skill`=?,`card3_skill`=?,`card1_detail`=?,`card2_detail`=?,`card3_detail`=?,`adver_img`=?,`adver_icon`=?,`box1_icon`=?,`box2_icon`=?,`box3_icon`=?,`box4_icon`=?,`box1_count`=?,`box2_count`=?,`box3_count`=?,`box4_count`=?,`box1_name`=?,`box2_name`=?,`box3_name`=?,`box4_name`=? WHERE `id` = '1'");

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo "<script>
        alert('Update query was wrong. not updated successfuly.');
        window.location.href = 'http://localhost/PHP%20project/admin/Pages/Gallery(edit).php';
      </script>";
    }

    // Bind parameters
    $stmt->bind_param('ssssssssssssssssssssssssssssssssssssssss', $heading1, $heading2, $heading3, $sub_heading1, $sub_heading2, $sub_heading3, $fileName, $fileName1, $fileName2, $fileName3, $fileName4, $fileName5, $fileName6, $fileName7, $fileName8, $fileName9, $fileName10, $card1_name, $card2_name, $card3_name, $card1_skill, $card2_skill, $card3_skill, $card1_detail, $card2_detail, $card3_detail, $fileName11, $fileName12, $fileName13, $fileName14, $fileName15, $fileName16, $box1_count, $box2_count, $box3_count, $box4_count, $box1_name, $box2_name, $box3_name, $box4_name);

    // Execute the statement
    if ($stmt->execute()) {
        if ($heading1 == $row['heading1'] || $heading2 == $row['heading2'] || $heading3 == $row['heading3'] || $sub_heading1 == $row['sub_heading1'] || $sub_heading2 == $row['sub_heading2'] || $sub_heading3 == $row['sub_heading3'] || $fileName == $row['hospital_img1'] || $fileName1 == $row['hospital_img2'] || $fileName2 == $row['hospital_img3'] || $fileName3 == $row['hospital_img4'] || $fileName4 == $row['hospital_img5'] || $fileName5 == $row['hospital_img6'] || $fileName6 == $row['hospital_img7'] || $fileName7 == $row['image_icon'] || $fileName8 == $row['card1_img'] || $fileName9 == $row['card2_img'] || $fileName10 == $row['card3_img'] || $card1_name == $row['card1_name'] || $card2_name == $row['card2_name'] || $card3_name == $row['card3_name'] || $card1_skill == $row['card1_skill'] || $card2_skill == $row['card2_skill'] || $card3_skill == $row['card3_skill'] || $card1_detail == $row['card1_detail'] || $card2_detail == $row['card2_detail'] || $card3_detail == $row['card3_detail'] || $fileName11 == $row['adver_img'] || $fileName12 == $row['adver_icon'] || $fileName13 == $row['box1_icon'] || $fileName14 == $row['box2_icon'] || $fileName15 == $row['box3_icon'] || $fileName16 == $row['box4_icon'] || $box1_count == $row['box1_count'] || $box2_count == $row['box2_count'] || $box3_count == $row['box3_count'] || $box4_count == $row['box4_count'] || $box1_name == $row['box1_name'] || $box2_name == $row['box2_name'] || $box3_name == $row['box3_name'] || $box4_name == $row['box4_name']) {
            echo "<script>
                alert('Items are updated successfuly.');
                window.location.href = 'http://localhost/PHP%20project/admin/Pages/Gallery(edit).php';
              </script>";
        } else {
            echo "<script>
            alert('Gallery page updated successfully');
            window.location.href = 'http://localhost/PHP%20project/admin/Pages/Gallery(edit).php';
          </script>";
        }
    } else {
        echo "<script>
            alert('Error in updating query!');
            window.location.href = 'http://localhost/PHP%20project/admin/Pages/Gallery(edit).php';
          </script>";
    }

    $stmt->close();
    $conn->close();
    exit(); // Ensure no further code runs after redirect
}
?>