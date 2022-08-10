<?php
	require_once('../config.php');

	
	
$id = $_POST['id'];

	
	$sql = "UPDATE `thanh_vien` SET `trang_thai`=1 WHERE `id_thanh_vien` = $id";;
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>