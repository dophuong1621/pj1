<?php
if (isset($_GET["ma-bai-viet"])) {
    $MaBaiViet = $_GET["ma-bai-viet"];
    include("../connect/open.php");
    $sql = "SELECT * FROM `bai_viet` WHERE `MaBaiViet` = $MaBaiViet";
    $result = mysqli_query($con, $sql);
    $BaiViet = mysqli_fetch_array($result);
    include("../connect/close.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        include("header.php");
        ?>
        Bài viết chi tiết nè <br>
        <h2><?php echo $BaiViet["TieuDe"] ?></h2>
        <div>
            <?php echo $BaiViet["NoiDung"] ?>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: bai-viet.php");
}
