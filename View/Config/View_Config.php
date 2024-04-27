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
    width: 200px;
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
            <h1>Danh sách cấu hình</h1>
        </center>
        <center><?php echo isset($_SESSION['config_delete_error'])?$_SESSION['config_delete_error']:"";?></center>
        <table class="Manage-Color">
            <tr>
                <th>Mã cấu hình</th>
                <th>Dung lượng RAM</th>
                <th>Dung lượng ROM</th>
                <th>Trạng thái</th>
                <th>Xóa</th>
                <th>Chỉnh Sửa</th>
            </tr>
            <?php
    if($datas!=null){
        foreach ($datas as $value) {
            echo '<tr>';
            echo '<td>'.$value['configid'].'</td>';
            echo '<td>'.$value['configram'].'</td>';
            echo '<td>'.$value['configrom'].'</td>';
            if($value['configstatus']==1){
                echo '<td>Đang hoạt động</td>';
            }
            else{
                echo '<td>Ngưng hoạt động</td>';
            }
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=Config&action=delete&configid='.$value['configid'].'">Delete</a></td>';
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Config&sub-action=edit&configid='.$value['configid'].'">Edit</a></td>';
            echo '</tr>';
        }


    }
       ?>
        </table>
    </form>
    <form action="" style="text-align: center; margin:20px">
        <input type="hidden" name="controller" value=ManageProgram>
        <input type="hidden" name="action" value="Manage-Config">
        <input type="hidden" name="sub-action" value="add">
        <tr>
            <button class="add" type="submit">Thêm mới cấu hình</button>
        </tr>
    </form>
</div>
<?php
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="add"){
    require_once('View/Config/add_config.php');
    $_SESSION['config_add_error']="";
}
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="edit"){
    require_once('View/Config/Edit_config.php');
    $_SESSION['config_edit_error']="";
}
?>