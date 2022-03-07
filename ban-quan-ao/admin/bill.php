<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đơn hàng</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>

        <?php
        include("header.php");
        include("../connect/open.php");
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $sql = "SELECT * FROM hoa_don INNER JOIN user ON hoa_don.MaUserh = user.MaUser WHERE MaHoaDon LIKE '%$search%' ORDER BY `hoa_don`.`status` ASC ";
        } else {
            $sql = "SELECT * FROM hoa_don INNER JOIN user ON hoa_don.MaUserh = user.MaUser ORDER BY `hoa_don`.`status` ASC ";
        }
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <?php
        $page = 5;
        include("provipbell.php");
        include("menu.php"); ?>
        <div class="main">
            <form class="form1">
                <input class="formx" type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                            echo $_GET["search"];
                                                                        } ?>">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>

            <table class="table">
                <tr>
                    <th class="th">Mã hóa đơn</th>
                    <th class="th">Người mua</th>
                    <th class="th">Chi tiết</th>
                    <th class="th">Ngày mua</th>
                    <th class="th">Trạng thái</th>
                    <th class="th">Xóa đơn hàng</th>
                </tr>
                <?php
                while ($bill = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $bill["MaHoaDon"] ?></td>
                        <td class="t"><?php echo $bill["TenUser"] ?></td>
                        <td class="t"><a href="billinfo.php?bill-id=<?php echo $bill["MaHoaDon"] ?>"><i class="test pre fas fa-eye"></i></a></td>
                        <td class="t"><?php echo $bill["NgayGioMua"] ?></td>
                        <td class="t"><?php if ($bill["status"] == 0) {
                                        ?>
                                <a class="text-decoration-none" href="chgstt.php?bill-id=<?php echo $bill["MaHoaDon"] ?>" onclick="return confirm('Xác nhận đơn hàng?')"><i class="rbox test delic fas fa-box-open"></i></a>


                            <?php
                                        } else if ($bill["status"] == 1) {
                            ?>
                                <a class="text-decoration-none" href="chgstt.php?bill-id=<?php echo $bill["MaHoaDon"] ?>" onclick="return confirm('Tạm ngưng đơn hàng?')"><i class="gbox fas fa-box"></i></a>

                            <?php } else if ($bill["status"] == 2) { ?>
                                <i class="fas fa-truck"></i>
                            <?php  } ?>
                        </td>
                        <td class="t"><a class="text-decoration-none" href="delbill.php?bill-id=<?php echo $bill["MaHoaDon"] ?>" onclick="return confirm('Chắc chắn xóa?')"><i class="test delic fas fa-times"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
}
?>