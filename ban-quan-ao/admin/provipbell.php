<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="../access/login.css">
    <link rel="stylesheet" href="../access/bootstrap-4.5.3-dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../connect/open.php");
    $sql0 = "SELECT COUNT(status) as SL5 FROM `hoa_don` WHERE status=0";
    $result5 = mysqli_query($con, $sql0);
    $l5 = mysqli_fetch_array($result5);
    include("../connect/close.php");
    ?>
</body>

</html>