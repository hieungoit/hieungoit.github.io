<?php
	require_once('../config.php');
	$ten_dang_nhap = $_GET['ten_dang_nhap'];
	$id_nop_bai_tap = $_GET['id_nop_bai_tap'];
	$file_nop_bai_tap = "filenapbaitap/" . $_FILES['file_nop_bai_tap']['name'];
	move_uploaded_file($_FILES['file_nop_bai_tap']['tmp_name'],$file_nop_bai_tap);

	
	$sql = "UPDATE `nop_bai_tap` SET `file_nop_bai_tap`='$file_nop_bai_tap' WHERE `id_nop_bai_tap`=$id_nop_bai_tap and `ten_dang_nhap`='$ten_dang_nhap'";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "thanh công ";
                
            }
            else {
                echo "thất bại";
            }
?>