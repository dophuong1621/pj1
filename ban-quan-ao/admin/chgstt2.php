<?php
if (isset($_GET["hdid"])) {
    $id = $_GET["hdid"];
    include("../connect/open.php");
    $sql = "SELECT * FROM hoa_don WHERE hoa_don.MaHoaDon='$id'";
    $l = mysqli_query($con, $sql);
    $p = mysqli_fetch_array($l);
    if ($p["status"] == 1) {
        $sql1 = "UPDATE `hoa_don` SET `status`= '2' WHERE hoa_don.MaHoaDon='$id'";
        mysqli_query($con, $sql1);
    } else if ($p["status"] == 2) {
        $sql1 = "UPDATE `hoa_don` SET `status`='1' WHERE hoa_don.MaHoaDon='$id'";
        mysqli_query($con, $sql1);
    }
    include("../connect/close.php");
    header("Location: delivery.php");
} else {
    header("LocatioN: delivery.php");
}
