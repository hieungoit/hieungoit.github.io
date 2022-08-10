<?php
include("./../../config.php");

		  $id_bai_tap = $_POST['id'];
		 
          $sql = "SELECT * FROM `bai_tap` WHERE `id_bai_tap`=$id_bai_tap";        

		  $stms = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($stms);
            echo json_encode($result);		
		  ?>
  				