<?php

		  $id_lop_hoc = $_GET['id'];
          $sql = "SELECT * FROM `bai_tap` WHERE `id_lop_hoc`= $id_lop_hoc and `ngay_bat_dau` is null and `ngay_ket_thuc` is null";
        

		  $stms = mysqli_query($conn,$sql);
            
        
		  ?>
  				