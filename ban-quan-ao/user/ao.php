<?php
session_start();
?>
<?php
include("../connect/open.php");
$sql = "SELECT * FROM `san_pham` WHERE `MaTheLoaiS` = '3'";
$resultAo = mysqli_query($con, $sql);
include("../connect/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Áo</title>
</head>
<style>
</style>

<body>
    <?php
    include("header.php");
    ?>
    <table>
        <?php
        while ($SanPham = mysqli_fetch_assoc($resultAo)) {
        ?>
            <table>
                <div class="khung-tren">
                    <div><a href="chi-tiet-san-pham.php?MaSanPham=<?php echo $SanPham["MaSanPham"] ?>"><img src="<?php echo $SanPham["Anh"] ?>"></a></div>
                </div>
                <div class="khung-duoi">
                    <div class="sp">
                        <?php echo $SanPham["TenSanPham"] ?>
                    </div>
                    <div class="don-gia">
                        <?php echo $SanPham["DonGia"]; ?>
                    </div>
                </div>
            </table>
        <?php
        }
        ?>
    </table>
</body>

</html>