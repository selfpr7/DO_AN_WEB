<?php
$pid=$_GET['pid'];
$db->execute("SELECT*FROM product where pid=$pid");
$p_value=$db->getData();
?>