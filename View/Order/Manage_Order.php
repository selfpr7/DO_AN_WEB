<?php
require('View/ManageProgram/Home.php');
?>
<link rel="stylesheet" href="View/Order/style.css">
<div class="Content">
    <div class="Order_Title">
        <center>Danh sách đơn hàng</center>
    </div>
    <table class="Order_Menu">
        <tr>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order"
                    style="<?php if($ostatus=="") echo "color:purple;"?>">Toàn bộ đơn hàng</a></td>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=0"
                    style="<?php if($ostatus==0) echo "color:purple;"?>">Đơn hàng đang
                    giao</a>
            </td>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=1"
                    style="<?php if($ostatus==1) echo "color:purple;"?>">Đơn đã thanh toán</a></td>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=2"
                    style="<?php if($ostatus==2) echo "color:purple;"?>">Đơn hàng đã
                    giao</a></td>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=3"
                    style="<?php if($ostatus==3) echo "color:purple;"?>">Đơn hủy</a></td>
            <td><a href="../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=4"
                    style="<?php if($ostatus==4) echo "color:purple;"?>">Đơn hàng đã hoàn
                    thành</a></td>
        </tr>
    </table>

    <div class="Order_Quantity">
        <?php
                echo '<center>Có tổng cộng '.$quantity.' đơn hàng</center>'

        ?>

    </div>
</div>
<div class="Order_Content">
    <div class="List_Order">
        <?php
        foreach ($datas as $Order) {//danh sach cac don hang
            
            
            ?>
        <table class="Order_Detail">
            <tr>
                <td>Tên khách hàng:</td>
                <td class="InfoUser"><?php echo $Order['ufullname']?></td>
            </tr>
            <tr>
                <td>
                    Địa chỉ:
                </td>
                <td class="InfoUser">
                    <?php echo $Order['address']; ?>
                </td>
            </tr>
            <tr>
                <td>Phương thức thanh toán</td>
                <td class="InfoUser"><?php echo ($Order['payid']==1)?"Chuyển khoản":"Thanh toán khi nhận hàng" ?></td>
            </tr>
            <tr>
                <td>
                    Sản phẩm: <?php
                    $DetailOrders=$order->getInfoOrderDetail($Order['oid']);
                    echo " ".count( $DetailOrders);
                    ?>
                </td>
            </tr>
            <?php
                
                $price=0;
                foreach ($DetailOrders as $detailOrder) {
                    $Product=$product->getInfoProduct($detailOrder['pid']);
                    $price+=$detailOrder['price']*$detailOrder['quantity']*(100-$Product['pdiscount'])/100;
                    ?>
            <tr>

                <td>
                    <table class="InfoProduct">
                        <tr rowspan="3">
                            <td>
                                <img src="View/Images/<?php echo $Product['pimage']?>" class="Image">
                            </td>
                            <td style="width: 70%;">
                                <div class="NameProduct">
                                    <?php 
                                    $Config=$config->getConfig($Product['configid']);
                                    echo $Product['pname']." ".$Config['configram']." ".$Config['configrom'];
                                    ?>
                                </div>
                                <div class="QuantityProduct">
                                    <?php echo "x".$detailOrder['quantity']?>
                                </div>
                            </td>

                    </table>
                </td>
                <td class="Price-Product">

                    <?php
                    if($Product['pdiscount']>0){
                    echo "<p style='text-decoration: line-through;'>". number_format($Product['pprice'])."đ</p>";
                    echo "<p>".number_format($Product['pprice']*(100-$Product['pdiscount'])/100)."đ</p>";
                    }
                    else{
                    echo "<p>". number_format($Product['pprice'])."đ</p>";

                    }
                    ?>
                </td>
            </tr>
            <?php
            }?>
            <tr>

                <td colspan="2">
                    <form action="" method="post" class="frm">
                        <?php
                            if($ostatus==1||$ostatus==0){
                                echo '<input type="submit" value="Giao hàng thành công" style="height: 30px;
                                width: 200px;background-color: blue;border: 0;
                                border-radius: 5px;float:right;cursor:pointer;margin-right:10px;">';
                            }

                        ?>
                        <input type="hidden" name="controller" value="ManageProgram">
                        <input type="hidden" name="action" value="Update-Order-Status">
                        <input type="hidden" name="oid" value="<?php echo $Order['oid']?>">

                        <input type="hidden" name="ostatus" value="2">
                    </form>
                    <form action="" method="post" class="frm">
                        <?php
                            if($ostatus==0&&$Order['payid']==1){
                                echo '<input type="submit" value="Đã thanh toán" style="height: 30px;
                                width: 200px;background-color:#cb1c22 ;border: 0;
                                border-radius: 5px;float:right;cursor:pointer;margin-right:10px;">';
                            }

                        ?>
                        <input type="hidden" name="controller" value="ManageProgram">
                        <input type="hidden" name="action" value="Update-Order-Status">
                        <input type="hidden" name="oid" value="<?php echo $Order['oid']?>">
                        <input type="hidden" name="ostatus" value="1">
                    </form>
                </td>
            </tr>
        </table>
        <?php
                
        }?>
    </div>
    <div class='pages'>
        <?php
    
    for ($i=1; $i <= $num_page; $i++) { 
        if($i==$page){
            echo "<div class='page-item' style='color:white;background-color:gray;'>$i</div>";
        }
        else{
            echo "<a href='../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order&ostatus=$ostatus&page=$i' class='page-item'style='color:white'>$i</a>";
        }
    }
    
    ?>
    </div>
</div>