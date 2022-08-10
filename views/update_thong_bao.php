<?php
	require_once('../config.php');
	$id_bai_tap = $_GET['id_bai_tap'];

	$ten_bai_tap = $_GET['ten_bai_tap'];
	$mo_ta = $_GET['mo_ta'];

	$file_bai_tap = "../hinhanhdaidien/" . $_FILES['file_bai_tap']['name'];
	move_uploaded_file($_FILES['file_bai_tap']['tmp_name'],$file_bai_tap);

	
	$sql = "UPDATE `bai_tap` SET `ten_bai_tap`='$ten_bai_tap',`mo_ta`='$mo_ta',`file_bai_tap`='file_bai_tap' WHERE `id_bai_tap`=$id_bai_tap";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "thanh công ";
                
            }
            else {
                echo "thất bại";
            }
?>