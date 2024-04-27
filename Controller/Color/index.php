<?php
$colorname=isset($_REQUEST['txtColorname'])?$_REQUEST['txtColorname']:'';
$colorstatus=isset($_REQUEST['txtColorstatus'])?$_REQUEST['txtColorstatus']:"";
$colorid=isset($_REQUEST['colorid'])?$_REQUEST['colorid']:"";
switch ($action) {
    case 'add':
        if($colorname=="")
        {
            $_SESSION['Color_error']="Vui lòng nhập đủ thông tin";
        }
        else{
            if($color->addColor($colorname,$colorstatus)==true){
                $_SESSION['Color_error']="Thêm mới màu sắc thành công";
            }
            else{
                $_SESSION['Color_error']="Thêm mới màu sắc thất bại";
            }
        }
        header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Color");

        break;
    case 'delete':
        if(!$color->deleteColor($colorid)){
            $_SESSION['color_delete_error']="Vui lòng xóa sản phảm có màu $colorid trước khi xóa";
        }
        else{
            $_SESSION['color_delete_error']="Xóa màu thành công";
        }
        header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Color");

        break;

    case 'edit':
        if(!$color->updateColor($colorid,$colorname,$colorstatus)){
            $_SESSION["color_edit_error"]="Màu $colorname Đã tồn tại";
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Color&sub-action=edit&colorid=$colorid");
        }
        else{
            $_SESSION["color_edit_error"]="Sửa thông tin màu thành công";
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Color");
        }
        break;
    default:{//view
        require_once('View/Color/view_color.php');
        break;
    }
}

?>