<?php
	require_once('../config.php');

	$id_nop_bai_tap = $_GET['id_nop_bai_tap'];
	
	


	
	$sql = "DELETE FROM `nop_bai_tap` WHERE `id_nop_bai_tap`";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "thanh công ";
                
            }
            else {
                echo "thất bại";
            }
?>