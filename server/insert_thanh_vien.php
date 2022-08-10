<?php
	require_once('../config.php');

	$id_lop_hoc = $_GET['id_lop_hoc'];
	$id_dang_nhap = $_GET['id_dang_nhap'];
	


	
	$sql = "INSERT INTO `thanh_vien`( `id_lop_hoc`, `id_dang_nhap`) VALUES ($id_lop_hoc,$id_dang_nhap)";;
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "thanh công ";
                
            }
            else {
                echo "thất bại";
            }
?>