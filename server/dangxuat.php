<?php
session_start();

if(isset($_SESSION['ten_dang_nhap']))
{
    session_destroy();
    header("Location:./../views/dangnhap.php");
}


?>