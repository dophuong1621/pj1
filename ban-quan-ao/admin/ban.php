<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    include("../connect/open.php");
    $sql = "UPDATE `user` SET `TrangThaiU` = 1 WHERE MaUser='$id'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: usermanage.php");
}
