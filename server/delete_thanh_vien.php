<?php
	require_once('../config.php');

    $id_thanh_vien = $_POST['id_thanh_vien'];

	
	


	
	$sql = "DELETE FROM `thanh_vien` WHERE `id_thanh_vien`=$id_thanh_vien";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>