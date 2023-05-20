<?php
    session_start();

    require_once('config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db_username = $_POST['username'];
        $db_password = $_POST['password'];
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn -> connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE username = '$db_username' AND password = '$db_password'";
        $result = $conn -> query($sql);

        /* This code block is checking if the query result has at least one row. If it does, it fetches
        the row and checks if the 'type' column value is either 'user' or 'admin'. If it is 'user',
        it sets session variables and redirects the user to the user_index#home.php page. If it is
        'admin', it sets session variables and redirects the user to the admin_index#home.php page.
        If the 'type' value is neither 'user' nor 'admin', it sets an error message. If the query
        result has no rows, it sets an error message indicating that the account does not exist. */
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (($row['type'] == 'user')) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                header('Location: ../user_index#home.php');
                exit;
            } else if (($row['type'] == 'admin')) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                header('Location: ../admin_index#home.php');
                exit;
            } else {
                $errorMessage = 'Error executing the query: ' . $conn -> error;
            }
        } else {
            $errorMessage = 'Account does not exist.';
        }
        $conn -> close();
    }
?>