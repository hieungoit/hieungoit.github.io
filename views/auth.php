<?php
		  $user = $_SESSION['ten_dang_nhap'];
		  $sql = "SELECT * FROM `thanh_vien` WHERE `ten_dang_nhap`='$user' and id_lop_hoc = $id and trang_thai =1 ";
		  $stms = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($stms);
		  ?>
  				