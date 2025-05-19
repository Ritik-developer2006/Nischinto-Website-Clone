<?php
// error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// database connection file
include "../connect.php";

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

    // Ensure the ID parameter is provided and valid
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']); // Sanitize the ID

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>
                alert('Data deleted successfully.');
                window.location.href = 'http://localhost/PHP%20project/admin/Messages/Messages_list.php';
              </script>";
        } else {
            echo "<script>
                alert('Something went wrong, please try again!');
                window.location.href = 'http://localhost/PHP%20project/admin/Messages/Messages_list.php';
              </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Invalid ID parameter.');
            window.location.href = 'http://localhost/PHP%20project/admin/Messages/Messages_list.php';
          </script>";
    }

    $conn->close();
}
?>