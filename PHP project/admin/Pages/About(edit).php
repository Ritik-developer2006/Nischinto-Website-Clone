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
}
;

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
                                    ?>" width="56" alt="" />
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
                    <h2 class="mb-3 me-auto">Edit About</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="">
                            <div class="card-header">
                                <h2>About Items</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?php
                                    // Include the database connection file
                                    include "../connect.php"; // Corrected file name from "cpnnect.php" to "connect.php"
                                    
                                    // Check if the connection was successful
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Define the SQL query
                                    $sql = "SELECT * FROM about WHERE id = 1"; // Use single quotes for values
                                    
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
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label">Director image
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['director_image'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label">New Director
                                                    image :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="director_image" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom04">Director
                                                    name<span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="director_name" class="form-control"
                                                    id="validationCustom04" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['director_name'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom016">
                                                    Title :-
                                                </label>
                                                <textarea type="text" name="heading" class="form-control"
                                                    id="validationCustom016" required><?php
                                                    echo $row['heading'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom020">
                                                    Sub Title :-
                                                </label>
                                                <textarea type="text" name="sub_heading" class="form-control"
                                                    id="validationCustom020" required><?php
                                                    echo $row['sub_heading'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom017">
                                                    Heading :-
                                                </label>
                                                <textarea type="text" name="title" class="form-control"
                                                    id="validationCustom017" required><?php
                                                    echo $row['title'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">
                                                    About this :-
                                                </label>
                                                <textarea type="text" name="detail" class="form-control"
                                                    id="validationCustom06" required><?php
                                                    echo $row['detail'];
                                                    ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill this.
                                                </div>
                                            </div>

                                            <div
                                                class='col-12 fs-4 alert alert-light border-dark rounded-0 py-2 fw-bold text-dark mt-4'>
                                                Time table :-</div>

                                            <div class="col-12 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom014">Timetable
                                                    Heading
                                                    <span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="tt_heading" class="form-control"
                                                    id="validationCustom014" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['tt_heading'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom05">Color <span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <select class="form-select py-3 border-1 rounded-4"
                                                    name="tt_contact_color" id="validationCustom05">
                                                    <option class='fw-bold bg-light' value="<?php
                                                    echo $row['tt_contact_color'];
                                                    ?>" selected><?php
                                                    echo $row['tt_contact_color'];
                                                    ?></option>
                                                    <option value="text-success">text-success</option>
                                                    <option value="text-danger">text-danger</option>
                                                    <option value="text-secondary">text-secondary</option>
                                                    <option value="text-primary">text-primary</option>
                                                    <option value="text-info">text-info</option>
                                                    <option value="text-info">text-light</option>
                                                    <option value="text-dark">text-dark</option>
                                                    <option value="text-warning">text-warning</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select button color.
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom05">Table Border
                                                    Color <span class="text-danger">*</span> :-
                                                </label>
                                                <select class="form-select py-3 border-1 rounded-4" name="border_color"
                                                    id="validationCustom05">
                                                    <option class='fw-bold bg-light' value="<?php
                                                    echo $row['border_color'];
                                                    ?>" selected><?php
                                                    echo $row['border_color'];
                                                    ?></option>
                                                    <option value="border-success">border-success</option>
                                                    <option value="border-danger">border-danger</option>
                                                    <option value="border-secondary">border-secondary</option>
                                                    <option value="border-primary">border-primary</option>
                                                    <option value="border-info">border-info</option>
                                                    <option value="border-info">border-light</option>
                                                    <option value="border-dark">border-dark</option>
                                                    <option value="border-warning">border-warning</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select button color.
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label">Call icon
                                                    :-</label>
                                                <div class="d-flex w-50 border p-2">
                                                    <img src="../uploads/<?php
                                                    echo $row['call_icon'];
                                                    ?>" alt="" class="w-100">
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label">New Call icon :-
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-file rounded-4 ps-2">
                                                        <input name="call_icon" type="file"
                                                            class="form-file-input py-3 rounded-4 form-control p-2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom015">Contact
                                                    number<span class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="number" class="form-control"
                                                    id="validationCustom015" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['number'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>

                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom07">Monday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="monday" class="form-control"
                                                    id="validationCustom07" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['monday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom08">Tuesday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="tuesday" class="form-control"
                                                    id="validationCustom08" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['tuesday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom09">Wednesday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="wednesday" class="form-control"
                                                    id="validationCustom09" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['wednesday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom010">Thursday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="thursday" class="form-control"
                                                    id="validationCustom010" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['thursday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom011">Friday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="friday" class="form-control"
                                                    id="validationCustom011" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['friday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom012">Saturday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="saturday" class="form-control"
                                                    id="validationCustom012" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['saturday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 mb-3">
                                                <label class="col-form-label" for="validationCustom013">Sunday<span
                                                        class="text-danger">*</span> :-
                                                </label>
                                                <input type="text" name="sunday" class="form-control"
                                                    id="validationCustom013" placeholder="Enter Text here for button.."
                                                    value="<?php
                                                    echo $row['sunday'];
                                                    ?>" required>
                                                <div class="invalid-feedback">
                                                    Please enter text.
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

    <!-- Chart piety plugin files -->
    <script src="../vendor/peity/jquery.peity.min.js"></script>
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
        $fileName = $_FILES[$fileInputName]['name'];
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
    $fileName = $row['director_image'];
    $fileName1 = $row['call_icon'];

    // Define upload directory
    $uploadDir = '../uploads/';

    // Handle file uploads
    $fileName = handleFileUpload('director_image', $fileName, $uploadDir);
    $fileName1 = handleFileUpload('call_icon', $fileName1, $uploadDir);

    // Sanitize and validate inputs
    $heading = $conn->real_escape_string($_POST['heading']);
    $sub_heading = $conn->real_escape_string($_POST['sub_heading']);
    $title = $conn->real_escape_string($_POST['title']);
    $detail = $conn->real_escape_string($_POST['detail']);
    $monday = $conn->real_escape_string($_POST['monday']);
    $tuesday = $conn->real_escape_string($_POST['tuesday']);
    $wednesday = $conn->real_escape_string($_POST['wednesday']);
    $thursday = $conn->real_escape_string($_POST['thursday']);
    $friday = $conn->real_escape_string($_POST['friday']);
    $saturday = $conn->real_escape_string($_POST['saturday']);
    $sunday = $conn->real_escape_string($_POST['sunday']);
    $number = $conn->real_escape_string($_POST['number']);
    $tt_heading = $conn->real_escape_string($_POST['tt_heading']);
    $tt_contact_color = $conn->real_escape_string($_POST['tt_contact_color']);
    $director_name = $conn->real_escape_string($_POST['director_name']);
    $border_color = $conn->real_escape_string($_POST['border_color']);


    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("UPDATE `about` SET `heading`=?, `sub_heading`=?, `title`=?, `detail`=?, `monday`=?, `tuesday`=?, `wednesday`=?, `thursday`=?, `friday`=?, `saturday`=?, `sunday`=?, `call_icon`=?, `number`=?, `tt_heading`=?, `tt_contact_color`=?, `director_name`=?, `director_image`=?, `border_color`=? WHERE `id` = '1'");

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo "<script>
            alert('Update query was wrong. not updated successfuly.');
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
    }

    // Bind parameters
    $stmt->bind_param('ssssssssssssssssss', $heading, $sub_heading, $title, $detail, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $fileName1, $number, $tt_heading, $tt_contact_color, $director_name, $fileName, $border_color);

    // Execute the statement
    if ($stmt->execute()) {
        if ($heading == $row['heading'] || $sub_heading == $row['sub_heading'] || $title == $row['title'] || $detail == $row['detail'] || $monday == $row['monday'] || $tuesday == $row['tuesday'] || $wednesday == $row['wednesday'] || $thursday == $row['thursday'] || $friday == $row['friday'] || $saturday == $row['saturday'] || $sunday == $row['sunday'] || $fileName1 == $row['call_icon'] || $number == $row['number'] || $tt_heading == $row['tt_heading'] || $tt_contact_color == $row['tt_contact_color'] || $director_name == $row['director_name'] || $fileName == $row['director_image'] || $border_color == $row['border_color']) {
            echo "<script>
                alert('Only Non-duplicate item are updated successfuly.');
                window.location.href = 'http://localhost/PHP%20project/admin/';
              </script>";
        } else {
            echo "<script>
            alert('About page updated successfully');
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
        }
    } else {
        echo "<script>
            alert('Error in updating query!');
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
    }

    $stmt->close();
    $conn->close();
    exit(); // Ensure no further code runs after redirect
}
?>