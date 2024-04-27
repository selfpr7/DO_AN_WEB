<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.Content-Detail-Product {
    height: 700px;
    width: 100%;
    background-color: white;
    margin-bottom: 50px;
}

.Product-Detail {
    height: 500px;
    width: 80%;
    margin-left: 10%;
    float: left;
    background-color: white;
}

.Product-Name {
    margin: 30px 0px 10px 0px;
    width: 100%;
    font-size: 30px;
    border-bottom: 1px solid black;

}


.Product-Image {
    height: 400px;
    width: 45%;
    float: left;
}

.Product-Config {
    height: 400px;
    width: 52%;
    float: right;
    display: table-column-group;
}





.Addcart {
    background-color: blue;
}

.Product-Price,
.Product-Store,
.Product-Color {
    height: 60px;
    width: 100%;
    display: flex;
    border-radius: 10px;
    margin-bottom: 20px;
    background-color: rgb(215, 211, 211);
}

.Product-Pay,
.AddToCart {
    line-height: 70px;
    height: 70px;
    width: 100%;
    margin-top: 10px;
    background-color: blue;
    text-align: center;
    border-radius: 10px;
    font-size: 20px;
    cursor: pointer;
    border: 0;
    color: white;
}


.Product-Price {
    border: 0;
    font-size: 30px;
    color: red;
    background-color: white;
}

.Product-Pay {
    margin-top: 50px;
    background-color: #BD1319;
}

.AddToCart {
    margin-top: 20px;
    background-color: blue;
}

.store-item,
.color-item {
    height: 60px;
    width: <?php echo 100/count($configids)."%"?>;
    border-radius: 10px;
    display: flex;
    line-height: 60px;
    text-align: center;
}

.radStore,
.radColor {
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 10px;
    height: 20px;
    width: 20px;
}

.title-Comment {
    font-size: 20px;
    margin: 20px;

}

.Comment {
    height: 1000px;
    width: 80%;
    margin-left: 10%;
    float: left;
    background-color: white;
    border-radius: 10px;
    margin-bottom: 50px;
}

.btnSubmit {
    height: 50px;
    text-align: center;
    line-height: 50px;
    width: 180px;
    float: right;
    border-radius: 10px;
    background-color: #BD1319;
    font-size: 20px;
    margin-right: 20px;
    color: aliceblue;
    cursor: pointer;
    border: 0;
}

.Bar-Comment {
    margin-left: 20px;
}

.Number-Question {
    height: 50px;
    width: 100%;
    font-size: 20px;
    margin-top: 20px;
}

.List-Comment {
    width: 96%;
    margin-left: 2%;
}

.ModalUpdate,
.ModalDelete {
    position: fixed;
    background-color: #D9DFE5;
    top: 30%;
    left: 30%;
    width: 40%;
    border-radius: 10px;
    text-align: center;
}

.modal__inner {
    width: 90%;
    position: relative;
    top: 50%;
    margin: 0% 5% 0% 5%;

}

.modal__header {
    height: 50px;
    line-height: 50px;
}

.hide {
    display: none;
}

.open-modal-delete-btn,
.open-modal-update-btn {
    color: blue;
    cursor: pointer;
}

.Cancel-Delete-btn,
.Cancel-Update-btn,
.Update-btn,
.Delete-btn {
    width: 100px;
    height: 30px;
    border: none;
    background-color: #0168fa;
    cursor: pointer;
    margin: 10px 20px 10px 20px;
    border-radius: 5px;
    color: white;
}

.Cancel-Update-btn,
.Cancel-Delete-btn {
    background-color: gray;
}

