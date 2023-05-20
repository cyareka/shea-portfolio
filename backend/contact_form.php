<?php
require_once('config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $stmt = $conn->prepare("INSERT INTO contactmsg (msg_name, msg_email, msg_content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $msg);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header('Location: thankyou.php');
        exit();
    } else {
        $message = "Error: " . $stmt->error;
        error_log($message);
    }
}

$conn->close();
?>
