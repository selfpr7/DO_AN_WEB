<?php

    $pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:'';
    switch ($action) {
        case 'add':

            $pname=$_REQUEST['txtPname'];
            $pimage="";
            $pdesc=$_REQUEST['txtPdesc'];
            $pprice=$_REQUEST['txtPprice'];
            $cid=$_REQUEST['sltCategories'];
            $sid=$_REQUEST['sltSupplier'];
            $colorid=$_REQUEST['sltColor'];
            $configid=$_REQUEST['sltConfig'];
            $pdiscount=$_REQUEST['txtPdiscount'];
            $pquantity=$_REQUEST['txtPquantity'];
            $file_name=$_FILES['image']['name'];
            $folder_path='View/Images/';
            $file_path=$folder_path.$_FILES['image']['name'];
            $flag_ok=true;
            //check file bi trung
            if(file_exists($file_path)){
                $_SESSION['Product_add_error']="Hình ảnh đã tồn tại";

                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");
            }
            $ex=array('jpg','png','jpeg');
            $file_type=strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
            if(!in_array($file_type,$ex)){
                $_SESSION['Product_add_error']="File không hợp lệ";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");
            }
            //check dung luong
            if($_FILES['image']['size']>1000000){
                $_SESSION['Product_add_error']="Hình ảnh có dung lương quá lớn";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");

            }
            if($flag_ok){
                $pimage=$file_name;
                if($product->checkProduct("",$pname,$colorid,$configid)==true){
                    $_SESSION['Product_add_error']="Sản phẩm đã tồn tại";
                    header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=add");

                }
                else{
                    move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                    $product->insertProduct($pname,$pdesc,$pimage,$pprice,$pdiscount,$pquantity,$cid,$sid,$colorid,$configid);
                    $_SESSION['Product_add_error']="Thêm mới sản phẩm thành công";
                    header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product");

                }                     
            }
            break;
        case 'delete':
            $pid=$_REQUEST['pid'];
            $product->DeleteProduct($pid);
            $_SESSION['Product_delete_error']="Xóa sản phẩm thành công";
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product");

            break;

        case 'edit':
            $pid=$_REQUEST['txtpid'];
            $pname=$_REQUEST['txtPname'];
            $pimage=$_FILES['image']['name'];
            $pdesc=$_REQUEST['txtPdesc'];
            $pprice=$_REQUEST['txtPprice'];
            $pstatus=$_REQUEST['txtPstatus'];
            $cid=$_REQUEST['sltCategories'];
            $sid=$_REQUEST['sltSupplier'];
            $colorid=$_REQUEST['sltColor'];
            $configid=$_REQUEST['sltConfig'];
            $pdiscount=$_REQUEST['txtPdiscount'];
            $pquantity=$_REQUEST['txtPquantity'];
            $file_name=$_FILES['image']['name'];
            $folder_path='View/Images/';
            $file_path=$folder_path.$_FILES['image']['name'];
            $flag_ok=true;
            $ex=array('jpg','png','jpeg','gif','tiff','psd');
            $file_type=strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
            //kiem tra loai file
            if(!in_array($file_type,$ex)){
                $_SESSION['Product_edit_error']="File không hợp lệ2";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=edit&pid=$pid");
            }
            //check dung luong
            if($_FILES['image']['size']>1000000){
                $_SESSION['Product_edit_error']="Hình ảnh có dung lương quá lớn";
                $flag_ok=false;
                header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=edit&pid=$pid");

            }
            if($flag_ok){
                $pimage=$file_name;
                if($product->checkProduct($pid,$pname,$colorid,$configid)==true){
                    $_SESSION['Product_edit_error']="Sản phẩm đã tồn tại";
                    header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product&sub-action=edit&pid=$pid");

                }
                else{
                    move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
                    $product->EditProduct($pid,$pname,$pdesc,$pimage,$pprice,$pdiscount,$pquantity,$cid,$sid,$colorid,$configid,$pstatus);
                    $_SESSION['Product_edit_error']="Chỉnh sửa thông tin sản phẩm thành công";
                   header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Product");
                }                     
            }
            break;
        case "view":
            break;
        case 'detail':
            if(isset($_REQUEST['radConfigId'])){
                
                $configid=$_REQUEST['radConfigId'];
                $pname= $_REQUEST['Pname'];
                $colorid= $_REQUEST['colorId'];
                $pid=$product->getPid($pname,$configid,$colorid);

                $Comments=$comment->getComments($pid['pid']);//danh sach cac binh luan
                $p_value=$product->getInfoProduct($pid['pid']);//hàm trả về thông tin của sản phẩm gồm tên, giá, cấu hình, màu
                $configids=$product->getConfigid($p_value['pname']);//tra ve danh sach id cua cấu hình   
                require_once('View/Product/detail_product.php');            
            }
            else if(isset($_REQUEST['radColorId'])){
               
                $colorid=$_REQUEST['radColorId'];
                $pname=$_REQUEST['Pname'];
                $configid=$_REQUEST['configId'];               
                $pid=$product->getPid($pname,$configid,$colorid);
                $Comments=$comment->getComments($pid['pid']);//danh sach cac binh luan
                $p_value=$product->getInfoProduct($pid['pid']);//hàm trả về thông tin của sản phẩm gồm tên, giá, cấu hình, màu
                $configids=$product->getConfigid($p_value['pname']);//tra ve danh sach id cua cấu hình   
                require_once('View/Product/detail_product.php');

            }
            else{
                $pid=isset($_REQUEST['pid'])?$_REQUEST['pid']:'';             
                $Comments=$comment->getComments($pid);//danh sach cac binh luan
                $p_value=$product->getInfoProduct($pid);//hàm trả về thông tin của sản phẩm gồm tên, giá, cấu hình, màu
                $configids=$product->getConfigid($p_value['pname']);//tra ve danh sach id cua cấu hình   
                require_once('View/Product/detail_product.php');     
            }         
            break;
        case 'list':
            $cid=$_REQUEST['cid'];
            require('View/Product/list_product.php');
            break;
        case 'get_list_product_by_sql':
            //var_dump($product->getListProductAtHomePage(1));
            //require('Model/Product/list_product.php');
            require("View/Product/list_product.php");

            break;
        default:
            
            break;
    }
    ?>