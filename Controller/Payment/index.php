<?php
    $action=$_REQUEST['action'];
    $level=2;

    switch ($action) {
        case 'view':
            $methodPay=$payment->MethodPay();
            $infoUser=$user->getInfoUser($username,$password,$level);
            $listProducts=$payment->listProductOrder($infoUser['uid']);
            $number=$cart->getNumberProduct($infoUser['uid']);
            require_once("View/Payment/View_Payment.php");
            break;
        case 'updateAddress':
            require_once('View/User/UpdateAddress.php');
            break;
        case 'updateQuantity':
            $pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:0;
            header("Location:../DO_AN_WEB/index.php?controller=Payment&action=BuyNow&pid=$pid");
            break;
        case 'BuyNow':

            $quantity=isset($_REQUEST['quantity'])?$_REQUEST['quantity']:1;
            $pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:0;
            $methodPay=$payment->MethodPay();
            $infoUser=$user->getInfoUser($username,$password,$level);
            $Product=$product->getInfoProduct($pid);
            $cmdOrder=isset($_REQUEST['cmdOrder'])?$_REQUEST['cmdOrder']:"";
            
            require_once("View/Payment/BuyNow.php");
           break;
        default:
            # code...
            break;
    }
    
?>