<?php
		  $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
		  $sql = "SELECT * FROM `dang_nhap` WHERE `ten_dang_nhap`='$ten_dang_nhap'";
		  $stms = mysqli_query($conn,$sql);
		  if ($stms) {
                
            $auth = mysqli_fetch_array($stms);
                
            }
            else {
                
            }
		  ?>
  				