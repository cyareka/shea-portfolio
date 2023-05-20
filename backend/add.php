<?php
    require_once('config.php');

    if (isset($_POST['add'])){

        $proj_image = $_POST['proj_image'];
        $proj_title = $_POST['proj_desc'];
        $proj_url = $_POST['proj_url'];
        $proj_desc = $_POST['proj_desc'];

        if($$image != null && $proj_title != "" && $proj_url != "" && $proj_desc != ""){
            $sql = "INSERT INTO projects (`proj_image`, `proj_title`, `proj_url`, `proj_desc`) VALUES ('$proj_image', '$proj_title', $proj_url, $proj_desc)";
            if (mysqli_query($conn, $sql)) {
                header("location: ../admin_dashboard.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Name, Class and Marks cannot be empty!";
        }
    }
?>