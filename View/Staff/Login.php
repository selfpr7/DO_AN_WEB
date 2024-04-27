<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/Staff/register_login_style.css">
    <title>Document</title>
</head>



<body>

    <body>
        <header class="header">
            <a href="../DO_AN_WEB/index.php" class="logo">
                <i class='bx bxs-home-alt-2'></i>Home
            </a>
            <nav class="nav">
                <a href="../DO_AN_WEB/index.php?controller=Staff&action=Login">Login</a>
                <a href="../DO_AN_WEB/index.php?controller=Staff&action=Register">Register</a>
            </nav>
        </header>
        <section class="Container">
            <div class="wrapper">
                <form action="" method="get">
                    <h1>Login</h1>
                    <div class="flash">
                        <?php

                        $_SESSION['register_error'] = "";

                        echo "<tr><td>" . (isset($_SESSION['login_error']) ? $_SESSION['login_error'] : "") . "</td></tr>";
                        ?>
                    </div>

                    <div class="input-box">
                        <input type="hidden" name="controller" value="Staff">
                        <input type="text" name="txtUsername" id="" placeholder="Username">
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="hidden" name="action" value="checkLogin">
                        <input type="password" name="txtPassword" placeholder="Password">
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="remember">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button class="btn" type="submit">Login</button>
                    <div class="register-link">
                        <p>Don't have an account?
                            <a href="../DO_AN_WEB/index.php?controller=Staff&action=Register">Register</a>
                        </p>
                    </div>
                    <input type="hidden" name="txtLevel" value="1">
                </form>
            </div>
        </section>
    </body>

</html>