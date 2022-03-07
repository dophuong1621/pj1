<?php
if (isset($_POST["MaUser"]) && isset($_POST["TenUser"]) && isset($_POST["PasswordU"]) && isset($_POST["GioiTinhU"]) && isset($_POST["NgaySinhU"]) && isset($_POST["EmailU"]) && isset($_POST["SdtU"])) {
    $MaUser = $_POST["MaUser"];
    $TenUser = $_POST["TenUser"];
    $PasswordU = $_POST["PasswordU"];
    $GioiTinhU = $_POST["GioiTinhU"];
    $NgaySinhU = $_POST["NgaySinhU"];
    $EmailU = $_POST["EmailU"];
    $SdtU = $_POST["SdtU"];
    include("../connect/open.php");
    $sql = "UPDATE `user` SET `TenUser` = '$TenUser', `PasswordU` = '$PasswordU', `GioiTinhU` = '$GioiTinhU',`NgaySinhU` = '$NgaySinhU', `EmailU` = '$EmailU', `SdtU` = '$SdtU' WHERE `user`.`MaUser` = '$MaUser'";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: sua-user.php");
} else {
    header("Location: sua-user.php");
}
