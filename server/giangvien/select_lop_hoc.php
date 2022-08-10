 <?php
		  $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
		  $sql = "SELECT * FROM `lop_hoc` WHERE `ten_dang_nhap`='$ten_dang_nhap'";
		  $stms = mysqli_query($conn,$sql);
		//   if ($stms) {
		// 		$row = mysqli_fetch_row($stms);    
		// 		var_dump($row); 
        //     }
        //     else {
        //         echo "thất bại";
        //     }
		  ?>
  				