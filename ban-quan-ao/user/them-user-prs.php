<?php
if (isset($_POST["TenUser"]) && isset($_POST["PasswordU"]) && isset($_POST["NgaySinhU"]) && isset($_POST["EmailU"]) && isset($_POST["SdtU"])) {
    include("../connect/open.php");
    $TenUser = $_POST["TenUser"];
    $PasswordU = $_POST["PasswordU"];
    $NgaySinhU = $_POST["NgaySinhU"];
    $EmailU = $_POST["EmailU"];
    $SdtU = $_POST["SdtU"];
    include("../connect/open.php");
    $sql = "INSERT INTO `user` (`TenUser`, `PasswordU`, `NgaySinhU`, `EmailU`, `SdtU`) VALUES ( '$TenU ', '$PasswordU', '$NgaySinhU', '$EmailU', '$SdtU')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: login.php");
} else {
    echo "Không có dữ liệu";
}
