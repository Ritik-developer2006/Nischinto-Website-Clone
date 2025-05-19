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
include "connect.php"; // Corrected file name

// Check if the connection was successful
if ($conn->connect_error) {
    die("<h1 class='text-danger'>Connection with database failed!</h1>");
}

// fetching user data which is log in
$stmt1 = $conn->prepare("SELECT * FROM log_in WHERE email = ?");
$stmt1->bind_param("s", $_SESSION['email']);

// Execute the statement
$stmt1->execute();

// Fetch the results
$result1 = $stmt1->get_result();
$total1 = $result1->num_rows;
$data1 = $result1->fetch_assoc();


// fetching profile data of user which is log in
$stmt = $conn->prepare("SELECT * FROM user_profile WHERE email = ?");
$stmt->bind_param("s", $_SESSION['email']);

// Execute the statement
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$total = $result->num_rows;
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

    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- required vendors -->
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

    <!-- Style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .was-validated .form-check-input:valid {
            border: 1px solid #f72b50 !important;
        }

        .was-validated .form-check-input:valid~.form-check-label {
            color: unset !important;
        }

        .was-validated .form-check-input:valid:checked,
        .form-check-input.is-valid:checked {
            border: 1px solid green !important;
        }
    </style>
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
                                <a href="../../index" class="btn btn-primary btn-rounded">Visit Website</a>
                            </li>
                            <li class="nav-item dropdown  header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="uploads/<?php
                                    echo $data1['photo'];
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
                                    <?php
                                    include "connect.php"; // Corrected file name
                                    
                                    // Check if the connection was successful
                                    if ($conn->connect_error) {
                                        die("<h1 class='text-danger'>Connection with database failed!</h1>");
                                    }

                                    // fetching profile data of user which is log in
                                    $stmt = $conn->prepare("SELECT * FROM user_profile WHERE email = ?");
                                    $stmt->bind_param("s", $_SESSION['email']);

                                    // Execute the statement
                                    $stmt->execute();

                                    // Fetch the results
                                    $result = $stmt->get_result();
                                    $data = $result->fetch_assoc();
                                    $total = $result->num_rows;
                                    if ($total == 1) {
                                        echo '<a role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-pencil-square text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                        <span class="ms-2">Edit Profile </span>
                                    </a>';
                                    }
                                    ;
                                    ?>
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


        <!-- Modal for edit profile -->
        <?php
        include "connect.php"; // Ensure this is the correct path
        
        // Check if the connection was successful
        if ($conn->connect_error) {
            die("<h1 class='text-danger'>Connection with database failed!</h1>");
        }

        // Fetching profile data of user who is logged in
        $stmt = $conn->prepare("SELECT * FROM user_profile WHERE email = ?");
        $stmt->bind_param("s", $_SESSION['email']);

        // Execute the statement
        $stmt->execute();

        // Fetch the results
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $total = $result->num_rows;

        if ($total == 1) {
            $knowledges = $data['knowledge'];
            $knowledges_all = array_map('trim', explode(',', $knowledges)); // Split and trim
        
            // Define all possible options
            $options = ['HTML', 'SASS', 'CSS', 'Js', 'Bootstrap', 'jQuery', 'AJAX', 'Tailwind CSS', 'PHP', 'Laravel', 'Nodejs', 'SQL', 'MongoDB', 'Wordpress'];

            echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update_form" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" action="edit_profile.php?id=' . $data['id'] . '" novalidate>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom1"><strong>Full Name <span style="color:red;">*</span> :-</strong></label>
                            <input type="text" name="name" value="' . htmlspecialchars($data['name']) . '" id="validationCustom1" class="form-control" placeholder="Full Name" required>
                            <div class="invalid-feedback">Please enter full name.</div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom2"><strong>Email <span style="color:red;">*</span> :-</strong></label>
                            <input type="email" name="email" value="' . htmlspecialchars($data['email']) . '" id="validationCustom02" class="form-control" placeholder="hello@example.com" required>
                            <div class="invalid-feedback">Please enter email.</div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom2"><strong>Highly Qualification <span style="color:red;">*</span> :-</strong></label>
                            <input type="text" name="edu" value="' . htmlspecialchars($data['edu']) . '" id="validationCustom02" class="form-control" placeholder="e.g. Master of Technology" required>
                            <div class="invalid-feedback">Please enter your qualification.</div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom3"><strong>Contact Number <span style="color:red;">*</span> :-</strong></label>
                            <input type="text" name="number" value="' . htmlspecialchars($data['number']) . '" id="validationCustom3" class="form-control" placeholder="**********" required>
                            <div class="invalid-feedback">Please enter number.</div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom4"><strong>Position in Company <span style="color:red;">*</span> :-</strong></label>
                            <select name="post" id="validationCustom4" class="form-select py-3 border-1 rounded-4" required>
                                <option value="' . htmlspecialchars($data['post']) . '" selected>' . htmlspecialchars($data['post']) . '</option>
                                <option value="President">President</option>
                                <option value="Vice President">Vice President</option>
                                <option value="CEO">CEO</option>
                                <option value="Manager">Manager</option>
                                <option value="HR">HR</option>
                                <option value="Staff Member">Staff Member</option>
                                <option value="Senior Employee">Senior Employee</option>
                                <option value="Junior Employee">Junior Employee</option>
                            </select>
                            <div class="invalid-feedback">Please select position.</div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom5"><strong>Job Field <span style="color:red;">*</span> :-</strong></label>
                            <select name="skill" id="validationCustom5" class="form-select py-3 border-1 rounded-4" required>
                                <option value="' . htmlspecialchars($data['skill']) . '" selected>' . htmlspecialchars($data['skill']) . '</option>
                                <option value="Front-end developer">Front-end developer</option>
                                <option value="Back-end developer">Back-end developer</option>
                                <option value="Full-stack developer">Full-stack developer</option>
                                <option value="Software developer">Software developer</option>
                                <option value="Senior Full-stack developer">Senior Full-stack developer</option>
                                <option value="Web designer">Web designer</option>
                            </select>
                            <div class="invalid-feedback">Please select field.</div>
                        </div>
                        <div class="col-12 mb-3 d-flex flex-wrap">
                            <div class="w-100 mb-2"><strong>Skills <span style="color:red;">*</span> :-</strong></div>';
            // var_dump($knowledges_all);
            foreach ($options as $option) {
                $checked = in_array(trim(strtolower($option)), array_map('strtolower', $knowledges_all)) ? 'checked' : ''; // Normalize case
                echo '
                    <div class="form-check me-3">
                        <input class="form-check-input" type="checkbox" name="knowledge[]" value="' . htmlspecialchars($option) . '" id="checkbox_' . strtolower($option) . '" ' . $checked . '>
                        <label class="form-check-label" for="checkbox_' . strtolower($option) . '">' . htmlspecialchars($option) . '</label>
                    </div>';
            }
            ;
            echo '<div id="error-message1" class="text-danger w-100" style="display:none;"></div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom7"><strong>Portfolio link</strong> :-</label>
                            <input type="text" name="portfolio" value="' . htmlspecialchars($data['portfolio']) . '" id="validationCustom7" class="form-control" placeholder="https://xyz.in">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom8"><strong>LinkedIn profile link</strong> :-</label>
                            <input type="text" value="' . htmlspecialchars($data['linkdin']) . '" name="linkdin" id="validationCustom8" class="form-control" placeholder="https://xyz.in">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom9"><strong>GitHub account link</strong> :-</label>
                            <input type="text" name="git" value="' . htmlspecialchars($data['git']) . '" id="validationCustom9" class="form-control" placeholder="https://xyz.in">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom10"><strong>Instagram account link</strong> :-</label>
                            <input type="text" name="insta" value="' . htmlspecialchars($data['insta']) . '" id="validationCustom10" class="form-control" placeholder="https://xyz.in">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="col-form-label">Profile Picture :-</label>
                            <div class="d-flex w-50 border p-2">
                                <img src="uploads/' . htmlspecialchars($data['photo']) . '" alt="No Profile Picture" class="w-100">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="mb-1" for="validationCustom11"><strong>Photo :-</strong></label>
                            <input type="file" name="photo" id="validationCustom11" class="form-control pt-3">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>';
        }
        ?>

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
                            <li><a href="index.php">Dashboard</a></li>
                        </ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-072-printer"></i>
                            <span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="Appoinment/appoinment_form.php">Appoinment Form</a></li>
                            <li><a href="Messages/message_form.php">Message form</a></li>
                            <li><a href="Subscribers/subcsriber_form.php">Subscribe form</a></li>
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
                    <h2 class="mb-3 me-auto">Admin Profile</h2>
                </div>
                <?php

                include "connect.php"; // Corrected file name
                
                // Check if the connection was successful
                if ($conn->connect_error) {
                    die("<h1 class='text-danger'>Connection with database failed!</h1>");
                }

                // fetching profile data of user which is log in
                $stmt = $conn->prepare("SELECT * FROM user_profile WHERE email = ?");
                $stmt->bind_param("s", $_SESSION['email']);

                // Execute the statement
                $stmt->execute();

                // Fetch the results
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
                $total = $result->num_rows;

                if ($total != 1) {
                    echo '<div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card w-100">
                            <div class="card-header">
                                <h1>Create Your Profile</h1>
                            </div>
                            <div class="card-body">
                                <form method="post" id="myForm" class="needs-validation row"
                                    enctype="multipart/form-data" novalidate>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom01"><strong>Full Name <span
                                                    style="color:red;">*</span> :-</strong></label>
                                        <input type="text" name="name" id="validationCustom01" class="form-control"
                                            placeholder="Full Name" required>
                                        <div class="invalid-feedback">
                                            Please enter full name.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom02"><strong>Email</strong> <span
                                                style="color:red;">*</span> :-</label>
                                        <input type="email" name="email" id="validationCustom02" class="form-control"
                                            placeholder="hello@example.com" required>
                                        <div class="invalid-feedback" required>
                                            Please enter email.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom02"><strong>Heighly
                                                Qualification</strong> <span style="color:red;">*</span> :-</label>
                                        <input type="text" name="edu" id="validationCustom02" class="form-control"
                                            placeholder="e.g. :- Master of Technology" required>
                                        <div class="invalid-feedback" required>
                                            Please enter Your Qualification.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom03"><strong>Contact Number <span
                                                    style="color:red;">*</span> :-</strong></label>
                                        <input type="text" name="number" id="validationCustom03" class="form-control"
                                            placeholder="**********" required>
                                        <div class="invalid-feedback">
                                            Please enter number.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom04"><strong>Position in Company <span
                                                    style="color:red;">*</span> :-</strong></label>
                                        <select name="post" id="validationCustom04"
                                            class="form-select py-3 border-1 rounded-4" required>
                                            <option value="" selected>Select...</option>
                                            <option value="President">President</option>
                                            <option value="Voice President">Voice President</option>
                                            <option value="CEO">CEO</option>
                                            <option value="Manager">Manager</option>
                                            <option value="HR">HR</option>
                                            <option value="Staff Member">Staff Member</option>
                                            <option value="Senior Employee">Senior Employee</option>
                                            <option value="Junior Employee">Junior Employee</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Position.
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom05"><strong>Job Field <span
                                                    style="color:red;">*</span> :-</strong></label>
                                        <select name="skill" id="validationCustom05"
                                            class="form-select py-3 border-1 rounded-4" required>
                                            <option value="" selected>Select...</option>
                                            <option value="Front-end developer">Front-end developer</option>
                                            <option value="Back-end developer">Back-end developer</option>
                                            <option value="Full-stack developer">Full-stack developer</option>
                                            <option value="Software developer">Softwere developer</option>
                                            <option value="Senior Full-stack developer">Senior Full-stack developer
                                            </option>
                                            <option value="Web designer">Web designer</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select field.
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3 d-flex flex-wrap">
                                        <div class="w-100 mb-2"><strong>Skills <span style="color:red;">*</span> :-
                                            </strong></div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="HTML" id="checkbox1">
                                            <label class="form-check-label" for="checkbox1">Html</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="CSS" id="checkbox2">
                                            <label class="form-check-label" for="checkbox2">CSS</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="jQuery" id="checkbox3">
                                            <label class="form-check-label" for="checkbox3">jQuery</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Js" id="checkbox4">
                                            <label class="form-check-label" for="checkbox4">JavaScript</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Bootstrap" id="checkbox5">
                                            <label class="form-check-label" for="checkbox5">Bootstrap</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Tailwind CSS" id="checkbox6">
                                            <label class="form-check-label" for="checkbox6">Tailwind CSS</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="PHP" id="checkbox7">
                                            <label class="form-check-label" for="checkbox7">PHP</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Laravel" id="checkbox8">
                                            <label class="form-check-label" for="checkbox8">Laravel</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Reactjs" id="checkbox9">
                                            <label class="form-check-label" for="checkbox9">Reactjs</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Nodejs" id="checkbox10">
                                            <label class="form-check-label" for="checkbox10">Nodejs</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="SQL" id="checkbox11">
                                            <label class="form-check-label" for="checkbox11">SQL</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="MongoDB" id="checkbox12">
                                            <label class="form-check-label" for="checkbox12">MongoDB</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="SASS" id="checkbox13">
                                            <label class="form-check-label" for="checkbox13">SASS</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="checkbox" name="knowledge[]"
                                                value="Wordpress" id="checkbox14">
                                            <label class="form-check-label" for="checkbox14">Wordpress</label>
                                        </div>
                                        <div id="error-message" class="text-danger w-100" style="display:none;"></div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom07"><strong>Portfolio link</strong>
                                            :-</label>
                                        <input type="text" name="portfolio" id="validationCustom07" class="form-control"
                                            placeholder="e.g. :- Master of Technology">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom08">
                                            <strong>Linkdin profile link :-</strong>
                                        </label>
                                        <input type="text" name="linkdin" id="validationCustom08" class="form-control"
                                            placeholder="e.g. :- Master of Technology">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom09"><strong>Git account link</strong>
                                            :-</label>
                                        <input type="text" name="git" id="validationCustom09" class="form-control"
                                            placeholder="e.g. :- Master of Technology">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom010"><strong>Instagram account
                                                link</strong> :-</label>
                                        <input type="text" name="insta" id="validationCustom010" class="form-control"
                                            placeholder="e.g. :- Master of Technology">
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label class="mb-1" for="validationCustom011"><strong>Photo :-</strong></label>
                                        <input type="file" name="photo" id="validationCustom011"
                                            class="form-control pt-3">
                                    </div>
                                    <div class="card-footer p-0 mt-3">
                                        <div class="text-center">
                                            <button type="submit" name="submit"
                                                class="btn btn-success mt-3">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
                } else {
                    echo '<div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card w-sm-50" style="">
                            <div class="card-header">
                                <h1>' . $data["name"] . '</h1>
                            </div>
                            <div class="card-body">
                                <img src="uploads/' . $data["photo"] . '" class="w-100"
                                    alt="No Profile Picture">
                                <h2 class="mt-3">About Us</h2>
                                <div class="mb-0 mt-4">
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Postition :- </span>' . $data['post'] . ' of Nischinto.
                                    </div>
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Heighly Qualification :- </span>' . $data["edu"] . '.
                                    </div>
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Field :- </span>' . $data["skill"] . '.
                                    </div>
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Skills :- </span>' . $data["knowledge"] . ' etc.
                                    </div>
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Contact no. :- </span>' . $data["number"] . '
                                    </div>
                                    <div class="fs-4 fw-medium">
                                        <span class="text-primary">Email-id :- </span>' . $data["email"] . '
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between flex-wrap fw-bold text-primary fs-5 gap-4">
                                    <div><a href="' . $data["portfolio"] . '" target="_blank"><button class="btn btn-sm btn-primary"
                                                role="button">Portfolio
                                                link</button></a></div>
                                    <div><a href="' . $data["linkdin"] . '" target="_blank"><button class="btn btn-sm btn-primary"
                                                role="button">Linkd-In
                                                Profile</button></a></div>
                                    <div><a href="' . $data["insta"] . '" target="_blank"><button class="btn btn-sm btn-primary"
                                                role="button">Instagram
                                                Accoount</button></a></div>
                                    <div><a href="' . $data["git"] . '" target="_blank"><button class="btn btn-sm btn-primary"
                                                role="button">Git-Hub
                                                Link</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

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
    <script>
        $(document).ready(function () {
            // Function to validate checkbox selection
            function validateCheckboxes(errorMessageId) {
                if (!$('input[type="checkbox"][name="knowledge[]"]:checked').length) {
                    $('#' + errorMessageId).text('Please select at least one skill.').show();
                    return false;
                } else {
                    $('#' + errorMessageId).hide();
                    return true;
                }
            }

            // Validate on form submit
            $('#myForm').on('submit', function (e) {
                if (!validateCheckboxes('error-message')) {
                    e.preventDefault(); // Prevent form submission
                }
            });

            // Validate on checkbox change for initial form
            $('input[type="checkbox"][name="knowledge[]"]').change(function () {
                validateCheckboxes('error-message');
            });

            // Validate on update button click
            $('#update_form').on('submit', function (e) {
                if (!validateCheckboxes('error-message1')) {
                    e.preventDefault(); // Prevent form submission
                }
            });

            // Validate on checkbox change for update form
            $('input[type="checkbox"][name="knowledge[]"]').change(function () {
                validateCheckboxes('error-message1');
            });
        });

    </script>

    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
</body>

</html>

<?php
include "connect.php";

// Function to handle file uploads
function handleFileUpload($fileInputName, $uploadDir)
{
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        print_r($fileTmpPath);
        $fileName = $_FILES[$fileInputName]['name'];
        $destination = $uploadDir . $fileName;

        // Create the upload directory if it does not exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Check for duplicate file
        if (file_exists($destination)) {
            echo "<script>alert('File with the same name already exists. Please rename your file and try again.');</script>";
        } else {
            if (move_uploaded_file($fileTmpPath, $destination)) {
                return $fileName;
            } else {
                echo "<script>alert('Error in uploading the file. Please try again.');</script>";
            }
        }
    } else {
        return null; // Return null if no file is uploaded
    }
}

