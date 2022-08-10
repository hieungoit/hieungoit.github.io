<?php
	require_once('../config.php');

	$id_dang_nhap = $_POST['id_dang_nhap'];
	
	


	
	$sql = "DELETE FROM `dang_nhap` WHERE `id_dang_nhap`=$id_dang_nhap";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>