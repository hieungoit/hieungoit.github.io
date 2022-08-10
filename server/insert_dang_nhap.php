<?php
	require_once('../config.php');

	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$mat_khau = $_POST['mat_khau'];
	$ho_ten = $_POST['ho_ten'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$email = $_POST['email'];
	$so_dien_thoai = $_POST['so_dien_thoai'];

	$result = "";


	
	$sql = "INSERT INTO `dang_nhap`( `ten_dang_nhap`, `mat_khau`, `ho_ten`, `ngay_sinh`, `email`, `so_dien_thoai`) VALUES ('$ten_dang_nhap','$mat_khau','$ho_ten','$ngay_sinh','$email','$so_dien_thoai')";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
			   $result = 1 ;
			   
                
            }
            else {
                $result = 0;
            }
?>