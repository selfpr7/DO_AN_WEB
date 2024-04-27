<style>
.Add-Color {
    width: 40%;
    margin: 5% 0% 0% 30%;
}

button {
    height: 30px;
    width: 150px;
    border-radius: 5px;
}

td {
    align-items: center;
}

.Button {
    display: flex;
    justify-content: space-around;
}
</style>
<form action="" id="Add" method="get">
    <center><?php echo isset($_SESSION['Color_error'])?$_SESSION['Color_error']:'';?></center>
    <table class="Add-Color">
        <tr>
            <td>Nhập màu</td>
            <td><input type="text" name="txtColorname" id=""></td>
        </tr>

        <input type="hidden" name="txtColorstatus" value=1>
        <input type="hidden" name="controller" value="Color">
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