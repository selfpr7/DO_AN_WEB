<?php
require_once("View/Home/Header.php");
require_once("View/Home/Menu.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.Quantity_Product,
strong {
    height: 60px;
    width: 100%;
    line-height: 60px;
    font-size: 20px;
}

.Content_Cart,
.Method_Order {
    background-color: white;
    height: auto;
    width: 80%;
    margin: 0px 20px 20px 10%;
    border-radius: 20px;
}

.infoUser {
    margin: 20px;
    height: 250px;
    width: 90%;
    border-radius: 10px;
    background-color: rgb(214, 217, 218);
}

.select-Product {
    height: 20px;
    width: 20px;
}

#select-quantity {
    height: 25px;
    width: 100px;
    border-radius: 10px;
    text-align: center;
}

.config-product {
    height: 45px;
    font-size: 18px;
}

#config-product {
    width: 90%;
    padding: 20px 20px 20px 20px;
}

img {
    height: 150px;
    width: auto;
    border: 1px solid black;
    border-radius: 10px;
}

.Content_Method_Order {
    height: auto;
    margin: 20px 20px 20px 20px;
    border: 1px solid white;
}

.Total-Payment {
    background-color: white;
    width: 100%;

}

.Content-Total-Payment {
    margin: 0% 20% 0% 20%;
}

.title {
    float: left;
}

.price {
    float: right;
}

.btnOrder {
    height: 50px;
    width: 88%;
    margin-left: 50px;
    border-radius: 10px;
    background-color: red;
    font-size: 20px;

}

.input-group {
    margin-right: 20px;
    height: 30px;
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #FFF;
    border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    line-height: 30px;
}


.input-group-text {
    height: 30px;
    border: 0;
    cursor: pointer;
    background-color: white;
    font-size: 20px;
}


.qty {
    width: 50px;
    text-align: center;
    height: 20px;
    border: 0px;
}

