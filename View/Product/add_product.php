<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="controller" value="Product">
    <input type="hidden" name="action" value="add">
    <table class="frmAddProduct">
        <tr>
            <td colspan=2>
                <center>Thêm mới sản phẩm</center>
                <center style="color: red;">
                    <?php echo isset($_SESSION['Product_add_error'])?$_SESSION['Product_add_error']:""; ?></center>
            </td>
        </tr>
        <tr>
            <td class="title-product">Tên sản phẩm</td>
            <td><input type="text" name="txtPname" id=""></td>
        </tr>
        <tr>
            <td class="title-product">Mô tả: </td>
            <td><input type="text" name="txtPdesc" id=""></td>
        </tr>
        <tr>
            <td class="title-product">Hình ảnh</td>
            <td>
                <input type="file" name="image" id="">
            </td>
        </tr>
        <tr>
            <td class="title-product">Giá sản phẩm</td>
            <td><input type="text" name="txtPprice"></td>
        </tr>
        <tr>
            <td class="title-product">Số lượng</td>
            <td><input type="number" name="txtPquantity" id=""></td>
        </tr>
        <tr>
            <td class="title-product">Nhà cung cấp</td>
            <td>
                <select name="sltSupplier" id="">
                    <?php 
                    $Suppliers=$supplier->getListSupplier();
                    foreach ($Suppliers as $value) {
                        echo '<option value="'.$value["sid"].'">'.$value["sname"].'</option>';
                    }            
                ?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="title-product">Danh mục</td>
            <td>
                <select name="sltCategories" id="">
                    <?php 
                    $Categories=$categories->getListCategories();
                    foreach ($Categories as $value) {
                        echo '<option value="'.$value['cid'].'">'.$value['cname'].'</option>';
                    }
                    
                ?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="title-product">Màu sắc</td>
            <td>
                <select name="sltColor" id="">
                    <?php 
                $Color=$color->getListColor();
                foreach ($Color as $value) {
                    echo '<option value="'.$value['colorid'].'">'.$value['colorname'].'</option>';
                }
                    
                ?>

                </select>
            </td>
        </tr>
        <tr>
            <td class="title-product">Bộ nhớ</td>
            <td>
                <select name="sltConfig" id="">
                    <?php 
                    $Config=$config->getListConfig();
                
                    foreach ($Config as $value) {
                        echo '<option value="'.$value['configid'].'">'.$value['configram'].'-'.$value['configrom'].'</option>';
                    }
                    
                ?>
                </select>



            </td>
        </tr>
        <tr>
            <td class="title-product">Giảm giá</td>
            <td><input type="number" name="txtPdiscount" id=""></td>
        </tr>
        <tr>
            <td>
                <button type="submit" class="btnAction">Thêm</button>
            </td>
            <td>
                <button type="reset" class="btnReset">Làm lại</button>

            </td>
        </tr>

    </table>
</form>