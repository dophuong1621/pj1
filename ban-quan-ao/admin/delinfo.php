<?php
if (isset($_GET["idinfo"]) && isset($_GET["id"])) {
    $prodid = $_GET["idinfo"];
    $id = $_GET["id"];
    $head = "prod-id=";
    $p = $head . $id;
    include("../connect/open.php");
    $sql = "DELETE FROM chi_tiet_san_pham WHERE chi_tiet_san_pham.MaCt='$prodid'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: info.php?$p");
} else {
    header("Location: info.php");
}
