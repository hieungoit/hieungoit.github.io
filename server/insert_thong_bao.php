<?php
	require_once('../config.php');
	$id_lop_hoc = $_GET['id'];
	$ten_bai_tap = $_POST['ten_bai_tap'];
	$mo_ta = $_POST['mo_ta'];
	$file_bai_tap = "../hinhanhdaidien/" .	 $_FILES['file_bai_tap']['name'];
	move_uploaded_file($_FILES['file_bai_tap']['tmp_name'],$file_bai_tap);

	
	$sql = "INSERT INTO `bai_tap`( `id_lop_hoc`, `ten_bai_tap`, `mo_ta`, `file_bai_tap`) VALUES ('$id_lop_hoc','$ten_bai_tap','$mo_ta','$file_bai_tap')";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                $result = 1;
                
            }
            else {
                $result=0;;
            }
?>