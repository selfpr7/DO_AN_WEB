<?php 
require("../../Model/DBConfig.php");
$database=new Database();
$database->connect();
	$keyword = $_REQUEST["keyword"];
	$result=$database->readProduct($keyword);
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <div id="country-list">

        <?php 
			if($result!=null){
				foreach($result as $row){
		?>
        <div onClick="selectCountry('<?php echo $row["pname"];?>');" class="item">
            <?php echo $row["pname"];?>
        </div>
        <?php 
		} 
		}
				?>
    </div>
</body>
<?php
$database->disconnect();
?>

</html>