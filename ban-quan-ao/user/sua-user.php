<?php
session_start();
if ($_SESSION["EmailU"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông tin tài khoản</title>
    </head>

    <body>
        <?php
        $MaUser = $_SESSION["MaUser"];
        include("index.php");
        include("../connect/open.php");
        $sql = "SELECT * FROM `user` WHERE  `user`.`MaUser` = '$MaUser'";
        $result = mysqli_query($con, $sql);
        $check = mysqli_num_rows($result);
        $U = mysqli_fetch_array($result);
        include("../connect/close.php");
        ?>
    </body>
    <h2>Thông tin tài khoản</h2>
    <table style="margin:10%;">
        <form action="sua-user-prs.php" method="POST">
            <input type="hidden" name="MaUser" value="<?php echo $MaUser ?>"><br>
            Tên:<input name="TenUser" value="<?php echo $U["TenUser"] ?>"><br>
            Mật khẩu:<input name="PasswordU" value="<?php echo $U["PasswordU"] ?>"><br>
            Giới tính:
            <input type="radio" name="GioiTinhU" value="1" <?php if ($U["GioiTinhU"] == 1) {
                                                                echo "checked";
                                                            } ?>>Nam
            <input type="radio" name="GioiTinhU" value="0" <?php if ($U["GioiTinhU"] == 0) {
                                                                echo "checked";
                                                            } ?>>Nữ<br>
            Ngày Sinh: <input type="date" name="NgaySinhU" value="<?php echo $U["NgaySinhU"] ?>"><br>
            Email: <input name="EmailU" value="<?php echo $U["EmailU"] ?>"><br>
            Số điện thoại <input name="SdtU" value="<?php echo $U["SdtU"] ?>"><br>
            <button>Sửa</button>
        </form>
    </table>

    </html>
<?php
} else {
    header("Location: trang-chu.php");
}
?>