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
            <title>Sửa sản phẩm</title>
            <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../access/login.css">
            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        </head>

        <body>
            <?php
            $prodid = $_GET["prod-id"];
            include("header.php");
            include("../connect/open.php");
            $sql = "SELECT * FROM thuong_hieu";
            $sql1 = "SELECT * FROM the_loai";
            $sql2 = "SELECT * FROM san_pham WHERE san_pham.MaSanPham=$prodid";
            $result = mysqli_query($con, $sql);
            $result1 = mysqli_query($con, $sql1);
            $result2 = mysqli_query($con, $sql2);
            $q = mysqli_fetch_array($result2);
            include("../connect/close.php");
            ?>
            <?php
            $page = 4;
            include("provipbell.php");
            include("menu.php") ?>
            <div class="main">
                <form action="editprodproc.php" method="get">
                    <table class="table">
                        <input type="hidden" name="id" value="<?php echo $prodid ?>">
                        <tr>
                            <td class="t">Tên Sản Phẩm:</td>
                            <td><input type="text" class="formx" name="prodname" value="<?php echo $q["TenSanPham"] ?>"></td>
                        </tr>
                        <tr>
                            <td class="t">Thương Hiệu</td>
                            <td><select name="brand" class="formx">
                                    <?php
                                    while ($p = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $p["MaThuongHieu"] ?>" <?php if ($p["MaThuongHieu"] == $q["MaThuongHieuS"]) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                            <?php echo $p["TenThuongHieu"] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="t">Thể loại</td>
                            <td><select name="type" class="formx">
                                    <?php
                                    while ($j = mysqli_fetch_array($result1)) {
                                    ?>
                                        <option value="<?php echo $j["MaTheLoai"] ?>" <?php if ($j["MaTheLoai"] == $q["MaTheLoaiS"]) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                            <?php echo $j["TenTheLoai"] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="t">Đơn giá</td>
                            <td><input type="number" class="formx" name="price" value="<?php echo $q["DonGia"] ?>"></td>
                        </tr>
                        <tr>
                            <td class="t">Sale</td>
                            <td><input type="number" class="formx" id="sale" name="sale" value="<?php echo $q["sale"] ?>"><i style="color:white;" class="fas fa-percent"></i>
                                <span class="err" id="errsale"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="t">Mô tả</td>
                            <td><textarea id="noi-dung" name="des"><?php echo $q["MoTa"] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="t" align="center">
                                <button class="btn btn-primary" onclick="return check()">Sửa</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

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
            <script>
                function check() {
                    var sale = document.getElementById("sale").value;
                    var errsale = document.getElementById("errsale");
                    if (sale < 100 && sale >= 0) {
                        return true;
                        errsale.innerHTML = "";
                    } else {
                        errsale.innerHTML = "Nhập đúng đê";
                        return false;
                    }
                    return false;
                }
            </script>
            <?php include("footer.php"); ?>
        </body>

        </html>
    <?php
    } else {
        header("Location: addproduct.php");
    }
    ?>
<?php
} else {
    header("Location: login.php");
}
?>