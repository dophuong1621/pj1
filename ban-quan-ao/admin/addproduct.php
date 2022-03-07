<?php
session_start();
if ($_SESSION["user"]) {
    include("../connect/open.php");
    // B1: Tìm tổng số trang
    // - Set sẵn limit
    $limit = 5;
    $start = 0;
    // - Tìm tổng số sản phẩm 
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM `san_pham`";
    $resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
    $demBaiViet = mysqli_fetch_array($resultDemBaiViet);
    $tongSoBaiViet = $demBaiViet["tongBaiViet"];
    // - Tính số trang
    $soTrang = ceil($tongSoBaiViet / $limit);
    // B2: Hiển thị danh sách trang
    // B3: Lấy số trang hiện tại
    if (isset($_GET["trang"])) {
        $trang = $_GET["trang"];
        // B4: Tìm start
        $start = ($trang - 1) * $limit;
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý sản phẩm</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>

        <?php
        include("header.php");
        include("../connect/open.php");
        $sql = "SELECT * FROM admin";
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $sql2 = "SELECT * FROM `san_pham` INNER JOIN thuong_hieu ON san_pham.MaThuongHieuS=thuong_hieu.MaThuongHieu INNER JOIN the_loai ON san_pham.MaTheLoaiS = the_loai.MaTheLoai WHERE TenSanPham LIKE '%$search%' LIMIT $start,$limit";
        } else {
            $sql2 = "SELECT * FROM `san_pham` INNER JOIN thuong_hieu ON san_pham.MaThuongHieuS=thuong_hieu.MaThuongHieu INNER JOIN the_loai ON san_pham.MaTheLoaiS = the_loai.MaTheLoai LIMIT $start,$limit";
        }
        $result2 = mysqli_query($con, $sql2);
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");

        ?>
        <?php
        $page = 4;
        include("provipbell.php");
        include("menu.php"); ?>
        <!-- table -->
        <div class="main">
            <form class="form1">
                <input class="formx" type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                            echo $_GET["search"];
                                                                        } ?>">
                <button id="btt1" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
            <a class="btn btn-danger" id="btt" href="addproduct1.php"><i class="fas fa-plus"></i></a>
            <table align="center" class="table">
                <tr>
                    <th class="th">Tên</th>
                    <th class="th">Thương hiệu</th>
                    <th class="th">Loại</th>
                    <th class="th">Đơn giá</th>
                    <th class="th">Mô tả</th>
                    <th class="th">Sale</th>
                    <th class="th">Sửa</th>
                    <th class="th">Chi tiết</th>
                    <th class="th">Xem trang</th>
                    <th class="th">Xóa</th>
                </tr>
                <?php
                while ($h = mysqli_fetch_array($result2)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $h["TenSanPham"] ?></td>
                        <td class="t"><?php echo $h["TenThuongHieu"] ?></td>
                        <td class="t"><?php echo $h["TenTheLoai"] ?></td>
                        <td class="t"><?php echo number_format($h["DonGia"]) . " VND" ?></td>
                        <td class="t"><?php echo $h["MoTa"] ?></td>
                        <td class="t"><?php echo $h["sale"] . "%" ?></td>
                        <td class="t"><a class="text-decoration-none" href="editprod.php?prod-id=<?php echo $h["MaSanPham"] ?>"><i class="test ed fas fa-edit"></i></a></td>
                        <td class="t"><a class="text-decoration-none" href="info.php?prod-id=<?php echo $h["MaSanPham"] ?>"><i class="test inf fas fa-file-alt"></i></a></td>
                        <td class="t"><a class="text-decoration-none" href="prod.php?id=<?php echo $h["MaSanPham"] ?>"><i class="test pre fas fa-eye"></i></a></td>
                        <td class="t"><a class="text-decoration-none" href="delprod.php?prod-id=<?php echo $h["MaSanPham"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <?php for ($j = 1; $j <= $soTrang; $j++) {
            ?>
                <a href="?trang=<?php echo $j; ?>"><?php echo $j; ?></a>
            <?php
            }
            ?>
        </div>

    </body>
    <?php include("footer.php"); ?>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>