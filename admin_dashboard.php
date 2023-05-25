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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard | arde</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon_io/favicon-16x16.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            font-family: 'JetBrains Mono', 'Cousine', Sans;
            scroll-behavior: smooth;
        }
        #container { width: 100%; height: 100%; margin: 0 auto; }
        [class*="col-"] { float: left; padding: 15px; }
        @media only screen and (min-width: 768px) {
            .col-1 { width: 8.33%; }
            .col-2 { width: 16.66%; }
            .col-3 { width: 25%; }
            .col-4 { width: 33.33%; }
            .col-5 { width: 41.66%; }
            .col-6 { width: 50%; }
            .col-7 { width: 58.33%; }
            .col-8 { width: 66.66%; }
            .col-9 { width: 75%; }
            .col-10 { width: 83.33%; }
            .col-11 { width: 91.66%; }
            .col-12 { width: 100%; }
        }
        @media only screen and (max-width: 767px) {
            [class*="col-"]{ width: 100%; padding: 0; }
            #nav .col-2 { width: 0%; } 
            .proj-grid form { padding: 20px; } 
            h1 { text-align: center; }
        }
        p, h1 {
            color: #E0E0E0;
            line-height: 1.5;
        }
        #gradient-bar {
            background: linear-gradient(to right, #333D29, #A4AC86, #582F0E);
            color: #0e0e0e;
            height: 7px;
        }
        #nav {
            position: fixed;
            width: 100%;
            height: 65px;
        }
        #nav [class*="col-"] {
            height: inherit;
            padding: 0px; 
            background-color: #0e0e0eac;
            -webkit-backdrop-filter: blur(6px);
            backdrop-filter: blur(6px);
        }
        #sticky-top {
            background-color:  #0e0e0eac;
        }
        #sticky-top ul {
            font-size: 14px;
            height: 99%;
            padding: 0;
            margin: 0;

            display: flex;
            justify-content: center;
            align-items: center;
            /* flex-wrap: wrap; */
        }
        #sticky-top li {
            list-style: none;
            height: 99%;
            padding: 22px 10px 30px 10px;
            float: left;
        }
        #sticky-top a {
            color: #e0e0e0;
            text-decoration: none;

            display: inline-block;
            position: relative;
        }
        #sticky-top a:after {    
            background: none repeat scroll 0 0 transparent;
            bottom: 0px;
            content: "";
            display: block;
            height: 2px;
            left: 50%;
            position: absolute;
            background: #A4AC86;
            transition: width 0.3s ease 0s, left 0.3s ease 0s;
            width: 0;
        }
        #sticky-top a:hover:after { 
            width: 100%; 
            left: 0; 
        }
        button, .btn {
            padding: 2px 10px;
            border: 0;
            outline: 0;
            color: #e0e0e0;
            background-color: #582F0E;
            font-size: 16px;
            text-transform: lowercase;
            border-radius: 10px;
            transition: background-color 0.5s ease;
            font-size: 14px;
        }
        button:active, .btn:active {
            margin-top: 1px;
        }
        .btn-primary {
            background-color: #72865d;
        }
        button:hover, .btn:hover {
            background-color: #3a1d06;
            box-shadow: 0 0 20px #5f300a;
        }
        .btn-primary:hover {
            background-color: #333D29;
            box-shadow: 0 0 20px #333D29;
            transition: background-color 0.5s ease;
        }
        .proj-grid form button {
            float: right;
            width: 100px;
        }
        form button:active {
            margin-top: 3px;
        }   
        input {
            margin-bottom: 20px;
        }
        table.table-bordered > thead > tr > th { border: 1px solid #a9a9a9; }
    </style>
</head>
<body>
<div id="container" style="background: linear-gradient(#0E0E0E, #1A1C15, #1E1915); min-height: 85vh; clear: both; overflow: hidden;">
    <div id="nav">
        <div id="gradient-bar">_</div>
        <div class="col-2"></div>
            <div id="sticky-top" class="col-8">
                <ul>
                    <li><a href="admin_index#home">home</a></li>
                    <li><a href="admin_index#about">about</a></li>
                    <li><a href="admin_index#projects">projects</a></li>
                    <li><a href="admin_index#contact">contact</a></li>
                    <li class="logout-out">
                        <form method="post" action="./backend/session_logout.php">
                            <button name="logout" id="logout-button" type="submit">logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        <div class="col-2"></div>
    </div>
    <div class="col-2"></div>
    <div id="proj-dash" class="col-8">
        <div class="heading" style="margin-top: 70px;">
            <h1 style="font-size: 64px;
            line-height: 1;"><span style="color: #a4ac86">dash</span>board</h1>
        </div>
        <div class="proj-add" style="color: #e0e0e0;">
            <div class="proj-grid">
                <?php  if (isset($errorMessage)) { ?>
                <p><?= $errorMessage; ?></p>
                <?php } ?>
                <form action="./backend/add.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
                    <label for="proj_image">Project Image</label>
                        <input type="file" name="proj_image" id="proj_image" required>
                    <label for="proj_title">Project Title</label>
                        <input type="text" name="proj_title" id="proj_title" required>
                    <label for="proj_link">Project Link</label>
                        <input type="url" name="proj_link" id="proj_link" required>
                    <label for="proj_desc">Project Description</label>
                        <input type="text" name="proj_desc" id="proj_desc" required>
                    <button type="submit" name="add" id="add">add</button>
                </form>
            </div>
        </div>
        <div class="proj-display">
            <div class="proj_table table-responsive">
                <table class="table" style="background-color: #0e0e0e; color: #e0e0e0; border-radius: 5px; padding: 10px;">
                    <thead>
                    <tr>
                        <th scope="col">Project Id</th>
                        <th scope="col">Project Image</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Project Link</th>
                        <th scope="col">Project Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once('./backend/config.php');
                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql_query = "SELECT * FROM project";
                            if ($result = $conn ->query($sql_query)) {
                                while ($row = $result -> fetch_assoc()) { 
                                    $proj_id = $row['proj_id'];
                                    $proj_image = $row['proj_image'];
                                    $proj_title = $row['proj_title'];
                                    $proj_link = $row['proj_link'];
                                    $proj_desc = $row['proj_desc'];
                        ?>
                        
                        <tr class="trow">
                            <td><?php echo $proj_id; ?></td>
                            <td><?php echo $proj_image; ?></td>
                            <td><?php echo $proj_title; ?></td>
                            <td><?php echo $proj_link; ?></td>
                            <td><?php echo $proj_desc; ?></td>
                            <td><a href="update_form.php?proj_id=<?php echo $proj_id; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="./backend/delete.php?proj_id=<?php echo $proj_id; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>

                        <?php
                                } 
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="heading" style="margin-top: 70px; margin-bottom: 30px;">
            <h1 style="font-size: 64px;
            line-height: 1;"><span style="color: #a4ac86">in</span>box</h1>
            </div>
            <div class="inbox table-responsive">
            <table class="table" style="background-color: #0e0e0e; color: #e0e0e0; border-radius: 5px; padding: 10px;">
                    <thead>
                    <tr>
                        <th scope="col">Sender</th>
                        <th scope="col">Sender E-mail</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date Sent</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require_once('./backend/config.php');
                            $conn = mysqli_connect($servername, $username, $password, $dbname);

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql_query = "SELECT * FROM contactmsg";
                            if ($result = $conn ->query($sql_query)) {
                                while ($row = $result -> fetch_assoc()) { 
                                    $msg_name = $row['msg_name'];
                                    $msg_email = $row['msg_email'];
                                    $msg_content = $row['msg_content'];
                                    $date_added = $row['date_added'];
                        ?>
                        
                        <tr class="trow">
                            <td><?php echo $msg_name; ?></td>
                            <td><?php echo $msg_email; ?></td>
                            <td><?php echo $msg_content; ?></td>
                            <td><?php echo $date_added; ?></td>
                            <td><a href="./backend/delete_msg.php?msg_email=<?php echo $msg_email; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>

                        <?php
                                } 
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
</body>
</html>

