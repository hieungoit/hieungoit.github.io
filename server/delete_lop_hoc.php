<?php
	require_once('../config.php');

	$id_lop_hoc = $_POST['id_lop_hoc'];
	
	$sql = "DELETE FROM `lop_hoc` WHERE `id_lop_hoc`=$id_lop_hoc";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>