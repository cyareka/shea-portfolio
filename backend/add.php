<?php
require_once('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add'])) {
    $proj_title = $_POST['proj_title'];
    $proj_link = $_POST['proj_link'];
    $proj_desc = $_POST['proj_desc'];

    if (isset($_FILES['proj_image']) && $_FILES['proj_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['proj_image'];

        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            // Validate file size
            $maxFileSize = 2 * 1024 * 1024; // Maximum file size in bytes (2MB)
            if ($file['size'] <= $maxFileSize) {
                $fileName = uniqid() . '.' . $fileExtension;
                $filePath = '../upload/' . $fileName;

                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $sql = "INSERT INTO project (`proj_image`, `proj_title`, `proj_link`, `proj_desc`) VALUES ('$fileName', '$proj_title', '$proj_link', '$proj_desc')";
                    if (mysqli_query($conn, $sql)) {
                        header("location: ../admin_dashboard.php");
                        echo "Successfully Added.";
                        exit;
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }
                } else {
                    echo "Error moving the uploaded file.";
                }
            } else {
                echo "File size exceeds the allowed limit.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        echo "No file was uploaded or an error occurred during upload.";
    }
}
?>