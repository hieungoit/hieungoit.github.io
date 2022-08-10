
<?php
session_start();
        if(isset($_SESSION['ten_dang_nhap']))
{
    include('./../config.php');

    include("./../server/admin/select_dang_nhap.php");

    if($auth['loai_tai_khoan'] == "AD" or $auth['loai_tai_khoan'] == "GV")
    {
        if($auth['loai_tai_khoan']=="GV")
        {
            $id = $_GET['id'];
            include("auth_gv.php");
            if($count > 0)
            {
     
            }
            else
            {
             header("Location: ./../index.php");
            }
        }
       
    }
    else
    {
        header("Location: dangnhap.php");
    }
   
}
else
{
    header("Location: dangnhap.php");
}

?>  
<!DOCTYPE html>
<html>
<head>
    <?php include("bundle_view/head.php"); ?>
</head>
    <div class="header">
    <div class="header-admin">
		<div class="container-fluid full">
			<div class="row">
				<div class="col-md-12">
					
                <div class="navbar">
                        <a class="navbar-brand" href="#"><h4>CLASSROOM</h4></a>
                        <ul class="nav navbar-nav fix-flex">
                        <li class="back">
                                <a href="./../">Quay lại</a>
                            </li>
                            <li>
                                <a href="./../server/dangxuat.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
    </div>
    
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
           
	
            <div class="row">
			<div class="col-md-12">
				<div class="sidebar sidebar-fixed" >
					<ul class="list-group">						
						<li class="list-group-item"><a href="thongbao.php?id=<?= $_GET['id'] ?>"><i class="fa fa-home"></i>Bảng tin</a></li>
                        <li class="list-group-item"><a href="baitap.php?id=<?= $_GET['id'] ?>"><i class="fa fa-book" aria-hidden="true"></i>Bài tập</a></li>

                
                 <li class="list-group-item"><a class="active" href=""><i class="fa fa-check" aria-hidden="true"></i>Xác nhận</a></li>
                 <li class="list-group-item"><a href="danhsachthanhvien.php?id=<?= $_GET['id'] ?>"><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>

        
                    			
							</ul>
				</div>
			</div>
		
		</div>
	
	
	
	

            </div>
            
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
            <div class="content">
                <h2>Bảng xác nhận</h2>
            </div>
            
            <br>
            <br>
           
           <div class="table-responsive">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Họ và tên</th>
                           <th>Ngày tháng năm sinh</th>
                           <th>Email</th>
                           <th>SDT</th>

                          
                           <th>Hành động</th>

                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $id_lop_hoc = $_GET['id'];
                    $sql = "SELECT dang_nhap.ho_ten , id_thanh_vien, dang_nhap.ngay_sinh, dang_nhap.email , dang_nhap.so_dien_thoai FROM `thanh_vien`, `dang_nhap`  WHERE thanh_vien.id_lop_hoc=$id_lop_hoc and trang_thai=0 and thanh_vien.ten_dang_nhap = dang_nhap.ten_dang_nhap " ;
                    $stms = mysqli_query($conn,$sql);
                   if(mysqli_num_rows($stms) > 0)
               {
                

                 while ($row=mysqli_fetch_array($stms)) {
               
                ?>
                       <tr>
                           <td><?php echo $row['ho_ten'] ?></td>
                           <td><?php echo  date("d-m-Y", strtotime($row['ngay_sinh'])) ?></td>
                           <td><?php echo $row['email'] ?></td>

                           <td><?php echo $row['so_dien_thoai'] ?></td>
                           <td>
                           <a onclick = "disagree(<?php echo $row['id_thanh_vien'] ?>)" class="btn btn-danger" >Hủy</a>

                               <a onclick = "agree(<?php echo $row['id_thanh_vien'] ?>)"  class="btn btn-success" >Đồng ý</a>
                           </td>

                       </tr>
                       <?php 
                      }
                    }
                    else{
                        echo "<h4>Không có dữ liệu</h4>";
                    }
                   
                   ?>    
                   </tbody>
               </table>
           </div>
           

            </div>
            
        </div>
        
        
    </div>
    
    
<body>



</body>
<script src="./../main.js"></script>

</html>