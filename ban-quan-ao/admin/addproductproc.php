<?php
if (isset($_GET["prodname"]) && isset($_GET["brand"]) && isset($_GET["type"]) && isset($_GET["price"])) {
    $prodname = $_GET["prodname"];
    $brand = $_GET["brand"];
    $type = $_GET["type"];
    $price = $_GET["price"];
    $des = $_GET["des"];
    include("../connect/open.php");
    $sql = "INSERT INTO `san_pham`(`MaThuongHieuS`, `MaTheLoaiS`, `TenSanPham`, `DonGia`, `MoTa`) VALUES ('$brand','$type','$prodname','$price','$des')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addproduct.php");
} else {
    echo "Không có dữ liệu";
}
