<?php
session_start();
if ($_SESSION["user"]) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm admin</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
        $page = 7;
        include("header.php");
        include("provipbell.php");
        include("menu.php");
        ?>

        <div class="main">
            <form action="addadminproc.php" method="POST">
                <table class="table">


                    <tr>
                        <td class="t">Username</td>
                        <td><input class="form-control formx" type="text" name="user" id="user">
                            <span class="err" id="erruser"><?php if (isset($_GET["error"])) {
                                                                $error = $_GET["error"];
                                                                if ($error == 1) {
                                                                    echo "Username đã được sử dụng";
                                                                }
                                                            } ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="t">Họ Tên</td>
                        <td><input class="form-control formx" type="text" name="name" id="name">
                            <span class="err" id="errname"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="t">Mật khẩu</td>
                        <td><input class="form-control formx" type="password" name="pass" id="pass">
                            <span class="err" id="errpass"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class="t">Nhập lại mật khẩu</td>
                        <td><input class="form-control formx" type="password" id="repass">
                            <span class="err" id="errre"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="t">Ngày sinh</td>
                        <td><input class="form-control formx" type="date" id="dob" name="dob">
                            <span class="err" id="err-ntn"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="t">Email</td>
                        <td><input class="form-control formx" type="text" name="email" id="email">
                            <span class="err" id="erremail"><?php if (isset($_GET["error"])) {
                                                                $error = $_GET["error"];
                                                                if ($error == 2) {
                                                                    echo "Email đã được sử dụng";
                                                                }
                                                            } ?><span>
                        </td>
                    </tr>
                    <tr>
                        <td class="t">SĐT</td>
                        <td><input class="form-control formx" type="text" name="num" id="num">
                            <span class="err" id="errnum"><?php if (isset($_GET["error"])) {
                                                                $error = $_GET["error"];
                                                                if ($error == 3) {
                                                                    echo "SĐT đã được sử dụng";
                                                                }
                                                            } ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><button class="btn btn-primary" onclick="return check()">Đăng ký</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <script>
            function check() {
                var name = document.getElementById("name").value;
                var user = document.getElementById("user").value;
                var pass = document.getElementById("pass").value;
                var repass = document.getElementById("repass").value;
                var email = document.getElementById("email").value;
                var num = document.getElementById("num").value;
                var dob = document.getElementById("dob").value;
                var count = 0;
                //Lấy thẻ lỗi
                var errNTN = document.getElementById("err-ntn");
                var errname = document.getElementById("errname");
                var erruser = document.getElementById("erruser");
                var errpass = document.getElementById("errpass");
                var errre = document.getElementById("errre");
                var erremail = document.getElementById("erremail");
                var errnum = document.getElementById("errnum");
                var errntn = document.getElementById("err-ntn");

                var reguser = /^([A-Za-z0-9\_\.]+){8,16}$/;
                var resultuser = reguser.test(user);
                if (resultuser) {
                    erruser.innerHTML = "";
                    count++; //2
                } else {
                    erruser.innerHTML = "Sai";
                }
                var regpass = /^[A-Za-z1-9\d]{8,}$/;
                var resultpass = regpass.test(pass);
                if (resultpass) {
                    if (pass == repass) {
                        errpass.innerHTML = "";
                        errre.innerHTML = "";
                        count++; //3
                    } else {
                        errpass.innerHTML = "Mật khẩu không trùng khớp";
                        errre.innerHTML = "Mật khẩu không trùng khớp";
                    }
                } else {
                    errpass.innerHTML = "Ít nhất 8 ký tự";
                }
                var regemail = /^[A-Za-z0-9\.\_]+@[A-Za-z0-9\.]+$/;
                var resultemail = regemail.test(email);
                if (resultemail) {
                    erremail.innerHTML = "";
                    count++; //4
                } else {
                    erremail.innerHTML = "Email không hợp lệ";
                }
                var regnum = /^(\+84|0)[0-9]{9}$/;
                var resultnum = regnum.test(num);
                if (num === "") {
                    errnum.innerHTML = "Nhập SĐT";
                } else {
                    if (resultnum) {
                        errnum.innerHTML = "";
                        count++; //5
                    } else {
                        errnum.innerHTML = "SĐT không hợp lệ";
                    }
                }
                if (name === "") {
                    errname.innerHTML = "Nhập tên";
                } else {
                    errname.innerHTML = "";
                    count++; //6
                }
                if (count == 5) {
                    return true;
                }
                return false;
            }
        </script>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>