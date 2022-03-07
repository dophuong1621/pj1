<?php
$id = $_POST["id"];
$name = $_POST["aname"];
$apass = $_POST["apass"];
$anpass = $_POST["anpass"];
$dob = $_POST["dob"];
$mail = $_POST["amail"];
$num = $_POST["num"];
include("../connect/open.php");
$sql = "SELECT * FROM admin WHERE MaAdmin='$id' AND PasswordA='$apass'";
echo $sql;
$result = mysqli_query($con, $sql);
$admin = mysqli_fetch_array($result);
$check = mysqli_num_rows($result);
if ($check == 0) {
    header("Location: admininfo.php?error=1");
} else {
    $sql2 = "UPDATE `admin` SET `TenAdmin`='$name',`PasswordA`='$anpass',`NgaySinhA`='$dob',`EmailA`='$mail',`SdtA`='$num' WHERE MaAdmin = '$id'";
    mysqli_query($con, $sql2);
}
include("../connect/close.php");

header("Location: admininfo.php");
