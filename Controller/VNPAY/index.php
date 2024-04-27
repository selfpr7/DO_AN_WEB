<?php
     //session_start();
    $uid=isset($_SESSION['uid'])?$_SESSION['uid']:"";
    $receivername=isset($_SESSION['receivername'])?$_SESSION['receivername']:"";
    $address=isset($_SESSION['address'])?$_SESSION['address']:'';
    $phone=isset($_SESSION['phone'])?$_SESSION['phone']:"";
    $email=isset($_SESSION['email'])?$_SESSION['email']:"";
    $cartid=isset($_SESSION['cartid'])?$_SESSION['cartid']:"";//tra ve mang cac cartid
    $pid=isset($_SESSION['pid'])?$_SESSION['pid']:"";
    $quantity=isset($_SESSION['quantity'])?$_SESSION['quantity']:"";
    $payid=2;
    switch($action){
        case "ViewVNPAY":
            require("View/vnpay_php/index.php");
            break;
        case "VNPAY_PAY":
            require("View/vnpay_php/vnpay_pay.php");
            break;
        case "Create_new_payment":
            require('View/vnpay_php/vnpay_create_payment.php');
            break;
        case "VNPAY_RETURN":
            require('View/vnpay_php/vnpay_return/php');
            break;
        case 'CreateNewOrder':
            echo "pid=".$pid;
            echo "cartid=".$cartid;
            //$order->CreateNewOrder($uid,$receivername,$address,$email,$phone,$payid,$cartid);
            //header("Location: index.php?controller=Order");
            break;
        case 'CreateNewOrder2':      
            echo "pid=".$pid;
            echo "cartid=".$cartid;     
            //$order->CreateNewOrder2($uid,$receivername,$address,$email,$phone,$payid,$pid,$quantity);
            //header("Location: index.php?controller=Order");
            break;
    }
?>