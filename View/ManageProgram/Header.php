<style>
.Header-Manage-Program {
    width: 80%;
    margin-left: 10%;
    height: 50px;
    display: flex;
    line-height: 50px;
    list-style: none;
    justify-content: space-around;
}

.Container-header {
    width: 100%;
    height: 50px;
    background-color: brown;
}

.Container-header ul li a {
    text-decoration: none;
    color: white;
}
</style>
<div class="Container-header">
    <ul class="Header-Manage-Program">
        <li><a href="../DO_AN_WEB/index.php?controller=Staff&action=View"
                style="<?php if((isset($_REQUEST['action'])&&$_REQUEST['action']=="View")||!isset($_REQUEST['action'])) echo "color:purple;"?>">Tài
                Khoản của tôi</a></li>
        <li><a href="../DO_AN_WEB/index.php?controller=Staff&action=Edit_View"
                style="<?php if(isset($_REQUEST['action'])&&$_REQUEST['action']=="Edit_View") echo "color:purple;"?>">Cập
                nhật thông tin cá nhân</a></li>
        <li><a href="../DO_AN_WEB/index.php?controller=Staff&action=UpdatePassword_View"
                style="<?php if(isset($_REQUEST['action'])&&$_REQUEST['action']=="UpdatePassword_View") echo "color:purple;"?>">Đổi
                mật khẩu</a></li>
        <li><a href="../DO_AN_WEB/index.php">Đăng xuất</a></li>
    </ul>

</div>