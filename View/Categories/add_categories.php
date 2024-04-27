<style>
.Add-Categories {
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
<form action="" id="Add" method="post" enctype="multipart/form-data">
    <center style="margin:20px">
        <h1>Thêm mới một danh mục</h1>
    </center>
    <table class="Add-Categories">
        <tr>
            <td>Nhập tên danh mục</td>
            <td><input type="text" name="txtCname" id=""></td>
        </tr>
        <tr>
            <td>Chọn 1 hình ảnh</td>
            <td><input type="file" name="image" id=""></td>
        </tr>
        <tr>
            <td>Nhập mô tả</td>
            <td><input type=text style="width:100%; height: 100px" value="" name=txtCdesc></td>
        </tr>
        <input type="hidden" name="txtCstatus" value=1>
        <input type="hidden" name="controller" value="Categories">
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