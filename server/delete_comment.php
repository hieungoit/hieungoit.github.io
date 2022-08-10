<?php
	require_once('./../config.php');

	$id_comment = $_POST['id_comment'];
	
	


	
	$sql = "DELETE FROM `comment` WHERE `id_comment`=$id_comment";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                echo "1";
                
            }
            else {
                echo "0";
            }
?>