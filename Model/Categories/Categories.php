<?php
    class Categories extends Database{
        public function __construct()
        {
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function getListCategories(){
            $result=$this->getAllData('categories');
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getCategories($cid){
            $this->execute("SELECT*FROM categories WHERE cid=$cid");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function addCategories($cname,$cimage,$cdesc,$cstatus){
            $this->execute("SELECT*FROM categories where cname = '$cname'");
            if($this->num_rows()==0){
                $num1=$this->num_rows();
                $sql="INSERT INTO categories(cid,cname,cimage,cdesc,cstatus) VALUES(null,'$cname','$cimage','$cdesc',$cstatus)";
                $this->execute($sql);
                $this->getAllData('Categories');
                $num2=$this->num_rows();
                if($num1!=$num2){
                    return true;
                }
            }
            return false;         
        }
        public function updateCategories($cid,$cname,$cimage,$cdesc,$cstatus){
            $sql = "select * from categories where cname like '$cname' and cid<>$cid";
            $this->execute($sql);
            if ($this->num_rows()>0){
                return false;
            } else {
                $sql ="update categories set
                    cname='$cname',
                    cimage = '$cimage',
                    cdesc = '$cdesc',
                    cstatus = $cstatus

                where cid=$cid";		
                $this->execute($sql);
                return true;
            }
        }
        public function deleteCategories($cid){
            $sql="SELECT*FROM product where cid=$cid";
            $this->execute($sql);
            if($this->num_rows()==0){
                $this->execute("DELETE FROM categories WHERE cid=$cid");
                return true;
            }
            return false;
        }

        public function insertCategories($cname,$cdesc,$cimage){
            $sql="INSERT INTO categories(cid,cname,cimage,cdesc,cstatus) 
            VALUES(null,'$cname','$cimage','$cdesc',1)";
            return $this->execute($sql) ;
        }

        public function editCategories($cid,$cname,$cdesc,$cimage,$cstatus){
            $sql ="update categories set
				cname='$cname',
				cdesc='$cdesc',
				cimage='$cimage',
				cstatus=$cstatus           
				where cid=$cid";
               return $this->execute($sql);
        }


    }
?>