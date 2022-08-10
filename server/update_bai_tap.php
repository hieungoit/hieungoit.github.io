
<?php
	require_once('../config.php');
	if(file_exists($_FILES['file_bai_tap1']['tmp_name']))
	{
		$id_bai_tap = $_POST['id_bai_tap1'];

		$ten_bai_tap = $_POST['ten_bai_tap1'];
		$mo_ta = $_POST['mo_ta1'];
		$ngay_bat_dau = $_POST['ngay_bat_dau1'];
		$ngay_ket_thuc = $_POST['ngay_ket_thuc1'];
		$file_bai_tap = "../hinhanhdaidien/" . $_FILES['file_bai_tap1']['name'];
		move_uploaded_file($_FILES['file_bai_tap1']['tmp_name'],$file_bai_tap);

	
		$sql = "UPDATE `bai_tap` SET `ten_bai_tap`='$ten_bai_tap',`mo_ta`='$mo_ta',`ngay_bat_dau`='$ngay_bat_dau',`ngay_ket_thuc`='$ngay_ket_thuc',`file_bai_tap`='$file_bai_tap' WHERE `id_bai_tap`=$id_bai_tap";
	$stms = mysqli_query($conn,$sql);
			   if ($stms) {
				  $result =1;
				   
			   }
			   else {
				   $result = 0;
			   }
	}
     else{

		$id_bai_tap = $_POST['id_bai_tap1'];

		$ten_bai_tap = $_POST['ten_bai_tap1'];
		$mo_ta = $_POST['mo_ta1'];
		$ngay_bat_dau = $_POST['ngay_bat_dau1'];
		$ngay_ket_thuc = $_POST['ngay_ket_thuc1'];
		
		$sql = "UPDATE `bai_tap` SET `ten_bai_tap`='$ten_bai_tap',`mo_ta`='$mo_ta',`ngay_bat_dau`='$ngay_bat_dau',`ngay_ket_thuc`='$ngay_ket_thuc' WHERE `id_bai_tap`=$id_bai_tap";

	
				$stms = mysqli_query($conn,$sql);
			   if ($stms) {
				  $result =1;
				   
			   }
			   else {
				   $result = 0;
			   }
     }
?>

<?php




	


