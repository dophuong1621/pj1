<?php
session_start();
?>
<?php
if (isset($_GET["MaSanPham"])) {
    $MaSanPham = $_GET["MaSanPham"];
    include("../connect/open.php");
    $sql = "SELECT * FROM `san_pham` WHERE MaSanPham= $MaSanPham";
    $result = mysqli_query($con, $sql);
    $SanPham = mysqli_fetch_array($result);
    include("../connect/close.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        include("header.php");
        ?>
        <div><img src="<?php echo $SanPham["Anh"]; ?>"></div>
        <h2><?php echo $SanPham["TenSanPham"]; ?></h2>

        <div><?php echo $SanPham["DonGia"]; ?></div>

        <a href="them-gio-hang.php?MaSanPham=<?php echo $SanPham["MaSanPham"]; ?>">Thêm vào giỏ</a>
    </body>

    </html>
<?php } else {
    header("Location: danh-sach-san-pham.php");
}

?>