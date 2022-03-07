<?php //Khởi tạo tại dòng 2
session_start();
if (isset($_POST["user"]) && isset($_POST["pass"])) {
    //Mở kết nối
    include("../connect/open.php");
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    //Câu query kiểm tra
    $sql = "SELECT * FROM admin WHERE UsernameA='$user' AND PasswordA='$pass'";
    $result = mysqli_query($con, $sql);
    $admin = mysqli_fetch_array($result);
    //Đếm số bản ghi
    $check = mysqli_num_rows($result);
    //Kiểm tra có kết quả hay không

    if ($check == 0) {
        header("Location: login.php?error=1");
    } else {
        if ($admin["Quyen"] == 2) {
            header("Location: login.php?error=2");
        } else {
            $_SESSION["maAdmin"] = $admin["MaAdmin"];
            $_SESSION["user"] = $user;
            //tạo session lưu trữ quyền
            if ($admin["Quyen"] == 1) {
                $_SESSION["quyen"] = "SuperAdmin";
            } else {
                $_SESSION["quyen"] = "Admin";
            }
            header("Location: admin.php");
        }
    }
    //Đóng kết nối
    include("../connect/close.php");
} else {
    header("Location: admin.php");
}
