<?php
require("View/ManageProgram/Home.php");
?>
<style>
.frmInfoUser {
    height: 300px;
    width: 40%;
    margin: 0px 30% 0px 30%;
}

.Content button {
    height: 30px;
    width: 100px;
    border: 0;
    background-color: blue;
    border-radius: 5px;
    margin: 0px 10px 0px 10px;
    cursor: pointer;
}
</style>
<div class="Content">
    <form action="" method="POST">
        <input type="hidden" name="controller" value="Staff">
        <input type="hidden" name="action" value="Update">
        <table class="frmInfoUser">
            <tr>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="text" name="txtFullname" id="" value="<?php echo $InfoUser['ufullname']?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><textarea name="txtAddress" id="" cols="23" rows="3"><?php echo $InfoUser['uaddress']?></textarea>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><input type="date" name="dteBirthYear" id="" value="<?php echo $InfoUser['ubirthyear']?>"></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <input type="radio" name="radGender" id="" value="0"
                        <?php if($InfoUser['ugender']==0) echo "checked";?>>Nam
                    <input type="radio" name="radGender" id="" value="1" style="margin-left:20px"
                        <?php if($InfoUser['ugender']==1) echo "checked";?>>Nữ
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="text" name="txtPhone" id="" value="<?php echo $InfoUser['uphone']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txtEmail" id="" value="<?php echo $InfoUser['uemail']?>"></td>
            </tr>
            <tr>
                <td><button type="reset" style="float:right;background-color: #CBD1D6">Làm lại</button></td>
                <td><button type="submit">Cập nhật</button></td>
            </tr>
        </table>
    </form>
</div>