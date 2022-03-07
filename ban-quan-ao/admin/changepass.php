<?php
session_start();
if (isset($_SESSION["maAdmin"]) && isset($_SESSION["Admin"])) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi mật khẩu</title>
    <link rel="stylesheet" href="../access/login.css">
    <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <?php
    $page = 8;
    include("header.php");
    include("provipbell.php");
    include("menu.php"); ?>
    <?php
    $adid = $_SESSION["maAdmin"];
    ?>
    <input type="hidden" name="id" value="<?php echo $adid ?>">
    <div class="main">
        <div class="chgp">
            <form method="post">
                <div>
                    <input class="formx form-control" id="apass" name="apass" placeholder="Mật khẩu hiện tại..." required>
                    <span class="err" id="errpass"></span>
                </div>
                <div><input class="formx form-control" id="anpass" name="anpass" placeholder="Mật khẩu mới...">
                    <span class="err" id="errnpass"></span>
                </div>
                <div><input class="formx form-control" id="anrepass" name="anrepass" placeholder="Nhập lại mật khẩu...">
                    <span class="err" id="errre"></span>
                </div>
                <button class="btn btn-primary" onclick="return check()">Thay đổi</button>
            </form>
        </div>
    </div>
    <script src="../access/chgp.js"></script>
    <?php include("footer.php"); ?>
</body>

</html>