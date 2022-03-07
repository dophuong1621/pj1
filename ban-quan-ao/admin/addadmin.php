<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý admin</title>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <?php
        include("header.php");
        include("../connect/open.php");
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        $page = 7;
        include("provipbell.php");
        include("menu.php")
        ?>


        <div class="main">
            <div><a class="btn btn-info btn1" href="addadmin1.php"><i class="fas fup fa-user-plus"></i></a></div>
            <table class="table">
                <tr>
                    <th class="th">Tên</th>
                    <th class="th">Username</th>
                    <th class="th">Ngày sinh</th>
                    <th class="th">Email</th>
                    <th class="th">SĐT</th>
                    <th class="th">Đặt lại mật khẩu</th>
                    <th class="th">Khóa tài khoản</th>
                    <th class="th">Xóa</th>
                    <?php
                    while ($b = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td class="t"><?php echo $b["TenAdmin"] ?></td>
                    <td class="t"><?php echo $b["UsernameA"] ?></td>
                    <td class="t"><?php echo $b["NgaySinhA"] ?></td>
                    <td class="t"><?php echo $b["EmailA"] ?></td>
                    <td class="t"><?php echo $b["SdtA"] ?></td>
                    <td class="t"><a class="text-decoration-none" href="resetpwd.php?ma=<?php echo $b["MaAdmin"] ?>" onclick="return confirm('Đặt lại mật khẩu?')"><i class="test broom fas fa-broom"></i></a></td>
                    <td class="t"><?php if ($b["Quyen"] == 0) { ?>
                            <a class="text-decoration-none" href="lockadmin.php?ma=<?php echo $b["MaAdmin"] ?>" onclick="return confirm('Khóa admin?')"><i class="unl fas fa-unlock"></i></a>
                        <?php } else if ($b["Quyen"] == 2) {
                        ?>
                            <a class="text-decoration-none" href="lockadmin.php?ma=<?php echo $b["MaAdmin"] ?>" onclick="return confirm('Mở khóa admin?')"><i class="lock1 fas fa-lock"></i></a>
                        <?php  } ?>
                    </td>
                    <td class="t"><?php if ($b["Quyen"] == 0 || $b["Quyen"] == 2) { ?>
                            <a class="text-decoration-none" href="xoaadmin.php?ma=<?php echo $b["MaAdmin"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a>
                    </td>
                <?php } ?>
                </tr>
            <?php
                    }
            ?>
        </div>
        <script src="../access/nav.js"></script>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php

} else {
    header("Location: login.php");
}
?>