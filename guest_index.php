<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_fernandez";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db_username = $_POST['username'];
        $db_password = $_POST['password'];
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn -> connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE username = '$db_username' AND password = '$db_password'";
        $result = $conn -> query($sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (($row['type'] == 'user')) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                header('Location: user_index.php');
                exit;
            } else if (($row['type'] == 'admin')) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];
                header('Location: admin_index.php');
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
                    <li><a href="#about">about</a></li>
                    <li><a href="#projects">projects</a></li>
                    <li><a href="#contact">contact</a></li>
                    <li class="login-wrapper">
                        <button id="login-button" type="button">login</button>

                        <div class="login-form">
                            <?php if (isset($errorMessage)) { ?>
                            <p><?= $errorMessage; ?></p>
                            <?php } ?>

                            <form method="post">
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
                <h1 class="hide">She<span>arde</span>eh Fernandez</h1>
                <p class="hide">An aspiring Full Stack Developer with a passion for designing, writing, and solving problems.</p>
            </div>
    
            <div class="socials hide">
                <a href="https://github.com/cyareka" target="_blank"><img src="./img/icons8-github-50.png"></a>
                <a href="" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
            </div>
        </div>

        <img class="icon col-4" src="./img/home.png">
        <div class="col-2"></div>

    </div>
    <div id="about">
        <div class="heading">
            <div class="col-2"></div>
            <h1 class="col-8">about <span>me</span></h1>   
            <div class="col-2"></div>
        </div>
        <div class="banner">
            <div class="col-2"></div>
            <div class="col-3"><img class="profile" src="./img/profile.jpg"></div>
            <div class="banner-txt col-5">
                <p>
                    I am Sheardeeh Zurrielle B. Fernandez, commonly called by my peers as Arde. I am a second year student pursuing a course in Information Technology, majoring in Information Security at the University of Southeastern Philippines.
                </p>
                <p>
                    Although my course mainly dabbles in the field of technology, I enjoy other activities such as creative writing, editing videos and images, making art, and reading.
                </p>
                <p>I have experience in: </p>
                <div class="box hide">
                    <ul>
                        <li><img src="./img/icons8-java-50.png"></li>
                        <li><img src="./img/icons8-html-5-50.png"></li>
                        <li><img src="./img/icons8-css3-50.png"></li>
                        <li><img src="./img/icons8-mysql-logo-50.png"></li>
                        <li><img src="./img/icons8-php-logo-50.png"></li>
                    </ul>
                </div>
                <p>I am interested in learning: </p>
                <div class="box hide">
                    <ul>
                        <li><img src="./img/icons8-python-50.png"></li>
                        <li><img src="./img/icons8-javascript-50.png"></li>
                        <li><img src="./img/icons8-ruby-programming-language-50.png"></li>
                        <li><img src="./img/icons8-react-native-50.png"></li>
                        <li><img src="./img/icons8-kotlin-50.png"></li>
                    </ul>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <div id="projects">
        <div class="heading">
            <div class="col-2"></div>
            <h1 class="col-8"><span>proj</span>ects</h1>
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
    <div id="contact">
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
                        <a href="" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                        <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
                    </div>
                </div>
            </div>
            <div class="con-box-2">
                <?php if (isset($errorMessage)) { ?>
                    <p><?= $errorMessage; ?></p>
                    <?php } ?>
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