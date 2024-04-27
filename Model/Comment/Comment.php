<?php
    class Comment extends Database{
        public function __construct()
        {
            $this->connect();
        }
        public function __destruct()
        {
            $this->disconnect();
        }
        public function getComments($pid) {
            return $this->getDataBySQL("SELECT * FROM comment where pid=$pid order by coDate desc");
        }
        public function updateComment($coid,$coContent){
            return $this->execute("UPDATE comment SET cocontent='$coContent' WHERE coid=$coid");
        
        }
        public function addComment($uid,$pid,$coContent){
            return $this->execute("INSERT INTO comment(coid,uid,pid,cocontent,costatus) VALUES(null,$uid,$pid,'$coContent',1)");
        }
        public function deleteComment($coid) {
           
            return $this->execute("DELETE from comment WHERE coid=$coid");
        }
    }
?>