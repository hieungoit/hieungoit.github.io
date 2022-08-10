<?php
            session_start();
            include("./../config.php");
          $user = $_SESSION['ten_dang_nhap'];
          $id = $_POST['id'];

          $sql1 = "SELECT * FROM `dang_nhap` WHERE `ten_dang_nhap`='$user' and loai_tai_khoan ='AD' ";
          $stms1 = mysqli_query($conn,$sql1);
         
          $count1 = mysqli_num_rows($stms1);

        $sql2 = "SELECT * FROM `lop_hoc` WHERE `ten_dang_nhap`='$user' and id_lop_hoc = $id";
        $stms2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($stms2);

          if($count1>0)
          {
              echo "1";
          }
          else if($count2 > 0)
          {
            echo "1";
          }
          else
          {
            $sql = "SELECT * FROM `thanh_vien` WHERE `ten_dang_nhap`='$user' and id_lop_hoc = $id and trang_thai =1 ";
            $stms = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($stms);
          if($count > 0)
          {
              echo "1";
          }
          else
          {
              echo "0";
          }
          }


		 
		  ?>
  				