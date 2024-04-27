<?php
    class Color extends Database{
        public function __construct()
        {
            $this->connect();
        }
        public function getColorName($colorid){
            $this->execute("SELECT colorname FROM color where colorid = $colorid");
            $result=$this->getData();
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result['colorname'];
            }         
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function getListColor(){
            $result=$this->getAllData('color');
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $result;
            }
        }
        public function getColor($colorid){
            $this->execute("SELECT*FROM color WHERE colorid=$colorid");
            if($this->num_rows()==0){
                return 0;
            }
            else{
                return $this->getData();
            }
        }
        public function addColor($colorname,$colorstatus){
            $this->execute("SELECT*FROM color where colorname = '$colorname'");
            if($this->num_rows()==0){
                $num1=$this->num_rows();
                $sql="INSERT INTO Color(colorid,colorname,colorstatus) VALUES(null,'$colorname',$colorstatus)";
                $this->execute($sql);
                $this->getAllData('Color');
                $num2=$this->num_rows();
                if($num1!=$num2){
                    return true;
                }
            }
            return false;         
        }
        public function updateColor($colorid,$colorname,$colorstatus){
            $sql = "select * from color where colorname like '$colorname' and colorid<>$colorid";
            $this->execute($sql);
            if ($this->num_rows()>0){
                return false;
            } else {
                $sql ="update color set
                    colorname='$colorname',
                    colorstatus = $colorstatus

                where colorid=$colorid";		
                $this->execute($sql);
                return true;
            }
        }
        public function deleteColor($colorid){
            $sql="SELECT*FROM  product where colorid=$colorid";
            $this->execute($sql);
            if($this->num_rows()==0){
                $this->execute("DELETE FROM color WHERE colorid=$colorid");
                return true;
            }
            return false;
        }
    }
?>