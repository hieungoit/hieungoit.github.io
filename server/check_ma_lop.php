<?php
	include '../config.php';
		  $ma_lop_hoc = $_POST['ma_lop_hoc'];
          $ten_dang_nhap = $_POST['ten_dang_nhap'];
          $ma_phong = $_POST['ma_phong'];
          $sql = "SELECT * FROM `lop_hoc` WHERE `ma_lop_hoc`=$ma_lop_hoc and `id_lop_hoc` = $ma_phong";
          $stms = mysqli_query($conn,$sql);
		   if (mysqli_num_rows($stms) == 0) {
                echo "0";
            }
            else
            {
                $row = mysqli_fetch_assoc($stms);
                $id = $row['id_lop_hoc'];
            	$sql = "INSERT INTO `thanh_vien`( `id_lop_hoc`, `ten_dang_nhap`) VALUES ($ma_phong,'$ten_dang_nhap')";
				 $stms = mysqli_query($conn,$sql);
			            if ($stms) {
			               
                            echo "1";

			            }
			            else {
			                
			            }
			            }
		  ?>
  				