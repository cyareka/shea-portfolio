<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initialize Tables</title>
</head>
<body>

<?php
    require_once('config.php');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn -> connect_error); 
    }

    $proj = "CREATE TABLE project (
        proj_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        proj_image LONGBLOB NOT NULL,
        proj_title VARCHAR(40) NOT NULL, 
        proj_desc VARCHAR(500) NOT NULL
        )"; 
    
    $contactmsg = "CREATE TABLE contactmsg (
        msg_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        msg_name VARCHAR(30) NOT NULL,
        msg_email VARCHAR(30) NOT NULL,
        msg_content VARCHAR(1000) NOT NULL,
        date_added DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

    $user = "CREATE TABLE user (
        user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(12) NOT NULL,
        password VARCHAR(20) NOT NULL,
        type VARCHAR(20) NOT NULL
        )";

    $tables = [$proj, $contactmsg, $user];

    foreach ($tables as $k => $sql){
        $query = @$conn->query($sql);
    
        if (!$query)
           $errors[] = "Table $k : Creation failed ($conn->error)";
        else
           $errors[] = "Table $k : Creation done";
    }
    
    foreach ($errors as $msg) {
       echo "$msg <br>";
    }
    
    $username = "admin";
    $password = "admin";
    $type = "admin";
    $admin = "INSERT IGNORE INTO user (username, password, type) VALUES ('$username', '$password', '$type')";
        
    $username = "user";
    $password = "user";
    $type = "user";
    $user = "INSERT IGNORE INTO user (username, password, type) VALUES ('$username', '$password', '$type')";

    $insert = [$admin, $user];

    foreach ($insert as $i => $sql) {
        $query = @$conn->query($sql);
    
        if (!$query)
           $errors[] = "User $i : Creation failed ($conn->error)";
        else {
            if ($conn->affected_rows > 0) {
                $errors[] = "User $i : Creation done";
            } else {
                $errors[] = "User $i : Already exists";
            }
        }
    }
    
    foreach ($errors as $msg) {
       echo "$msg <br>";
    }

    $conn -> close();  
?>
</body>
</html>