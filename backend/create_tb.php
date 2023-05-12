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
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn -> connect_error); 
    }

    $sql = "CREATE TABLE project (proj_id UNSIGNED AUTO_INCREMENT PRIMARY KEY, proj_name VARCHAR(40) NOT NULL, proj_desc VARCHAR(500) NOT NULL)"; 

    if ($conn -> query($sql) === TRUE) 
        echo "Tables created successfully"; else 
        echo "Error creating table: " . $conn -> error; 

    $conn -> close();  
?>
</body>
</html>