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

    require_once('./backend/config.php');

    $username = "root";

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
            $errorMessage = "Something went wrong. Please try again later.";
        } 
        $stmt->close();
        $conn->close();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "welcome, $username";} ?> | arde</title>

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
                    <li class="logout-out">
                        <form method="post" action="./backend/session_logout.php">
                            <button name="logout" id="logout-button" type="submit">logout</button>
                        </form>
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
                <a href="https://discord.com/users/581852432498294784" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
            </div>
        </div>

        <img class="icon col-4" src="./img/home.png">
        <div class="col-2"></div>

    </div>
    <div id="about">
        <div class="heading">
            <div class="col-2"></div>
            <h1 class="col-6">about <span>me</span></h1>
            <div id="about-head">
                <a class="col-2" id="cv-dl" href=". \files\CV_Fernandez.pdf" download>Download CV</a>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="banner">
            <div class="col-2"></div>
            <div class="col-3"><img class="profile" src="./img/profile.jpg"></div>
            <div type="" class="banner-txt col-5">
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
            <h1 class="col-6"><span>proj</span>ects</h1>
            <div id="proj-head">
                <a class="col-2" id="dashboard" href="admin_dashboard">dashboard</a>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="proj-content">
            <div class="col-2"></div>
            <div class="proj-grid col-8">
            <?php
                require_once('./backend/config.php');

                $username = 'root';
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM project ORDER BY proj_id";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                }

                while ($project = mysqli_fetch_assoc($result)) {
                    $proj_image = $project['proj_image'];
                    $proj_title = $project['proj_title'];
                    $proj_link = $project['proj_link'];
                    $proj_desc = $project['proj_desc'];

                    $imageFilePath = './upload/' . $proj_image;

                    echo '<div class="grid" style="background-image: url(\'' . $imageFilePath . '\')">';
                        echo '<div class="grid-txt">';
                            echo '<h3><a href="' . $proj_link . '" target="_blank">' . $proj_title . '</a></h3>';
                            echo '<p>' . $proj_desc . '</p>';
                        echo '</div>';
                    echo '</div>';
                }
                mysqli_close($conn);
                ?>
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
                        <a href="https://discord.com/users/581852432498294784" target="_blank"><img src="./img/icons8-discord-new-50.png"></a>
                        <a href="https://instagr.am/uvraes" target="_blank"><img src="./img/icons8-instagram-50.png"></a>
                    </div>
                </div>
            </div>
            <div class="con-box-2">
                <?php 
                if (isset($errorMessage)) { ?>
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