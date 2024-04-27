<?php
    class Order extends Database{
        public function __construct(){
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function CreateNewOrder($uid,$receivername,$address,$email,$phone,$payid,$Cartid){
            $sql="INSERT INTO `order`(oid,uid,payid,receivername,address,email,phone,ostatus)
            VALUES(null,$uid,$payid,'$receivername','$address','$email','$phone',0)";
            $this->execute($sql);
            $sql1 = "select oid from `order` where uid=".$uid." order by oid desc limit 0,1";
            $this->execute($sql1);
            $r = $this->getData();
        
                foreach($Cartid as $id){
                
                $this->execute("SELECT * FROM cart where cartid=".$id." and cartuid=$uid");
                $item=$this->getData();
                $this->execute("SELECT pprice,pquantity from product where pid=".$item['cartpid']);
                $infoProduct=$this->getData();
                $price=$infoProduct['pprice'];
                $this->execute("insert into orderdetail(oid,pid,quantity,price) values (".$r["oid"].",".$item["cartpid"].",".$item["cartquantity"]."," .$price.")") ;
                $oldquantity=$infoProduct['pquantity'];
                $newquantity=$oldquantity-$item['cartquantity'];
                $this->execute("DELETE FROM cart where cartid=".$id) ;
                $this->execute("UPDATE product set pquantity=$newquantity where pid=".$item['cartpid']);
            }
        }
        public function CreateNewOrder2($uid,$receivername,$address,$email,$phone,$payid,$pid,$quantity){
            $sql="INSERT INTO `order`(oid,uid,payid,receivername,address,email,phone,ostatus)
            VALUES(null,$uid,$payid,'$receivername','$address','$email','$phone',0)";
            $this->execute($sql);
            $sql1 = "select oid from `order` where uid=".$uid." order by oid desc limit 0,1";
            $this->execute($sql1);
            $r = $this->getData();
            $this->execute("SELECT*FROM product WHERE pid=$pid");
            $Product=$this->getData();
            $newquantity=$Product['pquantity']-$quantity;
            $this->execute("insert into orderdetail(oid,pid,quantity,price) values (".$r["oid"].",".$pid.",".$quantity."," .($Product['pprice']*(100-$Product['pdiscount'])/100).")") ;
            $this->execute("UPDATE product set pquantity=$newquantity where pid=$pid");
            
        }
             
        public function ListOfOrders($uid,$ostatus){
            return $this->getDataBySQL("SELECT*FROM `order` where `uid`=$uid and `ostatus`=$ostatus");
        }
        public function AllOrders($uid){
            return $this->getDataBySQL("SELECT*FROM `order` order by ostatus asc,oid desc");
        }
        public function getInfoOrderDetail($oid){
            return $this->getDataBySQL("SELECT*FROM orderdetail where oid=$oid");
        }
        public function updateOrderStatus($oid,$ostatus){
            return $this->execute("UPDATE `order` SET ostatus=$ostatus WHERE oid=$oid");
        }
        public function getListOrderByStatus($ostatus){
            if($ostatus==""){
                return $this->getDataBySQL("SELECT a.*,b.* FROM `order` a,`user` b where a.uid=b.uid order by a.oid desc, a.uid desc");
            }
            else{
                return $this->getDataBySQL("SELECT a.*,b.* FROM `order` a, `user` b where a.uid=b.uid and a.ostatus=$ostatus order by a.oid desc,a.uid desc");
            }
        }
        public function getQuantityOrder($ostatus){
            if($ostatus==""){
                $this->getAllData('`order`');
                return $this->num_rows();
            }
            else{
                $this->getDataBySQL("SELECT * FROM `order` where ostatus=$ostatus");
                return $this->num_rows();
            }
        }
        public function paginationOrder($ostatus,$page,$num_row_of_page){
            if($ostatus==""){
                $sql="SELECT a.*,b.* FROM `order` a,`user` b where a.uid=b.uid order by a.oid desc, a.uid desc limit ".$num_row_of_page*($page-1).",".$num_row_of_page;
               return  $this->getDataBySQL($sql);
            }else{
                $sql="SELECT a.*,b.* FROM `order` a,`user` b where a.uid=b.uid and ostatus=$ostatus order by a.oid desc, a.uid desc  limit ".$num_row_of_page*($page-1).",".$num_row_of_page;
                return $this->getDataBySQL($sql);
            }
        }
        public function getNumrow($ostatus){
            if($ostatus==""){
                $this->getAllData('`order`');
                return $this->num_rows();
            }else{
                $this->getDataBySQL("SELECT * FROM `order` WHERE ostatus=$ostatus");
                return $this->num_rows();
            }
        }
       
    }
?>