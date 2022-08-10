<?php
	include '../../config.php';
		  $id_lop_hoc = $_GET['id_lop_hoc'];
		  $sql = "SELECT dang_nhap.ho_ten , dang_nhap.ngay_sinh, dang_nhap.email , dang_nhap.so_dien_thoai FROM `thanh_vien`, `dang_nhap`  WHERE thanh_vien.id_lop_hoc=$id_lop_hoc and trang_thai=0 and thanh_vien.ten_dang_nhap = dang_nhap.ten_dang_nhap " ;
		 
		  ?>
  				