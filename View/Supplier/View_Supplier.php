<style>
.Manage-Supplier {
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
}

.action {
    color: black;
    text-decoration: none;
}

.action:hover {
    color: brown;
    text-decoration: underline;
}
</style>
<?php
require("View/ManageProgram/Home.php");
?>
<div class="Content">
    <form action="" method="post">
        <center><Strong>Danh sách các danh mục sản phẩm</Strong></center>
        <center><?php echo isset($_SESSION['supplier_delete_error'])?$_SESSION['supplier_delete_error']:"";?></center>
        <table class="Manage-Supplier">
            <tr>
                <th>Mã nhà cung cấp</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tax</th>
                <th>Trạng thái</th>
                <th>Xóa</th>
                <th>Chỉnh Sửa</th>
            </tr>
            <?php
    if($datas!=null){
        foreach ($datas as $value) {
            echo '<tr>';
            echo '<td>'.$value['sid'].'</td>';
            echo '<td>'.$value['sname'].'</td>';
            echo '<td>'.$value['saddress'].'</td>';
            echo '<td>'.$value['sphone'].'</td>';
            echo '<td>'.$value['stax'].'</td>';

            if($value['sstatus']==1){
                echo '<td>Đang hoạt động</td>';
            }
            else{
                echo '<td>Ngưng hoạt động</td>';
            }
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=Supplier&action=delete&sid='.$value['sid'].'">Delete</a></td>';
            echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Supplier&sub-action=edit&sid='.$value['sid'].'">Edit</a></td>';
            echo '</tr>';
        }


    }
       ?>
        </table>
    </form>
    <form action="" style="text-align: center; margin:20px">
        <input type="hidden" name="controller" value=ManageProgram>
        <input type="hidden" name="action" value="Manage-Supplier">
        <input type="hidden" name="sub-action" value="add">
        <tr>
            <td> <input type="submit" value="Thêm mới 1 nhà cung cấp"></td>
        </tr>
    </form>
</div>
<?php
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="add"){
    require_once('View/Supplier/add_supplier.php');
    $_SESSION['supplier_add_error']="";
}
if(isset($_GET['sub-action'])&&$_GET['sub-action']=="edit"){
    require_once('View/Supplier/Edit_supplier.php');
    $_SESSION['supplier_edit_error']="";
}
?>