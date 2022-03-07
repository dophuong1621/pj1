<?php
session_start();
if ($_SESSION["user"]) {
    if (isset($_GET["prod-id"])) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chi tiết sản phẩm</title>
        </head>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">

        <body>
            <?php
            $id = $_GET["prod-id"];
            include("header.php");
            include("../connect/open.php");
            $sql = "SELECT * FROM san_pham WHERE san_pham.MaSanPham=$id";
            $sql1 = "SELECT * FROM size ORDER BY `size`.`MaSize` ASC";
            $sql2 = "SELECT * FROM chi_tiet_san_pham INNER JOIN san_pham ON chi_tiet_san_pham.MaSanPhamC=san_pham.MaSanPham INNER JOIN mau ON chi_tiet_san_pham.MaMauC=mau.MaMau INNER JOIN size ON chi_tiet_san_pham.MaSizeC=size.MaSize WHERE chi_tiet_san_pham.MaSanPhamC=$id";
            $sql3 = "SELECT SUM(SoLuongC) as SL1 FROM chi_tiet_san_pham WHERE MaSanPhamC = $id";
            $result3 = mysqli_query($con, $sql3);
            $result1 = mysqli_query($con, $sql1);
            $result = mysqli_query($con, $sql);
            $result2 = mysqli_query($con, $sql2);
            $q = mysqli_fetch_array($result);
            $p = mysqli_fetch_array($result3);
            include("../connect/close.php");
            ?>
            <?php
            $page = 4;
            include("provipbell.php");
            include("menu.php") ?>
            <div class="main">
                <form action="addprodinfo.php" method="get">
                    <input type="hidden" name="prod-id" value="<?php echo $id ?>">
                    <button id="btt" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                </form>
                <table class="table">
                    <th class="th">Size</th>
                    <th class="th">Màu</th>
                    <th class="th">Số Lượng <p class="p"><?php echo $p["SL1"] ?></p>
                    </th>
                    <th class="th">Ảnh</th>
                    <th class="th">Sửa</th>
                    <th class="th">Xóa</th>
                    <?php
                    while ($p = mysqli_fetch_array($result2)) {
                    ?>
                        <tr>
                            <td class="t"><?php echo $p["TenSize"] ?></td>
                            <td class="t"><?php echo $p["TenMau"] ?></td>
                            <td class="t"><?php echo $p["SoLuongC"] ?></td>
                            <td class="t"><img src="<?php echo $p["AnhC"]; ?>" alt="" height="100" width="100"></td>
                            <td class="t"><a class="text-decoration-none" href="editinfo.php?id=<?php echo $id ?>&idinfo=<?php echo $p["MaCt"] ?>"><i class="test fas fa-edit"></i></a></td>
                            <td class="t"><a class="text-decoration-none" href="delinfo.php?id=<?php echo $id ?>&idinfo=<?php echo $p["MaCt"] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="test delic fas fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <?php include("footer.php"); ?>
        </body>

        </html>
<?php }
} else {
    header("Location: login.php");
} ?>