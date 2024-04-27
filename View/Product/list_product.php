<link rel="stylesheet" href="View/Product/styleProduct.css">

<body>
    <?php
require "View/Home/Header.php";
require "View/Home/Menu.php";
?>
    <div class="Content">
        <div class="List-Product">
            <?php 
            if($pvalues==null){
                echo "<div style='height:500px'><center style='margin-top:50px;'>Danh sách sản phẩm rỗng</center></div>";
            }
            else{
                foreach ($pvalues as $p_value) { 
                    $price=$product->getMinConfigOfProduct($p_value['pname'])['pprice'];
                    $discount=$product->getMinConfigOfProduct($p_value['pname'])['pdiscount'];
                    $configid=$product->getMinConfigOfProduct($p_value['pname'])['configid'];
                    $pconfig=$config->getConfig($configid);
                    $pimage=$product->getMinConfigOfProduct($p_value['pname'])['pimage'];
                        $colorid=$product->getMinConfigOfProduct($p_value['pname'])['colorid'];
                        $pid=$product->getPid($p_value['pname'],$configid,$colorid);
                    ?>
            <div class="Product" style="height: 450px;">
                <a href="../DO_AN_WEB/index.php?controller=Product&action=detail&pid=<?php echo $pid['pid'];?>">
                    <div class="Product-Image" style="height:290px;">
                        <img src="View/Images/<?php echo $pimage;?>" alt="" style="width:200px">
                    </div>
                    <div class="Product-Name">
                        <?php
                            echo "<p style='color:black'>".$p_value['pname']."  ".$pconfig['configram']." ".$pconfig['configrom']."</p>";
                        ?>
                    </div>
                    <div class="Product-Price">
                        <?php
                        echo "<p class='newPrice'>".number_format($price*(100-$discount)/100)."<u>đ</u></p>";
                        echo "<p class='oldPrice'> ".number_format($price)."<u>đ</u></p>";
                        ?>
                    </div>
                </a>
                <div class="AddToCart">
                    <form action="" method="post">
                        <input type="hidden" name="pid" value="<?php echo $pid['pid'];?>">
                        <input type="hidden" name="controller" value="Cart">
                        <input type="hidden" name="action" value="AddProduct">
                        <?php
                                if($username==""&&$password==""){
                                    echo '<input value="Thêm vào giỏ hàng" class="btnAddToCart" onclick="showMessage()">';
                                }
                                else{
                                    echo '<input type="submit" value="Thêm vào giỏ hàng" class="btnAddToCart" >';
                                }
                                ?>
                    </form>
                </div>
            </div>


            <?php
                    }
                }
                echo "</div></div>"; 
                require "View/Home/footer.php";
                ?>


</body>

<script>
function showMessage() {
    alert("Vui lòng đăng nhập");
}
</script>