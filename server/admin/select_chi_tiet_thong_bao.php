<?php

		  $id_bai_tap = $_GET['id_bai_tap'];
          $sql = "SELECT * FROM `bai_tap` WHERE `id_bai_tap`=$id_bai_tap  ";
        

		  $stms = mysqli_query($conn,$sql);
            
        
		  ?>
  				