<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="View/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="View/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="View/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>
<?php


?>

<body>
    <div class="container">
        <div class="header clearfix">

            <h3 class="text-muted">VNPAY DEMO</h3>
        </div>
        <form class="form-group" action="" method="post">
            <input type="hidden" name="controller" value="VNPAY">
            <input type="hidden" name="action" value="VNPAY_PAY">
            <button type="submit">GIAO DỊCH THANH TOÁN</button>
        </form>
        <div class="form-group">
            <button onclick="querydr()">TRUY VẤN KẾT QUẢ THANH TOÁN</button><br>
        </div>
        <div class="form-group">
            <button onclick="refund()">HOÀN TIỀN GIAO DỊCH</button><br>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y')?></p>
        </footer>
    </div>
    <script>
    function querydr() {
        window.location.href = "vnpay_querydr.php";
    }

    function refund() {
        window.location.href = "vnpay_refund.php";
    }
    </script>
</body>

</html>