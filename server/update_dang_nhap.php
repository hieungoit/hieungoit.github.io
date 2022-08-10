<?php
	require_once('../config.php');

	$id_dang_nhap = $_POST['id_dang_nhap'];
	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$mat_khau = $_POST['mat_khau'];
	$ho_ten = $_POST['ho_ten'];
	$ngay_sinh = $_POST['ngay_sinh'];
	$email = $_POST['email'];
	$so_dien_thoai = $_POST['so_dien_thoai'];
	$loai_tai_khoan = $_POST['loai_tai_khoan'];

	


	
	$sql = "UPDATE `dang_nhap` SET `ten_dang_nhap`='$ten_dang_nhap',`mat_khau`='$mat_khau',`ho_ten`='$ho_ten',`ngay_sinh`='$ngay_sinh',`email`='$email',`so_dien_thoai`='$so_dien_thoai',`loai_tai_khoan`='	$loai_tai_khoan' WHERE `id_dang_nhap`=$id_dang_nhap";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
				$result =  1;
				
                
            }
            else {
				$result =  0;
            }
?>