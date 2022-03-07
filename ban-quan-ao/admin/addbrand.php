<?php
session_start();
if ($_SESSION["user"]) {
    include("../connect/open.php");
    // B1: Tìm tổng số trang
    // - Set sẵn limit
    $limit = 5;
    $start = 0;
    // - Tìm tổng số sản phẩm 
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM `thuong_hieu`";
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
        <title>Quản lý thương hiệu</title>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <?php
        $page = 2;
        include("header.php");
        include("provipbell.php");
        include("menu.php"); ?>

        <?php
        include("../connect/open.php");
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $sql = "SELECT *, count(san_pham.MaSanPham) as SL FROM `thuong_hieu` LEFT JOIN san_pham ON thuong_hieu.MaThuongHieu = san_pham.MaThuongHieuS WHERE TenThuongHieu LIKE '%$search%' GROUP by MaThuongHieu LIMIT $start,$limit";
        } else {
            $sql = "SELECT *, count(san_pham.MaSanPham) as SL FROM `thuong_hieu` LEFT JOIN san_pham ON thuong_hieu.MaThuongHieu = san_pham.MaThuongHieuS GROUP by MaThuongHieu  ORDER BY `SL` DESC LIMIT $start,$limit ";
        }
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <div class="main">

            <form class="form1">
                <input class="formx" type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                            echo $_GET["search"];
                                                                        } ?>">
                <button class=" btn btn-primary"><i class="fas fa-search"></i></button>
            </form>

            <a id="btt" class="btn1 btn btn-danger" href="addbrand1.php"><i class="fas fa-plus"></i></a>


            <table align="center" class="table">
                <tr>
                    <th class="th">Brand</th>
                    <th class="th">Số Sản Phẩm</th>
                    <th class="th">Xóa</th>
                </tr>
                <?php while ($p = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $p["TenThuongHieu"] ?></td>
                        <td class="t"><?php echo $p["SL"] ?></td>
                        <td class="t"><a class="text-decoration-none" href="delbrand.php?brand-id=<?php echo $p["MaThuongHieu"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a></td>
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="../access/nav.js"></script>
    <?php include("footer.php"); ?>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>