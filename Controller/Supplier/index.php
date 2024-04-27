<?php
//xong
    $action=isset($_GET['action'])?$_GET['action']:'';
    $sname=isset($_GET['txtSname'])?$_GET['txtSname']:'';
    $saddress=isset($_GET['txtSaddress'])?$_GET['txtSaddress']:"";
    $sphone=isset($_GET['txtSphone'])?$_GET['txtSphone']:"";
    $stax=isset($_GET['txtStax'])?$_GET['txtStax']:"";
    $sstatus=isset($_GET['txtSstatus'])?$_GET['txtSstatus']:"";
    $sid=isset($_GET['sid'])?$_GET['sid']:"";
    switch ($action) {
        case 'add':
            if($sname==""||$saddress==""||$sphone==""||$stax==""||$sstatus=="")
            {
                $_SESSION['Supplier_error']="Vui lòng nhập đủ thông tin";
            }
            else{
                if($supplier->addSupplier($sname,$saddress,$sphone,$stax,$sstatus)==true){
                    $_SESSION['Supplier_error']="Thêm mới nhà cung cấp thành công";
                }
                else{
                    $_SESSION['Supplier_error']="Thêm mới nhà cung cấp thất bại";
    
                }
            }
            header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Supplier");

            break;
        case 'delete':
            if(!$supplier->deleteSupplier($sid)){
                $_SESSION['supplier_delete_error']="Vui lòng xóa sản phẩm có mã nhà cung cấp là $sid trước khi xóa";
            }
            else{
                $_SESSION['supplier_delete_error']="Xóa nhà cung cấp thành công";
            }
            header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Supplier");

            break;

        case 'edit':
            if(!$supplier->updateSupplier($sid,$sname,$saddress,$sphone,$stax,$sstatus)){
                $_SESSION["supplier_edit_error"]="Nhà cung cấp $sname Đã tồn tại";
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Supplier&sub-action=edit&sid=$sid");
            }
            else{
                $_SESSION["supplier_edit_error"]="Thêm mới nhà cung cấp thành công";
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Supplier");
            }
            break;
        default:{
            require_once('View/Supplier/view_supplier.php');
            break;
        }
    }
?>