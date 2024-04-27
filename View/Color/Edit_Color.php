<style>
.Edit-Color {
    width: 40%;
    margin: 5% 0% 0% 30%;
}

button {
    height: 30px;
    width: 150px;
    border-radius: 5px;
    border: solid;
    border-width: 1px;
}

td {
    text-align: center;
}

.Button {
    display: flex;
    justify-content: space-around;
    cursor: pointer;
}
</style>
<form action="" id="Edit" method="get">
    <center><?php echo isset($_SESSION['color_edit_error'])?$_SESSION['color_edit_error']:'';?></center>
    <table class="Edit-Color">
        <tr>
            <td style="text-align:center">Màu sắc</td>
            <td><input type="text" name="txtColorname" value="<?php echo $colorEdit['colorname']?>"></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <div class="status">
                    <input type="radio" name="txtColorstatus" id="" value=1
                        <?php if($colorEdit['colorstatus']==1) echo 'checked'?>>Đang họat động
                </div>
                <div class="status">
                    <input type="radio" name="txtColorstatus" id="" value=0
                        <?php if($colorEdit['colorstatus']==0) echo 'checked'?>>Ngưng họat động
                </div>

            </td>
        </tr>
        <input type="hidden" name="colorid" value="<?php echo $colorEdit['colorid']?>">
        <input type="hidden" name="controller" value="Color">
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