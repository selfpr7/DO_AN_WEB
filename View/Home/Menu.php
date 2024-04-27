<?php

require_once "Model/Categories/list_categories.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.Menu {
    height: 40px;
    width: 100%;
    background-color: black;
}

ul {
    width: 80%;
    margin-left: 10%;
    display: flex;
    justify-content: space-between;
    line-height: 40px;
}

li {
    list-style: none;
}

a {
    text-align: center;
    color: aliceblue;
}
</style>

<body>
    <div class="Menu">
        <ul>
            <?php
            foreach ($cvalue as $value) {
            ?>
            <li>
                <a
                    href="../DO_AN_WEB/index.php?controller=Home&action=display_list_product_by_cid&cid=<?php echo $value['cid']?>"><?php echo $value['cname']?></a>
            </li>
            <?php   
            }
            ?>
        </ul>
    </div>
</body>

</html>