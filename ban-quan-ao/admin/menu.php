<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="menu" id="sidenav">

        <!-- home -->
        <?php if ($page == 2) { ?>
            <a class="text-decoration-none" href="addbrand.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-shopping-bag" style="color:#94f17469;"></i> Quản lý thương hiệu</a>
        <?php  } else { ?>
            <a class="text-decoration-none" href="addbrand.php"><i class="fas fa-shopping-bag"></i> Quản lý thương hiệu</a>
        <?php } ?>
        <!--brand-->
        <?php if ($page == 3) { ?>
            <a class="text-decoration-none" href="type.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-tshirt" style="color:#ffe60683;"></i> Quản lý thể loại</a>
        <?php  } else { ?>
            <a class="text-decoration-none" href="type.php"><i class="fas fa-tshirt"></i> Quản lý thể loại</a>
        <?php } ?>
        <!--type-->
        <?php if ($page == 4) { ?>
            <a class="text-decoration-none" href="addproduct.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-hat-wizard" style="color:#55134f86;"></i> Quản lý sản phẩm</a>
        <?php  } else { ?>
            <a class="text-decoration-none dropdown-btn" href="addproduct.php"><i class="fas fa-hat-wizard"></i> Quản lý sản phẩm</a>
        <?php } ?>
        <!--product-->
        <?php if ($page == 5) { ?>
            <a class="text-decoration-none" href="bill.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-scroll" style="color:#f5e861a6;"></i> Đơn hàng <span class="badge badge-pill badge-danger"><?php echo $l5["SL5"] ?></span></a>
        <?php  } else { ?>
            <a class="text-decoration-none" href="bill.php"><i class="fas fa-scroll"></i> Đơn hàng <span class="badge badge-pill badge-danger"><?php echo $l5["SL5"] ?></span></a>
        <?php } ?>
        <!--bill-->
        <?php if ($page == 6) { ?>
            <a class="text-decoration-none" href="usermanage.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-user-friends" style="color:rgb(74, 250, 162, 0.644);"></i> Quản lý người dùng</a>
        <?php  } else { ?>
            <a class="text-decoration-none" href="usermanage.php"><i class="fas fa-user-friends"></i> Quản lý người dùng</a>
        <?php } ?>
        <!--user-->
        <?php if ($_SESSION["quyen"] == "SuperAdmin") { ?>
            <?php if ($page == 7) { ?>
                <a class="text-decoration-none" href="addadmin.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-users" style="color:#00d9ff81;"></i></i> Quản lý admin</a>
            <?php  } else { ?>
                <a class="text-decoration-none" href="addadmin.php"><i class="fas fa-users"></i></i> Quản lý admin</a>
            <?php } ?>
            <!--superadmin-->
            <?php if ($page == 8) { ?>
                <a class="text-decoration-none" href="admininfo.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-user" style="color:#fa4c9575;"></i> Thông tin cá nhân</a>
            <?php  } else { ?>
                <a class="text-decoration-none" href="admininfo.php"><i class="fas fa-user"></i> Thông tin cá nhân</a>
            <?php } ?>
        <?php } else { ?>
            <?php if ($page == 8) { ?>
                <a class="text-decoration-none" href="admininfo.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-user" style="color:#fa4c9575;"></i> Thông tin cá nhân</a>
            <?php  } else { ?>
                <a class="text-decoration-none" href="admininfo.php"><i class="far fa-user"></i> Thông tin cá nhân</a>
            <?php } ?>
        <?php } ?>
        <!--admininfo-->
        <?php if ($page == 9) { ?>
            <a class="text-decoration-none dropdown-btn" href="delivery.php" style="background-color: rgba(156, 144, 144, 0.377);color: #f1f1f1;"><i class="fas fa-truck" style="color:rgba(183, 109, 243, 0.616);"></i> Vận chuyển</a>
        <?php  } else { ?>
            <a class="text-decoration-none dropdown-btn" href="delivery.php"><i class="fas fa-truck"></i> Vận chuyển</a>
        <?php } ?>
        <!--deli-->
        <a class="text-decoration-none" id="logout" href="logout.php"><i class="fas fa-power-off"></i> Đăng xuất</a>

    </div>
</body>

</html>