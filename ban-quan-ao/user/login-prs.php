<?php
session_start();
if (isset($_POST["EmailU"]) && isset($_POST["PasswordU"])) {
    include("../connect/open.php");
    $EmailU = mysqli_real_escape_string($con, $_POST["EmailU"]);
    $PasswordU =  mysqli_real_escape_string($con, $_POST["PasswordU"]);

    $hashPass = md5($PasswordU);
    $sql = "SELECT * FROM user WHERE EmailU='$EmailU' AND PasswordU='$hashPass'";
    $result = mysqli_query($con, $sql);
    $check = mysqli_num_rows($result);
    $u = mysqli_fetch_array($result);
    if ($check == 0) {
        header("Location: login.php?error=1");
    } else {
        $_SESSION["MaUser"] = $u["MaUser"];
        $_SESSION["EmailU"] = $EmailU;
        if (isset($_POST["check"])) {
            setcookie("EmailU", $EmailU, time() + 84600);
            setcookie("PasswordU", $PasswordU, time() + 84600);
        } else {
            setcookie("EmailU", $EmailU, time() - 1);
            setcookie("PasswordU", $PasswordU, time() - 1);
        }
        header("Location: trang-chu.php");
    }
    include("../connect/close.php");
} else {
    header("Location: login.php");
}
