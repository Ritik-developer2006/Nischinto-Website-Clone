<?php
include "connect.php";

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/PHP%20project/admin/");
    exit();
}

// Function to handle file uploads
function handleFileUpload($fileInputName, &$fileName, $uploadDir) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        $originalFileName = $_FILES[$fileInputName]['name'];
        $fileName = $originalFileName;
        $destination = $uploadDir . $fileName;

        // Create the upload directory if it does not exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Check for duplicate file
        if (file_exists($destination)) {
            echo "<script>alert('File with the same name already exists. Please rename your file and try again.');</script>";
            return $fileName;
        } else {
            // Move the uploaded file
            if (move_uploaded_file($fileTmpPath, $destination)) {
                return $fileName;
            } else {
                echo "<script>alert('Error in uploading the file. Please try again.');</script>";
            }
        }
    }
    return $fileName;
}

if (isset($_POST['update'])) {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Sanitize ID
    
        // Define upload directory
        $uploadDir = 'uploads/';

        // Fetch existing profile data
        $stmt = $conn->prepare("SELECT * FROM user_profile WHERE email = ?");
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        
        $fileName = $data['photo'];

        // Handle file uploads
        $fileName = handleFileUpload('photo', $fileName, $uploadDir);

        // Capture knowledge items
        $knowledges = isset($_POST['knowledge']) && is_array($_POST['knowledge']) ? implode(',', $_POST['knowledge']) : '';

        // Sanitize and validate inputs
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $number = $conn->real_escape_string($_POST['number']);
        $edu = $conn->real_escape_string($_POST['edu']);
        $post = $conn->real_escape_string($_POST['post']);
        $skill = $conn->real_escape_string($_POST['skill']);
        $portfolio = $conn->real_escape_string($_POST['portfolio']);
        $linkdin = $conn->real_escape_string($_POST['linkdin']);
        $git = $conn->real_escape_string($_POST['git']);
        $insta = $conn->real_escape_string($_POST['insta']);

        // Prepare the SQL statement with placeholders
        $stmt = $conn->prepare("UPDATE user_profile SET name=?, photo=?, post=?, edu=?, skill=?, knowledge=?, number=?, email=?, portfolio=?, linkdin=?, git=?, insta=? WHERE id=?");
        if ($stmt === false) {
            die("Failed to prepare the statement: " . htmlspecialchars($conn->error));
        }

        // Bind parameters
        $stmt->bind_param('ssssssssssssi', $name, $fileName, $post, $edu, $skill, $knowledges, $number, $email, $portfolio, $linkdin, $git, $insta, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
                    alert('Profile updated successfully');
                    window.location.href = 'http://localhost/PHP%20project/admin/profile.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error in updating profile: " . htmlspecialchars($stmt->error) . "');
                    window.location.href = 'http://localhost/PHP%20project/admin/profile.php';
                  </script>";
        }

        $stmt->close();
        $conn->close();
        exit();
    }
}
?>
