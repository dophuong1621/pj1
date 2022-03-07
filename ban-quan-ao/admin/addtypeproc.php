<?php
if (isset($_GET["typename"])) {
    $typename = $_GET["typename"];
    include("../connect/open.php");
    $sql = "INSERT INTO `the_loai`(`TenTheLoai`) VALUES ('$typename')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: type.php");
} else {
    echo "Không có dữ liệu";
}
