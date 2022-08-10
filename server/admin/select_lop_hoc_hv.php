
<?php
          $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
        //   $search = $_POST['search'];
     $sql = "SELECT lop_hoc.ten_dang_nhap ,thanh_vien.id_lop_hoc, ten_lop_hoc, mon_hoc, hinh_anh_dai_dien , ma_lop_hoc FROM `thanh_vien`, `lop_hoc`  WHERE thanh_vien.ten_dang_nhap = '$ten_dang_nhap' and trang_thai=1 and thanh_vien.id_lop_hoc = lop_hoc.id_lop_hoc" ;
        $stms = mysqli_query($conn,$sql);
		//   if ($stms) {
		// 		$row = mysqli_fetch_row($stms);    
		// 		var_dump($row); 
        //     }
        //     else {
        //         echo "thất bại";
        //     }
		  ?>
  				