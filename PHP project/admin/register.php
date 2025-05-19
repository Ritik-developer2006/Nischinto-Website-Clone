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
    <title>Nischinto(New admin)</title>

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
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="post" class="needs-validation" enctype='multipart/form-data'
                                        novalidate>
                                        <div class="mb-3">
                                            <label class="mb-1" for="validationCustom01"
                                                style="color:black !important;"><strong>Username</strong></label>
                                            <input type="text" name="username" id="validationCustom01"
                                                class="form-control" placeholder="username" required>
                                            <div class="invalid-feedback">
                                                Please etner username.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1" for="validationCustom02"
                                                style="color:black !important;"><strong>Email</strong></label>
                                            <input type="email" name="email" id="validationCustom02"
                                                class="form-control" placeholder="hello@example.com" required>
                                            <div class="invalid-feedback" required>
                                                Please etner email.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1" for="validationCustom03"
                                                style="color:black !important;"><strong>Password</strong></label>
                                            <input type="password" name="password" id="validationCustom03"
                                                class="form-control" placeholder="*****" required>
                                            <div class="invalid-feedback">
                                                Please etner password.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1" for="validationCustom04"
                                                style="color:black !important;"><strong>Photo</strong></label>
                                            <input type="file" name="photo" id="validationCustom04"
                                                class="form-control pt-3" required>
                                            <div class="invalid-feedback">
                                                Please ulpoad your Photo.
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" name='submit' class="btn btn-success">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="index.php">Sign in</a>
                                        </p>
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

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

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
    }
    return null; // Return null if no file is uploaded
}

// Check if the form was submitted
if (isset($_POST['submit'])) {

    // Sanitize user inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to SQL injection
    $query = "select * from log_in where email = '$email'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        echo "<script>alert('On this Email User Alreedy exist Please try another Email-Id.'); 
        window.location.href = 'http://localhost/PHP%20project/admin/register.php';
        </script>";
    } else {
        // Define upload directory
        $uploadDir = 'uploads/';

        // Handle file uploads
        $fileName = handleFileUpload('photo', $uploadDir);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO log_in (username, email, password, photo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $fileName);

        if ($stmt->execute()) {
            // Successful registration
            echo "<script>alert('You have successfully registered.'); window.location.href = 'http://localhost/PHP%20project/admin/';</script>";
        } else {
            // Handle error
            echo "<script>alert('There was an error with registration. Please try again.'); window.location.href = 'http://localhost/PHP%20project/admin/';</script>";
        }

        // Close the prepared statement and the connection
        $stmt->close();
        $conn->close();
    }

    exit(); // Ensure no further code runs after redirect
}
?>