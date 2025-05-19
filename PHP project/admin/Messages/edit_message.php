<?php
include "../connect.php";
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
} else {

    // check the submit button is set
    if (isset($_POST['submit'])) {
        // Check if the ID parameter is set
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Sanitize ID

            // update varisable
            $name = ($_POST['name']);
            $email = ($_POST['email']);
            $number = ($_POST['number']);
            $subject = ($_POST['subject']);
            $message = ($_POST['message']);

            // Prepare the SQL statement to  inject new value
            $sql = "update `messages` set `name`='$name', `email`='$email', `number`='$number', `subject`='$subject', `message`='$message' WHERE `id`=$id";

            $result = $conn->query($sql);

            if ($result) {
                // Redirect or notify success
                echo "<script>
                    alert('Record updated successfully.');
                    window.location.href = 'http://localhost/PHP%20project/admin/Messages/Messages_list.php';
                  </script>";
            } else {
                // Handle SQL errors
                echo "<script>
                    alert('Error updating to Record!');
                    window.location.href = 'http://localhost/PHP%20project/admin/Messages/Messages_list.php';
                  </script>";
            }
        }
    }
}
?>