<?php
    class Cart extends Database{
        public function __construct(){
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function addProduct($pid,$uid){
            if($this->checkProductInCart($pid,$uid)==true){//th san pham da co trong gio hang
                $this->execute("SELECT cartquantity from cart where cartuid=$uid and cartpid=$pid");//lay ra so luong san pham khi chua cap nhat
                $result=$this->getData();
                $newquantity=$result['cartquantity']+1;
                $this->updateQuantityProduct($pid,$newquantity,$uid);//quantity là số lượng sản phẩm thêm vào hoặc lấy bớt ra
            }
            else{//th chua co trong gio hang
                $sql="INSERT INTO cart(cartid,cartpid,cartquantity,cartuid,cartstatus) VALUES(null,$pid,1,$uid,0)";
                $this->execute($sql);
                
                
            }
            return true;
        }
        public function deleteProduct($pid,$uid){
            $this->execute("DELETE FROM cart WHERE cartuid=$uid and cartpid=$pid");
        }
        public function updateQuantityProduct($pid,$quantity,$uid){
            $sql="UPDATE cart set cartquantity=$quantity where cartpid=$pid and cartuid=$uid";
            $this->execute($sql);
        }
        public function checkProductInCart($pid,$uid){
            $this->execute("SELECT*FROM cart WHERE cartpid=$pid and cartuid=$uid");
            if($this->num_rows()==0){
                return false;
            }         
            return true;
        }
        public function listProductInCart($uid){//hàm trả về danh sách các sản phẩm trong giỏ hàng
            $sql="SELECT*FROM cart where cartuid=$uid";
            $result=$this->getDataBySQL($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getInfoCartByCartID($cartid){
            $sql="SELECT a.*,b.* FROM `cart` a, `product` b where a.cartpid=b.pid and cartid=$cartid";
            //SELECT a.*, b.* FROM `cart` a, `product` b WHERE a.cartpid=b.pid and cartid=10;

            $result=$this->getDataBySQL($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getNumberProduct($uid){
            $sql="SELECT*FROM cart where cartuid=$uid";
            $this->execute($sql);
            return $this->num_rows();
        }
        public function getNumberProductSelected($uid){
            $sql="SELECT*FROM cart where cartuid=$uid and cartstatus=1";
            $this->execute($sql);
            return $this->num_rows();
        }
        public function getInfoCart($pid,$uid){
            $sql="SELECT * FROM cart where cartpid=$pid and cartuid=$uid";
            $this->execute($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function UpdateStatus($cartid){
            $this->execute("UPDATE cart set cartstatus=1 where cartid=$cartid");
        }
        public function UpdateQuantity($cartid,$quantity){
            $this->execute("UPDATE cart set cartquantity=$quantity where cartid=$cartid");

        }
        public function UnselectAllProduct() {
            $this->execute("UPDATE cart set cartstatus=0 ");

        }
        public function SelectAllProduct(){
            $this->execute("UPDATE cart set cartstatus=1 ");

        }

        
    }
?>