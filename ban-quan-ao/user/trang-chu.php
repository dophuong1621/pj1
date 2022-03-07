<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #ccf;
    }

    .imageshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    .images {
        display: none;
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -72px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 100px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover,
    .next:hover {
        color: rgba(255, 0, 0, 0.8);
    }

    @media screen and (max-width: 600px) {

        .prev,
        .next {
            margin-top: -22px;
            font-size: 16px;
        }
    }

    .caption {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    .numbers {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .spot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #f00;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .spot:hover {
        background-color: #fa0;
    }

    .active {
        background-color: #0a0;
    }

    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 3.5s;
        animation-name: fade;
        animation-duration: 3.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: 0.4;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fade {
        from {
            opacity: 0.4;
        }

        to {
            opacity: 1;
        }
    }
</style>

<body>
    <?php
    include("../connect/open.php");
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    $TenU = mysqli_fetch_array($result);
    $_SESSION["tenUser"] = $TenU["TenUser"];
    include("../connect/close.php");
    ?>
    <?php
    include("header.php");
    ?>
    <div class="imageshow-container">

        <div class="images fade">
            <img src="bat-mi-cach-chup-anh-quan-ao-thoi-trang-dep-khi-ban-hang-online-01-600x400.jpg" alt="" style="width: 100%;">
        </div>

        <div class="images fade">
            <img src="https://drive.google.com/uc?id=1Jj1nJ2LwotjDVpklevGSS9fnNsMRAYWG" style="width: 100%;">

        </div>

        <div class="images fade">
            <img src="https://drive.google.com/uc?id=1Sqbsu8piu7_D933-nUbqUmlCYx4HbRvP" style="width:100%">

        </div>

        <div class="images fade">
            <img src="https://drive.google.com/uc?id=1Ss05DbaeImtNspx1-yGY7c3yDECrAeIr" style="width:100%">

        </div>

        <a class="prev" onclick="nextImage(-1)">&#10096;</a>
        <a class="next" onclick="nextImage(1)">&#10097;</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="spot" onclick="currentImage(1)"></span>
        <span class="spot" onclick="currentImage(2)"></span>
        <span class="spot" onclick="currentImage(3)"></span>
        <span class="spot" onclick="currentImage(4)"></span>
    </div>
</body>
<table>
    <?php
    while ($SanPham = mysqli_fetch_array($result)) {
    ?>
        <table>
            <div class="khung-duoi">
                <div><a href="chi-tiet-san-pham.php?MaSanPham=<?php echo $SanPham["MaSanPham"] ?>"><img src="<?php echo $SanPham["Anh"] ?>"></a></div>
            </div>
            <div class="khung-duoi">
                <div class="sp">
                    <?php echo $SanPham["TenSanPham"] ?>
                </div>
                <div class="don-gia">
                    <?php echo $SanPham["DonGia"]; ?>
                </div>
            </div>
        </table>
    <?php
    }
    ?>
</table>

<script>
    var imageIndex = 1;
    showImages(imageIndex);

    function nextImage(n) {
        showImages((imageIndex += n));
    }

    function currentImage(n) {
        showImages((imageIndex = n));
    }

    function showImages(n) {
        var i;
        var images = document.getElementsByClassName("images");
        var spots = document.getElementsByClassName("spot");
        if (n > images.length) {
            imageIndex = 1;
        }
        if (n < 1) {
            imageIndex = images.length;
        }
        for (i = 0; i < images.length; i++) {
            images[i].style.display = "none";
        }
        for (i = 0; i < spots.length; i++) {
            spots[i].className = spots[i].className.replace(" active", "");
        }
        images[imageIndex - 1].style.display = "block";
        spots[imageIndex - 1].className += " active";
    }
</script>

</html>