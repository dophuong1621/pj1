<?php
if (isset($_FILES["image"]) && isset($_POST["size"]) && isset($_POST["color"]) && isset($_POST["num"]) && isset($_POST["id"])) {
    $idinfo = $_POST["idinfo"];
    $image = $_FILES["image"];
    print_r($image);
    $folder = "../upload/";
    $imageName = $image["name"];
    $direction = $folder . $imageName;
    move_uploaded_file($image["tmp_name"], $direction);
    $size = $_POST["size"];
    $color = $_POST["color"];
    $num = $_POST["num"];
    $id = $_POST["id"];
    $head = "prod-id=";
    $g = $head . $id;
    include("../connect/open.php");
    $sql = "UPDATE chi_tiet_san_pham SET MaSizeC='$size',MaMauC='$color',SoLuongC='$num',AnhC='$direction' WHERE MaCt=$idinfo";
    mysqli_query($con, $sql);
    include("../connect/close.php");
    header("Location: info.php?$g");
} else {
    echo "Sai";
    // echo $sql;
}
