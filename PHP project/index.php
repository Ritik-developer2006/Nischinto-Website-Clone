<?php
// Include the database connection file
include "admin/connect.php"; // Corrected file name

// Check if the connection was successful
if ($conn->connect_error) {
    die("<h1 class='text-danger'>Connection with database failed!</h1>");
}

// Array of SQL queries
$queries = [
    "header" => "SELECT * FROM header WHERE id = 1",
    "home" => "SELECT * FROM home WHERE id = 1",
    "about" => "SELECT * FROM about WHERE id = 1",
    "department" => "SELECT * FROM department WHERE id = 1",
    "doctor" => "SELECT * FROM doctor WHERE id = 1",
    "gallery" => "SELECT * FROM gallery WHERE id = 1",
    "pricing" => "SELECT * FROM pricing WHERE id = 1",
    "blog" => "SELECT * FROM blog WHERE id = 1",
    "footer" => "SELECT * FROM footer WHERE id = 1"
];

// Execute queries and fetch results
$results = [];
foreach ($queries as $key => $query) {
    $result = $conn->query($query);
    if (!$result || $result->num_rows == 0) {
        die("<h1 class='text-warning'>No results found or query failed for $key.</h1>");
    }
    $results[$key] = $result->fetch_assoc();
}

// Close the database connection
$conn->close();
?>


