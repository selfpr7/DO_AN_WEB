<?php
require_once("View/Home/Header.php");
require_once("View/Home/menu.php")
?>
<style>
.Content_Order {
    width: 76%;
    height: auto;
    border-radius: 10px;
    margin: 1% 1% 0% 1%;
    float: right;

}

.Menu_Order {
    display: list-item;
    width: 20%;
    background-color: white;
    float: left;
    margin: 2% 1% 1% 1%;
    border-radius: 10px;
    list-style: none;
}


.subMenu_order {
    height: 50px;
    line-height: 50px;
    width: 100%;
    border: 1px solid black;
}

.subMenu_order:hover {
    background-color: rgb(200, 110, 135);
}

.Order-Item,
.Empty-Order {
    width: 100%;
    height: auto;
    background-color: white;
    margin-top: 20px;
}

.Empty-Order {
    height: 500px;
    text-align: center;
    line-height: 500px;
    font-size: 20px;
}

.Order-Status {
    width: 96%;
    height: 60px;
    color: blue;
    margin: 10px 2% 10px 2%;
    border: 1px solid black;
    border-top: initial;
    border-left: initial;
    border-right: initial;
    line-height: 60px;
    text-align: right;
}

.Select {
    width: 100%;
}

.btnSelect {
    border-radius: 5px;
    background-color: #AE1427;
    width: 200px;
    margin: 20px 10px 20px 0px;
    text-align: center;
}

.Total-Price {
    width: 96%;
    margin: 20px 2% 0px 2%;
    height: 50px;
    text-align: right;
    font-size: 22px;
    color: #AE1427;
}

.Image {
    width: 100px;
    margin-left: 20px;
}

.InfoProduct {
    width: 96%;
    margin-left: 2%;
    margin-top: 20px;
}

.Price-Product {
    width: 200px;
    text-align: right;
}

.btnSelect:hover {
    cursor: pointer;
    background-color: #E5E4E1;
}
</style>
<ul class="Menu_Order">
    <li class="subMenu_order" style="border-radius:10px 10px 0px 0px;
        <?php
            if(isset($action)&&$action==""){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>
        ">
        <a href="index.php?controller=Order" style="margin-left: 10px; text-decoration:none; color:black">Toàn bộ đơn
            hàng</a>
    </li>
    <li class="subMenu_order" style="
        <?php
            if(isset($action)&&$action=="WaitForPay"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>
        ">
        <a href="index.php?controller=Order&action=WaitForPay"
            style="margin-left: 10px; text-decoration:none;color:black">Đơn hàng vừa đặt</a>
    </li>
    <li class="subMenu_order" style="
        <?php
            if(isset($action)&&$action=="Paid"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
        <a href="index.php?controller=Order&action=Paid" style="margin-left: 10px; text-decoration:none;color:black">Đơn
            đã thanh toán</a>
    </li>
    <li class="subMenu_order" style="
        <?php
            if(isset($action)&&$action=="delivered"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
        <a href="index.php?controller=Order&action=delivered"
            style="margin-left: 10px; text-decoration:none;color:black">Đơn hàng đã giao</a>
    </li>
    <li class="subMenu_order" style="
        <?php
            if(isset($action)&&$action=="received"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
        <a href="index.php?controller=Order&action=received"
            style="margin-left: 10px; text-decoration:none;color:black">Đơn hàng đã nhận</a>
    </li>
    <li class="subMenu_order" style="border-radius:0px 0px 10px 10px; text-decoration:none;
        <?php
            if(isset($action)&&$action=="Cancelled"){
                echo "    background-color: rgb(236, 135, 135);";
            }
        ?>">
        <a href="index.php?controller=Order&action=Cancelled"
            style="margin-left: 10px; text-decoration:none;color:black">Đơn hủy</a>
    </li>

</ul>
<div class="Content_Order">

    <?php 
    if($datas>0){
        foreach ($datas as $data) {
            echo "<div class='Order-Item'>";
                echo "<div class='Order-Status'>";
                if($data['ostatus']==0){
                    echo "Chờ giao hàng";
                }
                if($data['ostatus']==1){
                    echo "Đơn hàng đã thanh toán";
                }
                if($data['ostatus']==2){
                    echo "Đơn hàng đã giao";
                }
                if($data['ostatus']==3){
                    echo "Đơn hàng đã hủy";
                }
                if($data['ostatus']==4){
                    echo "Hoàn thành";
                }
                echo "</div>";
                echo "<div class='Content-OrderDetail'>";
                    $DetailOrders=$order->getInfoOrderDetail($data['oid']);
                    $price=0;
                    foreach ($DetailOrders as $detailOrder) {
                            $Product=$product->getInfoProduct($detailOrder['pid']);
                            $price+=$detailOrder['price']*$detailOrder['quantity']*(100-$Product['pdiscount'])/100;
                            ?>
    <table class="InfoProduct">
        <tr rowspan="3">
            <td>
                <img src="View/Images/<?php echo $Product['pimage']?>" class="Image">
            </td>
            <td style="width: 70%;">
                <div class="NameProduct">
                    <?php $Config=$config->getConfig($Product['configid']);
                    echo $Product['pname']." ".$Config['configram']." ".$Config['configrom']?>
                </div>
                <div class="QuantityProduct">
                    <?php echo "x".$detailOrder['quantity']?>
                </div>
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

    </table>
    <?php
                    }
                echo "</div>";
                
                echo "<p class='Total-Price'>Thành tiền: ".number_format($price)."đ</p>";
                echo "<form class='Select'>";  
                    echo "<input type=hidden name='oid' value='".$data['oid']."'>";
                    if($data['ostatus']==0||$data['ostatus']==1){
                        echo "<input type=hidden name='controller' value='Order'>";
                        echo "<input type=hidden name='action' value='CancelOrder'>";
                        echo "<input type=reset class=btnSelect value='Đã nhận hàng' style='margin-left:62%; background-color:#E5E4E1'>";
                        echo "<input type=submit class=btnSelect value='Huỷ đơn'>";
                    }    
                    else if($data['ostatus']==2){
                        echo "<input type=hidden name='controller' value='Order'>";
                        echo "<input type=hidden name='action' value='receive'>";
                        echo "<input type='submit' class=btnSelect value='Đã nhận hàng' style='margin-left:62%'>";
                        echo "<input type=reset class=btnSelect value='Huỷ đơn'style='background-color:#E5E4E1'>";
                    }   
                    else if($data['ostatus']==3){
                        echo "<input type=reset class=btnSelect value='Đơn đã hủy' style='margin-left:80%; background-color:#E5E4E1'>";
                    }
                    else if($data['ostatus']==4){
                        echo "<input type=reset class=btnSelect value='Hoàn thành' style='margin-left:80%; background-color:#E5E4E1'>";

                    }
                echo "</form>";
            echo "</div>";
        }
    }
    else{
        echo '<div class="Empty-Order">Chưa có đơn hàng</div>';
    }

    ?>

</div>