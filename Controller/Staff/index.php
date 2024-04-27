<?php

use PgSql\Lob;

    $username=isset($_REQUEST['txtUsername'])?$_REQUEST['txtUsername']:"";
    $password=isset($_REQUEST['txtPassword'])?$_REQUEST['txtPassword']:"";
    $fullname=isset($_REQUEST['txtFullname'])?$_REQUEST['txtFullname']:"";
    $email=isset($_REQUEST['txtEmail'])?$_REQUEST['txtEmail']:"";
    $phone=isset($_REQUEST['txtPhone'])?$_REQUEST['txtPhone']:"";
    $gender=isset($_REQUEST['radGender'])?$_REQUEST['radGender']:0;
    $address=isset($_REQUEST['txtAddress'])?$_REQUEST['txtAddress']:"";
    $level=isset($_REQUEST['txtLevel'])?$_REQUEST['txtLevel']:3;
    $birthyear=isset($_REQUEST['dteBirthYear'])?$_REQUEST['dteBirthYear']:"";
    $action=isset($_REQUEST['action'])?$_REQUEST['action']:'';
    switch ($action){
        case "ManageProgram":
            require_once("View/ManageProgram/Home.php");
            break;
        case "Login":
            require_once("View/Staff/Login.php");
            break;
        case "Register":         
            require_once("View/Staff/Register.php");
            break;
        case 'checkLogin':
            if($staff->checkLogin($username,$password,$level)==false){
                $username="";
                $password="";
                $_SESSION['login_error']="Đăng nhập thất bại";
                header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=login");

            }
            else{
                $error="";
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                $_SESSION['level']=$level;
                $_SESSION['login_error']="";

                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram");
            }
            break;
        case 'checkRegister':
            if($staff->checkRegister($username,$email,$phone,$level)==false){
                $_SESSION['register_error']="Tài khoản đã tồn tại";
                header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=Register");
            }
            else{
                $staff->Register($username,$password,$fullname,$email,$phone,$address,$gender,$level);
                
                header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=Login");
            }
            break;  
        case 'View':
            require_once("View/Staff/View_Staff.php");
            break;
        case 'Edit_View':
            require_once("View/Staff/Edit_Staff.php");
            break;
        case 'UpdatePassword_View':
            require_once("View/Staff/UpdatePassword.php");
            break;
        case 'Update':
            $uid=$InfoUser['uid'];
            $staff->UpdateInfo($uid,$fullname,$address,$birthyear,$gender,$email,$phone);
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram");
            break;
        case 'UpdatePass':
            $uid=$InfoUser['uid'];
            echo $oldPassword=$_REQUEST['txtOldPass'];
            echo $newPassword=$_REQUEST['txtNewPass'];
            echo $newPassword2=$_REQUEST['txtNewPass2'];
            if($newPassword==$newPassword2){
                if($oldPassword<>$InfoUser['upassword']){
                    $_SESSION['update_password_error']="Mật khẩu cũ không đúng, vui lòng nhập lại";
                    header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=UpdatePassword_View");

                }else{
                    if($staff->UpdatePassword($uid,$newPassword)==true){
                        header("Location: ../DO_AN_WEB/index.php?controller=Staff");
                    }else{
                    $_SESSION['update_password_error']="Đổi mật khẩu thất bại";
                    header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=UpdatePassword_View");
                    }
                }
            }
            else{
                $_SESSION['update_password_error']="Mật khẩu nhập lại không trùng với mật khẩu mới";
                header("Location: ../DO_AN_WEB/index.php?controller=Staff&action=UpdatePassword_View");
            }
            break;
        default: 
            require_once("View/Staff/Login.php");
            break;
    }
?>