<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: guest_index.php");
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Referrer-Policy: no-referrer");
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('./backend/config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["proj_id"])) {
    $proj_id = $_GET["proj_id"];
    $sql_query = "SELECT * FROM project WHERE proj_id = ".$proj_id;

    $result = $conn->query($sql_query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $proj_id = $row['proj_id'];
        $proj_image = $row['proj_image'];   
        $proj_title = $row['proj_title'];
        $proj_link = $row['proj_link'];
        $proj_desc = $row['proj_desc'];

        if (!$result) {
            echo "Error: " . $conn->error;
        }
} else {
echo "No record found.";
}
} else {
echo "Invalid project ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update | arde</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon_io/favicon-16x16.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body style="background: linear-gradient(to right, #14160D, #231C16); color: #e0e0e0; border-radius: 10px;">
    <div id="gradient-bar">_</div>
    <h1 style="text-align: center; margin: 50px 0; font-size: 64px;"><span>update</span> data</h1>
    <div class="container">
        <?php if (isset($errorMessage)) { ?>
            <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./backend/update.php?proj_id=<?php echo $proj_id; ?>" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;"
                enctype="multipart/form-data">
            <label for="proj_image">Project Image</label>
            <input type="file" name="proj_image" id="proj_image">
            <label for="proj_title">Project Title</label>
            <input type="text" name="proj_title" id="proj_title" value="<?php echo $proj_title ?>" required>
            <label for="proj_link">Project Link</label>
            <input type="url" name="proj_link" id="proj_link" value="<?php echo $proj_link ?>" required>
            <label for="proj_desc">Project Description</label>
            <input type="text" name="proj_desc" id="proj_desc" value="<?php echo $proj_desc ?>" required>
            <button type="submit" name="update" id="update">Update</button>
        </form>
    </div>
</body>
</html>