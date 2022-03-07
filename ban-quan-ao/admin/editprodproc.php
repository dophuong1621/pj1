<?php
if (isset($_GET["id"]) && isset($_GET["prodname"]) && isset($_GET["brand"]) && isset($_GET["type"]) && isset($_GET["price"])) {
    $id = $_GET["id"];
    $prod = $_GET["prodname"];
    $brand = $_GET["brand"];
    $type = $_GET["type"];
    $price = $_GET["price"];
    $sale = $_GET["sale"];
    $des = $_GET["des"];
    include("../connect/open.php");
    $sql = "UPDATE san_pham SET TenSanPham='$prod',DonGia='$price',MaThuongHieuS='$brand',MaTheLoaiS='$type',sale=$sale,MoTa='$des' WHERE MaSanPham=$id";
    echo $sql;
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addproduct.php");
} else {
    header("Location: addproduct.php");
}
