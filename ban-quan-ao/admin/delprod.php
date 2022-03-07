<?php
if (isset($_GET["prod-id"])) {
    $prodid = $_GET["prod-id"];
    include("../connect/open.php");
    $sql = "DELETE FROM san_pham WHERE san_pham.MaSanPham='$prodid'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addproduct.php");
} else {
    header("Location: addproduct.php");
}
