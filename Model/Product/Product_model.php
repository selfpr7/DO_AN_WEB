<?php
    class Product_Model{
        private $pid;
        private $pname;
        private $pimage;
        private $pdesc;
        private $pprice;
        private $pquantity;
        private $pstatus;
        private $cid;
        private $sid;
        private $colorid;
        public function __construct($pid,$pname,$pimage,$pdesc,$pprice,$pquantity,$pstatus,$cid,$sid,$colorid) {
            $this->pid=$pid;
            $this->pname=$pname;
            $this->pimage=$pimage;
            $this->pdesc=$pdesc;
            $this->pprice=$pprice;
            $this->pquantity=$pquantity;
            $this->pstatus=$pstatus;
            $this->sid=$sid;
            $this->cid=$cid;
            $this->colorid=$colorid;
        }
        public function setPid($pid){
            $this->pid=$pid;
        }
        public function setPname($pname){
            $this->pname=$pname;
        }
        public function setPimage($pimage){
            $this->pimage=$pimage;
        }
        public function setPdesc($pdesc){
            $this->pdesc=$pdesc;
        }
        public function setPprice($pprice){
            $this->pprice=$pprice;
        }
        public function setPquantity($pquantity){
            $this->pquantity=$pquantity;
        }
       
        public function setPstatus($pstatus){
            $this->pstatus=$pstatus;
        }
        public function setCid($cid){
            $this->cid=$cid;
        }
        public function setSid($sid){
            $this->sid=$sid;
        }
        public function setColorid($colorid){
            $this->colorid=$colorid;
        }
        public function getPid(){
            return $this->pid ;
        }
        public function getPname(){
            return $this->pname ;
        }
        public function getPimage(){
            return $this->pimage ;
        }
        public function getPdesc(){
            return $this->pdesc ;
        }
        public function getPprice(){
            return $this->pprice ;
        }
        public function getPquantity(){
            return $this->pquantity ;
        }
        public function getPstatus(){
            return $this->pstatus ;
        }
        public function getCid(){
            return $this->cid ;
        }
        public function getSid(){
            return $this->sid ;
        }
        public function getColorid(){
            return $this->colorid ;
        }
    }
?>