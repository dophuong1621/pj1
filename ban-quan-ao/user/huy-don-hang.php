<?php
if (isset($_GET["huy-don-hang"])) {
    $MaHoaDon = $_GET["huy-don-hang"];
    include("connect/open.php");
    $sql = "DELETE FROM `hoa_don` WHERE `hoa_don`.`MaHoaDon` = $MaHoaDon";
    mysqli_query($con, $sql);
    include("connect/close.php");
    header("Location: trang-chu.php");
} else {
    header("Location: trang-chu.php");
}
