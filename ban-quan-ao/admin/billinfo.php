<?php
session_start();
if ($_SESSION["user"]) {
    if (isset($_GET["bill-id"])) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thông tin đơn hàng</title>
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <link rel="stylesheet" href="../access/login.css">
            <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        </head>

        <body>
            <?php $page = 5;
            include("header.php");
            include("provipbell.php");
            include("menu.php"); ?>
            <?php
            $id = $_GET["bill-id"];
            include("../connect/open.php");
            $sql = "SELECT * FROM hoa_don_chi_tiet INNER JOIN san_pham ON san_pham.MaSanPham = hoa_don_chi_tiet.MaSanPhamh INNER JOIN mau ON hoa_don_chi_tiet.MaMauH = mau.MaMau INNER JOIN size ON hoa_don_chi_tiet.MaSizeH = size.MaSize INNER JOIN hoa_don ON hoa_don_chi_tiet.MaHoaDonh = hoa_don.MaHoaDon INNER JOIN user ON hoa_don.MaUserh= user.MaUser WHERE MaHoaDonh = '$id '";
            $sql1 = "SELECT * FROM hoa_don_chi_tiet INNER JOIN san_pham ON san_pham.MaSanPham = hoa_don_chi_tiet.MaSanPhamh INNER JOIN mau ON hoa_don_chi_tiet.MaMauH = mau.MaMau INNER JOIN size ON hoa_don_chi_tiet.MaSizeH = size.MaSize INNER JOIN hoa_don ON hoa_don_chi_tiet.MaHoaDonh = hoa_don.MaHoaDon INNER JOIN user ON hoa_don.MaUserh= user.MaUser WHERE MaHoaDonh = '$id '";
            $result = mysqli_query($con, $sql);
            $result1 = mysqli_query($con, $sql1);
            $q = mysqli_fetch_array($result1);
            $tong = 0;
            include("../connect/close.php");
            ?>
        </body>
        <div class="main">
            <table class="table">
                <tr>
                    <th class="th">Người mua</th>
                    <th class="th">Địa chỉ</th>
                    <th class="th">SĐT</th>
                    <th class="th">Email</th>
                    <th class="th">Ngày mua</th>
                </tr>
                <tr>
                    <td class="t"><?php echo $q["TenUser"] ?></td>
                    <td class="t"><?php echo $q["DiaChiU"] ?></td>
                    <td class="t"><?php echo $q["SdtU"] ?></td>
                    <td class="t"><?php echo $q["EmailU"] ?></td>
                    <td class="t"><?php echo $q["NgayGioMua"] ?></td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <th class="th">Tên Sản Phẩm</th>
                    <th class="th">Màu</th>
                    <th class="th">Size</th>
                    <th class="th">Đơn giá</th>
                    <th class="th">Số Lượng</th>
                    <th class="th">Thành tiền</th>
                </tr>
                <?php while ($p = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $p["TenSanPham"] ?></td>
                        <td class="t"><?php echo $p["TenMau"] ?></td>
                        <td class="t"><?php echo $p["TenSize"] ?></td>
                        <td class="t"><?php echo number_format($p["DonGia"]) . " VND"; ?></td>
                        <td class="t"><?php echo  number_format($p["SoLuongh"]) ?></td>
                        <td class="t"><?php echo number_format($p["DonGia"] * $p["SoLuongh"]) . " VND";
                                        $tong = ($p["DonGia"] * $p["SoLuongh"]) + $tong; ?></td>

                    </tr>
                <?php } ?>
                <tr>
                    <td class="hide" colspan="4"></td>
                    <td class="tong"><i class="fas fa-dollar-sign"></i>Tổng
                    </td>
                    <td class=" tong1"><?php echo number_format($tong) . " VND"; ?></td>
                </tr>
            </table>
            <?php include("footer.php"); ?>
        </div>

        </html>
<?php
    } else {
        header("Location: bill.php");
    }
} else {
    header("Location: login.php");
} ?>