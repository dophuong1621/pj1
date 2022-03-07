<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php")
    ?>
    <?php
    include("../connect/open.php");
    $sql = "SELECT * FROM hoa_don";
    $sql2 = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    $hoadon = mysqli_fetch_array($result);
    $user = mysqli_fetch_array($result2);
    include("../connect/close.php");
    ?>
    <h1>Đặt hàng thành công</h1><br>
    Cảm ơn bạn đã mua hàng<br>
    <table>
        Thông tin đơn hàng<br>
        <input type="hidden" name="ma-user" value="<?php echo $user["MaUser"] ?>">
        Họ Tên: <input type="text" name="ho-ten" value="<?php echo $user["TenUser"] ?>"><br>
        Số điện thoại: <input type="text" name="sdt" value="<?php echo $user["SdtU"] ?>"> <br>
        Địa chỉ: <input type="text" name="dia-chi" value="<?php echo $user["DiaChiU"] ?>"> <br>
        Ghi chú: <textarea name="ghi-chu"></textarea> <br>
    </table>
    <td><a href="huy-don-hang.php?ma-don-hang=<?php echo $hoadon["MaHoaDon"] ?>" onclick="return confirm('Bạn có muốn huý không?')">Huỷ đơn hàng</a></td>
</body>

</html>