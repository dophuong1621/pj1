<?php
include("../connect/open.php");
// B1: Tìm tổng số trang
// - Set sẵn limit
$limit = 3;
$start = 0;
// - Tìm tổng số sản phẩm 
$sqlDemBaiViet = "SELECT COUNT(*) as TongBaiViet FROM `bai_viet`";
$resultDemBaiViet = mysqli_query($con, $sqlDemBaiViet);
$DemBaiViet = mysqli_fetch_array($resultDemBaiViet);
$TongSoBaiViet = $DemBaiViet["TongBaiViet"];
// - Tính số trang
$SoTrang = ceil($TongSoBaiViet / $limit);
// B2: Hiển thị danh sách trang
// B3: Lấy số trang hiện tại
if (isset($_GET["Trang"])) {
    $Trang = $_GET["Trang"];
    // B4: Tìm start
    $Start = ($Trang - 1) * $limit;
}
$sql = "SELECT * FROM `bai_viet` LIMIT $start,$limit";
$result = mysqli_query($con, $sql);
include("../connect/close.php");
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
</head>

<body>
    <?php
    while ($BaiViet = mysqli_fetch_array($result)) {
        $i++;
        // In ra bản ghi
    ?>
        <a href="bai-viet-chi-tiet.php?ma-bai-viet=<?php echo $BaiViet["MaBaiViet"] ?>"><?php echo $i . " - " . $BaiViet["TieuDe"]; ?></a> <br>
    <?php
    }
    // Vòng lặp hiển thị danh sách trang tại B2
    for ($j = 1; $j <= $SoTrang; $j++) {
    ?>
        <a href="?Trang=<?php echo $j; ?>"><?php echo $j; ?></a>
    <?php
    }
    ?>
</body>

</html>