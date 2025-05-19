<?php
session_start();

if (isset($_SESSION['email'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect using JavaScript with corrected URL string
    echo "<script>
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
    exit(); // Ensure no further code runs after redirect
} else {
    // Alert user if session is empty and redirect with corrected URL string
    echo "<script>
            alert('Session is empty Please Log-In your account!');
            window.location.href = 'http://localhost/PHP%20project/admin/';
          </script>";
    exit(); // Ensure no further code runs after redirect
}
?>
