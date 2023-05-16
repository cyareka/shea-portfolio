<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initialize Database</title>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    $sql = "CREATE DATABASE db_fernandez";
    if ($conn -> query($sql) === TRUE) 
        echo "Database created successfully";
    else
        echo "Error creating database: " . $conn -> error;

    $conn -> close();
?>
</body>
</html>