<?php
require_once("View/Home/Header.php");
require_once("View/Home/Menu.php");
?>
<link rel="stylesheet" href="View/Payment/style.css">
<div class="Title">
    <div class="Title-Icon">
        <i class="fa-solid fa-bag-shopping fa-bounce fa-2xl" style="color: #ff961f;"></i>

    </div>
    <div class="Title-Content">
        <p>Thanh Toán</p>
    </div>
</div>
<form class="Pay-Content" id="Order" method="post">
    <input type="hidden" name="controller" value="Payment">
    <input type="hidden" name="action" value="BuyNow">
    <input type="hidden" name="pid" value="<?php echo $Product['pid'];?>">

    <div class="Content_Method_Order">
        <table class="infoUser">
            <tr>
                <td colspan=2>
                    <p style="margin: 10px 0px 0px 10px;font-size:18px">Địa chỉ nhận hàng: </p>
                </td>


            </tr>
            <tr>
                <td style="width: 90%;">
                    <p style="margin: 10px 0px 0px 10px;font-size:18px">
                        <?php echo"<strong>". $infoUser['ufullname']."&emsp; ".$infoUser['uphone']."&emsp;</strong> ".$infoUser['uaddress']?>
                    </p>
                </td>
                <td>
                    <span class='open-modal-update-btn'>Thay đổi</span>
                </td>
            </tr>
        </table>
    </div>

    <div class="List-Product">
        <table id="config-product">
            <tr>
                <td>
                    <img src="View/Images/<?=$Product['pimage'];?>" alt="">
                </td>
                <td>
                    <table style="height: 100%; width:100%;">
                        <tr class="config-product">
                            <td colspan="2"><strong><?php 
                        echo $Product['pname']."  ";
                        $configID=$Product['configid'];
                        echo $config->getConfig($configID)['configram']."  ".$config->getConfig($configID)['configrom']."  ";
                        $colorid=$Product['colorid'];
                        ?></strong></td>

                            <td>
                                <p>Đơn giá</p>
                            </td>
                            <td>
                                <p>Số lượng</p>
                            </td>
                            <td>
                                <p>Thành tiền</p>
                            </td>
                </td>
            </tr>
            <tr class="config-product">
                <td style="width: 100px;"></td>
                <td style="width:300px">

                </td>
            </tr>
            <tr class="config-product">
                <td></td>
                <td></td>
                <td>
                    <p><?php $price=$Product['pprice']*(100-$Product['pdiscount'])/100;
                        echo number_format($price);
                    ?><u>đ</u></p>
                </td>
                <td>
                    <div class="wrapper">
                        <span class="minus">-</span>
                        <input id="num" value="<?php echo $quantity?>" name='quantity'
                            onchange="reloadByChangeQuantity()">
                        <span class="plus">+</span>
                    </div>
                </td>
                <td>
                    <p><strong><?php echo number_format(($price*$quantity));?></strong><u>đ</u></p>
                </td>
            </tr>
        </table>
        </td>
        </tr>
        </table>
    </div>
</form>

<!--PHƯƠNG THỨC THANH TOÁN-->


