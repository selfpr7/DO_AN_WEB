<style>
.Edit-Config {
    width: 40%;
    margin: 5% 0% 0% 30%;
}

button {
    height: 30px;
    width: 200px;
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
    <center><?php echo isset($_SESSION['config_edit_error'])?$_SESSION['config_edit_error']:'';?></center>
    <table class="Edit-Config">
        <tr>
            <td style="text-align:center">Dung lượng RAM</td>
            <td><input type="text" name="txtConfigram" value="<?php echo $configEdit['configram']?>"></td>
        </tr>
        <tr>
            <td style="text-align:center">Dung lượng ROM</td>
            <td><input type="text" name="txtConfigrom" value="<?php echo $configEdit['configrom']?>"></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <div class="status">
                    <input type="radio" name="txtConfigstatus" id="" value=1
                        <?php if($configEdit['configstatus']==1) echo 'checked'?>>Đang họat động
                </div>
                <div class="status">
                    <input type="radio" name="txtConfigstatus" id="" value=0
                        <?php if($configEdit['configstatus']==0) echo 'checked'?>>Ngưng họat động
                </div>

            </td>
        </tr>
        <input type="hidden" name="configid" value="<?php echo $configEdit['configid']?>">
        <input type="hidden" name="controller" value="Config">
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