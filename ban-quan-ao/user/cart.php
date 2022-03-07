<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="cart.css">

<body>
    <?php
    include("header.php");
    ?>
    <div id="cart">
        <h1>Giỏ hàng</h1>
        <div>
            <img src="empty_cart.jpg">
        </div>
        <h5>Không có sản phẩm nào trong giỏ hàng của bạn</h5>
    </div>
</body>

</html>