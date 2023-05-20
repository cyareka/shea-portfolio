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

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon_io/favicon-16x16.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</head>
<body>
<div id="container">
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
        <div class="heading">
            <div class="col-2"></div>
            <h1 class="col-8"><span>dash</span>board</h1>
            <div class="col-2"></div>
        </div>
        <div class="proj-content">
            <div class="col-2"></div>
            <div class="proj-grid col-8">
                <div class="grid" style="background-image: url('./img/wangsheng.png')">
                    <div class="grid-txt">
                        <h3><a href="https://cyareka.github.io/wangsheng-funeral-parlor/" target="_blank">Wangsheng Funeral Parlor</a></h3>
                        <p>A prerequisite project for The Odin Project</p>
                    </div>
                </div>
                <div class="grid" style="background-image: url('./img/ar.png')">
                    <div class="grid-txt">
                        <h3><a href="https://github.com/cyareka/ar-calculator" target="_blank">Genshin Impact AR Calculator</a></h3>
                        <p>Calculate AR EXP needed and est. date of reaching that AR</p>
                    </div>
                </div>
                <div class="grid" style="background-image: url('./img/pangandam.png')" style="filter: grayscale(100%)">
                    <div class="grid-txt">
                        <h3><a href="https://github.com/cyareka/pangandam" target="_blank">Pangandam</a></h3>
                        <p>A disaster inventory management system</p>
                    </div>
                </div>
                <div class="grid" style="background-image: url('./img/mps.png')">
                    <div class="grid-txt">
                        <h3><a href="https://github.com/cyareka/mealplan" target="_blank">Meal Plan System</a></h3>
                        <p>Data Structures project for simple tracking of meals</p>
                    </div>
                </div>
                <div class="grid" style="background-image: url('./img/flames.jpg')">
                    <div class="grid-txt">
                        <h3><a href="https://github.com/cyareka/flames-game" target="_blank">FLAMES Game</a></h3>
                        <p>Implementation of everyone's childhood game</p>
                    </div>
                </div>
                <div class="grid" style="background-image: url('./img/hogwarts.jpg')">
                    <div class="grid-txt">
                        <h3><a href="https://github.com/cyareka/hogwarts-alumni" target="_blank">Hogwarts Alumni</a></h3>
                        <p>Alumni record written in Java with a Harry Potter theme.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</body>
</html>

