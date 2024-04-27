<?php   
    $username=isset($_SESSION['username'])?$_SESSION['username']:"";
    $password=isset($_SESSION['password'])?$_SESSION['password']:"";  
?>
<style>
.Content-Header {
    height: 60px;
    width: 100%;
    background-color: #CB1C22;
}

.Header {
    width: 80%;
    margin-left: 10%;
    height: 60px;
    display: flex;
    justify-content: space-between;
}

.frmSearch {
    height: 60px;
    width: 650px;
}

#search-box {
    height: 40px;
    width: 550px;
    font-size: 15px;
    margin-top: 10px;
}

#btnSearch {
    margin-top: 10px;
    height: 40px;
    width: 80px;
    margin-left: 0;
    cursor: pointer;
}

a {
    text-decoration: none;
    color: white;
}




.Account,
.Cart {
    list-style: none;
    position: relative;
    width: 150px;
    height: 60px;
    line-height: 60px;
    text-align: center;
}

#country-list {
    margin-top: 0px;
    padding: 0;
    width: 550px;
    position: absolute;
    display: flex;
    flex-direction: column;
}

#country-list .item {

    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
    height: 35px;
    line-height: 35px;
}

#country-list .item:hover {
    background: #ece3d2;
    cursor: pointer;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $("#search-box").keyup(function() {
        $.ajax({
            type: "GET", // đẩy dữ liệu đi theo dạng get
            url: "View/Home/readProduct.php", //trang nhận dữ liệu đẩy đi
            data: 'keyword=' + $(this).val(), //dữ liệu đẩy đi
            beforeSend: function() {
                $("#search-box").css("background",
                    "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) { // th lấy được dữ liệu
                $("#suggestion-box").show(); //hiển thị dữ liệu tìm được
                $("#suggestion-box").html(data);
                $("#search-box").css("background", "#FFF");
                //thay đổi background của ô tìm kiêm sau khi nhận được các gọi ý
            }
        });
    });
});

function selectCountry(val) { // hàm này sẽ hoạt động khi người dùng nhấn vào chọn sản phẩm
    $("#search-box").val(val);
    $("#suggestion-box").hide(); //sau khi chọn 1 sản phẩm thì ẩn các gợi ý khác đi
}
</script>

<body>
    <?php
    
    ?>
    <div class="Content-Header">

        <ul class="Header">
            <li><?php if($username==""&&$password==""){
                echo '<a href="../DO_AN_WEB/index.php" style="line-height: 60px;">Trang chủ</a>';
            }else{
                echo '<a href="../DO_AN_WEB/index.php?controller=Home" style="line-height: 60px;">Trang chủ</a>';
            }
            ?>

            </li>
            <li>
                <form action="" method=get class="frmSearch">
                    <table>
                        <tr>
                            <td style="display:flex;flex-direction:column;">
                                <input type="hidden" name="Controller" value="Home">
                                <input type="text" name="txtKey" id="search-box">
                                <div id="suggestion-box">
                                    <!--khối hiên thị gợi ý-->
                                </div>
                            </td>
                            <td>
                                <button type=reset name="btnSearch" id="btnSearch">Search</button>
                                <input type="hidden" name="action" value="search">
                            </td>
                        </tr>

                    </table>
                </form>
            </li>
            <li><?php
                if(!$InfoUser){
                    ?>
                <a href="../DO_AN_WEB/index.php?controller=User&action=login">
                    <table>
                        <tr class="Account">
                            <td><i class='fa-solid fa-circle-user fa-2xl' style='color: #ffffff;'></i>
                            </td>
                            <td>
                                <p style="color: white;">Tài khoản</p>
                            </td>
                        </tr>
                    </table>

                </a>
                <?php
                }
                else{
                    ?>
                <a href="../DO_AN_WEB/index.php?controller=User&action=view" style="color: black;">
                    <table>
                        <tr class="Account">
                            <td><i class='fa-solid fa-circle-user fa-2xl' style='color: #ffffff;'></i>
                            </td>
                            <td>
                                <p style="color: white;"><?php echo $username;?></p>
                            </td>
                        </tr>
                    </table>

                </a>
                <?php
            }
            ?>
            </li>
            <!--gio hang-->
            <li>
                <?php
                if(!$InfoUser){
                    ?>
                <a href="../DO_AN_WEB/index.php?controller=User&action=login">
                    <table>
                        <tr class="Cart">
                            <td>
                                <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i>
                            </td>
                            <td>
                                <p style="color: white;">Giỏ hàng</p>
                            </td>
                        </tr>
                    </table>

                </a>
                <?php
                }
                else{
                    ?>
                <a href="../DO_AN_WEB/index.php?controller=Cart&action=ViewProduct">
                    <table>
                        <tr class="Cart">
                            <td>
                                <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #ffffff;"></i>
                            </td>
                            <td>
                                <p style="color: white;">Giỏ hàng</p>
                            </td>
                        </tr>
                    </table>

                </a>
                <?php
            }
            ?>
            </li>
        </ul>

    </div>

</body>

</html>
<script>
// Lấy thẻ input:text và button
var input = document.getElementById('search-box');
var button = document.getElementById('btnSearch');

// Thêm sự kiện oninput cho thẻ input:text
input.oninput = function() {
    // Kiểm tra xem thẻ input:text có rỗng không
    if (input.value === '') {
        // Nếu rỗng, vô hiệu hóa button
        // button.setAttribute('disabled', 'true');
    } else {
        // Nếu không rỗng, bỏ vô hiệu hóa button
        //button.removeAttribute('disabled');
        button.type = 'submit';
        s
    }
};
</script>