.Cart-Empty {
    height: 500px;
    width: 60%;
    margin: 20px 0px 20px 20%;
    line-height: 500px;
    text-align: center;
    font-size: 20px;
    border-radius: 10px;
    background-color: white;
    color: #CB1C22;
    font-weight: 700;
}
</style>
<?php
    if($number==0){
        echo "<div class='Cart-Empty'>Chưa có sản phẩm nào trong giỏ hàng</div>";
    }
    else{
        echo '<div class="Quantity_Product">';
        echo '<strong style="margin-left: 10%;">Có <?php echo $number?> sản phẩm trong giỏ hàng</strong>';
echo '</div>';
echo '<form id="Select" action="" method=get>';
    echo '<input type="hidden" name="controller" value="Cart">';
    echo '<input type="hidden" name="action" value="UpdateCart">';
    foreach ($listProducts as $Product) {
    ?>

    <div class="Content_Cart">
        <?php $infoProduct=$product->getInfoProduct($Product['cartpid']); ?>
        <input type="hidden" name="pid" value="<?php echo $infoProduct['pid']?>">
        <table id="config-product">
            <tr>
                <td>
                    <input type="checkbox" class="select-Product" onchange="reloadBySelectProduct() " name="cartid[]"
                        value="<?php echo $Product['cartid'];?>" <?php
                        if($Product['cartstatus']==1){
                            echo "checked";
                        }
                    ?>>
                </td>
                <td style="width: 25%;">
                    <img src="View/Images/<?= $infoProduct['pimage'];?>" alt="">
                </td>
                <td>
                    <table style="height: 100%; width:100%;">
                        <tr class="config-product">
                            <td colspan="2"><strong><?php 
                        echo $infoProduct['pname']."  ";
                        $configID=$infoProduct['configid'];
                        echo $config->getConfig($configID)['configram']."  ".$config->getConfig($configID)['configrom']."  ";
                        $colorid=$infoProduct['colorid'];
                        ?></strong></td>
                            <td><a href="../DO_AN_WEB/index.php?controller=Cart&action=DeleteProduct&pid=<?php echo $infoProduct['pid'];?>"
                                    style="float: right;color:black">DELETE</a></td>
                        </tr>
                        <tr class="config-product">
                            <td style="width: 100px;">Màu sắc</td>
                            <td style="width:300px">
                                <p><?php echo $color->getColorName($colorid);?></p>
                            </td>
                            <td>
                                <p style="text-align: right;font-size:20px">

                                    <?php 
                                if($infoProduct['pdiscount']>0){
                                    echo number_format($infoProduct['pprice']*$Product['cartquantity']*(100-$infoProduct['pdiscount'])/100)."đ";
                                }
                                    ?>

                                </p>
                            </td>
                        </tr>
                        <tr class="config-product">
                            <td>
                                Số lượng </td>
                            <td>
                                <div class="input-group qtyBox">
                                    <input type="hidden" value="<?php echo $infoProduct['pid'];?>" class="proId">
                                    <button class="input-group-text decrement">-</button>
                                    <input class="qty quantityInput" value="<?= $Product['cartquantity'];?>"
                                        name="cartquantity[<?php echo $Product['cartid'] ?>][<?php echo $infoProduct['pid'];?>]">
                                    <button id="plus" class="input-group-text increment">+</button>
                                </div>
                            </td>
                            <td>
                                <?php 
                            if($infoProduct['pdiscount']>0){
                                echo '<i style="float: right;text-decoration:line-through;font-size:20px;color:red">
                                '. number_format($infoProduct['pprice']*$Product['cartquantity'])."đ</i>";
                            }
                            else{
                                echo '<i style="float: right;font-size:20px;">
                                '. number_format($infoProduct['pprice']*$Product['cartquantity'])."đ</i>";
                            }
                            ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <?php
        }
        echo' </form>';
}
?>

    <div class="Total-Payment">
        <form class="Content-Total-Payment" method=post>
            <table>
                <tr>
                    <td>

                        <div style="width:425px;height:50px">
                            <div style="float: left;">
                                <strong style="float:left">Tổng tiền:</strong>
                            </div>
                            <div style="float: right;">
                                <?php 
                            $total_price=0;
                    if($cartids!=""){
                        foreach ($listProducts as $cartitem) {
                            if($cartitem['cartstatus']==1){
                                $total_price+=$cartitem['cartquantity']*$product->getInfoProduct($cartitem['cartpid'])['pprice'];
                            }
                        }
                    }
                        
                    else{
                        $total_price=0;
                    }
                    echo "<strong>".number_format( $total_price)."đ</strong>";
                    ?>

                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="width: 425px;height:50px">
                            <div style="float: left;margin-left:50px">
                                <strong>Cần thanh toán:</strong>
                            </div>

                            <div style="float: right;">
                                <?php 
                    $total_price2=0;
                    if($cartids!=""){
                        foreach ($listProducts as $cartitem) {
                            if($cartitem['cartstatus']==1){
                                $value=$product->getInfoProduct($cartitem['cartpid']);
                                $total_price2+=$cartitem['cartquantity']*$value['pprice']*(100-$value['pdiscount'])/100;
                            }
                        }
                    }
                        
                    else{
                        $total_price2=0;
                    }
                    echo "<strong >".number_format($total_price2)."đ</strong>";
                    ?>
                            </div>

                        </div>



                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="width: 425px;height:50px">
                            <div style="float: left">
                                <strong>Giảm giá khuyến mãi:</strong>
                            </div>

                            <div style="float: right;">
                                <?php 
                    $total_price=0;
                    if($cartids!=""){
                        foreach ($listProducts as $cartitem) {
                            if($cartitem['cartstatus']==1){
                                $value=$product->getInfoProduct($cartitem['cartpid']);
                                $total_price+=$cartitem['cartquantity']*$value['pprice']*($value['pdiscount'])/100;
                            }
                        }
                    }
                        
                    else{
                        $total_price=0;
                    }
                    echo "<strong >".number_format($total_price)."đ</strong>";
                    ?>
                            </div>

                        </div>
                    </td>
                    <input type="hidden" name="controller" value="Payment">
                    <input type="hidden" name="action" value="view">
                    <input type="hidden" name="totalPrice" value="<?php echo $total_price2?>">
                    <?php
                    if($cart->getNumberProductSelected($infoUser['uid'])>0){
                        echo '<td><button type="submit" class="btnOrder">Đặt hàng</button></td>';
                    }else{
                        echo '<td><button type="reset"class="btnOrder">Đặt hàng</button></td>';
                    }
                ?>
                </tr>
            </table>
        </form>
    </div>

    <script>
    function reloadBySelectProduct() {
        $("#Select").submit();
    }
    $(document).ready(function() {
        $(document).on('click', '.increment', function() {
            var $quantityInput = $(this).closest('.qtyBox').find('.qty');
            var productId = $(this).closest('.qtyBox').find('.proId');
            var currentValue = parseInt($quantityInput.val());
            if (!isNaN(currentValue)) {
                var qtyVal = currentValue + 1;
                $quantityInput.val(qtyVal);
            }
        });

        $(document).on('click', '.decrement', function() {
            var $quantityInput = $(this).closest('.qtyBox').find('.qty');
            var productId = $(this).closest('.qtyBox').find('.proId');
            var currentValue = parseInt($quantityInput.val());
            if (!isNaN(currentValue) && currentValue > 1) {
                var qtyVal = currentValue - 1;
                $quantityInput.val(qtyVal);
            }
        });
    })
    </script>