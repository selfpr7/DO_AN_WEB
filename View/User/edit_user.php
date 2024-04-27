<form action="" method="get" class="frmEdit">
    <center>Cập nhật thông tin</center>
    <input type="hidden" name="controller" value="User">
    <input type="hidden" name="action" value='edit'>
    <input type="hidden" name="uid" value='<?php echo $InfoUser['uid']?>'>
    <p>Họ tên: </p>
    <input type="text" name="txtFullname" value="<?php echo $InfoUser['ufullname'];?>" class="User-Name">
    <p>Địa chỉ</p>
    <textarea name="txtAddress" class="Address" cols="50" rows="2"><?php echo $InfoUser['uaddress'];?></textarea>
    <p>Email</p>
    <input type="text" name="txtEmail" class="Email" value="<?php echo $InfoUser['uemail'];?>">
    <p>Số điện thoại</p>
    <input type="text" name="txtPhone" class="Phone" value="<?php echo $InfoUser['uphone'];?>">
    <p>Giới tính</p>
    <div class="Gender">
        <input type="radio" name="radGender" id="" value="0" <?php
            if($InfoUser['ugender']==0){
                echo "checked";
            }
        ?>><span>Nam</span>
        <input type="radio" name="radGender" id="" value="1" <?php
            if($InfoUser['ugender']==1){
                echo "checked";
            }
        ?>><span>Nữ</span>
        <input type="radio" name="radGender" id="" value="1" <?php
            if($InfoUser['ugender']==2){
                echo "checked";
            }
        ?>><span>Khác</span>
    </div>
    <div class="btn">
        <button type="reset">Hủy bỏ</button>
        <button type="submit" style="background-color:#086CFA">Cập nhật</button>
    </div>
</form>