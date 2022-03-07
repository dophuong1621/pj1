<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý người dùng</title>
        <link rel="stylesheet" href="../access/login.css">
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <?php
        $page = 6;
        include("header.php");
        include("provipbell.php");
        include("menu.php") ?>
        <!-- php -->
        <?php

        include("../connect/open.php");
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            $sql = "SELECT * FROM user WHERE UsernameU LIKE '%$search' ";
        } else {
            $sql = "SELECT * FROM user";
        }
        $result = mysqli_query($con, $sql);
        include("../connect/close.php");
        ?>
        <!-- php -->

        <div class="main">
            <form class="form1">
                <input class="formx" type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                                                            echo $_GET["search"];
                                                                        } ?>">
                <button id="btt1" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
            <table class="table">
                <tr>
                    <th class="th">Tên User</th>
                    <th class="th">Username</th>
                    <th class="th">Ngày sinh</th>
                    <th class="th">Email</th>
                    <th class="th">SĐT</th>
                    <th class="th">Trạng thái</th>
                </tr>
                <?php while ($p = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="t"><?php echo $p["TenUser"] ?></td>
                        <td class="t"><?php echo $p["UsernameU"] ?></td>
                        <td class="t"><?php echo $p["NgaySinhU"] ?></td>
                        <td class="t"><?php echo $p["EmailU"] ?></td>
                        <td class="t"><?php echo $p["SdtU"] ?></td>
                        <td class="t"><?php if ($p["TrangThaiU"] == 1) {
                                        ?>
                                <a href="unban.php?id=<?php echo $p["MaUser"] ?>"><i class="fas fa-circle" style="color:rgba(255, 0, 0, 0.397);"></i></a>
                            <?php
                                        } else {
                            ?>
                                <a href="ban.php?id=<?php echo $p["MaUser"] ?>"><i class="fas fa-circle" style="color:rgba(21, 255, 0, 0.397);"></i></a>
                            <?php }
                            ?>
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
