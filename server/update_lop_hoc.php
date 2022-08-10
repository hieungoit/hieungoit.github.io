<?php

	if(file_exists($_FILES['hinh_anh_dai_dien_u']['tmp_name']))
	{
	$id_lop_hoc = $_POST['id_lop_hoc'];
	$ten_lop_hoc = $_POST['ten_lop_hoc_u'];
	$mon_hoc = $_POST['mon_hoc_u'];
	$hinh_anh_dai_dien = "hinhanhdaidien/" . $_FILES['hinh_anh_dai_dien_u']['name'];
	move_uploaded_file($_FILES['hinh_anh_dai_dien_u']['tmp_name'],$hinh_anh_dai_dien);

	
	$sql = "UPDATE `lop_hoc` SET `ten_lop_hoc`='$ten_lop_hoc',`mon_hoc`='$mon_hoc',`hinh_anh_dai_dien`='$hinh_anh_dai_dien'WHERE `id_lop_hoc`=$id_lop_hoc";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                $result = 1;
                
            }
            else {
                $result = 0;
			}
	}
     else{

     	$id_lop_hoc = $_POST['id_lop_hoc'];
		$ten_lop_hoc = $_POST['ten_lop_hoc_u'];
		$mon_hoc = $_POST['mon_hoc_u'];
		

	
	$sql = "UPDATE `lop_hoc` SET `ten_lop_hoc`='$ten_lop_hoc',`mon_hoc`='$mon_hoc' WHERE `id_lop_hoc`=$id_lop_hoc";
	 $stms = mysqli_query($conn,$sql);
            if ($stms) {
                $result = 1;
                
            }
            else {
                $result = 0;
            }
     }
?>