<?php
    require("View/ManageProgram/Home.php");
?>
<style>
.frmInfoUser {
    height: 300px;
    width: 40%;
    margin: 0px 30% 0px 30%;
}
</style>
<div class="Content">
    <form action="" method="post">
        <table class="frmInfoUser">
            <tr>
                <td>
                    <center>Thông tin cá nhân</center>
                </td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><?php echo $InfoUser['ufullname']?></td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><?php echo $InfoUser['uusername']?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?php echo $InfoUser['uaddress']?></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><?php echo $InfoUser['ubirthyear']?></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <?php
                        if($InfoUser['ugender']==0){
                            echo "Nam";
                        }
                        else if($InfoUser['ugender']==1){
                            echo 'Nữ';
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo $InfoUser['uphone']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $InfoUser['uemail']?></td>
            </tr>
        </table>
    </form>
</div>