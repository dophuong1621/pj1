<?php
session_start();
if (isset($_GET["MaSanPham"])) {
    $MaSanPham = $_GET["MaSanPham"];
    if (isset($_SESSION["GioHang"][$MaSanPham])) {
        $_SESSION["GioHang"][$MaSanPham]++;
    } else {
        $_SESSION["GioHang"][$MaSanPham] = 1;
    }
    header("Location: xem-gio-hang.php");
} else {
    header("Location: danh-sach-san-pham.php");
}
