<!DOCTYPE html>
<html>
<head>
    <title>arde | login</title>

    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon_io/favicon-16x16.png">

    <style>
        * { box-sizing: border-box; margin: 0; font-family: 'JetBrains Mono'; ;
}

        body {
            height: 100%;

            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            width: 100%;
            background: linear-gradient(to right, #14160D, #231C16);
        }

        /* #container {
            display: flex;
            justify-content: center;
            align-self: flex-start;
        } */

        #modal {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #e0e0e0;
        }

    </style>
</head>
<body>
    <div id="container">
        <div id="modal">
            <h1>Login</h1>
            <?php if (isset($errorMessage)) { ?>
                <p><?= $errorMessage; ?></p>
            <?php } ?>
    
            <form method="post">
                <label>
                    Username: <input type="text" name="username" required>
                </label><br>
                <label>
                    Password: <input type="password" name="password" required>
                </label><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>