<form action="" class="frmPayment" method="post">
    <div class="Content_Method_Order">


        <table class="select_method">
            <tr>
                <td>
                    <p style="font-size:18px;margin-right:100px">Phương thức thanh toán</p>
                </td>
                <?php 
                $num=1;
                    foreach ($methodPay as $value) {
                    ?>
                <td><input type="radio" name="payid" id="<?php echo $value['payid']?>"
                        value="<?php echo $value['payid']?>"
                        style="height: 20px;width:20px; float:left;margin:0px 5px 0px 50px;"
                        <?php if($num==1){echo 'checked';}?>>
                    <p style="line-height: 100%;float:left;font-size:18px"><?php echo $value['payname']?></p>

                </td>
                <?php
                    $num++;
                }?>
            </tr>
        </table>
    </div>

    <table class="Total-Price">
        <tr>
            <td>
                <p style="font-size:18px;margin-right:200px;height:40px">Tổng tiền hàng</p>
            </td>
            <td>
                <p style="font-size:18px;height:40px ;">
                    <?php echo number_format( $price*$quantity)?><u>đ</u>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size:18px;margin-right:200px;height:40px">Phí vận chuyển</p>
            </td>
            <td>
                <p style="font-size:18px;height:40px ;"> <?php echo number_format(15000)?><u>đ</u></p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size:18px;margin-right:200px;height:40px;">Tổng thanh toán</p>
            </td>
            <td>
                <p style="font-size:30px;color:orange;height:40px ;">
                    <?php echo number_format(($price*$quantity+15000))?><u>đ<u></p>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input class="btnSubmit" type=submit name='cmdOrder' value="Đặt hàng"></td>
        </tr>
    </table>
    <input type="hidden" name="controller" value="Order">
    <input type="hidden" name="action" value="CreateNewOrder2">
    <input type="hidden" name="pid" value="<?php echo $Product['pid'];?>">
    <input type="hidden" name="uid" value="<?php echo $infoUser['uid'];?>">
    <input type="hidden" name="receivername" value="<?php echo $infoUser['ufullname'];?>">
    <input type="hidden" name="address" value="<?php echo $infoUser['uaddress'];?>">
    <input type="hidden" name="phone" value="<?php echo $infoUser['uphone'];?>">
    <input type="hidden" name="email" value="<?php echo $infoUser['uemail'];?>">
    <input type="hidden" name="quantity" value='<?php echo $quantity?>'>
</form>
<form class="ModalUpdate hide" method=get>
    <input type="hidden" name="controller" value="User">
    <input type="hidden" name="action" value="updateAddress">
    <input type="hidden" name="pid" value="<?php echo $Product['pid']?>">
    <input type="hidden" name="sub-action" value="BuyNow">
    <div class="modal__inner">
        <div class="modal__header">
            <p>Thay đổi địa chỉ</p>
        </div>
        <div class="modal__body">
            <textarea id="" cols="82" rows="5" name="address" placeholder="Nhập địa chỉ mới"></textarea>
        </div>
        <div class="modal__footer">
            <button type=reset class="Cancel-Update-btn">Hủy bỏ</button>
            <button class="Update-btn" type=submit>Cập nhật</button>
        </div>
    </div>
</form>


<!--phương thức thanh toán qua ví vnpay-->


<form action="" method="post" id="payment">
    <input type="hidden" name="controller" value="VNPAY">
    <input type="hidden" name="action" value="ViewVNPAY">
    <?php
    $_SESSION['uid']=$infoUser['uid'];
    $_SESSION['receivername']=$infoUser['ufullname'];
    $_SESSION['address']=$infoUser['uaddress'];
    $_SESSION['phone']=$infoUser['uphone'];;
    $_SESSION['email']=$infoUser['uemail'];
    $_SESSION['cartid']=null;
    $_SESSION['quantity']=$quantity;
    $_SESSION['pid']=$Product['pid'];
    ?>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.getElementById("num");
let a = document.getElementById('num').value;
plus.addEventListener("click", () => {
    a++;
    num.value = a;
    document.getElementById('Order').submit();

});
minus.addEventListener("click", () => {
    if (a > 1) {
        a--;
        num.value = a;

    }
    document.getElementById('Order').submit();
});

function reloadByChangeQuantity() {
    $("#Order").submit();
}


var btnOpenUpdate = document.querySelector('.open-modal-update-btn');
var btnCancelUpdate = document.querySelector('.Cancel-Update-btn');
var btnUpdate = document.querySelector('.Update-btn');
var modalUpdate = document.querySelector('.ModalUpdate');

function toggleModalUpdate(e) {
    modalUpdate.classList.toggle('hide');
}
btnOpenUpdate.addEventListener('click', toggleModalUpdate)
btnCancelUpdate.addEventListener('click', toggleModalUpdate)
btnUpdate.addEventListener('click', toggleModalUpdate)
modalUpdate.addEventListener('click', function(e) {
    if (e.target == e.currentTarget) {
        toggleModalUpdate();
    }
})
var btnOpenVNPAY = document.getElementById('2');
btnOpenVNPAY.addEventListener('click', function(e) {
    $("#payment").submit();
})
</script>