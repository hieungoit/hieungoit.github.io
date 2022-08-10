
<?php
	require_once('../config.php');

	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$mat_khau = $_POST['mat_khau'];
	$result = '';


	
	$sql = "SELECT * FROM `dang_nhap` WHERE `ten_dang_nhap`='$ten_dang_nhap' and `mat_khau`='$mat_khau'";
     $stms = mysqli_query($conn,$sql);
     $count = mysqli_num_rows($stms);
            if ($count > 0) {
                $result =  1;
                session_start();
                $_SESSION['ten_dang_nhap']  = $ten_dang_nhap;
            }
            else {
                $result =  0;
            }
?>