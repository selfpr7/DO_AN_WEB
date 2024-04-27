<?php
    class Product extends Database{
        public function __construct()
        {
            $this->connect();
        }
        public function getInfoProduct($pid){          
            $this->execute("SELECT * FROM product where pid=$pid");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
            
        }
        
        public function getColorIDProduct($pname,$configid){
         
            $result=$this->getDataBySQL("SELECT distinct colorid FROM product where pname = '$pname' and configid=$configid order by colorid asc");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
           
        }
       
        public function getConfigid($pname){//trả về danh sách cấu hình của 1 sản phẩm
          
            $result=$this->getDataBySQL("SELECT distinct configid FROM product where pname = '$pname' order by pprice asc");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
         
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function getListProductAtHomePage($cid){
            $sql="SELECT distinct pname from product where cid=$cid LIMIT 4";
            $result=$this->getDataBySQL($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
            
        }
        public function getMinConfigOfProduct($pname){
            $sql="SELECT a.*,b.configram ,b.configrom FROM product a, config b where pname='$pname' and a.configid=b.configid order by a.configid asc ,pprice desc limit 1";
            $this->execute($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function getPid($pname,$configid,$colorid){
            $sql="SELECT pid FROM product where pname='$pname' and configid=$configid and colorid=$colorid ";
            $this->execute($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function getNameProductByCid($cid){
            $sql="SELECT distinct pname from product where cid=$cid";
            $result=$this->getDataBySQL($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getProductByCid($cid){
            if($cid==""){
                return $this->getAllData('product');
            }else{
                return $this->getDataBySQL("SELECT * FROM product WHERE cid=$cid");
            }
        }
        public function paginationProduct($cid,$page,$num_row_of_page){
            if($cid==""){
                $sql="SELECT * FROM product limit ".$num_row_of_page*($page-1).",".$num_row_of_page;
               return  $this->getDataBySQL($sql);
            }else{
                $sql="SELECT * FROM product where cid=$cid limit ".$num_row_of_page*($page-1).",".$num_row_of_page;
                return $this->getDataBySQL($sql);
            }
        }
        public function getNumrow($cid){
            if($cid==""){
                $this->getAllData('product');
                return $this->num_rows();
            }else{
                $this->getDataBySQL("SELECT * FROM product WHERE cid=$cid");
                return $this->num_rows();
            }
        }
        public function insertProduct($pname,$pdesc,$pimage,$pprice,$pdiscount,$pquantity,$cid,$sid,$colorid,$configid){
            $sql="INSERT INTO product(pid,pname,pimage,pdesc,pprice,pquantity,pstatus,cid,`sid`,colorid,configid,pdiscount) 
            VALUES(null,'$pname','$pimage','$pdesc',$pprice,$pquantity,1,$cid,$sid,$colorid,$configid,$pdiscount)";
            return $this->execute($sql) ;
        }
        public function checkProduct($pid,$pname,$colorid,$configid){
            if($pid==""){
                $sql="SELECT *FROM product Where 
                pname='$pname'and
                colorid=$colorid and
                configid=$configid";
                $this->execute($sql);
                if($this->num_rows()==0){
                    return false;
                }else{
                    return true;
                }
            }
            else{
                $sql="SELECT *FROM product Where 
                pid <> $pid and
                pname='$pname'and
                colorid=$colorid and
                configid=$configid";
                $this->execute($sql);
                if($this->num_rows()==0){
                    return false;
                }
                else{
                    return true;
                }
            }
        }
        public function EditProduct($pid,$pname,$pdesc,$pimage,$pprice,$pdiscount,$pquantity,$cid,$sid,$colorid,$configid,$pstatus){
            $sql ="update product set
				pname='$pname',
				pdesc='$pdesc',
				pimage='$pimage',
				pprice=$pprice,
				pquantity=$pquantity,
				cid=$cid,
                sid=$sid,
				pstatus=$pstatus,
                pdiscount=$pdiscount,
                colorid=$colorid,
                configid=$configid
				where pid=$pid";
               return $this->execute($sql);
        }
        public function DeleteProduct($pid){
            return $this->execute("DELETE from product where pid=$pid");
        }
        public function searchProduct($key){
            return $this->getDataBySQL("SELECT distinct pname FROM product WHERE pname like '%".$key."%'");
        }
    }
?>