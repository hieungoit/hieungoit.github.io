<?php

	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$ten_lop_hoc = $_POST['ten_lop_hoc'];
	$mon_hoc = $_POST['mon_hoc'];
	$hinh_anh_dai_dien = "hinhanhdaidien/" . $_FILES['hinh_anh_dai_dien']['name'];

	move_uploaded_file($_FILES['hinh_anh_dai_dien']['tmp_name'],$hinh_anh_dai_dien);
	$ma_lop_hoc = rand();
	


	
	$sql = "INSERT INTO `lop_hoc`(`ten_dang_nhap`, `ten_lop_hoc`, `mon_hoc`,  `hinh_anh_dai_dien`, `ma_lop_hoc`) VALUES ('$ten_dang_nhap','$ten_lop_hoc','$mon_hoc','$hinh_anh_dai_dien','$ma_lop_hoc')";;
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                $result  = 1;
                
            }
            else {
                $result =  0;
            }
?>