<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    include("../connect/open.php");
    $sql = "UPDATE admin SET PasswordA='1' WHERE MaAdmin=$ma ";
    $result = mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addadmin.php");
} else {
    header("Location: addadmin.php");
}
