<?php
    $action=isset($_REQUEST['action'])?$_REQUEST['action']:'';
    switch ($action) {
        case 'cart':
           
            break;
        case 'account':

            break;

        case 'info':

            break;
        case 'search':
            $key=isset($_REQUEST['txtKey'])?$_REQUEST['txtKey']:"";
            $pvalues=$product->searchProduct($key);
            require('View/Product/list_product.php');
            break;
        case 'display_list_product_by_cid':
            $cid=$_GET['cid'];
            $pvalues=$product->getNameProductByCid($cid);
            require('View/Product/list_product.php');         
            break;
        default:
            $cvalue=$categories->getListCategories();//tra ve mang cac cid
            require('View/Home/HomePage.php');
            break;
    }
    
?>