<style>
.Manage-Color {
    height: auto;
    width: 96%;
    margin: 2%;
    border-radius: 10px;
}

th,
td {
    border: 1px solid black;
    width: 12%;
    height: 60px;
    text-align: center;
}

.action {
    color: black;
    text-decoration: none;
}

.action:hover {
    color: brown;
    text-decoration: underline;
}

button {
    height: 30px;
    width: 150px;
    border-radius: 5px;
    border: solid;
    border-width: 1px;
    cursor: pointer;
}

.add {
    padding: 10px 20px 30px 20px;
    cursor: pointer;
}
</style>
<?php
require("View/ManageProgram/Home.php");
?>
<div class="Content">
    <form action="" method="post">
        <center>
            <h1>Danh sách màu</h1>
        </center>
        <center><?php echo isset($_SESSION['color_delete_error'])?$_SESSION['color_delete_error']:"";?></center>
        <table class="Manage-Color">
            <tr>
                <th>Mã màu</th>
                <th>Màu</th>
                <th>Trạng thái</th>
                <th>Xóa</th>
                <th>Chỉnh Sửa</th>
            </tr>
            <?php
    if($datas!=null){
        foreach ($datas as $value) {
            echo '<tr>';
            echo '<td>'.$value['colorid'].'</td>';
            echo '<td>'.$value['colorname'].'</td>';

            if($value['colorstatus']==1){
                echo '<td>Đang hoạt động</td>';
            }
            else{
                echo '<td>Ngưng hoạt động</td>';
            }
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=Color&action=delete&colorid='.$value['colorid'].'">Delete</a></td>';
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Color&sub-action=edit&colorid='.$value['colorid'].'">Edit</a></td>';
            echo '</tr>';
        }


    }
       ?>
        </table>
    </form>
    <form action="" style="text-align: center; margin:20px">
        <input type="hidden" name="controller" value=ManageProgram>
        <input type="hidden" name="action" value="Manage-Color">
        <input type="hidden" name="sub-action" value="add">
        <tr>
            <button class="add" type="submit">Thêm mới màu</button>
        </tr>
    </form>
</div>
<?php
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="add"){
    require_once('View/Color/add_color.php');
    $_SESSION['color_add_error']="";
}
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="edit"){
    require_once('View/Color/Edit_color.php');
    $_SESSION['color_edit_error']="";
}
?>