<?php
 class Config extends Database{
    public function __construct()
    {
        $this->connect();
    }
    public function __destruct()
    {
        $this->disconnect();
    }
    public function getConfig($configid){
        $this->connect();
        $this->execute("SELECT * FROM config where configid=$configid");
        $result=$this->getData();
        if($this->num_rows()==0){
            return 0;
        }
        else{
            return $result;
        }
        
        $this->disconnect();
    }
    public function getListConfig(){
        $result=$this->getAllData('config');
        if($this->num_rows()==0){
            return 0;
        }
        else{
            return $result;
        }
    }
    public function addConfig($configram,$configrom){
        $this->execute("SELECT*FROM config where configram = '$configram' and configrom='$configrom'");
        if($this->num_rows()==0){
            $num1=$this->num_rows();
            $sql="INSERT INTO config(configid,configram,configrom,configstatus) VALUES(null,'$configram','$configrom',1)";
            $this->execute($sql);
            $this->getAllData('config');
            $num2=$this->num_rows();
            if($num1!=$num2){
                return true;
            }
        }
        return false;         
    }
    public function updateConfig($configid,$configram,$configrom,$configstatus){
        $sql = "select * from config where configram = '$configram' and configrom = '$configrom' and configid != $configid";
        $this->execute($sql);
        if ($this->num_rows()>0){
            return false;
        } else {
            $sql ="update config set
                configram='$configram',
                configrom='$configrom',
                configstatus=$configstatus

            where configid=$configid";		
            $this->execute($sql);
            return true;
        }
    }
    public function deleteConfig($configid){
        $sql="SELECT*FROM product where configid=$configid";
        $this->execute($sql);
        if($this->num_rows()==0){
            $this->execute("DELETE FROM config WHERE configid=$configid");
            return true;
        }
        return false;
    }
}
?>