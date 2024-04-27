<?php
    include 'Model/DBConfig.php';
    include 'Model/Cart/Cart.php';
    include 'Model/Categories/Categories.php';
    include 'Model/Color/Color.php';
    include 'Model/Config/Config.php';
    include 'Model/Product/Product.php';
    include 'Model/Staff/Staff.php';
    include 'Model/User/User.php';
    include 'Model/Supplier/Supplier.php';
    include 'Model/Payment/Payment.php';
    include 'Model/Order/Order.php';
    include 'Model/Comment/Comment.php';
    $product=new Product();
    $categories=new Categories();
    $config=new Config();
    $color=new Color();
    $staff=new Staff();
    $user=new User();
    $cart=new Cart();
    $supplier=new Supplier();
    $payment=new Payment();
    $order=new Order();
    $comment=new Comment();
    $db=new Database;
    $db->connect();
    session_start();

    $controller=isset($_REQUEST['controller'])?$_REQUEST['controller']:'';
    $action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

    $username=isset($_SESSION['username'])?$_SESSION['username']:"";
    $password=isset($_SESSION['password'])?$_SESSION['password']:"";
    $level=isset($_SESSION['level'])?$_SESSION['level']:3;
    $InfoUser=$user->getInfoUser($username,$password,$level);
    switch ($controller) {
        case 'Supplier':
            require_once('./Controller/Supplier/index.php');
            break;
        case 'Categories':
            require_once('./Controller/Categories/index.php');
            break;
        case 'Product':          
            require_once('./Controller/Product/index.php');
            break;
        case 'Home'://th đưa về trang chủ kèm theo thông tin khi đăng nhập
            $cart->UnselectAllProduct();
            require_once('./Controller/Home/index.php');
            break;
        case 'Color':
            require_once('./Controller/Color/index.php');
            break;
        case 'Config':
            require_once('./Controller/Config/index.php');
        case "User":
            require_once("./Controller/User/index.php");
            break;
        case "Admin":
            require_once("./Controller/Admin/index.php");
            break;
        case "Staff":      
            require_once("./Controller/Staff/index.php");
            break;
        case "Payment":
            require_once("./Controller/Payment/index.php");
            break;
        case "Cart":
            $cart->UnselectAllProduct();
            require_once("./Controller/Cart/index.php");
            break;
        case "ManageProgram":
            require_once("./Controller/ManageProgram/index.php");
            break;
        case "Order":
            require_once("./Controller/Order/index.php");
            break;
        case "Comment":
            require_once("./Controller/Comment/index.php");
            break;
        case "VNPAY":
            require_once("./Controller/VNPAY/index.php");
            break;
        default://th Người dùng không đăng nhập hoặc nhấn vào đăng xuất
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['username']='';
            $_SESSION['password']="";
            $_SESSION['level']=3;

            $InfoUser=null;
            $cart->UnselectAllProduct();
                
            require_once('./Controller/Home/index.php');
            break;
        session_unset();
        session_destroy();
        
    }
?>
<!DOCTYPE html>
<!-- Coding by thietquang | www.thietquang.com-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Social Media Iconic</title>

    <!-- CSS -->
    <link rel="stylesheet" href="styleCt.css" />

    <!-- Font import -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" //font />
</head>

<body>
    <div class="Ctcontainer">
        <span class="close-btn">
            <i class="fa-sharp fa-solid fa-headset fa-bounce"></i>
        </span>

        <div class="media-icons">


            <a href="https://Youtube.com" style="background: #ea4689">
                <i class="fa-solid fa-circle-info"></i>

                <span class="tooltip" style="color: #ea4689">Infomation</span>

            </a>
            <a href="" style="background: #8e36ff">
                <i class="fa-brands fa-facebook-messenger"></i>
                <span class="tooltip" style="color: #8e36ff">Messenger</span>
            </a>
            <a href="/" style="background: #4267b2">
                <i class="fa-brands fa-square-facebook"></i>
                <span class="tooltip" style="color: #4267b2">Facebook</span>
            </a>
            <a href="#" style="background: #1da1f2">
                <i class="fa-solid fa-phone-flip"></i>
                <span class="tooltip" style="color: #1da1f2">Hot Line: 0356387622</span>
            </a>
        </div>
    </div>

    <script>
    const closeBtn = document.querySelector(".close-btn");

    closeBtn.addEventListener("click", () => {
        closeBtn.classList.toggle("open");
    });
    </script>
</body>

</html>