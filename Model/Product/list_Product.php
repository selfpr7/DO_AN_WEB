<?php
    switch ($action) {
        case 'getAllData':
            $pvalues=$db->getAllData("Product");
           
            break;
        case 'getDataBySQL':
            $pvalues=$db->getDataBySQL($sql);
            $p_quantity=$db->num_rows();
            break;
        default:
            # code...
            break;
    }
    
?>