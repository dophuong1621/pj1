<?php
session_start();
if (isset($_SESSION["EmailU"])) {
  header("Location: trang-chu.php");
} else {
  $check = false;
  if (isset($_COOKIE["EmailU"])) {
    $EmailU = $_COOKIE["EmailU"];
    $PasswordU = $_COOKIE["PasswordU"];
    $check = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body class="login">
  <?php
  include("header.php");
  ?>
  <div class="container">
    <div style="background: #ffffff73;
    padding: 17px;">
      <form action="login-prs.php" method="POST">
        <h1>Đăng nhập</h1>
        <div class="input-box">
          <input type="text" name="EmailU" placeholder="Email" required value="<?php if ($check) {
                                                                                  echo $EmailU;
                                                                                } ?>">
        </div>
        <div class="input-box">
          <input type="password" name="PasswordU" placeholder="Mật khẩu" required value="<?php if ($check) {
                                                                                            echo $PasswordU;
                                                                                          } ?>">
        </div>
        <?php
        if (isset($_GET["error"])) {
          echo "Sai tên đăng nhập hoặc mật khẩu <br>";
        }
        ?>
        <input type="checkbox" name="check" <?php if ($check) {
                                              echo "checked";
                                            } ?>>Ghi nhớ

        <div class="btn-box">
          <button>Đăng nhập</button>
        </div>
        <div class="dki-box">
          <a href="them-user.php">Đăng kí</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>