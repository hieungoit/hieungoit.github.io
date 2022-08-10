<?php
include("./../../config.php");

		  $ten_dang_nhap = $_POST['id'];
		 
          $sql = "SELECT * FROM `dang_nhap` WHERE `id_dang_nhap`='$ten_dang_nhap'";        

		  $stms = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($stms);
            echo json_encode($result);		
		  ?>
  				