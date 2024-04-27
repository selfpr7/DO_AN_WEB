<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
form {
    height: 500px;
    width: 300px;
    background-color: aqua;
    border-radius: 20px;
    text-align: center;
}

table {
    margin: 10px 20px;
    width: 260px;
    height: 480px;

}

input a button {
    height: 30px;
    width: 100%;
}

input {
    border-color: black;
    border-bottom: 1px;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-style: solid;
}
</style>

<body>
    <form action="" method="get">
        <table>
            <tr>
                <td>
                    <h1>Đăng nhập</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="Controller" value="User">
                    <input type="text" name="txtUsername" id="" placeholder="Username">
                </td>
            </tr>
            <tr>

                <td>
                    <input type="hidden" name="action" value="login">
                    <input type="text" name="txtPassword" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td><a href="Register.php">Đăng ký tài khoản</a></td>
            </tr>
            <input type="hidden" name="txtLevel" value="1">
            <tr>
                <td> <button type="submit">Đăng nhập</button></td>
            </tr>
        </table>
    </form>

</body>

</html>