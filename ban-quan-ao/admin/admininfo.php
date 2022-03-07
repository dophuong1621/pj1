<?php
session_start();
if (isset($_SESSION["maAdmin"]) && isset($_SESSION["Admin"])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin admin</title>
    <link rel="stylesheet" href="../access/login.css">
    <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <?php
    include("header.php");
    $adid = $_SESSION["maAdmin"];
    include("../connect/open.php");
    $sql = "SELECT * FROM admin WHERE admin.MaAdmin = $adid";
    $result = mysqli_query($con, $sql);
    $p = mysqli_fetch_array($result);
    include("../connect/close.php");
    ?>
    <?php
    $page = 8;
    include("provipbell.php");
    include("menu.php") ?>
    <div class="main">
        <form action="changeadmininfo.php" method="POST">
            <table class="table"><input type="hidden" name="id" value="<?php echo $adid ?>">
                <tr>
                    <td class="t">Tên</td>
                    <td><input class="form-control formx" type="text" name="aname" id="aname" value="<?php echo $p["TenAdmin"] ?>">
                        <span id="errname" class="err"></span>
                    </td>
                </tr>

                <tr>
                    <td class="t">Ngày sinh</td>
                    <td><input class="form-control formx" type="date" name="dob" id="dob" value="<?php echo $p["NgaySinhA"] ?>"></td>
                </tr>
                <tr>
                    <td class="t">Email</td>
                    <td><input class="form-control formx" type="text" name="amail" id="amail" value="<?php echo $p["EmailA"] ?>">
                        <span id="erremail" class="err"></span>
                    </td>
                </tr>
                <tr>
                    <td class="t">SĐT</td>
                    <td><input class="form-control formx" type="number" name="num" id="num" value="<?php echo $p["SdtA"] ?>">
                        <span id="errnum" class="err"></span>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="t"><a href="changepass.php" class="btn btn-danger"><i class="fas fa-key"></i>Đổi mật khẩu</a></td>
                    <td><button class="btn btn-primary" onclick="return check()">Cập nhật</button></td>
                </tr>
            </table>
            </th>
        </form>
    </div>
    <?php include("footer.php"); ?>
    <script src="../access/valid.js"></script>
    <script src="../access/nav.js"></script>
</body>

</html>