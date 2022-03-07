<?php
session_start();
unset($_SESSION["tenUser"]);
header("Location: login.php");
