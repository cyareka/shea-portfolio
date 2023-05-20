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

    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon_io/favicon-16x16.png">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> -->

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
        button {
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
        button:active {
            margin-top: 1px;
        }
        button:hover {
            background-color: #3a1d06;
            box-shadow: 0 0 20px #5f300a;
        }
        form button {
            float: right;
        }
        form button:active {
            margin-top: 18px;
        }   
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
    <div id="proj-dash">
        <div class="heading" style="margin-top: 70px;">
            <div class="col-2"></div>
            <h1 class="col-8" style="font-size: 64px;
    line-height: 1;"><span style="color: #a4ac86">dash</span>board</h1>
            <div class="col-2"></div>
        </div>
        <div class="proj-add" style="color: #e0e0e0">
            <div class="col-2"></div>
                <div class="proj-grid col-8" style="display: flex; flex-direction: column;">
                    <form action="add.php" method="post">
                        <label for="proj_image">Project Image</label>
                            <input type="file" name="proj_image" id="proj_image" required>
                        <label for="proj_title">Project Title</label>
                            <input type="text" name="proj_title" id="proj_title" required>
                        <label for="proj_url">Project Url</label>
                            <input type="url" name="proj_url" id="proj_url" required>
                        <label for="proj_desc">Project Description</label>
                            <input type="text" name="proj_desc" id="proj_desc" required>
                        <button type="submit" name="submit" id="add">add</button>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        <div class="proj-display">
            <div class="col-2"></div>
            <div class="proj_table col-8">
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>
</body>
</html>

