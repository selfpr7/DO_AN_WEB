<?php
    class Staff extends Database
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
            $this->connect();
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
            $this->connect();
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
        public function UpdatePassword($uid,$newPassword) {
            $this->execute("SELECT * FROM `user` where uid=$uid");
            if($this->num_rows()>0){
                $this->execute("UPDATE `user` SET upassword=$newPassword WHERE uid=$uid");
                return true;
            }
            return false;
        }
        public function UpdateInfo($uid,$fullname,$address,$birthyear,$gender,$email,$phone){
            $sql="UPDATE `user` set
            ufullname='$fullname',
            uaddress='$address',
            uemail='$email',
            ubirthyear='$birthyear',
            uphone='$phone',
            ugender='$gender'
            WHERE uid=$uid
            ";
            return $this->execute($sql);
        }
    }
?>