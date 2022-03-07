<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="contact.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php
    include("header.php");
    ?>
    <h2 class="row" style="margin: revert;">Liên hệ</h2>
    <table class="column">
        <h3 class="title">Shop</h3>
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fa fa-phone"></i>
                <a class="contact-info">0522901602</a>
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fa fa-home"></i>
                <a class="contact-info">A17 Tạ Quang Bửu</a>
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fa fa-envelope"></i>
                <a href="#" class="contact-info">9a3.c2phuongliet.thephuong@gmail.com</a>
            </div>
        </div>
    </table>
    <table class="column">
        <div>
            <div class="ct">
                <form action="">
                    <div class="input-box">
                        <input type="text" placeholder="Họ và tên">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Số điện thoại">
                    </div>
                    <textarea class="input-box" input placeholder="Nội dung">
                    </textarea>
                    <button>Gửi</button>
            </div>
            </form>
        </div>

        </div>
    </table>
</body>

</html>