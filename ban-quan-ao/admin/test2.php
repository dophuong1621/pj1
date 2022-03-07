<?php if ($p["status"] == 0) {
?>
    <a href="chgstt.php?bill-id=<?php echo $p["MaHoaDon"] ?>" onclick="return confirm('Vận chuyển đơn hàng ?')"><img class="ske" src="../upload/d9t62ac-076c1bc8-7696-47ce-9332-5d4464d3fb8a.gif"></a>


<?php
} else {
?>
    <a href="chgstt.php?bill-id=<?php echo $p["MaHoaDon"] ?>" onclick="return confirm('Tạm ngưng vận chuyển ?')"><img class="ske" src="../upload/d9t661m-6bebe706-f32b-442c-b10c-694bd37e817c.gif"></a>

<?php }
?>