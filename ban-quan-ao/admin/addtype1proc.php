<?php
if (isset($_GET["brname"])) {
    $brname = $_GET["brname"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM `the_loai` WHERE `TenTheLoai`='$brname'";
    $res = mysqli_query($con, $sql1);
    $check = mysqli_num_rows($res);
    if ($check == 0) {
        $sql = "INSERT INTO `the_loai`(`TenTheLoai`) VALUES ('$brname')";
        mysqli_query($con, $sql);
        include("../connect/close.php");
        header("Location: type.php");
    } else {
        header("Location: addtype1.php?error=1");
    }
} else {
    echo "Không có dữ liệu";
}
