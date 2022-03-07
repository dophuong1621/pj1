<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vận chuyển</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
        $page = 9;
        include("header.php");
        include("../connect/open.php");
        $sqlvc = "SELECT * FROM hoa_don WHERE status = 1 or status = 2";
        $resultvc = mysqli_query($con, $sqlvc);
        include("../connect/close.php");
        include("provipbell.php");
        include("menu.php");
        ?>
        <div class="main">
            <table class="table">
                <tr>
                    <th class="th">Mã hóa đơn</th>
                    <th class="th">Ngày đặt hàng</th>
                    <th class="th">Ước tính giao hàng</th>
                    <th class="th">Tình trạng</th>
                </tr>
                <?php while ($p = mysqli_fetch_array($resultvc)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $p["MaHoaDon"] ?></td>
                        <td class="t"><span id="buy"><?php echo $p["NgayGioMua"] ?></span></td>
                        <td class="t"><span id="fin"></span></td>
                        <td class="t"><?php if ($p["status"] == 1) {
                                        ?>
                                <a href="chgstt2.php?hdid=<?php echo $p["MaHoaDon"] ?>" onclick="return confirm('Vận chuyển đơn hàng ?')"><i class="fas fa-dolly"></i></a>
                            <?php } else {
                            ?>
                                <a href="chgstt2.php?hdid=<?php echo $p["MaHoaDon"] ?>" onclick="return confirm('Tạm ngưng vận chuyển ?')"><i class="fas fa-shipping-fast"></i></a>

                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <script>
            function go() {
                var buy = document.getElementById("buy").value;
                var fin = document.getElementById("fin");
                var s = buy + 7;
                fin.innerHTML = s;
            }
        </script>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
}
?>