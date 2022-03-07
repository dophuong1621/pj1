<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql1 = "SELECT * FROM admin WHERE MaAdmin=$ma";
    $re = mysqli_query($con, $sql1);
    $l = mysqli_fetch_array($re);
    if ($l["Quyen"] == 0) {
        $sql = "UPDATE admin SET Quyen='2' WHERE MaAdmin=$ma ";
    } else if ($l["Quyen"] == 2) {
        $sql = "UPDATE admin SET Quyen='0' WHERE MaAdmin=$ma ";
    }
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addadmin.php");
} else {
    header("Location: addadmin.php");
}
