<?php
    require_once('config.php');

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $proj_id = $_GET["proj_id"];
    $query = "DELETE FROM project WHERE proj_id = '$proj_id'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../admin_dashboard.php");
    } else {
         echo "Something went wrong. Please try again later.";
    }
?>
