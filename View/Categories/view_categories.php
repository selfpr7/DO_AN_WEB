<?php
    require("View/ManageProgram/Home.php");
    ?>
<style>
.Manage-Categories {
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
    height: 50px;
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

.categories-images {
    height: 150px;
    width: 100%;
}
</style>
<div class="Content">
    <center>
        <h1>Danh sách các danh mục sản phẩm</h1>
    </center>
    <center><?php echo isset($_SESSION['Categories_add_error'])?$_SESSION['Categories_add_error']:'';?></center>
    <form action="" method="post">
        <table class="Manage-Categories">
            <tr>
                <th>Mã Danh Mục</th>
                <th>Tên Danh Mục</th>
                <th>Hình ảnh</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Xóa</th>
                <th>Chỉnh Sửa</th>
            </tr>
            </tr>
            <?php foreach($datas as $value){
                        ?>
            <tr>
                <td><?php echo $value['cid']?></td>
                <td><?php echo $value['cname']?></td>
                <td><img style="width:100%; height:180px;" src="View/Images/<?php echo $value['cimage']?>" alt=""></td>
                <td style="text-align:left"><?php echo $value['cdesc']?></td>
                <?php
                                if($value['cstatus']==1){
                                    echo '<td>Đang hoạt động</td>';
                                }
                                else{
                                    echo '<td>Ngưng hoạt động</td>';
                                }?>
                <?php
                        echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=Categories&action=delete&cid='.$value['cid'].'">Delete</a></td>';
                        echo '<td style="text-align:center"><a class="action" href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Categories&sub-action=edit&cid='.$value['cid'].'">Edit</a></td>';
            ?>
            </tr>
            <?php 
        }
        ?>
        </table>
    </form>
    <form action="" style="text-align: center; margin:20px">
        <input type="hidden" name="controller" value=ManageProgram>
        <input type="hidden" name="action" value="Manage-Categories">
        <input type="hidden" name="sub-action" value="add">
        <tr>
            <td> <button style="height: 50px" ;class="Add" type="submit">Thêm mới danh mục</button>
        </tr>
    </form>
</div>
<?php
    if(isset($_GET['sub-action'])&&$_GET['sub-action']=="add"){
        require_once('View/Categories/add_categories.php');
        $_SESSION['categories_add_error']="";
    }
    if(isset($_GET['sub-action'])&&$_GET['sub-action']=="edit"){
        require_once('View/Categories/edit_categories.php');
        $_SESSION['categories_edit_error']="";
    }
    ?>