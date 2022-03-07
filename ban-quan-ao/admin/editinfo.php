<?php
session_start();
if (isset($_SESSION["user"])) {
    if (isset($_GET["id"]) && isset($_GET["idinfo"])) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thay đổi chi tiết sản phẩm</title>
            <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../access/login.css">
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        </head>

        <body>
            <?php
            include("header.php");
            $page = 4;
            include("provipbell.php");
            include("menu.php"); ?>
            <!-- php -->
            <?php
            $id = $_GET["id"];
            $idinfo = $_GET["idinfo"];
            include("../connect/open.php");
            $sql = "SELECT * FROM san_pham WHERE san_pham.MaSanPham=$id";
            $sql1 = "SELECT * FROM size ORDER BY `size`.`MaSize` ASC";
            $sql2 = "SELECT * FROM chi_tiet_san_pham INNER JOIN san_pham ON chi_tiet_san_pham.MaSanPhamC=san_pham.MaSanPham INNER JOIN mau ON chi_tiet_san_pham.MaMauC=mau.MaMau INNER JOIN size ON chi_tiet_san_pham.MaSizeC=size.MaSize WHERE chi_tiet_san_pham.MaSanPhamC=$id and chi_tiet_san_pham.MaCt=$idinfo";
            $result1 = mysqli_query($con, $sql1);
            $result = mysqli_query($con, $sql);
            $result2 = mysqli_query($con, $sql2);
            $q = mysqli_fetch_array($result);
            $p = mysqli_fetch_array($result2);
            include("../connect/close.php");
            ?>
            <!-- php -->
            <div class="main">
                <form class="form1" action="editinfoproc.php" method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="idinfo" value="<?php echo $idinfo ?>">
                        <tr>
                            <td class="t">Size</td>
                            <td><select name="size" class="formx">
                                    <?php
                                    while ($s = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option value="<?php echo $s["MaSize"] ?>" <?php if ($s["MaSize"] == $p["MaSizeC"]) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $s["TenSize"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="t">Màu</td>
                            <td><input type="radio" class="formx" name="color" value="1" <?php if ($p["MaMauC"] == 1) {
                                                                                                echo "checked";
                                                                                            } ?>><img src="../upload/Black_Box.png" height="10" width="10">
                                <input type="radio" class="formx" name="color" value="2" <?php if ($p["MaMauC"] == 2) {
                                                                                                echo "checked";
                                                                                            } ?>><img src="../upload/download.png" height="10" width="10">
                            </td>
                        </tr>
                        <tr>
                            <td class="t">Số lượng</td>
                            <td><input type="number" name="num" class="formx" value="<?php echo $p["SoLuongC"] ?>"></td>
                        </tr>
                        <tr>
                            <td class=" t">Ảnh</td>
                            <td>
                                <input type="file" name="image" onchange="readURL(this);">
                                <img id="blah" alt="" src="<?php echo $p["AnhC"] ?>" width="150" height="150" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><button class="btn btn-primary">Sửa</button></td>
                        </tr>
                    </table>
                </form>
            </div>

            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function() {
                            document.getElementById('blah').src = reader.result;
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <?php include("footer.php"); ?>
        </body>

        </html>
<?php }
} else {
    header("Location: login.php");
} ?>