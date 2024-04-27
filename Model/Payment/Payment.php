<?php
    class Payment extends Database{
        public function __construct(){
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function listProductOrder($uid){//hàm trả về danh sách các sản phẩm trong giỏ hàng
            $sql="SELECT*FROM cart where cartuid=$uid and cartstatus=1";
            $result=$this->getDataBySQL($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getNumberProduct($uid){
            $sql="SELECT*FROM cart where cartid=$uid and cart status=1";
            $result=$this->getDataBySQL($sql);
            return $this->num_rows();
        }
        public function MethodPay() {
            return $this->getAllData("payment");
        }
    }
?>