<?php 
    session_start();

    $dashboard = 'admin_dashboard.php';
    $logout = 'session_logout.php';

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "Welcome, $username";
    } else {
        header("Location: guest_login.php");
        exit;
    }   
?>

