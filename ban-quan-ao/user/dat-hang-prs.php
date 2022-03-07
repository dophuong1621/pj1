<?php
session_start();
if (isset($_POST["ma-user"]) && isset($_POST["ho-ten"]) && isset($_POST["sdt"]) && isset($_POST["dia-chi"]) && isset($_POST["ghi-chu"])) {
    $maUser = $_POST["ma-user"];
    $hoTen = $_POST["ho-ten"];
    $sdt = $_POST["sdt"];
    $diaChi = $_POST["dia-chi"];
    $ghiChu = $_POST["ghi-chu"];
    $ngayDat = date("Y-m-d");
    include("../connect/open.php");
    // Thêm dữ liệu vào bảng đơn hàng
    $sqlDonHang = "INSERT INTO don_hang(MaH,TenNguoiNhan,SdtNguoiNhan,DiaChi,GhiChu,NgayDat) VALUES ($maUser,'$hoTen','$sdt','$diaChi','$ghiChu','$ngayDat')";
    mysqli_query($con, $sqlDonHang);
    // Tìm dữ liệu mới nhất vừa thêm vào => mã đơn hàng
    $sqlMax = "SELECT MAX(MaH) AS maxMa FROM don_hang";
    $resultMax = mysqli_query($con, $sqlMax);
    $maxMa = mysqli_fetch_array($resultMax);
    $maDonHang = $maxMa["maxMa"];
    // Thêm dữ liệu vào đơn hàng chi tiết mã sp, giá, số lượng
    $gioHang = $_SESSION["GioHang"];
    foreach ($gioHang as $maSp => $soLuong) {
        // Lấy giá thông qua bảng sản phẩm
        $sqlSanPham = "SELECT * FROM `san_pham` WHERE MaSanPham = $maSp";
        $resultSanPham = mysqli_query($con, $sqlSanPham);
        $sanPham = mysqli_fetch_array($resultSanPham);
        $gia = $sanPham["Gia"];
        $sqlDonHangChiTiet = "INSERT INTO don_hang_chi_tiet(MaH,MaSanPham,Gia,SoLuong) VALUES ($maDonHang,$maSp,'$gia',$soLuong)";
        mysqli_query($con, $sqlDonHangChiTiet);
        // Trừ số lượng sản phẩm trong kho
        // Lấy số lượng từ hóa đơn
        // Lấy số lượng ở trong kho
        $soLuongKho = $sanPham["SoLuong"];
        // Số lượng còn lại = số lượng trong kho - số lượng từ hóa đơn
        $soLuongConLai = $soLuongKho - $soLuong;
        // Update dữ liệu sản phẩm
        $sqlUpdateSanPham = "UPDATE san_pham SET SoLuong=$soLuongConLai WHERE MaSanPham=$maSp";
        mysqli_query($con, $sqlUpdateSanPham);
    }
    unset($_SESSION["GioHang"]);
    include("../connect/close.php");
    header("Location: header.php");
}
