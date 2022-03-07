<?php
session_start();
if (isset($_GET["ma-sp"])) {
    $Masp = $_GET["ma-sp"];
    unset($_SESSION["GioHang"][$Masp]);
    header("Location: xem-gio-hang.php");
} else {
    header("Location: xem-gio-hang.php");
}
