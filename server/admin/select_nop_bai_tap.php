<?php

		  $id_bai_tap = $_GET['id_bai_tap'];
		  $now =date("Y-m-d H:i");

          $sql = "SELECT nop_bai_tap.ten_dang_nhap,dang_nhap.ho_ten,dang_nhap.email,nop_bai_tap.ngay_nop,nop_bai_tap.file_nop_bai_tap  FROM nop_bai_tap,dang_nhap WHERE nop_bai_tap.id_bai_tap= $id_bai_tap ";
        

		  $stms = mysqli_query($conn,$sql);
            
        
		  ?>
  				