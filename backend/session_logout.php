<?php
    session_start();

    try {
        if (isset($_POST['logout'])) {
            $_SESSION = array();
            session_unset();
            session_destroy();
            session_regenerate_id();
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");
            header("Location: guest_index.php");
            exit;
        }
    } catch (Exception $e) {
        echo "An error occurred while logging out. Please try again later.";
    }
?>