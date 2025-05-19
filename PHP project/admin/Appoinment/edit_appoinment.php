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
            $date = ($_POST['date']);
            $department = ($_POST['department']);
            $doctor = ($_POST['doctor']);
            $message = ($_POST['message']);

            // Prepare the SQL statement to  inject new value
            $sql = "update `appoinments` set `name`='$name', `email`='$email', `number`='$number', `date`='$date', `department`='$department', `doctor`='$doctor', `message`='$message' WHERE `id`=$id";

            $result = $conn->query($sql);

            if ($result) {
                // Redirect or notify success
                echo "<script>
                    alert('Appointment updated successfully.');
                    window.location.href = 'http://localhost/PHP%20project/admin/Appoinment/Appoinments_list.php';
                  </script>";
            } else {
                // Handle SQL errors
                echo "<script>
                    alert('Error updating appointment!');
                    window.location.href = 'http://localhost/PHP%20project/admin/Appoinment/Appoinments_list.php';
                  </script>";
            }
        }
    }
}
?>