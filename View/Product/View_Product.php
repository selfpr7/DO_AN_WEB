<?php
require("View/ManageProgram/Home.php");
?>
<style>
.List-Product {}

img {
    width: 100px;
}

.Menu-item {
    list-style: none;
    display: flex;
    width: 100%;
    justify-content: space-around;
}

#Menu {
    background-color: black;
    height: 50px;
    line-height: 50px;
    width: 100%;
    margin: 5% 0% 5% 0%;
}

table {
    width: 100%;
}

.frmAddProduct,
.frmEditProduct {
    float: left;
    width: 40%;
    border-radius: 10px;
    margin: 20px 30% 20px 30%;
    height: 200px;
    background-color: white;
}

.title-product {
    width: 40%;
}

.btnAction {
    height: 30px;
    width: 100px;
    margin: 20px;
    float: right;
}

.btnReset {
    height: 30px;
    width: 100px;
    margin: 20px;
    float: left;
}

.pages {
    margin: 20px;
    display: flex;
    justify-content: center;
}

.page-item {
    width: 50px;
    height: 30px;
    background-color: #CBD1D6;
    margin: 5px;
    border-radius: 5px;
    text-align: center;
    line-height: 30px;
    text-decoration: none;
}
</style>
<div class="Content">
    <div id="Menu">
        <ul class="Menu-item">
            <li>
                <a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product"
                    style="color:white;">Toàn bộ sản phẩm</a>
            </li>
            <?php
            foreach ($Categories as $value) {
            ?>
            <li>
                <a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&cid=<?php echo $value['cid']?>"
                    style="color:white"><?php echo $value['cname']?></a>
            </li>
            <?php   
            }
            ?>
        </ul>
    </div>
    <div class="QuantityProduct">
        <center>Có tổng cộng: <?= $product->getNumrow($cid)?> sản phẩm</center>
    </div>

</div>
<form action="" method="post" style="float: left;width:100%;text-align:center">
    <input type="hidden" name="controller" value="ManageProgram">
    <input type="hidden" name="action" value="Manage-Product">
    <input type="hidden" name="sub-action" value="add">
    <button type="submit" style="margin:20px">Thêm mới sản phẩm</button>
</form>
<?php
if(isset($_REQUEST['sub-action'])&&$_REQUEST['sub-action']=="add"){
    require_once('View/Product/add_product.php');
    $_SESSION['Product_add_error']="";
}
if(isset($_REQUEST['sub-action'])&&$_REQUEST['sub-action']=="edit"){
    require_once('View/Product/edit_product.php');
    $_SESSION['product_edit_error']="";
}
?>

<?php
if($product->getNumrow($cid)>0){
?>
<table border="1" Cellpadding="0" cellspacing="0">
    <tr>
        <th colspan="14">
            <center><strong>Danh sách sản phẩm</strong></center>
        </th>
    </tr>
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Nhà cung cấp</th>
        <th>Màu sắc</th>
        <th>Bộ nhớ</th>
        <th>Giảm giá</th>
        <th>Trạng thái</th>
        <th colspan="2">Thao tác</th>
    </tr>
    <?php foreach($Product as $value){
            ?>
    <tr>
        <td><?php echo $value['pid']?></td>
        <td><?php echo $value['pname']?></td>
        <td><img src="View/Images/<?php echo $value['pimage']?>" alt=""></td>
        <td><?php echo $value['pdesc']?></td>
        <td><?php echo $value['pprice']?></td>
        <td><?php echo $value['pquantity']?></td>
        <td><?php echo $value['cid']?></td>
        <td><?php echo $value['sid']?></td>
        <td><?php echo $value['colorid']?></td>
        <td><?php echo $value['configid']?></td>
        <td><?php echo $value['pdiscount']."%"?></td>
        <td><?php echo $value['pstatus']?></td>
        <td><a
                href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=edit&pid=<?php echo $value['pid']?>">Sửa</a>
        </td>
        <td><a href="../DO_AN_WEB/index.php?controller=Product&action=delete&pid=<?php echo $value['pid']?>">Xóa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
    echo "<div class='pages'>";
    for ($i=1; $i <= $num_page; $i++) { 
        if($i==$page){
            echo "<div class='page-item' style='color:white'>$i</div>";
        }
        else{
            echo "<a href='../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&cid=$cid&page=$i' class='page-item'>$i</a>";
        }
    }
    echo "</div>"
    ?>
<?php
}
else{
    ?>
<div style="width: 100%;height:200px; border-radius:10px; background-color:white;float:left;margin-top:20px">
    <p style="text-align:center;font-size:20px; margin:20px">Danh sách sản phẩm đang rỗng</p>
</div>
<?php
}
?>