<?php
    $action=isset($_REQUEST['action'])?$_REQUEST['action']:'';
    
    $cid=isset($_REQUEST['cid'])?$_REQUEST['cid']:"";
    switch ($action) {
        case 'add':
            echo $cname=isset($_REQUEST['txtCname'])?$_REQUEST['txtCname']:'';
            $cimage="";
            $cdesc=isset($_REQUEST['txtCdesc'])?$_REQUEST['txtCdesc']:"";
            $cstatus=isset($_REQUEST['txtCstatus'])?$_REQUEST['txtCstatus']:"";
            $file_name=$_FILES['image']['name'];
            $folder_path='View/Images/';
            $file_path=$folder_path.$_FILES['image']['name'];
            $flag_ok=true;
            $ex=array('jpg','png','jpeg','gif','tiff','psd');
            $file_type=strtolower(pathinfo($file_path,PATHINFO_EXTENSION));

            if(!in_array($file_type,$ex)){
                $_SESSION['Categories_add_error']="File không hợp lệ";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Categories&sub-action=add");
            }
            

            if($_FILES['image']['size']>100000000000){
                $_SESSION['Categories_add_error']="Hình ảnh có dung lương quá lớn";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");

            }

            
            if($flag_ok){
                $cimage=$file_name;
                    move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                    $categories->addCategories($cname,$cimage,$cdesc,$cstatus);
                    $_SESSION['Categories_add_error']="Thêm mới danh mục thành công";
                    header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Categories");
            }

            break;
        case 'delete':
            if(!$categories->deleteCategories($cid)){
                $_SESSION['Categories_delete_error']="Vui lòng xóa sản phẩm có mã danh mục là $cid trước khi xóa";
            }
            else{
                $_SESSION['Categories_delete_error']="Xóa danh mục thành công";
            }
            header("location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Categories");

            break;

        case 'edit':
            
            $cname=isset($_REQUEST['txtCname'])?$_REQUEST['txtCname']:'';
            $pimage=$_FILES['image']['name'];
            $cdesc=isset($_REQUEST['txtCdesc'])?$_REQUEST['txtCdesc']:"";
            $cstatus=isset($_REQUEST['txtCstatus'])?$_REQUEST['txtCstatus']:"";
            $file_name=$_FILES['image']['name'];
            $folder_path='View/Images/';
            $file_path=$folder_path.$_FILES['image']['name'];
            $flag_ok=true;
            $ex=array('jpg','png','jpeg','gif','tiff','psd');
            $file_type=strtolower(pathinfo($file_path,PATHINFO_EXTENSION));

           
            

            if($_FILES['image']['size']>100000000000){
                $_SESSION['Product_add_error']="Hình ảnh có dung lương quá lớn";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");

            }

            
            if($flag_ok){
                $cimage=$file_name;
                    move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                    $categories->editCategories($cid,$cname,$cdesc,$cimage,$cstatus);
                    $_SESSION['Categories_add_error']="Cập nhật  danh mục thành công";
                    header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Categories");
            }

        default:{
            require_once('View/Categories/view_categories.php');
            break;
        }
    }
?>