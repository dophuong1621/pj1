<?php
session_start();
$Email = "9a3.c2phuongliet.thephuong@gmail.com";
include("../connect/open.php");
$sql = "SELECT * FROM `user` WHERE `EmailU`='$Email'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_array($result);
include("../connect/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>

<body>
    <?php
    include("header.php");
    if (isset($_SESSION["GioHang"])) {
        $GioHang = $_SESSION["GioHang"];
        $TongTien = 0;
    ?>
        <h2>Giỏ hàng</h2>
        <form action="cap-nhat-gio-hang.php" method="post">
            <table border="1">
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <td>Xoá</td>
                </tr>
                <?php
                include("../connect/open.php");
                foreach ($GioHang as $MaSanPham => $SoLuong) {
                    $sql = "SELECT * FROM `san_pham` WHERE MaSanPham=$MaSanPham";
                    $result = mysqli_query($con, $sql);
                    $SanPham = mysqli_fetch_array($result);
                ?>
                    <tr>
                        <td><?php echo $SanPham["TenSanPham"]; ?></td>
                        <td><?php echo $SanPham["DonGia"]; ?></td>
                        <td><input type="number" name="GioHang[<?php echo $MaSanPham; ?>]" value="<?php echo $SoLuong; ?>">
                        <td><?php $ThanhTien = $SanPham["DonGia"] * $SoLuong;
                            echo $ThanhTien; ?>
                        </td>
                        <td><a href="xoa-gio-hang.php?ma-sp=<?php echo $MaSanPham; ?>">Xoá</a></td>
                    </tr>
                <?php
                    $TongTien += $ThanhTien;
                }
                include("../connect/close.php");
                ?>
            </table>
        </form>
        <h1>Tổng tiền:<?php echo $TongTien; ?></h1>
    <?php
    } else {
        echo "Chưa có sản phẩm trong giỏ hàng";
    }
    ?>
    <h2>Thông tin nhận hàng</h2>
    <form action="dat-hang-prs.php" method="post">
        <div class="input-box">
            <input type="text" placeholder="Email" name="email" id="emailU" required>
        </div>
        <div class="input-box">
            <input type="text" placeholder="Họ và tên" name="name" id="nameU" required>
        </div>
        <div class="input-box">
            <input type="phone" placeholder="Số điện thoại" name="phone" id="phoneU" required>
        </div>
        <div class="input-box">
            <input type="text" placeholder="Địa chỉ" name="diachi" id="diachiU" required>
        </div>
        <textarea class="input-box" input type="text" placeholder="Ghi chú" name="ghichu" id="ghichuU" required>
        </textarea><br>
        <button>Đặt hàng</button>
    </form>
</body>

</html>
</body>

</html>