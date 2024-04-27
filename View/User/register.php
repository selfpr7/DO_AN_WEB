<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/User/register_login_style.css">
    <title>Document</title>
</head>





<body>
    <header class="header">
        <a href="../DO_AN_WEB/index.php" class="logo">
            <i class='bx bxs-home-alt-2'></i>Home
        </a>
        <nav class="nav">
            <a href="../DO_AN_WEB/index.php?controller=User&action=login">Login</a>
            <a href="../DO_AN_WEB/index.php?controller=User&action=register">Register</a>
        </nav>
    </header>

    <section class="Container">
        <div class="wrapper">
            <form action="" method="get">
                <h1>Sign up</h1>
                <div class="flash">
                    <?php echo isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ''; ?></tr>
                </div>
                <div class="input-box">
                    <input type="text" name="txtFullname" id="" placeholder="Fullname">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="hidden" name="controller" value="User">
                    <input type="text" name="txtUsername" id="" placeholder="Username">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="txtEmail" id="" placeholder="Email">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="hidden" name="action" value="checkRegister">
                    <input type="password" name="txtPassword" placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="txtAddress" id="" placeholder="Address">
                    <i class='bx bxs-home-alt-2'></i>
                </div>
                <div class="input-box" style="margin-bottom: 10px;">
                    <input type="text" name="txtPhone" id="" placeholder="Phone">
                    <i class='bx bxs-phone'></i>
                </div>

                <div class="rad">
                    <input type="radio" name="radGender" id="" checked value=0 style="margin-right: 5px;">Nam
                    <input type="radio" name="radGender" id="" value=1 style="margin-right: 5px;">Nữ
                </div>

                <input type="hidden" name="txtLevel" value="2">


                <button type="submit" class="btn">Sign up</button>


            </form>
        </div>
    </section>
</body>

</html>