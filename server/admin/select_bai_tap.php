<?php

		  $id_lop_hoc = $_GET['id'];
		  $now =date("Y-m-d H:i");

          $sql = "SELECT * FROM `bai_tap` WHERE `id_lop_hoc`= $id_lop_hoc and `ngay_bat_dau` is NOT null and `ngay_ket_thuc` is NOT null  ";
        

		  $stms = mysqli_query($conn,$sql);
            
        
		  ?>
  				