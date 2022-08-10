 <?php
	include '../../config.php';
		  $id_lop_hoc = $_GET['id_lop_hoc'];
		  $sql = "SELECT thanh_vien.ten_dang_nhap,lop_hoc.ten_lop_hoc from thanh_vien,lop_hoc where lop_hoc.id_lop_hoc in(SELECT id_lop_hoc from thanh_vien where id_lop_hoc=$id_lop_hoc)";
		  $stms = mysqli_query($conn,$sql);
		 
		  ?>
  				