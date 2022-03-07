<?php
if (isset($_GET["brname"])) {
    $brname = $_GET["brname"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM `thuong_hieu` WHERE `TenThuongHieu`='$brname'";
    $res = mysqli_query($con, $sql1);
    $check = mysqli_num_rows($res);
    if ($check == 0) {
        $sql = "INSERT INTO `thuong_hieu`(`TenThuongHieu`) VALUES ('$brname')";
        mysqli_query($con, $sql);
        include("../connect/close.php");
        header("Location: addbrand.php");
    } else {
        header("Location: addbrand1.php?error=1");
    }
} else {
    echo "Không có dữ liệu";
}
