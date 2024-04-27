<link rel="stylesheet" href="View/Product/styleProduct.css">

<body>
    <div class="Content">
        <?php
            foreach ($cvalue as $c_value) {
                echo "<div class='categories'>". $c_value['cname']."Nổi Bật</div>";
                $pvalues=$product->getListProductAtHomePage($c_value['cid']);// lay ra thong tin cua san pham
                ?>
        <div class="List-Product">
            <?php 
            if($pvalues!=null){
                foreach ($pvalues as $p_value) {
                    $infoProduct=$product->getMinConfigOfProduct($p_value['pname']);
                    $price=$infoProduct['pprice'];
                    $ram=$infoProduct['configram'];
                    $rom=$infoProduct['configrom'];
                    $image=$infoProduct['pimage'];
                    $pid=$infoProduct['pid'];
                    $discount=$infoProduct['pdiscount'];

                    
                    
            ?>
            <div class="Product" style="height: 450px;">
                <a href="../DO_AN_WEB/index.php?controller=Product&action=detail&pid=<?php echo $pid; ?>"
                    style="text-decoration:none;">
                    <div class="Product-Image" style="height:290px;">
                        <img src="View/Images/<?php echo $image;?>" style="width:200px">
                    </div>
                    <div class="Product-Name">
                        <p style="color: black;">
                            <?php
                            echo $p_value['pname']." ".$ram. " ".$rom;
                        ?>
                        </p>
                    </div>
                    <div class="Product-Price">
                        <?php
            
            echo "<p class='newPrice'>".number_format($price*(100-$discount)/100)."<u>đ</u></p>";
            echo "<p class='oldPrice'>".number_format($price)."<u>đ</u></p>";
                        ?>
                    </div>



                </a>
                <div class="AddToCart">
                    <form action="" method="post">
                        <input type="hidden" name="pid" value="<?php echo $infoProduct['pid'];?>">
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
        echo "</div>";
            }
        ?>



        </div>


</body>

</html>
<script>
function showMessage() {
    alert("Vui lòng đăng nhập");
}
</script>