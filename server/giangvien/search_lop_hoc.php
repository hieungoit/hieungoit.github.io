<?php
          $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
          $search = $_POST['search'];
		  echo $sql = "SELECT * FROM `lop_hoc` WHERE (`ten_dang_nhap`='$ten_dang_nhap') and (ten_lop_hoc LIKE '%$search%' or mon_hoc Like '%$search%')";
		  $stms = mysqli_query($conn,$sql);
		//   if ($stms) {
		// 		$row = mysqli_fetch_row($stms);    
		// 		var_dump($row); 
        //     }
        //     else {
        //         echo "thất bại";
        //     }
		  ?>
  				