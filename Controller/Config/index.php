<?php
$configram=isset($_REQUEST['txtConfigram'])?$_REQUEST['txtConfigram']:'';
$configrom=isset($_REQUEST['txtConfigrom'])?$_REQUEST['txtConfigrom']:'';

$configstatus=isset($_REQUEST['txtConfigstatus'])?$_REQUEST['txtConfigstatus']:"";
$configid=isset($_REQUEST['configid'])?$_REQUEST['configid']:"";
switch ($action) {
    case 'add':
        if($configram==""||$configrom=="")
        {
            $_SESSION['Config_add_error']="Vui lòng nhập đủ thông tin";
        }
        else{
            if($config->addConfig($configram,$configrom)==true){
                $_SESSION['Config_add_error']="Thêm mới cấu hình thành công";
            }
            else{
                $_SESSION['Config_add_error']="Thêm mới cấu hình thất bại";
            }
        }
        header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Config");

        break;
    case 'delete':
        if(!$config->deleteConfig($configid)){
            $_SESSION['config_delete_error']="Vui lòng xóa sản phẩm có cấu hình $configram-$configrom trước khi xóa";
        }
        else{
            $_SESSION['config_delete_error']="Xóa cấu hình thành công";
        }
        header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Config");

        break;

    case 'edit':
        if(!$config->updateConfig($configid,$configram,$configrom,$configstatus)){
            $_SESSION["config_edit_error"]="cấu hình $configram-$configrom Đã tồn tại";
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Config&sub-action=edit&configid=$configid");
        }
        else{
            $_SESSION["config_edit_error"]="Sửa thông tin cấu hình thành công";
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Config");
        }
        break;
    default:{//view
        require_once('View/Config/view_config.php');
        break;
    }
}

?>