<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.user-content {
    width: 25%;
    display: inline-block;
    margin-left: 10%;
    margin-top: 30px;
    background-color: white;
    list-style: none;
    border-radius: 10px;
    float: left;
}

.container_user {
    background-color: rgb(215, 211, 211);
    height: 100%;
    width: 100%;
    border-radius: 10px;
}


.user-content li:hover {
    background-color: rgb(236, 135, 135);
    cursor: pointer;
}

.content_show {
    margin-top: 30px;
    width: 55%;
    height: 550px;
    float: left;
}

.frmInfoUser,
.frmEdit {
    height: 100%;
    width: 60%;
    margin: 0% 20% 10% 20%;
    background-color: white;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
}

.frmInfoUser p {
    margin-left: 20px;
}

.frmEdit p {
    margin-left: 20px;

}

.User-Name,
.Address,
.Gender,
.Phone,
.Email {
    margin: 20px;
}

.btn {
    height: 25px;
    width: 100%;
    display: flex;
    justify-content: space-around;
    margin: 20px 0px 20px 0px;
}

.btn button {
    width: 30%;
    height: 100%;
    color: white;
    background-color: gray;
    border-radius: 5px;
    border: 0;
    cursor: pointer;
}

.Gender span {
    margin-right: 20px;
}

.Title {
    font-size: 20px;
}
</style>


<html>

<body>
    <?php
    require_once("View/Home/Header.php");
    require_once("View/Home/Menu.php");
    ?>
    <div class="container_user">
        <ul class="user-content">
            <li style="border-radius:10px 10px 0px 0px;">
                <p style="margin-left: 20px;"><a href="../DO_AN_WEB/index.php?controller=Order"
                        style="color: black;">Đơn hàng của tôi</a></p>
            </li>
            <li>
                <a style="margin-left: 20px;color:black;"
                    href="../DO_AN_WEB/index.php?controller=User&action=view&sub-action=profile">Thông
                    tin cá nhân</a>
            </li>
            <li>
                <a style="margin-left: 20px;color:black;"
                    href="../DO_AN_WEB/index.php?controller=User&action=view&sub-action=edit">Cập nhật thông tin
                    cá
                    nhân</a>
            </li>
            <li style="border-radius:0px 0px 10px 10px;">
                <a style="margin-left: 20px;color:black;" href="../DO_AN_WEB/index.php">Đăng xuất</a>
        </ul>
        <div class="content_show">

            <?php
                if(isset($_REQUEST['sub-action'])&&$_REQUEST['sub-action']=='profile'){
                    require_once("View/User/profile.php");
                }
                else if(isset($_REQUEST['sub-action'])&&$_REQUEST['sub-action']=='edit'){
                    require_once("View/User/edit_user.php");
                }
                else{
                    require_once("View/User/profile.php");
                }
            ?>
        </div>
    </div>

</body>

</html>