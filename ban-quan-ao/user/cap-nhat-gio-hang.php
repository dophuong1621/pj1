<?php
session_start();
if (isset($_POST["GioHang"])) {
    $GioHang = $_POST["GioHang"];
    foreach ($GioHang as $MaSanPham => $SoLuong) {
        $_SESSION["GioHang"][$MaSanPham] = $SoLuong;
    }
    header("Location: xem-gio-hang.php");
} else {
    header("Location: xem-gio-hang.php");
}