function inputnull($value)
{
    return $value !== '' ? $value : null;
}

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Define upload directory
    $uploadDir = 'uploads/';

    // Handle file uploads
    $fileName = handleFileUpload('photo', $uploadDir);

    if (isset($_POST['knowledge']) && is_array($_POST['knowledge'])) {
        // Capture checked values
        $knowledge = $_POST['knowledge'];

        // Convert the array to a comma-separated string
        $knowledges = implode(',', $knowledge);
    }

    // Sanitize user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $edu = $_POST['edu'];
    $number = $_POST['number'];
    $post = $_POST['post'];
    $skill = $_POST['skill'];
    $email = $_POST['email'];
    $portfolio = inputnull($_POST['portfolio']);
    $git = inputnull($_POST['git']);
    $insta = inputnull($_POST['insta']);
    $linkdin = inputnull($_POST['linkdin']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO user_profile (name, photo, post, edu, skill, knowledge, number, email, portfolio, linkdin, git, insta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $name, $fileName, $post, $edu, $skill, $knowledges, $number, $email, $portfolio, $linkdin, $git, $insta);

    if ($stmt->execute()) {
        // Successful registration
        echo "<script>alert('You have successfully Create Proflie.'); 
            window.location.href = 'http://localhost/PHP%20project/admin/profile.php';
            </script>";
    } else {
        // Handle error
        echo "<script>alert('There was an error with Create profile. Please try again.'); 
        window.location.href = 'http://localhost/PHP%20project/admin/profile.php';
        </script>";
    }

    // Close the prepared statement and the connection
    $stmt->close();
    $conn->close();

    exit(); // Ensure no further code runs after redirect
}
?>