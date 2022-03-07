<?php
$a = 1;
include("../connect/open.php");
if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $sql = "SELECT * FROM `san_pham` WHERE TenSanPham LIKE '%$search%";
} else {
  $sql = "SELECT * FROM `san_pham`";
}
$result = mysqli_query($con, $sql);
include("../connect/close.php");
?>
<link rel="stylesheet" href="header.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<div id="menu">
  <ul>
    <li></li>
    <li><a href="trang-chu.php">Trang chủ</a></li>
    <li><a href="danh-sach-san-pham.php">Sản phẩm</a>
      <ul class="sub-menu">
        <li><a href="quan.php">Quần</a></li>
        <li><a href="ao.php">Áo</a></li>
        <li><a href="mu.php">Mũ</a></li>
        <li><a href="kinh.php">Kính</a></li>
      </ul>
    </li>
    <li><a href="sale.php">Sale</a></li>
    <li><a href="contact.php">Liên hệ</a></li>
  </ul>
  <div id="detail">
    <div class="s" id="search">
      <a href="#"><i class="fa fa-search"></i></a><br>
    </div>
    <div>
      <div class="u" id="user" style="display: flex;">
        <i class="fa fa-user"></i><a href="sua-user.php"><?php if (isset($_SESSION["tenUser"])) echo $_SESSION["tenUser"] ?></a>
      </div>
      <div class="o" id="log-out">
        <a href="log-out.php">Đăng xuất</a>
      </div>
    </div>
    <div class="c" id="cart">
      <a href="xem-gio-hang.php"><i class="fa fa-shopping-cart"></i></a><br>
    </div>
  </div>
</div>
<div class="owl-pagination">
  <div class="owl-page">
    <span class=""></span>
  </div>
  <div class="owl-page">
    <span class=""></span>
  </div>
  <div class="owl-page">
    <span class=""></span>
  </div>
</div>