<?php
    require_once('config.php');

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $msg_email = $_GET["msg_email"];
    $query = "DELETE FROM contactmsg WHERE msg_email = '$msg_email'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../admin_dashboard.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
