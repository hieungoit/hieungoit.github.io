<?php
		  $user = $_SESSION['ten_dang_nhap'];
		  $sql = "SELECT * FROM `lop_hoc` WHERE `ten_dang_nhap`='$user' and id_lop_hoc = $id";
		  $stms = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($stms);
		  ?>
  				