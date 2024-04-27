<style>
.Edit-Categories {
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
<form action="" id="Edit" method="post" enctype="multipart/form-data">
    <center><?php echo isset($_SESSION['categories_edit_error'])?$_SESSION['categories_edit_error']:'';?></center>
    <table class="Edit-Categories">
        <tr>
            <td style="text-align:center">Tên danh mục</td>
            <td><input type="text" name="txtCname" value="<?php echo $categoriesEdit['cname']?>"></td>
        </tr>
        <tr>
            <td>Chọn 1 hình ảnh</td>
            <td><input type="file" name="image" id=""></td>
        </tr>
        <tr>
            <td>Nhập mô tả</td>
            <td><input type=text style="width:100%; height: 100px" value="" name=txtCdesc></td>

        </tr>

        <tr>
            <td>Trạng thái</td>
            <td>
                <div class="status">
                    <input type="radio" name="txtCstatus" id="" value=1
                        <?php if($categoriesEdit['cstatus']==1) echo 'checked'?>>Đang họat động
                </div>
                <div class="status">
                    <input type="radio" name="txtCstatus" id="" value=0
                        <?php if($categoriesEdit['cstatus']==0) echo 'checked'?>>Ngưng họat động
                </div>

            </td>
        </tr>
        <input type="hidden" name="cid" value="<?php echo $categoriesEdit['cid']?>">
        <input type="hidden" name="controller" value="Categories">
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