.Product-Old-Price {
    text-decoration: line-through;
    font-size: 20px;
    color: black;
    padding: 10px 0px 0px 20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>


    <?php
    require_once "View/Home/Header.php";            
    require_once "View/Home/Menu.php";  
           
?>
    <div class="Content-Detail-Product">


        <div class="Product-Detail">
            <div class="Product-Name">
                <?php echo $p_value['pname']?>
            </div>
            <div class="Product-Image">
                <img src="View/Images/<?php echo $p_value['pimage'] ?>" alt="" width="60%">
            </div>
            <div class="Product-Config">
                <div class="Product-Price">
                    <p class="Product-New-Price">
                        <?php echo $p_value['pprice']*(100-$p_value['pdiscount'])/100;?><u>đ</u>
                    </p>
                    <p class="Product-Old-Price">
                        <?php echo $p_value['pprice'];?><u>đ</u>
                    </p>
                </div>
                <form action="" id="Store">
                    <input type="hidden" name="controller" value="Product">
                    <input type="hidden" name="action" value="detail">
                    <input type="hidden" name="Pname" value="<?php echo $p_value['pname']?>">
                    <input type="hidden" name="colorId" value="<?php echo $p_value['colorid']?>">

                    <div class="Product-Store">
                        <?php
                    if($configids!=0){                                  
                        foreach ($configids as $value) {
                        ?>



                        <div class="store-item">
                            <input type="radio" name="radConfigId" onchange="reloadBySelectStore()" class="radStore" <?php
                        if($p_value['configid']==$value['configid']){
                            echo "checked";
                        }
                    ?> value="<?php echo $value['configid']?>">
                            <p>
                                <?php
                            $pconfig=$config->getConfig($value['configid']);
                            echo $pconfig['configram']."-".$pconfig['configrom']; 
                        ?>
                            </p>
                        </div>


                        <?php               
                        }
                    }
                    else{
                        echo "danh sach rong";
                    }
                    ?>


                    </div>
                </form>
                <form action="" id="Color" method=get>
                    <input type="hidden" name="controller" value="Product">
                    <input type="hidden" name="action" value="detail">
                    <input type="hidden" name="Pname" value="<?php echo $p_value['pname']?>">
                    <input type="hidden" name="configId" value="<?php echo $p_value['configid']?>">

                    <div class="Product-Color">
                        <?php
                                
                                $colorids=$product->getColorIDProduct($p_value['pname'],$p_value['configid']);//tra ve danh sach id cua mau sac
                                if($colorids!=0){
                                    
                                    foreach ($colorids as $p_color) {
                                        if($color->getColorName($p_color['colorid'])!=0){

                                    ?>
                        <div class="color-item">
                            <input type="radio" name="radColorId" onchange="reloadBySelectColor()" class="radColor" <?php
                                if($p_color['colorid']==$p_value['colorid']){
                                    echo "checked";
                                }
                            ?> value="<?php echo $p_color['colorid']?>">
                            <p><?php echo $color->getColorName($p_color['colorid']);?></p>
                        </div>


                        <?php
                                        }                      
                                    }
                                }
                                else{
                                    echo "danh sach rong";
                                }
                                ?>
                    </div>
                </form>
                <?php 
                    if($p_value['pquantity']>0){
                ?>
                <form action="" method="get">
                    <input type="hidden" name="controller" value="Payment">
                    <input type="hidden" name="action" value="BuyNow">
                    <input type="hidden" name="quantity" value=1>
                    <input type="hidden" name="pid" value="<?php echo $pid;?>">
                    <?php 
                    if($username==""&&$password==""){
                        echo '<div class="Product-Pay" onclick="showMessage()">Mua ngay</div>';
                    }
                    else{
                        echo '<input type="submit" class="Product-Pay" value="Mua ngay" name=cmd>';
                    }
                    ?>

                </form>
                <form action="" method="get">
                    <input type="hidden" name="controller" value="Cart">
                    <input type="hidden" name="action" value="AddProduct">
                    <input type="hidden" name="pid" value="<?php echo $pid;?>">
                    <?php 
                    if($username==""&&$password==""){
                        echo '<div class="AddToCart " onclick="showMessage()">Thêm vào giỏ hàng</div>';
                    }
                    else{
                        echo '<input type="submit" class="AddToCart" value="Thêm vào giỏ hàng" name=cmd>';
                    }
                    $User=$user->getInfoUser($username,$password,$level);
                    ?>
                </form>
                <?php
                    }else{
                        ?>
                <form action="" method="get">

                    <div class="Product-Pay" onclick="{
                        alert('Sản phẩm tạm hết hàng, vui lòng chọn sản phẩm khác');
                    }">Mua ngay</div>




                </form>
                <form action="" method="get">

                    <div class="AddToCart " onclick="{
                        alert('Sản phẩm tạm hết hàng, vui lòng chọn sản phẩm khác');
                    }">Thêm vào giỏ hàng</div>
                </form>
                <?php
                    }
                ?>
            </div>

        </div>
    </div>
    <div class="Comment">
        <!--ask and answer - hỏi và đáp-->
        <div class="title-Comment">
            Bình luận
        </div>
        <form action="">
            <input type="hidden" name="controller" value="Comment">
            <input type="hidden" name="action" value="addComment">
            <input type="hidden" name="uid" value="<?php echo $User['uid']?>">
            <input type="hidden" name="pid" value="<?php echo $pid?>">
            <?php 
            
                if($username==""&&$password==""){
                    echo '<textarea name="" id="" cols="115" rows="5" class="Bar-Comment"></textarea>';
                    echo '<div class="btnSubmit" onclick="showMessage()">GỬI BÌNH LUẬN</div>';
                }
                else{
                    echo '<textarea name="coContent" id="" cols="115" rows="5" class="Bar-Comment"></textarea>';
                    echo '<input type="submit" value="GỬI BÌNH LUẬN" class="btnSubmit">';
                }?>
        </form>

        <?php
                if($Comments!=null){
                    echo "<table class='List-Comment'>";
                    //thông tin của tài khoản này
                    foreach ($Comments as $value) {
                        $InfoUser=$user->getInfoUserById($value['uid']);
                        echo "<tr><td><strong style='font-size:18px'>".$InfoUser['ufullname']."</strong>";
                        if($User!=0){
                            if($User['uid']==$value['uid']){
                                echo "(Tôi)";
                            }
                        }
                        echo "</td></tr>";
                        echo "<tr><td>".$value['coContent']."</td></tr>";
                        echo "<tr><td style='display:flex'><p>".$value['coDate']."</p>&emsp;<span style='color:blue;'>Trả lời</span>";
                        if($User!=0){
                            if($User['uid']==$value['uid']){
                                echo "&emsp;<span class='open-modal-delete-btn' style='color:blue;'>Thu hồi</span>";   
                                echo "&emsp;<span class='open-modal-update-btn' name='edit[".$value['coid']."]'>Sửa</span>";
                              ?>
        <form class="ModalDelete hide" method=post>

            <input type="hidden" name="controller" value="Comment">
            <input type="hidden" name="action" value="deleteComment">
            <input type="hidden" name="coid" value="<?php echo $value['coid']?>">
            <input type="hidden" name="pid" value="<?php echo $pid?>">

            <div class="modal__inner">
                <div class="modal__footer">
                    <p>Bạn có muốn thu hồi lại bình luận?</p>
                    <button type=reset class="Cancel-Delete-btn">Hủy bỏ</button>
                    <button class="Delete-btn" type='submit'>Thu hồi</button>
                    <input type="hidden" name="pid" value="<?php echo $pid?>">
                </div>
            </div>
        </form>
        <form class="ModalUpdate hide" method=post>
            <input type="hidden" name="controller" value="Comment">
            <input type="hidden" name="action" value="updateComment">
            <input type="hidden" name="coid" value="<?php echo $value['coid']?>">

            <div class="modal__inner">
                <div class="modal__header">
                    <p>Chỉnh sửa bình luận</p>
                </div>
                <div class="modal__body">
                    <textarea id="" cols="82" rows="5" name="coContent" placeholder="Nhập bình luận"></textarea>
                </div>
                <div class="modal__footer">
                    <button type=reset class="Cancel-Update-btn">Hủy bỏ</button>
                    <button class="Update-btn" type=submit>Cập nhật</button>
                </div>
            </div>
        </form>
        <?php
                            }
                            
                        }
                        echo "</td></tr><tr><td>&emsp;</td></tr>";
                    }
                    echo "</table>";
                }
            
                else{
                    echo "<center style='font-size:20px;margin-top:50px'>Chưa có bình luận nào cho sản phẩm này</center>";
                }
            ?>

    </div>


    <?php
            require_once "View/Home/Footer.php";
        ?>
</body>


</html>
<script>
function reloadBySelectStore() {
    $("#Store").submit();
}

function reloadBySelectColor() {
    $("#Color").submit();
}

function showMessage() {
    alert('Vui lòng đăng nhập');
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

var btnOpenDelete = document.querySelector('.open-modal-delete-btn');
var btnCancelDelete = document.querySelector('.Cancel-Delete-btn');
var btnDelete = document.querySelector('.Delete-btn');
var modalDelete = document.querySelector('.ModalDelete');

function toggleModalDelete(e) {
    modalDelete.classList.toggle('hide');
}
btnOpenDelete.addEventListener('click', toggleModalDelete)
btnCancelDelete.addEventListener('click', toggleModalDelete)
btnDelete.addEventListener('click', toggleModalDelete)
modalDelete.addEventListener('click', function(e) {
    if (e.target == e.currentTarget) {
        toggleModalDelete();
    }
})
</script>