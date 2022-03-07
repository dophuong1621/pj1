<?php
if (isset($_GET["brand-id"])) {
    $prodid = $_GET["brand-id"];
    include("../connect/open.php");
    $sql = "DELETE FROM thuong_hieu WHERE thuong_hieu.MaThuongHieu='$prodid'";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: addbrand.php");
} else {
    header("Location: addbrand.php");
}
