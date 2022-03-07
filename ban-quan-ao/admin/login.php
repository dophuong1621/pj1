<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../access/login.css">
    <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="login">
        <form action="loginproc.php" method="POST">
            <div class="form-group">
                <div class="form-group"><input type="text" class="form-control lg" id="user" placeholder="User" name="user">
                    <span id="erruser" class="err"></span>
                </div>
                <div class="form-group"><input type="password" class="form-control lg" id="pass" name="pass" placeholder="Password">
                    <span id="errpass" class="err"></span>
                </div>
                <div class="err"><?php if (isset($_GET["error"])) {
                                        $error = $_GET["error"];
                                        if ($error == 1) {
                                            echo "Sai tên đăng nhập hoặc mật khẩu";
                                        } else {
                                            echo "Tài khoản bị khóa";
                                        }
                                    } ?></div>
                <button class="btn btn-primary btn-sm" onclick="return check()">Login</button>
            </div>
        </form>
    </div>
    <script>
        function check() {
            var dem = 0;
            var u = document.getElementById("user").value;
            var p = document.getElementById("pass").value;
            var erru = document.getElementById("erruser");
            var errp = document.getElementById("errpass");
            if (u === '') {
                erru.innerHTML = "Điền tên đăng nhập";
            } else {
                erru.innerHTML = "";
                dem++;
            }
            if (p === '') {
                errp.innerHTML = "Điền mật khẩu";
            } else {
                errp.innerHTML = "";
                dem++;
            }
            if (dem == 2) {
                return true;
            }
            return false;
        }
    </script>
    <?php include("../admin/footer.php"); ?>
</body>

</html>