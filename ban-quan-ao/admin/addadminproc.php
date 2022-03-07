<?php
$name = $_POST['name'];
$username = $_POST["user"];
$pass = $_POST["pass"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$num = $_POST["num"];
$count = 0;
include("../connect/open.php");
$sql1 = "SELECT * FROM `admin` WHERE UsernameA = '$username'";
$sql2 = "SELECT * FROM `admin` WHERE EmailA='$email'";
$sql3 = "SELECT * FROM `admin` WHERE SdtA='$num'";
$result = mysqli_query($con, $sql1);
$result2 = mysqli_query($con, $sql2);
$result3 = mysqli_query($con, $sql3);
$check = mysqli_num_rows($result);
$check2 = mysqli_num_rows($result2);
$check3 = mysqli_num_rows($result3);
if ($check == 0) {
    $count++; //1
} else {
    header("Location: addadmin1.php?error=1");
}
if ($check2 == 0) {
    $count++; //2
} else {
    header("Location: addadmin1.php?error=2");
}
if ($check3 == 0) {
    $count++; //3
} else {
    header("Location: addadmin1.php?error=3");
}
if ($count == 3) {
    $sql = "INSERT INTO `admin`(`TenAdmin`, `UsernameA`, `PasswordA`, `NgaySinhA`, `EmailA`, `SdtA`, `Quyen`) VALUES ('$name','$username','$pass','$dob','$email','$num','0')";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addadmin.php");
}
