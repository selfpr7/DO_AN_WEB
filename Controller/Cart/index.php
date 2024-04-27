<?php
    $level=2;
    $infoUser=$user->getInfoUser($username,$password,$level);
    $cartids=isset($_REQUEST['cartid'])?$_REQUEST['cartid']:"";
    $pname=isset($_REQUEST['txtPname'])?$_REQUEST['txtPname']:'';
    $pprice=isset($_REQUEST['txtPrice'])?$_REQUEST['txtPrice']:'';
    $colorid=isset($_REQUEST['radColorId'])?$_REQUEST['radColorId']:'';
    $configid=isset($_REQUEST['radConfigId'])?$_REQUEST['radConfigId']:'';
    $pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:"";
    $cid=isset($_REQUEST['cid'])?$_REQUEST['cid']:"";
    $quantity=isset($_GET['cartquantity'])?$_GET['cartquantity']:"";

    switch ($action) {
        case 'AddProduct':
           if( $cart->addProduct($pid,$infoUser['uid'])){
            header("Location: ../DO_AN_WEB/index.php?controller=Cart&action=ViewProduct");
           }
           else{
            header("Location: ..DO_AN_WEB/index.php?controller=Home&action=display_list_product_by_cid&cid=$cid");
        }
            break;
        case 'DeleteProduct'://xong
            $cart->deleteProduct($pid,$infoUser['uid']);
            header("Location: ../DO_AN_WEB/index.php?controller=Cart&action=ViewProduct");
            break;
        case 'UpdateProduct':
            break;
        case 'CheckProduct':
            break;
        case 'UpdateCart':
            
            $cart->UnselectAllProduct();
            if($cartids!=null){
                foreach ($cartids as $cartid) {
                    $cart->UpdateStatus($cartid);

                }
            }
            echo "<pre>";

            foreach ($_GET['cartquantity'] as $key=> $value) {
                foreach ($value as $quantity ) {
                    $cart->updateQuantity($key,$quantity);
                }
                
            }
            echo "</pre>";
            $listProducts=$cart->listProductInCart($infoUser['uid']);
            $number=$cart->getNumberProduct($infoUser['uid']);
            require_once("View/Cart/View_Cart.php");
            break;
        case 'ViewProduct';
            $cart->listProductInCart($infoUser['uid']);
            $number=$cart->getNumberProduct($infoUser['uid']);
            $listProducts=$cart->listProductInCart($infoUser['uid']);
            require_once("View/Cart/View_Cart.php");
            break;
        default:
            # code...

            $listProducts=$cart->listProductInCart($infoUser['uid']);
            $number=$cart->getNumberProduct($infoUser['uid']);
            require_once("View/Cart/View_Cart.php");
            break;
    }
?>