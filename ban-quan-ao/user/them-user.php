<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="login.css" type="text/css" rel="stylesheet" />
</head>
<style>

</style>

<body>
    <?php
    include("header.php");
    ?>
    <table border="1">
        <h3>Đăng kí thành viên mới</h3>
        <form action="them-user-prs.php" method="POST">
            <div class="input-box">
                <input type="text" placeholder="Họ và tên" name="TenUser" id="user" required>
                <span id="err-user" class="error"></span>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Mật khẩu" name="PasswordU" id="PasswordU" required>
                <span id="err-pass" class="error"></span>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Nhập lại mật khẩu" name="re-PasswordU" id="rePasswordU" required>
                <span id="err-re-PasswordU" class="error"></span>
            </div>
            <div class="input-box">
                <input type="date" name="NgaySinhU" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Email" name="EmailU" id="EmailU" required>
                <span id="err-EmailU" class="error"></span>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Số điện thoại" name="SdtU" id="SdtU" required>
                <span id="err-SdtU" class="error"></span>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Địa chỉ" name="dia-chi" id="DiaChiU" required>
                <span id="err-DiaChiU" class="error"></span>
            </div>
            <div class="input-box">
                <button onchange="return check()">Đăng kí</button>
            </div>
        </form>
    </table>
    <script src="dk.js"></script>
</body>

</html>