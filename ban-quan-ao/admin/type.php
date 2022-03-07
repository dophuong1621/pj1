<?php
session_start();
if ($_SESSION["user"]) {
    include("../connect/open.php");
    // B1: Tìm tổng số trang
    // - Set sẵn limit
    $limit = 5;
    $start = 0;
    // - Tìm tổng số sản phẩm 
    $sqlDemBaiViet = "SELECT COUNT(*) as tongBaiViet FROM `the_loai`";
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
        <title>Thể loại</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
        $a = 1;
        include("header.php");
        include("../connect/open.php");
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $sql1 = "SELECT *,COUNT(MaTheLoaiS) as SL FROM the_loai LEFT JOIN san_pham on san_pham.MaTheLoaiS=the_loai.MaTheLoai WHERE the_loai.TenTheLoai LIKE '%$search%' GROUP by MaTheLoai LIMIT $start,$limit";
        } else {
            $sql1 = "SELECT *,COUNT(MaTheLoaiS) as SL FROM the_loai LEFT JOIN san_pham on san_pham.MaTheLoaiS=the_loai.MaTheLoai GROUP by MaTheLoai LIMIT $start,$limit";
        }
        $result1 = mysqli_query($con, $sql1);
        include("../connect/close.php");
        ?>
        <?php
        $page = 3;
        include("provipbell.php");
        include("menu.php"); ?>
        <!-- div -->
        <div class="main">
            <form class="form1">
                <input class="formx" type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                            echo $_GET["search"];
                                                                        } ?>">
                <button id="btt1" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
            <a id="btt" class="btn1 btn btn-danger" href="addtype1.php"><i class="fas fa-plus"></i></a>
            <table class="table">
                <tr>
                    <th class="th">Thể loại</th>
                    <th class="th">Số Sản Phẩm</th>
                    <th class="th">Xóa</th>
                </tr>
                <?php while ($p = mysqli_fetch_array($result1)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $p["TenTheLoai"] ?></td>
                        <td class="t"><?php echo $p["SL"] ?></td>
                        <td class="t"><a class="text-decoration-none" href="delprod.php?prod-id=<?php echo $p["MaSanPham"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a></td>
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
        <script src="../access/nav.js"></script>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>