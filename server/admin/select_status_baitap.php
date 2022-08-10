<?php

		  $id_bai_tap = $_GET['id_bai_tap'];
		  $now =date("Y-m-d H:i");

          $sql = "SELECT * FROM `bai_tap` WHERE `id_bai_tap`= $id_bai_tap and `ngay_bat_dau` is NOT null and `ngay_ket_thuc` is NOT null and `ngay_ket_thuc` > '$now'  ";
        

		  $stms = mysqli_query($conn,$sql);
            
        
		  ?>
  				