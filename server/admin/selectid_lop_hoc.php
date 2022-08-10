<?php
include("./../../config.php");
		  $id = $_POST['id'];
          $sql = "SELECT * FROM `lop_hoc` where `id_lop_hoc` = $id";
        

		  $stms = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($stms);
            echo json_encode($result);
        
		  ?>
  				