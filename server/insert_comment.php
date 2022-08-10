<?php
	$id_bai_tap = $_POST['id_bai_tap'];
	$ten_dang_nhap = $_SESSION['ten_dang_nhap'];
	$comment = $_POST['comment'];
	

	
	$sql = "INSERT INTO `comment`( `id_bai_tap`, `ten_dang_nhap`, `comment`) VALUES ('$id_bai_tap','$ten_dang_nhap','$comment')";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                
            }
            else {
            }
?>