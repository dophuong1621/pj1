<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        include("../connect/open.php");
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        echo "Xin chào " .  $_SESSION["user"];
        ?>
        <table>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Username</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>SĐT</th>
                <?php
                while ($b = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $b["MaAdmin"] ?></td>
                <td><?php echo $b["TenAdmin"] ?></td>
                <td><?php echo $b["UsernameA"] ?></td>
                <td><?php echo $b["NgaySinhA"] ?></td>
                <td><?php echo $b["EmailA"] ?></td>
                <td><?php echo $b["SdtA"] ?></td>
                <td><a href="xoaadmin.php?ma=<?php echo $b["MaAdmin"] ?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a></td>
            </tr>
        <?php
                }
        ?>
        <a href="addadmin.php">Thêm admin</a>
        <a href="addproduct.php">Thêm sản phẩm</a>
        <a href="addbrand.php">Thêm thương hiệu</a>
        <a href="type.php">Thêm thể loại</a>
        <a href="logout.php">Đăng xuất</a>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>