<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nischinto</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="images\4.png" type="image/x-icon" />

    <!-- required css links -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <link href="index.css" rel="stylesheet">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container navtop">
        <div class="row pt-3 pt-lg-2">
            <div class="col-6 col-lg-3 pt-xl-0 pt-xxl-1 col-xl-3 col-md-4 mt-md-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor"
                    class="bi bi-envelope mb-1" viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                </svg> <?php
                echo $results['header']['email'];
                ?>
            </div>
            <div class="col-6 col-lg-3 pt-xl-0 pt-xxl-1 col-md-3 col-xl-3 text-end text-lg-start mt-md-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-telephone-plus mb-1" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                    <path fill-rule="evenodd"
                        d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5" />
                </svg> <?php
                echo $results['header']['contact'];
                ?>
            </div>
            <div class="col-12 col-md-5 col-lg-6 col-xl-6 text-center fw-bold mt-1 mt-lg-0 text-md-end">
                <a href="#appoinment"><button class="btn <?php
                echo $results['header']['btn_color'];
                ?> fw-medium"><?php
                 echo $results['header']['btn_text'];
                 ?></button></a>
            </div>
        </div>
    </div>
    <hr class="topline mb-0">

    <!-- nav bar -->
    <div class="container-fluid sticky-top bg-white navbar1 z-1">
        <div class="row bg-transparent sticky-top">
            <div class="col-12 sticky-top">
                <nav class="navbar navbar-expand-lg sticky-top nav-nav text-lg-center z-3">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand ms-lg-4 col-xl-2 text-xl-start" href="#"><img src="admin/uploads/<?php
                        echo $results['header']['logo'];
                        ?>" alt="" width="160px" height="40px"></a>
                        <div class="collapse navbar-collapse col-xl-9 bg" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mb-2 mb-lg-0 bg" id="navbar">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bolder top-a item1" aria-current="page" href="#"
                                        name="about1"><?php
                                        echo $results['header']['nav_item1'];
                                        ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item2" href="#about" name="about1"><?php
                                    echo $results['header']['nav_item2'];
                                    ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item3" href="#department" name="department1"><?php
                                    echo $results['header']['nav_item3'];
                                    ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item4" href="#doctors" name="doctor1"><?php
                                    echo $results['header']['nav_item4'];
                                    ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item5" href="#gallery" name="gallery1"><?php
                                    echo $results['header']['nav_item5'];
                                    ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item6" href="#Pricing" name="pricing1"><?php
                                    echo $results['header']['nav_item6'];
                                    ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item7" class="blog" href="#blog" name="blog1"><?php
                                    echo $results['header']['nav_item7'];
                                    ?></a>
                                </li>
                                <ul class="extra-blog d-none">
                                    <a href="blog page\blog1.php">
                                        <li>Blog Right Slider</li>
                                    </a>
                                    <hr>
                                    <a href="blog page\blog1.php">
                                        <li>Blog left slider</li>
                                    </a>
                                    <hr>
                                    <a href="blog page\blog1.php">
                                        <li>Blog no slider</li>
                                    </a>
                                    <hr>
                                    <a href="blog page\blog1.php">
                                        <li>Blog Details Right Slider</li>
                                    </a>
                                    <hr>
                                    <a href="blog page\blog1.php">
                                        <li>Blog Details left slider</li>
                                    </a>
                                    <hr>
                                    <a href="blog page\blog1.php">
                                        <li>Blog Details no slider</li>
                                    </a>
                                    <hr>
                                </ul>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder top-a item8" href="#contact" name="contact1"><?php
                                    echo $results['header']['nav_item8'];
                                    ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- background-gif-card -->
    <div class="card text-bg-dark rounded-0 border-0">
        <img class="border border-0 rounded-0 outline-0" src="admin/uploads/<?php
        echo $results['home']['bg_image'];
        ?>" class="card-img" id="card-img" alt="..." height="650px">
        <div class="card-img-overlay text-center content">
            <div class='d-flex justify-content-center'>
                <div class='w-50'>
                    <h1 class="card-title text-dark fw-bold text-size" style="text-shadow: 0px 0px 10px white;"><?php echo $results['home']['heading']; ?><span class="auto-type text-dark ms-3" style="text-shadow: 0px 0px 5px skyblue">Crutches</span></h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class='w-75'>
                    <p class="fs-xxl-4 text-light fw-medium mt-xxl-4 mt-3 text-size-2 mt-lg-4"
                        style="text-shadow: 0px 0px 10px rgb(106, 106, 106);"><?php
                        echo $results['home']['sub_heading'];
                        ?></p>
                </div>
            </div>
            <a href="#appoinment">
                <buttton class="btn <?php
                echo $results['home']['btn_color'];
                ?> text-light fw-lg-bolder button"><?php
                 echo $results['home']['btn_text'];
                 ?></buttton>
            </a>
        </div>
    </div>

    <!-- flex contain -->
    <div align="center">
        <div class="flex_contain mt-5 container mb-5 row">
            <div class="border border-2 flex_item col-12 col-lg-4 col-md-12 col-xl-4 text-center rounded-2 p-3"
                name="image" data-aos="zoom-in"><br>
                <div align="center">
                    <div class="rounded-circle flex-icon1">
                        <img src="admin/uploads/<?php
                        echo $results['home']['box1_icon'];
                        ?>" alt="" width="50" height="50">
                    </div>
                </div><br>
                <span class="fs-4 fw-medium fs1"><?php
                echo $results['home']['box1_heding'];
                ?></span><br>
                <span class="text-secondary fs2"><?php
                echo $results['home']['box1_subheding'];
                ?></span>
            </div>
            <div class="border border-2 flex_item col-12 col-lg-4 col-md-12 col-xl-4 text-center rounded-2 p-3"
                name="image" data-aos="zoom-in"><br>
                <div align="center">
                    <div class="rounded-circle flex-icon2">
                        <img src="admin/uploads/<?php
                        echo $results['home']['box2_icon'];
                        ?>" alt="" width="50" height="50">
                    </div>
                </div><br>
                <span class="fs-4 fw-medium fs1"><?php
                echo $results['home']['box2_heding'];
                ?></span><br>
                <span class="text-secondary fs2"><?php
                echo $results['home']['box2_subheding'];
                ?></span>
            </div>
            <div class="border border-2 flex_item col-12 col-lg-4 col-md-12 col-xl-4 text-center rounded-2 p-3"
                name="image" data-aos="zoom-in"><br>
                <div align="center">
                    <div class="rounded-circle flex-icon3">
                        <img src="admin/uploads/<?php
                        echo $results['home']['box3_icon'];
                        ?>" alt="" width="50" height="50">
                    </div>
                </div><br>
                <span class="fs-4 fw-medium fs1"><?php
                echo $results['home']['box3_heding'];
                ?></span><br>
                <span class="text-secondary fs2"><?php
                echo $results['home']['box3_subheding'];
                ?>
            </div></span>
        </div>
        <div>
            <a name="about"></a>
        </div>
    </div>
    </div>
    <div class="container">
        <hr>
    </div>

    <!-- About -->
    <div class="text-center container mt-5 mt-lg-5">
        <span class="fs-1 fw-medium"><?php
        echo $results['about']['heading'];
        ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="w-50">
                <span class="fs-5 text-secondary"><?php
                echo $results['about']['sub_heading'];
                ?></span>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-7 ps-4 ps-lg-4">
                <div>
                    <span class="fs-1 fw-medium lh-sm"><?php
                    echo $results['about']['title'];
                    ?></span>
                </div><br>
                <div class="text-secondary fs-6">
                    <?php
                    echo $results['about']['detail'];
                    ?>
                </div><br>
                <div class="row mt-5">
                    <div class="col-3 ps-2 col-xl-2"><img src="admin/uploads/<?php
                    echo $results['about']['director_image'];
                    ?>" alt="" width="80" height="80" style="filter: drop-shadow(0px 0px 4px rgb(154, 152, 152));">
                    </div>
                    <div class="col-9 lh-sm pt-3 ps-xl-3 col-xl-10"><span class="fs-4 fw-medium text-success"><?php
                    echo $results['about']['director_name'];
                    ?></span><br><span class="text-secondary">Founder & Director</span></div>
                </div>
            </div>
            <div class="time-table col-12 col-lg-6 col-xl-5 mt-4 mt-lg-2" data-aos="slide-left">
                <div class="border border-1 <?php
                echo $results['about']['border_color'];
                ?> p-4 shadow">
                    <div class="fs-3 fw-medium <?php
                    echo $results['about']['tt_contact_color'];
                    ?>"><?php
                    echo $results['about']['tt_heading'];
                    ?></div>
                    <div>
                        <div class="float-start text-secondary pt-2">Monday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['monday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Tuesday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['tuesday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Wednesday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['wednesday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Thursday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['thursday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Friday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['friday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Saturday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['saturday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div>
                        <div class="float-start text-secondary pt-2">Sunday</div>
                        <div class="float-end text-secondary pt-2"><?php
                        echo $results['about']['sunday'];
                        ?></div>
                    </div><br>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <img src="admin/uploads/<?php
                            echo $results['about']['call_icon'];
                            ?>" alt="" class="ms-3" width="30" height="40">
                        </div>
                        <div class="lh-sm col-10"><span class="text-secondary">Call Now</span><br>
                            <span class="fs-5 fw-medium <?php
                            echo $results['about']['tt_contact_color'];
                            ?>"><?php
                            echo $results['about']['number'];
                            ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><a name="department"></a>
    <div class="container">
        <hr class="mt-5">
    </div>

    <!-- department -->
    <div class="text-center container mt-5">
        <span class="fs-1 fw-medium"><?php
        echo $results['department']['heading'];
        ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="w-50">
                <span class="fs-5 text-secondary"><?php
                echo $results['department']['sub_heading'];
                ?></span>
            </div>
        </div>
    </div>
    <div class="container row-lenght mt-5">
        <div class="row d-flex justify-content-around g-2">
            <div class="col-6 col-lg-2 col-md-4 text-center navbox1" data-aos="zoom-out">
                <img src="admin/uploads/<?php
                echo $results['department']['nav1_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav1_item'];
                ?></span>
            </div>
            <div class="col-6 col-lg-2 col-md-4 text-center navbox2" data-aos="zoom-in">
                <img src="admin/uploads/<?php
                echo $results['department']['nav2_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav2_item'];
                ?></span>
            </div>
            <div class="col-6 col-lg-2 col-md-4 text-center navbox3" data-aos="zoom-out">
                <img src="admin/uploads/<?php
                echo $results['department']['nav3_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav3_item'];
                ?></span>
            </div>
            <div class="col-6 col-lg-2 col-md-4 text-center navbox4" data-aos="zoom-in">
                <img src="admin/uploads/<?php
                echo $results['department']['nav4_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav4_item'];
                ?></span>
            </div>
            <div class="col-6 col-lg-2 col-md-4 text-center navbox5" data-aos="zoom-out">
                <img src="admin/uploads/<?php
                echo $results['department']['nav5_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav5_item'];
                ?></span>
            </div>
            <div class="col-6 col-lg-2 col-md-4 text-center navbox6" data-aos="zoom-in">
                <img src="admin/uploads/<?php
                echo $results['department']['nav6_item_img'];
                ?>" alt="" width="50" height="50"><br>
                <span class="fw-medium fs-5"><?php
                echo $results['department']['nav6_item'];
                ?></span>
            </div>
        </div>
    </div>
    <div class="container row-lenght mt-5 row-height m-md-auto">
        <div class="row" id="row-image1">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav1_detail_img'];
                ?>" alt="" id="img1">
            </div>
            <div class="col-12 col-lg-6 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4 mt-md-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav1_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav1_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav1_detail_title'];
                ?></span><br>
                <a href="our department\crutches.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
        <div class="row" id="row-image2">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav2_detail_img'];
                ?>" alt="" id="img2">
            </div>
            <div class="col-12 col-md-12 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav2_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav2_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav2_detail_title'];
                ?></span><br>
                <a href="our department\Xray.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
        <div class="row" id="row-image3">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav3_detail_img'];
                ?>" alt="" id="img3">
            </div>
            <div class="col-12 col-lg-6 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav3_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav3_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav3_detail_title'];
                ?></span><br>
                <a href="our department\pulmonary.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
        <div class="row" id="row-image4">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav4_detail_img'];
                ?>" alt="" id="img4">
            </div>
            <div class="col-12 col-lg-6 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav4_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav4_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav4_detail_title'];
                ?></span><br>
                <a href="our department\cardiology.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
        <div class="row" id="row-image5">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav5_detail_img'];
                ?>" alt="" id="img5">
            </div>
            <div class="col-12 col-lg-6 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav5_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav5_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav5_detail_title'];
                ?></span><br>
                <a href="our department\dental.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
        <div class="row" id="row-image6">
            <div class="col-12 col-lg-6 col-xl-6 box-image">
                <img src="admin/uploads/<?php
                echo $results['department']['nav6_detail_img'];
                ?>" alt="" id="img6">
            </div>
            <div class="col-12 col-lg-6 col-xl-6 pt-2 pt-lg-3 pt-xl-5 ps-xl-4">
                <span class="fs-2 fw-medium">Welcome to our </span><span class="fs-2 fw-medium text-success"><?php
                echo $results['department']['nav6_item'];
                ?></span><br>
                <span class="text-dark fw-medium"><?php
                echo $results['department']['nav6_detail_sub_heading'];
                ?></span><br><br>
                <span class="text-secondary"><?php
                echo $results['department']['nav6_detail_title'];
                ?></span><br>
                <a href="our department\Neurology.php" target="_parent"><button class="btn <?php
                echo $results['department']['btn_color'];
                ?> mt-3"><?php
                 echo $results['department']['btn_text'];
                 ?></button></a>
            </div>
        </div>
    </div><br><a name="appoinment"></a>
    <div class="container mt-5">
        <hr>
    </div>

    <!-- appoinment -->
    <div class="text-center container mt-4 pt-5 bg-white">
        <span class="fs-1 fw-medium">Make an appointment</span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <span class="fs-5 text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
            Lorem Ipsum the industry's standard dummy text.</span>
    </div>

    <!-- detail -->
    <div class="container appoinment-detail pt-4 bg-white">
        <form name="appoinment_form" class="row g-4" method="post" onsubmit="return form();">
            <div class="col-6">
                <label for="name" class="text-secondary fw-medium">Full Name<span class="text-danger">*</span>
                    :</label><br>
                <input name="name" type="text" placeholder="Jhon Doe">
            </div>
            <div class="col-6">
                <label for="email" class="text-secondary fw-medium">Email Address<span class="text-danger">*</span>
                    :</label><br>
                <input name="email" type="email" placeholder="example@gmail.com">
            </div>
            <div class="col-6">
                <label for="number" class="text-secondary fw-medium">Phone Number<span class="text-danger">*</span>
                    :</label><br>
                <input name="number" type="text" placeholder="+00 141 23 234">
            </div>
            <div class="col-6">
                <label for="date" class="text-secondary fw-medium">Booking date<span class="text-danger">*</span>
                    :</label><br>
                <input name="date" type="date">
            </div>
            <div class="col-6">
                <label for="department" class="text-secondary fw-medium">Department<span class="text-danger">*</span>
                    :</label><br>
                <select name="department">
                    <option name="selected" value="" selected>Select department</option>
                    <option value="Dental Care">Dental Care</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Crutches">Crutches</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Pulmonary">Pulmonary</option>
                    <option value="X-Ray">X-Ray</option>
                </select>
            </div>
            <div class="col-6">
                <label for="doctor" class="text-secondary fw-medium">Doctor<span class="text-danger">*</span>
                    :</label><br>
                <select name="doctor">
                    <option name="selected" value="" selected>Select Doctor</option>
                    <option value="Dr. Jhon Doe">Dr. Jhon Doe</option>
                    <option value="Dr. Mohoshin Kabir">Dr. Mohoshin Kabir</option>
                    <option value="Dr. Mak Roshi">Dr. Mak Roshi</option>
                    <option value="Dr. Nayan Borua">Dr. Nayan Borua</option>
                    <option value="Dr. Rasel islam">Dr. Rasel islam</option>
                    <option value="Dr. Mahid islam">Dr. Mahid islam</option>
                </select>
            </div>
            <div class="col-12">
                <label for="" class="text-secondary fw-medium">Message(optional) :</label><br>
                <textarea name="message" placeholder="Write something here" cols="155" rows="6"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success" name="submit1">Appoinment</button>
            </div>
        </form><br><a name="doctors"></a>
        <hr>
    </div><br>

    <?php
    include "admin/connect.php";
    if (isset($_POST['submit1'])) {
        // Retrieve and sanitize user input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $department = $_POST['department'];
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `appointments` (`name`, `email`, `number`, `date`, `department`, `doctor`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $number, $date, $department, $doctor, $message);

        // Execute the statement and check if the insertion was successful
        if ($stmt->execute()) {
            echo "<script>alert('Your appointment is fixed successfully');</script>";
            ?>
            <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
            <?php
        } else {
            echo "<script>alert('Something went wrong!');</script>";
            ?>
            <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
            <?php
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
    ?>


    <!-- doctor -->
    <div class="text-center mt-5 mb-5">
        <span class="fs-1 fw-medium"><?php
        echo $results['doctor']['heading'];
        ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class='d-flex justify-content-center'>
            <div class='w-50'>
                <span class="fs-5 text-secondary"><?php
                echo $results['doctor']['sub_heading'];
                ?></span>
            </div>
        </div>
    </div>

    <!-- doctor-slider -->

    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div class="jquery-script-clear"></div>
    </div>
    <div class="container10" id="featureContainer" align="center">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="featureCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
                <div class="pe-md-4">
                    <a class="indicator rounded-circle btn position-absolute" style='top:45%; left:-3%;' href="#featureCarousel" role="button" data-bs-slide="prev">
                        <span class="fas fa-chevron-left" aria-hidden="true"></span>
                    </a>
                    <a class="indicator1 rounded-circle btn position-absolute" style='top:45%; left:99%;' href="#featureCarousel" role="button" data-bs-slide="next">
                        <span class="fas fa-chevron-right" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="carousel-inner" role="listbox" align="center">
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="admin/uploads/<?php
                                    echo $results['doctor']['doctor1_img'];
                                    ?>" class="img-fluid">
                                    <div class="card-body text-center p-0">
                                        <h5 class="card-title pt-2"><?php
                                        echo $results['doctor']['doctor1_name'];
                                        ?></h5>
                                        <h6 class="text-secondary"><?php
                                        echo $results['doctor']['doctor1_specs'];
                                        ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="admin/uploads/<?php
                                    echo $results['doctor']['doctor2_img'];
                                    ?>" class="img-fluid">
                                    <div class="card-body text-center p-0">
                                        <h5 class="card-title pt-2"><?php
                                        echo $results['doctor']['doctor2_name'];
                                        ?></h5>
                                        <h6 class="text-secondary"><?php
                                        echo $results['doctor']['doctor2_specs'];
                                        ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="admin/uploads/<?php
                                    echo $results['doctor']['doctor3_img'];
                                    ?>" class="img-fluid">
                                    <div class="card-body text-center p-0">
                                        <h5 class="card-title pt-2"><?php
                                        echo $results['doctor']['doctor3_name'];
                                        ?></h5>
                                        <h6 class="text-secondary"><?php
                                        echo $results['doctor']['doctor3_specs'];
                                        ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="admin/uploads/<?php
                                    echo $results['doctor']['doctor4_img'];
                                    ?>" class="img-fluid">
                                    <div class="card-body text-center p-0">
                                        <h5 class="card-title pt-2"><?php
                                        echo $results['doctor']['doctor4_name'];
                                        ?></h5>
                                        <h6 class="text-secondary"><?php
                                        echo $results['doctor']['doctor4_specs'];
                                        ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><a name="gallery"></a>
    <div class="container mt-5">
        <hr>
    </div>

    <!-- Gallery -->
    <div class="text-center mt-5 mb-5">
        <span class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['heading1'];
                                    ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class='w-50 fs-5 text-secondary'>
                <?php
                    echo $results['gallery']['sub_heading1'];
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div align="center">
            <ul class="nav nav-underline row second-nav ps-lg-0 m-0">
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium navitems first1 active" aria-current="page">All</a>
                </li>
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium first2 navitems">Cardiology</a>
                </li>
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium first3 navitems">Neurology</a>
                </li>
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium first4 navitems">Urology</a>
                </li>
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium first5 navitems">Pulmonary</a>
                </li>
                <li class="nav-item col-3 col-lg-2 col-xl-2 second-nav-item">
                    <a class="nav-link fw-medium first6 navitems">Traumatology</a>
                </li>
            </ul>
        </div>
        <hr>
        <div class="container text-center m-auto m-xl-auto">
            <div class="container image-box mt-5 m-auto m-xl-auto m-lg-auto m-md-auto m-xxl-auto">
                <div class="parent div1">
                    <div class="image-items-box1 position-relative">
                        <div id="">
                            <img class='h-100 w-100' src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img1'];
                                    ?>" class="card-img-top h-100" alt="...">
                        </div>
                        <div class="img-slide-down position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent div2">
                    <div class="image-items-box2 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img2'];
                                    ?>" class="card-img-top h-100" alt="...">
                        </div>
                        <div class="img-slide-down1 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img1" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent1 parent div3">
                    <div class="image-items-box3 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img3'];
                                    ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="img-slide-down2 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img2" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent2 parent div4">
                    <div class="image-items-box4 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img4'];
                                    ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="img-slide-down3 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img3" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent div5">
                    <div class="image-items-box5 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img5'];
                                    ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="img-slide-down4 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img4" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent div6">
                    <div class="image-items-box6 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img6'];
                                    ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="img-slide-down5 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img5" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parent3 parent div7">
                    <div class="image-items-box7 position-relative">
                        <div id="">
                            <img src="admin/uploads/<?php
                                    echo $results['gallery']['hospital_img7'];
                                    ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="img-slide-down6 position-absolute" style='top:0px;'>
                            <div class="circle">
                                <img class="rotate-img6" src="admin/uploads/<?php
                                    echo $results['gallery']['image_icon'];
                                    ?>" width="30" height="30"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mt-md-5 mt-lg-5 mt-xl-5 mt-xxl-5">
        <hr>
    </div>



    <div class="text-center mt-5 mt-lg-5">
        <span class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['heading2'];
                                    ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class='w-50 fs-5 text-secondary'>
                <?php
                    echo $results['gallery']['sub_heading2'];
                ?>
            </div>
        </div>
    </div>


    <!-- Gallery-slidder -->
    <div class="container mt-5">
        <div class="container">
            <div align="center">
                <div class="row">
                    <div id="myCarousel" class="carousel slide w-100 position-relative" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox" style="height: 400px; padding-top: 10px;">
                            <div class="carousel-item active bg-white">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div id="namebox1" class="image-items4 text-center p-4" data-aos="slide-right">
                                        <div><img src="admin/uploads/<?php
                                    echo $results['gallery']['card1_img'];
                                    ?>" alt="" width='100' height='100' class='rounded-circle'></div>
                                        <div class=" lh-sm mb-1"><span class="fs-4 fw-medium" id="namehover1"><?php
                                    echo $results['gallery']['card1_name'];
                                    ?></span><br><span class="fs-5 text-dark"><?php
                                    echo $results['gallery']['card1_skill'];
                                    ?></span></div>
                                        <div class="mt-2 text-dark"><?php
                                    echo $results['gallery']['card1_detail'];
                                    ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item bg-white">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div id="namebox2" class="image-items4 text-center p-4">
                                        <div class='rounded-circle'><img src="admin/uploads/<?php
                                    echo $results['gallery']['card2_img'];
                                    ?>" alt="" width='100' height='100' class='rounded-circle'></div>
                                        <div class=" lh-sm mb-1"><span class="fs-4 fw-medium" id="namehover2"><?php
                                    echo $results['gallery']['card2_name'];
                                    ?></span><br><span class="fs-5 text-dark"><?php
                                    echo $results['gallery']['card2_skill'];
                                    ?></span></div>
                                        <div class="mt-2 text-dark"><?php
                                    echo $results['gallery']['card2_detail'];
                                    ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item bg-white">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div id="namebox3" class="image-items4 text-center p-4" data-aos="slide-left">
                                        <div><img src="admin/uploads/<?php
                                    echo $results['gallery']['card3_img'];
                                    ?>" alt="" width='100' height='100' class='rounded-circle'></div>
                                        <div class=" lh-sm mb-1"><span class="fs-4 fw-medium" id="namehover3"><?php
                                    echo $results['gallery']['card3_name'];
                                    ?></span><br><span class="fs-5 text-dark"><?php
                                    echo $results['gallery']['card3_skill'];
                                    ?></span></div>
                                        <div class="mt-2 text-dark"><?php
                                    echo $results['gallery']['card3_detail'];
                                    ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev rounded-circle border border-2 bg-secondary shadow position-absolute"
                            style="width: 40px; height: 40px; top:38%; left:-5%;" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next rounded-circle border border-2 bg-secondary shadow position-absolute"
                            style="width: 40px; height: 40px; top:38%; left:100%;" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <hr>
    </div>

    <!-- What people say? -->
    <div class="text-center mt-5">
        <span class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['heading3'];
                                    ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class='w-50 fs-5 text-secondary'>
                <?php
                    echo $results['gallery']['sub_heading3'];
                ?>
            </div>
        </div>
    </div>

    <div class="container d-flex d-lg-flex flex-column mt-5 m-lg-auto m-auto flex-md-column flex-lg-row mt-lg-5">
        <div id="row" class="row d-flex flex-column flex-xxl-row flex-lg-row m-auto m-lg-auto m-md-auto">
            <div id="col"
                class="col-12 col-lg-6 bg-white m-auto text-center p-4 p-lg-3 pt-lg-4 pt-md-5 pt-xl-5 pt-xxl-5 mb-4">
                <center>
                    <div class="Gicon1"><img src="admin/uploads/<?php
                                    echo $results['gallery']['box1_icon'];
                                    ?>" alt="" width="50" height="58"
                            style="margin-top: 8px;"></div>
                </center>
                <div class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['box1_count'];
                                    ?></div>
                <div class="fs-4 fw-medium text-secondary"><?php
                                    echo $results['gallery']['box1_name'];
                                    ?></div>
            </div>
            <div id="col" class="col-12 col-lg-6 pt-xl-5 pt-md-5 m-auto bg-white p-4 text-center mb-4">
                <center>
                    <div class="Gicon2"><img src="admin/uploads/<?php
                                    echo $results['gallery']['box2_icon'];
                                    ?>" alt="" width="52" height="52"
                            style="margin-top: 6px;"></div>
                </center>
                <div class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['box2_count'];
                                    ?></div>
                <div class="fs-4 fw-medium text-secondary"><?php
                                    echo $results['gallery']['box2_name'];
                                    ?></div>
            </div>
            <div id="col" class="col-12 col-lg-6 m-auto pt-md-5 pt-xl-5 bg-white p-4 text-center mb-4">
                <center>
                    <div class="Gicon3"><img src="admin/uploads/<?php
                                    echo $results['gallery']['box3_icon'];
                                    ?>" alt="" width="50" height="50"
                            style="margin-top: 8px;"></div>
                </center>
                <div class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['box3_count'];
                                    ?></div>
                <div class="fs-4 fw-medium text-secondary"><?php
                                    echo $results['gallery']['box3_name'];
                                    ?></div>
            </div>
            <div id="col" class="col-12 col-6 m-auto pt-md-5 pt-xl-5 bg-white p-4 text-center mb-4">
                <center>
                    <div class="Gicon4"><img src="admin/uploads/<?php
                                    echo $results['gallery']['box4_icon'];
                                    ?>" alt="" width="50" height="50"
                            style="margin-top: 8px;"></div>
                </center>
                <div class="fs-1 fw-medium"><?php
                                    echo $results['gallery']['box4_count'];
                                    ?></div>
                <div class="fs-4 fw-medium text-secondary"><?php
                                    echo $results['gallery']['box4_name'];
                                    ?></div>
            </div>
        </div>
        <div class="svgback col-12 col-xxl-7" data-aos="slide-left">
            <div class="svgtype1 float-end">
                <div class="svgtype"><a href="https://www.youtube.com/watch?v=LxSNWz9fKSQ"><img class="svg-image"
                            src="admin/uploads/<?php
                                    echo $results['gallery']['adver_icon'];
                                    ?>" alt="" width="100" height="100"></a></div>
            </div>
        </div>
    </div><a name="Pricing"></a>
    <div class="container">
        <hr>
    </div><br>


    <!-- Pricing -->
    <div class="text-center mt-5 mt-md-5 mt-lg-5 mt-xxl-5">
        <span class="fs-1 fw-medium"><?php
        echo $results['pricing']['heading'];
        ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="w-50">
                <span class="fs-5 text-secondary"><?php
                echo $results['pricing']['sub_heading'];
                ?></span>
            </div>
        </div>
    </div>

    <!-- pricing slider -->
    <div align="center">
        <div class="rotateslider-container" id="slider">
            <div class="rotateslider-item">
                <div class="col-md-4 ms-md-5 me-md-5 shadow rounded-2 mt-md-2" style="height: 450px; width: 300px;">
                    <div class="card border-0">
                        <div class="card-img">
                            <div class="card border-0">
                                <img src="images/price-shape.svg" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <h1 class="card-title text-white" align="center"><?php
                                    echo $results['pricing']['slidder_card1_price'];
                                    ?></h1>
                                </div>
                            </div>
                            <div class="fs-4 fw-medium text-center mt-3"><?php
                            echo $results['pricing']['slidder_card1_name'];
                            ?></div>
                            <div class="fs-6 text-secondary rounded-bottom-2 mt-3 text-center lh-lg">
                                <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                echo $results['pricing']['description1'];
                                ?><br>
                                <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                echo $results['pricing']['description2'];
                                ?><br>
                                <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                echo $results['pricing']['description3'];
                                ?><br>
                                <img src="images/pngwing.com (1).png" alt="" width="16" height="16"> <?php
                                echo $results['pricing']['description4'];
                                ?><br>
                                <img src="images/pngwing.com (1).png" alt="" width="16" height="16"> <?php
                                echo $results['pricing']['description5'];
                                ?>
                            </div>
                            <div align="center"><a href="#contact"><button class="btn <?php
                            echo $results['pricing']['btn_color'];
                            ?> mt-3"><?php
                             echo $results['pricing']['btn_text'];
                             ?></button></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rotateslider-item">
                <div class="col-md-4 ms-md-4 shadow me-md-5 rounded-2 mt-md-2" style="height: 450px; width: 300px;">
                    <div class="card border-0">
                        <div class="card-img">
                            <div class="card border-0">
                                <img src="images/price-shape.svg" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <h1 class="card-title text-white" align="center"><?php
                                    echo $results['pricing']['slidder_card2_price'];
                                    ?></h1>
                                </div>
                                <div class="fs-4 fw-medium text-center mt-3"><?php
                                echo $results['pricing']['slidder_card2_name'];
                                ?></div>
                                <div class="fs-6 text-secondary rounded-bottom-2 mt-3 text-center lh-lg">
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description1'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description2'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description3'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description4'];
                                    ?><br>
                                    <img src="images/pngwing.com (1).png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description5'];
                                    ?>
                                </div>
                                <div align="center"><a href="#contact"><button class="btn <?php
                                echo $results['pricing']['btn_color'];
                                ?> mt-3"><?php
                                 echo $results['pricing']['btn_text'];
                                 ?></button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rotateslider-item">
                <div class="col-md-4 ms-md-4 shadow me-md-5 rounded-2 mt-md-2" style="height: 450px; width: 300px;">
                    <div class="card border-0">
                        <div class="card-img">
                            <div class="card border-0">
                                <img src="images/price-shape.svg" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <h1 class="card-title text-white" align="center"><?php
                                    echo $results['pricing']['slidder_card3_price'];
                                    ?></h1>
                                </div>
                                <div class="fs-4 fw-medium text-center mt-3"><?php
                                echo $results['pricing']['slidder_card3_name'];
                                ?></div>
                                <div class="fs-6 text-secondary rounded-bottom-2 mt-3 text-center lh-lg">
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description1'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description2'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description3'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description4'];
                                    ?><br>
                                    <img src="images/pngwing.com.png" alt="" width="16" height="16"> <?php
                                    echo $results['pricing']['description5'];
                                    ?>
                                </div>
                                <div align="center"><a href="#contact"><button class="btn <?php
                                echo $results['pricing']['btn_color'];
                                ?> mt-3"><?php
                                 echo $results['pricing']['btn_text'];
                                 ?></button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="arrow right js-rotateslider-arrow shadow" data-action="next"><i
                    class="fa fa-angle-right fa-2x"></i></span>
            <span class="arrow left js-rotateslider-arrow shadow" data-action="prev"><i
                    class="fa fa-angle-left fa-2x"></i></span>
        </div>
    </div>

    <!-- pricing-accordion -->
    <div class="container d-flex flex-column justify-content-center flex-lg-row">
        <div class="m-auto"><img src="admin/uploads/<?php
        echo $results['pricing']['detail_img'];
        ?>" alt="" width="420px" height="450px" class="image-size"></div>
        <div class="pricing-accordion mt-5 accordion-width">
            <div class="fs-4 fw-medium"><?php
            echo $results['pricing']['detail_heading'];
            ?></div>
            <div class="accordion mt-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bolder" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <?php
                            echo $results['pricing']['deating_question_1'];
                            ?>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-secondary">
                            <?php
                            echo $results['pricing']['deating_answer_1'];
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php
                            echo $results['pricing']['deating_question_2'];
                            ?>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-secondary">
                            <?php
                            echo $results['pricing']['deating_answer_2'];
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <?php
                            echo $results['pricing']['deating_question_3'];
                            ?>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-secondary">
                            <?php
                            echo $results['pricing']['deating_answer_3'];
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <?php
                            echo $results['pricing']['deating_question_4'];
                            ?>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-secondary">
                            <?php
                            echo $results['pricing']['deating_answer_4'];
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <?php
                            echo $results['pricing']['deating_question_5'];
                            ?>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-secondary">
                            <?php
                            echo $results['pricing']['deating_answer_5'];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- subscribe -->
    <div class="text-center mt-5">
        <span class="fs-1 fw-medium">Subscribe & stay updated</span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <span class="fs-5 text-secondary">Sign up to our newsletter and be the first to know about latest news,<br>
            special offers, events, and discounts.</span><br>
        <div class="mt-4">
            <form method="post" name="subscribe" onsubmit="return subscribe();">
                <input name="Subscribe" id='subscribe' type="email" placeholder="Enter Your Address">
                <div class="mt-4">
                    <button type="submit" name="submit3" class="btn btn-success">Subscribe</button>
                </div>
            </form>
        </div>
        <div class="fs-3 fw-bold text-success mt-5">(+01) - 234 567 890</div><a name="blog"></a>
        <div class="container">
            <hr class="mt-5">
        </div>
    </div>


    <!-- Blog -->
    <div class="text-center mt-5">
        <span class="fs-1 fw-medium"><?php
        echo $results['blog']['heading'];
        ?></span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <span class="fs-5 text-secondary"><?php
        echo $results['blog']['sub_heading'];
        ?></span>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-4 d-flex justify-content-center mt-lg-3">
                <div class="card border-0" style="width: 350px;">
                    <div id="cardbox1">
                        <div id="cardimage1"><img src="admin/uploads/<?php
                        echo $results['blog']['card1_img'];
                        ?>" class="card-img-top" alt="...">
                            <div class="img-slide-down7">
                                <div class="circle">
                                    <img class="rotate-img7" src="admin/uploads/<?php
                                    echo $results['blog']['link_icon'];
                                    ?>" width="30" height="30" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ps-0">
                        <h5 class="card-title"><a name="LN-link" href="#"><?php
                        echo $results['blog']['card1_title'];
                        ?></a></h5>
                        <div style="color:rgb(209, 202, 202);" class="d-flex flex-row">
                            <div><?php
                            echo $results['blog']['card1_date'];
                            ?></div>
                            <div class="ms-3 me-3"
                                style="width: 2px; height: 14px; background-color: rgb(209, 202, 202); margin-top: 5px;">
                            </div>
                            <div>Posted by: <a name="P-link" href="#"><?php
                            echo $results['blog']['card1_psoted_by'];
                            ?></a></div>
                        </div>
                        <p class="card-text pt-2"><?php
                        echo $results['blog']['card1_detail'];
                        ?></p>
                        <a href="blog page\all blogs\all-blog1.php"><button class="btn <?php
                        echo $results['blog']['btn_color'];
                        ?> fw-medium"><?php
                         echo $results['blog']['btn_text'];
                         ?></button></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center mt-3">
                <div class="card border-0" style="width: 350px;">
                    <div id="cardbox2">
                        <div id="cardimage2"><img src="admin/uploads/<?php
                        echo $results['blog']['card2_img'];
                        ?>" class="card-img-top" alt="...">
                            <div class="img-slide-down8">
                                <div class="circle">
                                    <img class="rotate-img8" src="admin/uploads/<?php
                                    echo $results['blog']['link_icon'];
                                    ?>" width="30" height="30" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ps-0">
                        <h5 class="card-title"><a name="LN-link" href="#"><?php
                        echo $results['blog']['card2_title'];
                        ?></a></h5>
                        <div style="color:rgb(209, 202, 202);" class="d-flex flex-row">
                            <div><?php
                            echo $results['blog']['card2_date'];
                            ?></div>
                            <div class="ms-3 me-3"
                                style="width: 2px; height: 14px; background-color: rgb(209, 202, 202); margin-top: 5px;">
                            </div>
                            <div>Posted by: <a name="P-link" href="#"><?php
                            echo $results['blog']['card2_psoted_by'];
                            ?></a></div>
                        </div>
                        <p class="card-text pt-2"><?php
                        echo $results['blog']['card2_detail'];
                        ?></p>
                        <a href="blog page\all blogs\all-blog2.php"><button class="btn <?php
                        echo $results['blog']['btn_color'];
                        ?> fw-medium"><?php
                         echo $results['blog']['btn_text'];
                         ?></button></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center mt-3">
                <div class="card border-0" style="width: 350px;">
                    <div id="cardbox3">
                        <div id="cardimage3"><img src="admin/uploads/<?php
                        echo $results['blog']['card3_img'];
                        ?>" class="card-img-top" alt="...">
                            <div class="img-slide-down9">
                                <div class="circle">
                                    <img class="rotate-img9" src="admin/uploads/<?php
                                    echo $results['blog']['link_icon'];
                                    ?>" width="30" height="30" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ps-0">
                        <h5 class="card-title"><a name="LN-link" href="#"><?php
                        echo $results['blog']['card3_title'];
                        ?></a></h5>
                        <div style="color:rgb(209, 202, 202);" class="d-flex flex-row">
                            <div><?php
                            echo $results['blog']['card3_date'];
                            ?></div>
                            <div class="ms-3 me-3"
                                style="width: 2px; height: 14px; background-color: rgb(209, 202, 202); margin-top: 5px;">
                            </div>
                            <div>Posted by: <a name="P-link" href="#"><?php
                            echo $results['blog']['card3_psoted_by'];
                            ?></a></div>
                        </div>
                        <p class="card-text pt-2"><?php
                        echo $results['blog']['card3_detail'];
                        ?></p>
                        <a href="blog page\all blogs\all-blog3.php"><button class="btn <?php
                        echo $results['blog']['btn_color'];
                        ?> fw-medium"><?php
                         echo $results['blog']['btn_text'];
                         ?></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- blog-slidder -->
    <div class="container d-flex justify-content-center mt-0">
        <div class="container" style="margin-top:50px">
            <div class="yourFlickgalWrap" align="center">
                <div class="container last-slidder" align="center">
                    <div class="containerInner">
                        <div id="sea01" class="item image1 ps-5 pt-4 ps-lg-1 pt-lg-4 ps-xl-4"><img src="admin/uploads/<?php
                        echo $results['blog']['slider_1'];
                        ?>" alt=""></div>
                        <div id="sea02" class="item image2 ps-5 pt-4 ps-lg-4 pt-lg-3 ps-xl-4"><img src="admin/uploads/<?php
                        echo $results['blog']['slider_2'];
                        ?>" alt=""></div>
                        <div id="sea03" class="item image3 ps-5 pt-4 ps-lg-1 pt-lg-4 ps-xl-4"><img src="admin/uploads/<?php
                        echo $results['blog']['slider_3'];
                        ?>" alt=""></div>
                        <div id="sea04" class="item image4 ps-5 pt-4 ps-lg-4 pt-lg-3 ps-xl-4"><img src="admin/uploads/<?php
                        echo $results['blog']['slider_4'];
                        ?>" alt=""></div>
                        <div id="sea04" class="item image5 ps-5 pt-4 ps-lg-2 pt-lg-3 ps-xl-4 pt-xl-4"><img src="admin/uploads/<?php
                        echo $results['blog']['slider_5'];
                        ?>" alt=""></div>
                    </div>
                </div>
                <div class="arrows">
                    <a href="javascript:void(0);" class="prev btn rounded-circle">&lt;</a>
                    <a href="javascript:void(0);" class="next btn rounded-circle">&gt;</a>
                </div>
            </div>
        </div>
    </div>
    </div><a name="contact"></a>
    <hr class="mt-5">


    <!-- contact -->
    <div class="text-center container mt-5">
        <span class="fs-1 fw-medium">Stay connect with us</span><br>
        <div class="container d-flex justify-content-center">
            <div class="icon-container">
                <div class="icon-line"></div>
                <div class="icon"><img name="icon" src="images/4.png" alt=""></div>
                <div class="icon-line"></div>
            </div>
        </div>
        <span class="fs-5 text-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
            Lorem Ipsum the industry's standard dummy text.</span>
    </div>

    <!-- detail -->
    <div class="container appoinment_detail">
        <form name="appoinment_detail" class="row g-4" method="post" onsubmit="return contact();">
            <div class="col-6">
                <label for="" class="text-secondary fw-medium">Full Name<span class="text-danger">*</span> :</label><br>
                <input type="text" name="name" placeholder="Jhon Doe">
            </div>
            <div class="col-6">
                <label for="" class="text-secondary fw-medium">Email Address<span class="text-danger">*</span>
                    :</label><br>
                <input type="email" name="email" placeholder="example@gmail.com">
            </div>
            <div class="col-6">
                <label for="" class="text-secondary fw-medium">Subject<span class="text-danger">*</span> :</label><br>
                <input type="text" name="subject" placeholder="Write subject">
            </div>
            <div class="col-6">
                <label for="" class="text-secondary fw-medium">Phone<span class="text-danger">*</span> :</label><br>
                <input placeholder="+00 376 12 465" name="number" type="text">
            </div>
            <div class="col-12">
                <label for="" class="text-secondary fw-medium">Your Message<span class="text-danger">*</span>
                    :</label><br>
                <textarea placeholder="Write something here" name="message" cols="153" rows="6"></textarea>
            </div>
            <div class="col-12">
                <center><button type="submit" name="submit2" class="btn btn-success">Send message</button></center>
            </div>
        </form>
        <hr class="mt-5">
    </div>
    </div>

    <?php
    include "admin/connect.php";

    if (isset($_POST['submit2'])) {
        // Retrieve and sanitize user input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `messages` (`name`, `email`, `subject`, `number`, `message`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $subject, $number, $message);

        // Execute the statement and check if the insertion was successful
        if ($stmt->execute()) {
            echo "<script>alert('Your message was sent successfully');</script>";
            ?>
            <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
            <?php
        } else {
            echo "<script>alert('Something went wrong!');</script>";
            ?>
            <!-- Optionally redirect after a short delay -->
            <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
            <?php
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
    ?>


    <!-- map -->
    <div clas="container-fluid">
        <iframe src="<?php
        echo $results['footer']['map'];
        ?>" class="map-height" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--/ map -->

    <!-- footer -->
    <div class="container mt-5">
        <div class="row text-secondary ps-lg-0 d-md-flex ms-md-4 ms-lg-0">
            <div class="col-12 col-md-6 col-lg-3 col-sm-12 ps-lg-0 bottom-div-size bottom-size">
                <div><img src="admin/uploads/<?php
                echo $results['footer']['logo'];
                ?>" alt=""></div><br>
                <?php
                echo $results['footer']['about'];
                ?>
                <div class="mt-2 pb-md-5 pb-4"><span class="fw-medium col-xxl-2">Share :</span>
                    <a href="https://www.facebook.com/ESICHQ/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                            class="logo-icon" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg></a>
                    <a href="https://twitter.com/esichq" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                            class="logo-icon logo-icon1" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                        </svg></a>
                    <a href="https://www.instagram.com/esichq/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                            class="logo-icon logo-icon2" fill="currentColor" class="bi bi-instagram"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg></a>
                    <a href="https://in.pinterest.com/pin/medical-facilities-for-esic-beneficiaries-in-delhi--639089003341250333/"
                        target="_blank"><svg xmlns="http://www.w3.org/2000/svg" class="logo-icon logo-icon3"
                            fill="currentColor" class="bi bi-pinterest" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0" />
                        </svg></a>
                    <a href="https://web.whatsapp.com/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                            class="logo-icon logo-icon4" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg></a>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 col-sm-12 bottom-div-size">
                <div class="fs-4 fw-medium <?php
                echo $results['footer']['color'];
                ?> ps-2 ps-lg-0 bottom-size1"><?php
                 echo $results['footer']['item_1'];
                 ?></div>
                <hr width="160" class="botton-line-width">
                <ul class="bottom-size">
                    <li name="link"><a href="FAQS\FAQS.php" target="_self"><?php
                    echo $results['footer']['ul_1'];
                    ?></a></li>
                    <li name="link"><a href="blog page\blog1.php" target="_self"><?php
                    echo $results['footer']['ul_2'];
                    ?></a></li>
                    <li name="link"><a href="weekly time-table\Weekly-time-table.php" target="_self"><?php
                    echo $results['footer']['ul_3'];
                    ?></a></li>
                    <li name="link"><a href="term and condition\Term & Con.php" target="_self"><?php
                    echo $results['footer']['ul_4'];
                    ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-3 col-sm-12 bottom-div-size">
                <div class="fs-4 fw-medium <?php
                echo $results['footer']['color'];
                ?> ps-2 ps-lg-0 bottom-size1"><?php
                 echo $results['footer']['item_2'];
                 ?></div>
                <hr width="170" class="botton-line-width">
                <ul class="bottom-size">
                    <li name="link"><a href="#" target="_self"><?php
                    echo $results['footer']['d_1'];
                    ?></a></li>
                    <li name="link"><a href="#" target="_self"><?php
                    echo $results['footer']['d_2'];
                    ?></a></li>
                    <li name="link"><a href="#" target="_self"><?php
                    echo $results['footer']['d_3'];
                    ?></a></li>
                    <li name="link"><a href="#" target="_self"><?php
                    echo $results['footer']['d_4'];
                    ?></a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 col-sm-12 bottom-div-size-last pt-xxl-0">
                <div class="fs-4 fw-medium <?php
                echo $results['footer']['color'];
                ?> ps-2 ps-lg-0 bottom-size1"><?php
                 echo $results['footer']['item_3'];
                 ?></div>
                <hr width="140" class="botton-line-width">
                <ul class="bottom-size bottom-size2">
                    <li style="line-height: 23px;">
                        <div class="d-flex">
                            <div class="me-1 fw-medium">
                                Address<span class="ms-1">:</span>
                            </div>
                            <div><?php
                            echo $results['footer']['address'];
                            ?></div>
                        </div>
                    </li>
                    <li><span class="fw-medium">Email : </span><span style="padding-left: 20px;"><?php
                    echo $results['footer']['email'];
                    ?></span></li>
                    <li style="line-height: 23px;"><span class="fw-medium">Phone : </span><span
                            style="padding-left: 15px;"><?php
                            echo $results['footer']['number_1'];
                            ?></span><br>
                        <span style="padding-left: 75px;" class="padding1"><?php
                        echo $results['footer']['number_2'];
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-body-secondary footer-bottom">
        <div class="container">
            <div class="row row-height1">
                <div class="col-9 float-start">
                    Copyright 2021. Design by Laralink
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <div class="bottom-arrow rounded-circle">
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-arrow-bar-up ms-1 ms-xl-0 ms-xxl-0" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5m-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "admin/connect.php";
        if (isset($_POST['submit3'])) {
            // Retrieve and sanitize user input
            $Subscribe = $_POST['Subscribe'];
            if(!empty($Subscribe)){

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO `subscribers` (`Subscribe`) VALUES (?)");
                $stmt->bind_param("s", $Subscribe);

                // Execute the statement and check if the insertion was successful
                if ($stmt->execute()) {
                    echo "<script>alert('Subscribe successfully');</script>";
                    ?>
                    <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
                    <?php
                } else {
                    echo "<script>alert('Something went wrong!');</script>";
                    ?>
                    <!-- Optionally redirect after a short delay -->
                    <meta http-equiv="refresh" content="20; url = http://localhost/PHP%20project/" />
                    <?php
                }

                // Close the statement
                $stmt->close();
            }
            else{
                echo "<script>
                        alert('Please enter your email address!');
                        document.getElementById('subscribe').focus();
                    </script>";
            }
        }

        // Close the connection
        $conn->close();
        ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init(
            {
                offset: 200,
                duration: 600,
            }
        );
    </script>
    <script>
        var typed = new Typed('.auto-type', {
            strings: ["Cardiology.", "Dentist.", "Laboratory.", "Neurology.", "Pulmonary."],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        });

        $(document).ready(function () {
            $("#row-image2,#row-image3,#row-image4,#row-image5,#row-image6").hide();
        });

        $(document).ready(function () {
            $(".navbox1").click(function () {
                $("#row-image2,#row-image3,#row-image4,#row-image5,#row-image6").hide();
                $("#row-image1").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox2").click(function () {
                $("#row-image1,#row-image3,#row-image4,#row-image5,#row-image6").hide();
                $("#row-image2").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox3").click(function () {
                $("#row-image1,#row-image2,#row-image4,#row-image5,#row-image6").hide();
                $("#row-image3").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox3").click(function () {
                $("#row-image1,#row-image2,#row-image4,#row-image5,#row-image6").hide();
                $("#row-image3").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox4").click(function () {
                $("#row-image1,#row-image2,#row-image3,#row-image5,#row-image6").hide();
                $("#row-image4").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox5").click(function () {
                $("#row-image1,#row-image3,#row-image4,#row-image2,#row-image6").hide();
                $("#row-image5").show(400);
            });
        });

        $(document).ready(function () {
            $(".navbox6").click(function () {
                $("#row-image1,#row-image3,#row-image4,#row-image5,#row-image2").hide();
                $("#row-image6").show(400);
            });
        });



        $(document).ready(function () {
            $(".navbox1").click(function () {
                $(this).css({ "background-color": "aqua", "box-shadow": "0px 0px 15px aqua" });
                $(".navbox2").css({ "background-color": "rgb(244, 149, 149)", "box-shadow": "none" });
                $(".navbox3").css({ "background-color": "rgb(152, 245, 152)", "box-shadow": "none" });
                $(".navbox4").css({ "background-color": "rgb(168, 168, 252)", "box-shadow": "none" });
                $(".navbox5").css({ "background-color": "rgb(247, 215, 154)", "box-shadow": "none" });
                $(".navbox6").css({ "background-color": "rgb(169, 169, 169)", "box-shadow": "none" });
            });
        });


        $(document).ready(function () {
            $(".navbox2").click(function () {
                $(this).css({ "background-color": "red", "box-shadow": "0px 0px 15px red" });
                $(".navbox1").css({ "background-color": "rgb(168, 246, 246)", "box-shadow": "none" });
                $(".navbox3").css({ "background-color": "rgb(152, 245, 152)", "box-shadow": "none" });
                $(".navbox4").css({ "background-color": "rgb(168, 168, 252)", "box-shadow": "none" });
                $(".navbox5").css({ "background-color": "rgb(247, 215, 154)", "box-shadow": "none" });
                $(".navbox6").css({ "background-color": "rgb(169, 169, 169)", "box-shadow": "none" });
            });
        });

        $(document).ready(function () {
            $(".navbox3").click(function () {
                $(this).css({ "background-color": "green", "box-shadow": "0px 0px 15px green" });
                $(".navbox2").css({ "background-color": "rgb(244, 149, 149)", "box-shadow": "none" });
                $(".navbox1").css({ "background-color": "rgb(168, 246, 246)", "box-shadow": "none" });
                $(".navbox4").css({ "background-color": "rgb(168, 168, 252)", "box-shadow": "none" });
                $(".navbox5").css({ "background-color": "rgb(247, 215, 154)", "box-shadow": "none" });
                $(".navbox6").css({ "background-color": "rgb(169, 169, 169)", "box-shadow": "none" });
            });
        });


        $(document).ready(function () {
            $(".navbox4").click(function () {
                $(this).css({ "background-color": "rgb(109 109 237)", "box-shadow": "0px 0px 15px rgb(109 109 237)" });
                $(".navbox1").css({ "background-color": "rgb(168, 246, 246)", "box-shadow": "none" });
                $(".navbox3").css({ "background-color": "rgb(152, 245, 152)", "box-shadow": "none" });
                $(".navbox2").css({ "background-color": "rgb(244, 149, 149)", "box-shadow": "none" });
                $(".navbox5").css({ "background-color": "rgb(247, 215, 154)", "box-shadow": "none" });
                $(".navbox6").css({ "background-color": "rgb(169, 169, 169)", "box-shadow": "none" });
            });
        });

        $(document).ready(function () {
            $(".navbox5").click(function () {
                $(this).css({ "background-color": "orange", "box-shadow": "0px 0px 15px orange" });
                $(".navbox2").css({ "background-color": "rgb(244, 149, 149)", "box-shadow": "none" });
                $(".navbox3").css({ "background-color": "rgb(152, 245, 152)", "box-shadow": "none" });
                $(".navbox4").css({ "background-color": "rgb(168, 168, 252)", "box-shadow": "none" });
                $(".navbox1").css({ "background-color": "rgb(168, 246, 246)", "box-shadow": "none" });
                $(".navbox6").css({ "background-color": "rgb(169, 169, 169)", "box-shadow": "none" });
            });
        });


        $(document).ready(function () {
            $(".navbox6").click(function () {
                $(this).css({ "background-color": "gray", "box-shadow": "0px 0px 15px gray" });
                $(".navbox1").css({ "background-color": "rgb(168, 246, 246)", "box-shadow": "none" });
                $(".navbox3").css({ "background-color": "rgb(152, 245, 152)", "box-shadow": "none" });
                $(".navbox4").css({ "background-color": "rgb(168, 168, 252)", "box-shadow": "none" });
                $(".navbox5").css({ "background-color": "rgb(247, 215, 154)", "box-shadow": "none" });
                $(".navbox2").css({ "background-color": "rgb(244, 149, 149)", "box-shadow": "none" });
            });
        });


        $(document).ready(function () {
            $(".extra-blog").addClass('d-none');
            $('[name=blog1]').hover(function () {
                $(".extra-blog").removeClass('d-none'); // Show the extra-blog
            }, function () {
                $(".extra-blog").addClass('d-none'); // Hide the extra-blog when mouse leaves
            });
            $(".extra-blog").hover(function () {
                $(this).removeClass('d-none'); // Keep it visible when hovering over the extra-blog
            }, function () {
                $(this).addClass('d-none'); // Hide it when the mouse leaves
            });
        });




        jQuery(".second-nav").on('click', 'li', function () {
            jQuery(this).addClass("active").siblings().removeClass("active");
            $(".first1").removeClass("active");
        });



        $(document).ready(function () {
            $(".first1").click(function () {
                $(".div1, .div2, .div3, .div4, div5, .div6, .div7").show();
            });
        });
        $(document).ready(function () {
            $(".first2").click(function () {
                $(".div3, .div4, .div6, .div7").hide();
                $(".div1, .div2, div5").show();
            });
        });
        $(document).ready(function () {
            $(".first3").click(function () {
                $(".div1, .div3, .div5, .div7").hide();
                $(".div2, .div4, div6").show();
            });
        });
        $(document).ready(function () {
            $(".first4").click(function () {
                $(".div2, .div4, .div5, .div6").hide();
                $(".div1, .div3, div7").show();
            });
        });
        $(document).ready(function () {
            $(".first5").click(function () {
                $(".div1, .div2, .div4, .div6").hide();
                $(".div3, .div5, div7").show();
            });
        });
        $(document).ready(function () {
            $(".first6").click(function () {
                $(".div1, .div2, .div3, .div5").hide();
                $(".div4, .div6, div7").show();
            });
        });

        // navbar
        jQuery("#navbar").on('click', 'li', function () {
            jQuery(this).addClass("active").siblings().removeClass("active");
        });


        $(window).scroll(function () {
            if ($(window).scrollTop() >= 0 && $(window).scrollTop() <= 1200) {
                $('.item1').addClass("active");
            }
            else {
                $('.item1').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 1200 && $(window).scrollTop() <= 2040) {
                $('.item2').addClass("active");
            }
            else {
                $('.item2').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 2040 && $(window).scrollTop() <= 3800) {
                $('.item3').addClass("active");
            }
            else {
                $('.item3').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 3800 && $(window).scrollTop() <= 4600) {
                $('.item4').addClass("active");
            }
            else {
                $('.item4').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 4600 && $(window).scrollTop() <= 7450) {
                $('.item5').addClass("active");
            }
            else {
                $('.item5').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 7450 && $(window).scrollTop() <= 9180) {
                $('.item6').addClass("active");
            }
            else {
                $('.item6').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 9180 && $(window).scrollTop() <= 10100) {
                $('.item7').addClass("active");
            }
            else {
                $('.item7').removeClass("active");
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 10100) {
                $('.item8').addClass("active");
            }
            else {
                $('.item8').removeClass("active");
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        let items = document.querySelectorAll('#featureContainer .carousel .carousel-item');
        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
        $(document).ready(function () {
            $('#featureCarousel').carousel({ interval: false });
            $('#featureCarousel').carousel('pause');
        });
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function (response) {
                return true;
            }).catch(function (e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>




    <!-- latest news slidder -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function (response) {
                return true;
            }).catch(function (e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>

    <script>
        $(function () {
            var $message = $('.message');

            $('.yourFlickgalWrap').flickGal({
                'infinitCarousel': true
            })
                .on('fg_flickstart', function (e, index) {
                    $message.php('The event <b>fg_flickstart</b> is dispatched.');
                })
                .on('fg_flickend', function (e, index) {
                    $message.php('The event <b>fg_flickend</b> is dispatched.');
                })
                .on('fg_change', function (e, index) {
                    $message.php('The event <b>fg_change</b> is dispatched.');
                });
        });
    </script>
    <script src="jquery.flickgal.js"></script>


    <!-- pricing-slidder -->
    <script src="src/js/jquery.rotateSlider.js"></script>
    <script src="src/js/app.js"></script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function (response) {
                return true;
            }).catch(function (e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript1);
            });
        } catch (error) {
            console.log(error);
        }
    </script>





    <!-- Gallery-slidder -->
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function (response) {
                return true;
            }).catch(function (e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="carousel.js"></script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</body>

</html>