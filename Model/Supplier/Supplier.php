<?php
    class Supplier extends Database{
        public function __construct()
        {
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function getListSupplier(){
            $result=$this->getAllData('supplier');
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getSupplier($sid){
            $this->execute("SELECT*FROM supplier WHERE sid=$sid");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function addSupplier($sname,$saddress,$sphone,$stax,$sstatus){
            $this->execute("SELECT*FROM supplier where sname = '$sname'");
            if($this->num_rows()==0){
                $num1=$this->num_rows();
                $sql="INSERT INTO Supplier(sid,sname,saddress,sphone,stax,sstatus) VALUES(null,'$sname','$saddress',$sphone,$stax,$sstatus)";
                $this->execute($sql);
                $this->getAllData('Supplier');
                $num2=$this->num_rows();
                if($num1!=$num2){
                    return true;
                }
            }
            return false;         
        }
        public function updateSupplier($sid,$sname,$saddress,$sphone,$stax,$sstatus){
            $sql = "select * from supplier where sname like '$sname' and sid<>$sid";
            $this->execute($sql);
            if ($this->num_rows()>0){
                return false;
            } else {
                $sql ="update supplier set
                    sname='$sname',
                    saddress='$saddress',
                    stax='$stax',
                    sphone=$sphone,
                    sstatus=$sstatus

                where sid=$sid";		
                $this->execute($sql);
                return true;
            }
        }
        public function deleteSupplier($sid){
            $sql="SELECT*FROM product where sid=$sid";
            $this->execute($sql);
            if($this->num_rows()==0){
                $this->execute("DELETE FROM supplier WHERE sid=$sid");
                return true;
            }
            return false;
        }
    }
?>