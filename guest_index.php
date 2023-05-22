<?php
session_start();

if (isset($_SESSION['username'])) {
    if ($_SESSION['type'] == 'user') {
        header("Location: user_index#home.php");
    } else if ($_SESSION['type'] == 'admin') {
        header("Location: admin_index#home.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arde | aspiring full stack dev</title>

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
                    <li><a href="#home">home</a></li>
                    <li><a href="#contact-h">contact</a></li>
                    <li class="login-wrapper">
                        <button id="login-button" type="button">login</button>
                        <div class="login-form">
                            <?php if (isset($errorMessage)) { ?>
                            <p><?= $errorMessage; ?></p>
                            <?php } ?>

                            <form method="post" action="./backend/session_login.php">
                                <label>Username <input type="text" name="username" placeholder="Enter your username" required></label><br>
                                <label>Password <input type="password" name="password" placeholder="Enter your password" required></label><br>
                                <button type="submit">Login</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>  
        <div class="col-2"></div>
    </div>
    <div id="home">
        <div class="col-2"></div>
        <div class="intro col-4">
            <div class="home-txt">
                <p>Hi, I'm</p>
                <h1>She<span>arde</span>eh Fernandez</h1>
                <p>An aspiring Full Stack Developer with a passion for designing, writing, and solving problems.</p>
            </div>
    
            <div class="socials">
                <a href="https://github.com/cyareka" target="_blank"><img src="./img/icons8-github-50.png"></a>
                <a href="https://discord.com/users/581852432498294784" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
            </div>
        </div>

        <img class="icon col-4" src="./img/home.png">
        <div class="col-2"></div>
    </div>
    <div id="contact-h">
        <div class="col-2"></div>
        <div class="con-content col-8">
            <div class="con-box-1">
                <h1>let's get <span>in touch!</span></h1>
                <div class="con-box-1-con">
                    <h2>COME SAY HELLO</h2>
                    <ul>
                        <li><img src="./img/icons8-letter-30.png">sheardeehzurrielle@gmail.com</li>
                        <li><img src="./img/icons8-phone-ringing-30.png">+639356000500</li>
                    </ul>
                    <h2>YOU CAN ALSO FIND ME ON</h2>
                    <div class="socials">
                        <a href="https://github.com/cyareka" target="_blank"><img src="./img/icons8-github-50.png"></a>
                        <a href="https://discord.com/users/581852432498294784" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                        <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
                    </div>
                </div>
            </div>
            <div class="con-box-2">
                <?php if (isset($errorMessage)) { ?>
                    <p><?= $errorMessage; ?></p>
                    <?php } ?>

                <?php
                    require_once('./backend/config.php');

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $msg = $_POST['msg'];

                        $stmt = $conn->prepare("INSERT INTO contactmsg (msg_name, msg_email, msg_content) VALUES (?, ?, ?)");

                        $stmt->bind_param("sss", $name, $email, $msg);

                        if ($stmt->execute()) {
                            header("Location: success.php");
                            exit;
                        } else {
                            echo "Something went wrong. Please try again later.";
                        }

                        $stmt->close();
                        $conn->close();
                    }
                ?>
                <form method="post">
                    <label>name</label>
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <label>email</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                    <label>message</label>
                    <textarea class="msg" type="textarea" name="msg" placeholder="Tell me what you think!" required></textarea>
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
</body>
</html>