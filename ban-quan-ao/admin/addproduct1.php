<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm sản phẩm</title>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <?php
        $page = 4;
        include("header.php");
        include("provipbell.php");
        include("menu.php"); ?>
        <?php
        include("../connect/open.php");
        $sql = "SELECT * FROM thuong_hieu";
        $sql1 = "SELECT * FROM the_loai";
        $sql2 = "SELECT * FROM `san_pham` INNER JOIN thuong_hieu ON san_pham.MaThuongHieuS=thuong_hieu.MaThuongHieu INNER JOIN the_loai ON san_pham.MaTheLoaiS = the_loai.MaTheLoai";
        $p = mysqli_query($con, $sql);
        $q = mysqli_query($con, $sql1);
        $result = mysqli_query($con, $sql2);
        include("../connect/close.php");
        ?>
        <div class="main">
            <form action="addproductproc.php" method="get">
                <table class="table">
                    <tr>
                        <td class="t">Tên Sản Phẩm:</td>
                        <td><input class="formx" type="text" name="prodname"></td>
                    </tr>
                    <tr>
                        <td class="t">Thương Hiệu</td>
                        <td><select name="brand" class="formx">
                                <?php
                                while ($th = mysqli_fetch_array($p)) {
                                ?>
                                    <option class="form-control" value="<?php echo $th["MaThuongHieu"] ?>"><?php echo $th["TenThuongHieu"] ?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="t">Thể loại</td>
                        <td><select name="type" class="formx">
                                <?php
                                while ($tl = mysqli_fetch_array($q)) {
                                ?>
                                    <option class="form-control" value="<?php echo $tl["MaTheLoai"] ?>"><?php echo $tl["TenTheLoai"] ?></option>
                                <?php
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="t">Đơn giá</td>
                        <td><input type="number" class="formx" name="price"></td>
                    </tr>
                    <tr>
                        <td class="t">Mô tả</td>
                        <td><textarea id="noi-dung" class="formx" name="des"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button class="btn btn-primary">Thêm</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
    <script src="../access/nav.js"></script>
    <script src="../access/jquery-3.1.1.min.js"></script>
    <script src="../access/ckeditor/ckeditor.js"></script>
    <script src="../access/ckfinder/ckfinder.js"></script>
    <script>
        CKEDITOR.replace('noi-dung', {
            filebrowserBrowseUrl: '../access/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '../access/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '../access/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: '../access/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '../access/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '../access/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
    </script>
    <?php include("footer.php"); ?>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>