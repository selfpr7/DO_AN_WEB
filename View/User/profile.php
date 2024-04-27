<style>
</style>
<div class="frmInfoUser">


    <div class="Title">
        <center style="margin: 30px 0px 30px 0px;">Thông tin cá nhân</center>
    </div>
    <div class="User-Name">
        <p>Họ tên: <?php echo $InfoUser['ufullname'];?></p>
    </div>
    <div class="Address">
        <p>Địa chỉ: <?php echo $InfoUser['uaddress']?></p>
    </div>
    <div class="Gender">
        <p>Giới tính: <?php 
        if($InfoUser['ugender']==0){
            echo "Nam";
        }
        if($InfoUser['ugender']==1){
            echo "Nữ";
        }
        if($InfoUser['ugender']==2){
            echo "Khác";
        }
    ?></p>
    </div>
    <div class="Phone">
        <p>Số điện thoại: <?php echo $InfoUser['uphone']?></p>
    </div>
    <div class="Email">
        <p>Email: <?php echo $InfoUser['uemail']?></p>
    </div>

</div>