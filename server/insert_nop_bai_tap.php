<?php
	require_once('../config.php');
	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$id_bai_tap = $_POST['id_bai_tap'];
	$file_nop_bai_tap = "../filenopbaitap/" . $_FILES['file_nop_bai_tap']['name'];
	move_uploaded_file($_FILES['file_nop_bai_tap']['tmp_name'],$file_nop_bai_tap);

	
	$sql = "INSERT INTO `nop_bai_tap`( `ten_dang_nhap`, `id_bai_tap`, `file_nop_bai_tap`) VALUES ('$ten_dang_nhap','$id_bai_tap','$file_nop_bai_tap')";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                $result = 1;
                
            }
            else {
                $result = 0;
            }
?>