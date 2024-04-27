<?php
    class User extends Database
    {
        public function __construct()
        {
            $this->connect();

        }
        public function __destruct()
        {
            $this->disconnect();

        }
        
        public function checkLogin($username,$password,$level){
            $sql="SELECT * FROM user WHERE uusername='$username' AND upassword='$password' AND ulevel=$level";
            $result=$this->execute($sql);
            if($this->num_rows()==0){
                
                return false;
            }
            else{
                return true;
            }
           
        }
        public function checkRegister($username,$email,$phone,$level){
            $sql="SELECT * FROM user WHERE uusername='$username' and (uphone = '$phone' or uemail = '$email') and ulevel=$level";
            $result=$this->execute($sql);
            if($this->num_rows()>0){     //tim thay 1 tai khoan trong db

                return false;
            }
            else{//khong tim thay tai khoan trong db
                return true;
            }
            
        }
        public function Register($username,$password,$fullname,$email,$phone,$address,$gender,$level){
            $sql="INSERT INTO user(ufullname,uusername,upassword,uemail,uphone,uaddress,ugender,ulevel) VALUES('$fullname','$username','$password','$email','$phone','$address',$gender,$level)";
            $this->execute($sql);
                
        }
        public function getInfoUser($username,$password,$level){
            $sql="SELECT * FROM user WHERE uusername='$username' AND upassword='$password' AND ulevel=$level";
            $this->execute($sql);
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function getInfoUserById($uid){
            $this->execute("SELECT *FROM user WHERE uid=$uid");
            return $this->getData();
        }
        public function update($uid,$fullname,$address,$email,$phone,$gender){
            $sql="UPDATE `user` set
            ufullname='$fullname',
            uaddress='$address',
            uemail='$email',
            uphone='$phone',
            ugender='$gender'
            WHERE uid=$uid
            ";
            return $this->execute($sql);
        }
        public function updateAddress($uid,$Address) {
            return $this->execute("UPDATE `user` set uaddress='$Address' WHERE uid=$uid");
        }
    }
?>