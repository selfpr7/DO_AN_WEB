<style>
.Add-Supplier {
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
<form action="" id="Add" method="get">
    <center><?php echo isset($_SESSION['Supplier_error'])?$_SESSION['Supplier_error']:'';?></center>
    <table class="Add-Supplier">
        <tr>
            <td>Nhập tên nhà cung cấp</td>
            <td><input type="text" name="txtSname" id=""></td>
        </tr>
        <tr>
            <td>Nhập địa chỉ</td>
            <td><input type="text" name="txtSaddress" id=""></td>
        </tr>
        <tr>
            <td>Nhập số điện thoại</td>
            <td><input type="text" name="txtSphone" id=""></td>
        </tr>
        <tr>
            <td>Nhập mã số thuế</td>
            <td><input type="text" name="txtStax" id=""></td>
        </tr>
        <input type="hidden" name="txtSstatus" value=1>
        <input type="hidden" name="controller" value="Supplier">
        <input type="hidden" name="action" value="add">
        <tr>
            <td colspan=2>
                <div class="Button">
                    <button type="submit">Thêm mới</button>
                    <button type="reset">Làm lại</button>
                </div>

            </td>
        </tr>
    </table>
</form>