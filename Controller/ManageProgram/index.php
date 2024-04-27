<?php
    switch ($action) {
        case 'Manage-Product':
            $Categories=$categories->getListCategories();
            $cid=isset($_REQUEST['cid'])?$_REQUEST['cid']:"";
            //phan trang
            $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
            $num_row_of_page=10;
            $num_page=ceil($product->getNumrow($cid)/$num_row_of_page);
            if($page<1){
                $page=1;
            }
            if($page>$num_page){
                $page=$num_page;
            }
            $Product=$product->paginationProduct($cid,$page,$num_row_of_page);
            if(isset($_REQUEST['pid'])&&$_REQUEST['pid']!=""){
                $ProductEdit=$product->getInfoProduct($_REQUEST['pid']);
            }
            require('View/Product/View_Product.php');           
            break;
        case 'Manage-Categories':
            if(isset($_REQUEST['cid'])&&$_REQUEST['cid']!=""){
                $categoriesEdit=$categories->getCategories($_REQUEST['cid']);
            }
            $datas=$categories->getListCategories("Categories");
            require('View/Categories/View_Categories.php');           
            break;
        case 'Manage-Color':
            if(isset($_REQUEST['colorid'])&&$_REQUEST['colorid']!=""){
                $colorEdit=$color->getColor($_REQUEST['colorid']);
            }
            $datas=$color->getListColor("Color");
            require('View/Color/View_Color.php');           

            break;
        case 'Manage-Config':
            if(isset($_REQUEST['configid'])&&$_REQUEST['configid']!=""){
                $configEdit=$config->getConfig($_REQUEST['configid']);
            }
            $datas=$config->getListConfig();
            require_once("View/Config/View_Config.php");
            break;
        case 'Manage-Supplier':
            
            if(isset($_REQUEST['sid'])&&$_REQUEST['sid']!=""){
                $supplierEdit=$supplier->getSupplier($_REQUEST['sid']);
            }
            $datas=$supplier->getListSupplier("Supplier");
            require('View/Supplier/View_Supplier.php');           
            break;
        case 'Manage-Comment':
            require('View/Comment/View_Comment.php');
            break;
        case 'Manage-Order':
            $ostatus=isset($_REQUEST['ostatus'])?$_REQUEST['ostatus']:"";
            $quantity=$order->getQuantityOrder($ostatus);
            $page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
            $num_row_of_page=2;
            $num_page=ceil($order->getNumrow($ostatus)/$num_row_of_page);
            if($page<1){
                $page=1;
            }
            if($page>$num_page){
                $page=$num_page;
            }
            $datas=$order->paginationOrder($ostatus,$page,$num_row_of_page);
            require_once("View/Order/Manage_Order.php");
            break;
        case 'Update-Order-Status':
            $oid=isset($_REQUEST['oid'])?$_REQUEST['oid']:"";
            $ostatus=isset($_REQUEST['ostatus'])?$_REQUEST['ostatus']:"";
            $order->updateOrderStatus($oid,$ostatus);
            header("Location: ../DO_AN_WEB/index.php?controller=ManageProgram&action=Manage-Order");
        default:
            require('View/Staff/View_Staff.php');           
            break;
    }
?>