<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="Product">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="txtpid" value="<?=$ProductEdit['pid']?>">
    <table class="frmEditProduct">

        <tr>
            <td colspan=2>
                <center>Chỉnh sửa thông tin sản phẩm</center>
                <center><?php echo isset($_SESSION['Product_edit_error'])?$_SESSION['Product_edit_error']:"" ?></center>
            </td>
        </tr>
        <tr>
            <td class="title-product">Tên sản phẩm</td>
            <td><input type="text" name="txtPname" id="" value="<?php echo $ProductEdit['pname']?>"></td>
        </tr>
        <tr>
            <td class="title-product">Mô tả: </td>
            <td><textarea name="txtPdesc" id="" cols="30" rows="5"><?php echo $ProductEdit['pdesc']?></textarea></td>
        </tr>
        <tr>
            <td class="title-product">Hình ảnh</td>
            <td><input type="file" name="image" id=""></td>
        </tr>
        <tr>
            <td class="title-product">Giá sản phẩm</td>
            <td><input type="text" name="txtPprice" value="<?php echo $ProductEdit['pprice']?>"></td>
        </tr>
        <tr>
            <td class="title-product">Số lượng</td>
            <td><input type="number" name="txtPquantity" id="" value="<?php echo $ProductEdit['pquantity']?>"></td>
        </tr>
        <tr>
            <td class="title-product">Nhà cung cấp</td>
            <td>
                <select name="sltSupplier" id="">
                    <?php 
                    $Suppliers=$supplier->getListSupplier();
                    foreach ($Suppliers as $value) {                   
                        if($value['sid']==$ProductEdit['sid']){
                            echo '<option selected value="'.$value["sid"].'">'.$value["sname"].'</option>';
                        }
                        else{
                            echo '<option value="'.$value["sid"].'">'.$value["sname"].'</option>';

                        }                    
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
                        if($value['cid']==$ProductEdit['cid']){
                            echo '<option selected value="'.$value["cid"].'">'.$value["cname"].'</option>';
                        }
                        else{
                            echo '<option value="'.$value["cid"].'">'.$value["cname"].'</option>';

                        }                        }
                    
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
                    if($value['colorid']==$ProductEdit['colorid']){
                        echo '<option selected value="'.$value["colorid"].'">'.$value["colorname"].'</option>';
                    }
                    else{
                        echo '<option value="'.$value["colorid"].'">'.$value["colorname"].'</option>';

                    }                    }                  
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
                        if($value['configid']==$ProductEdit['configid']){
                            echo '<option selected value="'.$value["configid"].'">'.$value["configram"].'-'.$value['configrom'].'</option>';
                        }
                        else{
                            echo '<option value="'.$value["sid"].'">'.$value["configram"].'-'.$value['configrom'].'</option>';

                        }                        }
                    
                ?>
                </select>



            </td>
        </tr>
        <tr>
            <td class="title-product">Giảm giá</td>
            <td><input type="number" name="txtPdiscount" id="" value="<?php echo $ProductEdit['pdiscount']?>"></td>
        </tr>
        <tr>
            <td class="title-product">Trạng thái</td>
            <td>
                <div class="status">
                    <input type="radio" name="txtPstatus" id="" value=1
                        <?php if($ProductEdit['pstatus']==1) echo 'checked'?>>Đang họat động
                </div>
                <div class="status">
                    <input type="radio" name="txtPstatus" id="" value=0
                        <?php if($ProductEdit['pstatus']==0) echo 'checked'?>>Ngưng họat động
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" class="btnAction">Sửa</button>
            </td>
            <td><button type="reset" class="btnReset">Làm lại</button></td>
        </tr>

    </table>
</form>