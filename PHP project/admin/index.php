<?php

// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// database connection file
include "connect.php";

// session start
session_start();

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // Correctly close the JavaScript URL string
    echo "<script>
            window.location.href = 'http://localhost/PHP%20project/admin/dashboard.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
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
    <title>Nischinto(admin login)</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="uploads/4.png" />
    <!-- bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">


</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="../index.php"><img src="uploads/footer-logo.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 ms-3">Please Log in your account</h4>
                                    <form method="post" class="needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label class="mb-1" for="validationCustom01"
                                                style="color:black !important;"><strong>Email</strong></label>
                                            <input type="email" name="email" id="validationCustom01"
                                                class="form-control" placeholder="hello@example.com" required>
                                            <div class="invalid-feedback">
                                                Please etner valid email.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1" style="color:black !important;"
                                                for="validationCustom02"><strong>Password</strong></label>
                                            <input type="password" name="password" for="validationCustom02"
                                                class="form-control" placeholder="Password" required>
                                            <div class="invalid-feedback">
                                                Please enter password.
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1"
                                                        style="color:black !important;">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="#"
                                                    style="color:black !important;">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-success w-50">Log
                                                in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="register.php">Sign
                                                up</a></p>
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
    <script src="vendor/global/global.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
include "connect.php";
if (isset($_POST['submit'])) {
    // store post value
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to SQL injection
    $query = "select * from log_in where email = '$email' && password = '$password'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    
    // Check if any rows are returned
    if ($total == 1 ){
        // Store email in session
        $_SESSION['email'] = $email;
        echo "<script>
                window.location.href = 'http://localhost/PHP%20project/admin/dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Incorrect username or password');
                window.location.href = 'http://localhost/PHP%20project/admin/';
            </script>";
    }
}
?>