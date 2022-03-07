<div class="footer">
    <?php
    include("../connect/open.php");
    $sql100 = "SELECT SdtA from Admin WHERE Quyen = 1";
    $resultsdt = mysqli_query($con, $sql100);
    $p = mysqli_fetch_array($resultsdt);
    include("../connect/close.php");
    ?>
    Facebook:<a class="text-decoration-none" href="#"><i class="ft fab fa-facebook"></i></a>
    Twitter:<a class="text-decoration-none" href="#"><i class="ft fab fa-twitter"></i></a>
    Instagram:<a class="text-decoration-none" href="#"><i class="ft fab fa-instagram"></i></a>
    Trang bán hàng: <a class="text-decoration-none" id="store" href="#"><i class="ft fas fa-store"></i></a>
    Liên hệ quản lý:<a class="text-decoration-none" href="tel:<?php echo $p["SdtA"] ?>"><i class="ft fas fa-phone"></i></a>
</div>