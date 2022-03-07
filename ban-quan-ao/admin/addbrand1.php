<?php
session_start();
if ($_SESSION["user"]) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm thương hiệu</title>
        <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../access/login.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>

    <body>
        <?php
        $page = 2;
        include("header.php");
        include("provipbell.php");
        include("menu.php");
        ?>
        <div class="main">
            <form action="addbrandproc.php" class="form1">
                <div class="formx">
                    <input class="form-control formx" type="text" name="brname" placeholder="Tên Brand..."><span class="err"><?php if (isset($_GET["error"])) {
                                                                                                                                    echo "Thương hiệu đã tồn tại";
                                                                                                                                }
                                                                                                                                ?></span>
                </div>
                <div>
                    <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
                </div>
            </form>
            <?php include("footer.php"); ?>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>