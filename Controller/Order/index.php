<?php
$uid=isset($_REQUEST['uid'])?$_REQUEST['uid']:($user->getInfoUser($username,$password,2)['uid']);
$payid=isset($_REQUEST['payid'])?$_REQUEST['payid']:"";
$receivername=isset($_REQUEST['receivername'])?$_REQUEST['receivername']:"";
$address=isset($_REQUEST['address'])?$_REQUEST['address']:'';
$phone=isset($_REQUEST['phone'])?$_REQUEST['phone']:"";
$email=isset($_REQUEST['email'])?$_REQUEST['email']:"";
$cartid=isset($_REQUEST['cartid'])?$_REQUEST['cartid']:"";//tra ve mang cac cartid
$pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:"";
$quantity=isset($_REQUEST['quantity'])?$_REQUEST['quantity']:"";
    switch ($action) {
        case 'WaitForPay'://chờ thanh toán-đơn vừa đặt
            
            $datas=$order->ListOfOrders($uid,0);
            require("View/Order/View_Order.php");
            break;
        case'Paid'://đã thanh toán
            $datas=$order->ListOfOrders($uid,1);
            require("View/Order/View_Order.php");
            break;
        case 'delivered'://đã giao xong
            $datas=$order->ListOfOrders($uid,2);
            require("View/Order/View_Order.php");
            break;
        case 'Cancelled'://đơn đã hủy
            $datas=$order->ListOfOrders($uid,3);
            require("View/Order/View_Order.php");
            break;
        case 'received'://đơn đã hoàn thành
            $datas=$order->ListOfOrders($uid,4);
            require("View/Order/View_Order.php");
            break;
        case 'CreateNewOrder':
            $order->CreateNewOrder($uid,$receivername,$address,$email,$phone,$payid,$cartid);
            header("Location: index.php?controller=Order");
            break;
        case 'CreateNewOrder2':           
            $order->CreateNewOrder2($uid,$receivername,$address,$email,$phone,$payid,$pid,$quantity);
            header("Location: index.php?controller=Order");
            break;
        case 'CancelOrder':
            echo $oid=$_REQUEST['oid'];
            $order->updateOrderStatus($oid,3);
            header("Location: index.php?controller=Order");
            break;
        case 'receive':
            $oid=$_REQUEST['oid'];
            $order->updateOrderStatus($oid,4);
            header("Location: index.php?controller=Order");
            break;
        default://all các đơn hàng
            $datas=$order->AllOrders($uid);
            require_once("View/Order/View_Order.php");
            break;
    }
?>