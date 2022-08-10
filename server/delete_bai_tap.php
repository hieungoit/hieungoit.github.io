<?php
	require_once('../config.php');

	$id_bai_tap = $_POST['id_bai_tap'];

	$sql = "DELETE FROM `bai_tap` WHERE `id_bai_tap`=$id_bai_tap";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>