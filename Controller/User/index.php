<?php
    $username=isset($_GET['txtUsername'])?$_GET['txtUsername']:"";
    $password=isset($_GET['txtPassword'])?$_GET['txtPassword']:"";
    $fullname=isset($_GET['txtFullname'])?$_GET['txtFullname']:"";
    $email=isset($_GET['txtEmail'])?$_GET['txtEmail']:"";
    $phone=isset($_GET['txtPhone'])?$_GET['txtPhone']:"";
    $gender=isset($_GET['radGender'])?$_GET['radGender']:0;
    $address=isset($_GET['txtAddress'])?$_GET['txtAddress']:"";
    $level=isset($_GET['txtLevel'])?$_GET['txtLevel']:3;
    $action=isset($_GET['action'])?$_GET['action']:'';
    $uid=isset($_REQUEST['uid'])?$_REQUEST['uid']:"";
    switch ($action) {
        case 'add':
            require_once('View/add_user.php');
            break;
        case 'delete':
            require_once('View/delete_user.php');
            break;
        case 'edit':
            $user->update($uid,$fullname,$address,$email,$phone,$gender);
            require('View/User/view_user.php');
            break;
        case 'updateAddress':
            $address=isset($_REQUEST['address'])?$_REQUEST['address']:"";
            if($_REQUEST['sub-action']=="View"){
                $user->updateAddress($InfoUser['uid'],$address);
                $totalPrice=$_REQUEST['totalPrice'];
                header("Location: ../DO_AN_WEB/index.php?controller=Payment&action=view&totalPrice=$totalPrice");
            }
            if($_REQUEST['sub-action']=="BuyNow"){
                $pid=$_REQUEST['pid'];
                $user->updateAddress($InfoUser['uid'],$address);
                header("Location: ../DO_AN_WEB/index.php?controller=Payment&action=BuyNow&pid=$pid");
            }
            break;
        case 'list':
            $data=$db->getAllData("User");     
            require_once('View/view_user.php');
            break;
        case 'login':
            require('View/User/Login.php');
            break;
        case 'view':
            require('View/User/view_user.php');
            break;
        case 'register':
            require_once('View/User/Register.php');
            break;
        case 'checkLogin':
            if($user->checkLogin($username,$password,$level)==false){
                $username="";
                $password="";
                $_SESSION['login_error']="Đăng nhập thất bại";
                header("Location: ../DO_AN_WEB/index.php?controller=User&action=login");

            }
            else{
                $error="";
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                $_SESSION['level']=$level;
                $_SESSION['login_error']="";

                header("Location: ../DO_AN_WEB/index.php?controller=Home");
            }
            break;
        case 'checkRegister':
            if($user->checkRegister($username,$email,$phone,$level)==false){
                $_SESSION['register_error']="Tài khoản đã tồn tại";
                header("Location: ../DO_AN_WEB/index.php?controller=User&action=register");
            }
            else{
                $user->Register($username,$password,$fullname,$email,$phone,$address,$gender,$level);
                header("Location: ../DO_AN_WEB/index.php?controller=User&action=login");
            }
            break;
        default:
           
            break;
    }
?>