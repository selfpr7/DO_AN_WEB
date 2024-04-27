<style>
.Edit-Supplier {
    width: 40%;
    margin: 5% 0% 0% 30%;
}

button {
    height: 30px;
    width: 150px;
    border-radius: 5px;
}

.Button {
    display: flex;
    justify-content: space-around;
}
</style>
<form action="" id="Edit" method="get">
    <center><?php echo isset($_SESSION['supplier_edit_error'])?$_SESSION['supplier_edit_error']:'';?></center>
    <table class="Edit-Supplier">
        <tr>
            <td>Nhà cung cấp</td>
            <td><input type="text" name="txtSname" value="<?php echo $supplierEdit['sname']?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="txtSaddress" value="<?php echo $supplierEdit['saddress']?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type=" text" name="txtSphone" value="<?php echo $supplierEdit['sphone']?>"></td>
        </tr>
        <tr>
            <td>Mã số thuế</td>
            <td><input type=" text" name="txtStax" value="<?php echo $supplierEdit['stax']?>"></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <div class="status">
                    <input type="radio" name="txtSstatus" id="" value=1
                        <?php if($supplierEdit['sstatus']==1) echo 'checked'?>>Đang họat động
                </div>
                <div class="status">
                    <input type="radio" name="txtSstatus" id="" value=0
                        <?php if($supplierEdit['sstatus']==0) echo 'checked'?>>Ngưng họat động
                </div>

            </td>
        </tr>
        <input type="hidden" name="sid" value="<?php echo $supplierEdit['sid']?>">
        <input type="hidden" name="controller" value="Supplier">
        <input type="hidden" name="action" value="edit">
        <tr>
            <td colspan=2>
                <div class="Button">
                    <button type="submit">Chỉnh sửa</button>
                    <button type="reset">Làm lại</button>
                </div>

            </td>
        </tr>
    </table>
</form>