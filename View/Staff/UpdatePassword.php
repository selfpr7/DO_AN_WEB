<?php
require("View/ManageProgram/Home.php");
?>
<style>
.frmUpdatePass {
    height: 250px;
    width: 36%;

    margin: 20px 32% 20px 32%;
}

.Content button {
    height: 30px;
    width: 100px;
    border: 0;
    background-color: blue;
    border-radius: 5px;
    margin: 0px 10px 0px 10px;
}
</style>

<div class="Content">
    <form action="" method="get">
        <table class="frmUpdatePass">
            <tr>
                <td colspan="2">
                    <input type="hidden" name="controller" value="Staff">
                    <input type="hidden" name="action" value="UpdatePass">
                    <input type="hidden" name='uid' value=<?php echo $InfoUser['uid']?>>
                    <center style="font-size: 20px; color:blue;">Đổi mật khẩu</center>
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <center style="color: red;">
                        <?php echo isset($_SESSION['update_password_error'])?$_SESSION['update_password_error']:"" ?>
                    </center>
                </td>
            </tr>
            <tr>
                <td>Mật khẩu cũ</td>
                <td><input type="password" name="txtOldPass" id=""></td>
            </tr>
            <tr>
                <td>Mật khẩu mới</td>
                <td><input type="password" name="txtNewPass" id=""></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu mới</td>
                <td><input type="password" name="txtNewPass2" id=""></td>
            </tr>
            <tr>
                <td><button type="reset" style="float: right;background-color:#CBD1D6">Làm lại</button></td>

                <td><button type="submit" style="float: left;">Cập nhật</button></td>
            </tr>
        </table>
    </form>
</div>