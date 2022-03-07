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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>

        <?php
        include("../connect/open.php");
        $sql = "SELECT * FROM admin";
        $sql2 = "SELECT * FROM `san_pham` INNER JOIN thuong_hieu ON san_pham.MaThuongHieuS=thuong_hieu.MaThuongHieu INNER JOIN the_loai ON san_pham.MaTheLoaiS = the_loai.MaTheLoai";
        $result2 = mysqli_query($con, $sql2);
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <div class="menu" id="sidenav">
            <a class="text-decoration-none" href="admin.php"><i class="fas fa-home"></i></a>
            <a class="text-decoration-none" href="addbrand.php"><i class="fas fa-dollar-sign"></i> Quản lý thương hiệu</a>
            <a class="text-decoration-none" href="type.php"><i class="fas fa-tshirt"></i> Quản lý thể loại</a>
            <a class="text-decoration-none parent" href="addproduct.php"><i class="fas fa-hat-wizard"></i> Quản lý sản phẩm <i class="fa fa-caret-down"></i></a>
            <ul class="child">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 1</a></li>
            </ul>
            <a class="text-decoration-none" href="usermanage.php"><i class="fas fa-user-friends"></i> Quản lý người dùng</a>

            <?php if ($_SESSION["quyen"] == "SuperAdmin") { ?>
                <a class="text-decoration-none" href="addadmin.php"><i class="fas fa-users"></i></i> Quản lý admin</a>
                <a class="text-decoration-none" href="admininfo.php"><i class="fas fa-user"></i> Thông tin cá nhân</a>
            <?php } else { ?>
                <a class="text-decoration-none" href="admininfo.php"><i class="far fa-user"></i> Thông tin cá nhân</a>
            <?php } ?>
            <a class="text-decoration-none" id="logout" href="logout.php"><i class="fas fa-power-off"></i> Đăng xuất</a>
        </div>
        <!-- table -->
        <div class="main">
            <table align="center" class="table">
                <tr>
                    <th class="th">Tên</th>
                    <th class="th">Thương hiệu</th>
                    <th class="th">Loại</th>
                    <th class="th">Đơn giá</th>
                    <th class="th">Mô tả</th>
                    <th class="th">Sửa</th>
                    <th class="th">Chi tiết</th>
                    <th class="th">Xóa</th>
                </tr>
                <?php
                while ($h = mysqli_fetch_array($result2)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $h["TenSanPham"] ?></td>
                        <td class="t"><?php echo $h["TenThuongHieu"] ?></td>
                        <td class="t"><?php echo $h["TenTheLoai"] ?></td>
                        <td class="t"><?php echo $h["DonGia"] ?></td>
                        <td class="t"><?php echo $h["MoTa"] ?></td>
                        <td class="t"><a class="text-decoration-none" href="editprod.php?prod-id=<?php echo $h["MaSanPham"] ?>"><i class="test fas fa-edit"></i></a></td>
                        <td class="t"><a class="text-decoration-none" href="info.php?prod-id=<?php echo $h["MaSanPham"] ?>"><i class="test inf fas fa-file-alt"></i></a></td>
                        <td class="t"><a class="text-decoration-none" href="delprod.php?prod-id=<?php echo $h["MaSanPham"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>