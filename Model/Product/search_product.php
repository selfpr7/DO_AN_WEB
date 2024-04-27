<?php
    if($key!=""){
        $pvalues=$db->SearchProduct($key);
        $p_quantity=$db->num_rows();  
        if($p_quantity==0){
            $message="Tìm thấy 0 kết quả với từ khóa".$key;
        } 
        
    }
    else{
        $p_quantity=0;
        $message="";
    }
?>