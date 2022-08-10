
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
                        <a href="baitap.php?id=<?= $_GET['id'] ?>">Quay lại</a>
                            </li>
                            <li>
                                <a href="#">Đăng xuất</a>
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
                    <li class="list-group-item"><a href="chitietbaitap.php?id_bai_tap=<?php echo $_GET['id_bai_tap']?><?php echo "&id=".$_GET['id'] ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>Chi tiết bài tập</a></li>
                    <li class="list-group-item"><a class="active" href=""><i class="fa fa-list"></i>Lưu trữ</a></li>

                    <?php
                    if($auth['loai_tai_khoan'] == "AD" or $auth['loai_tai_khoan'] == "HV") 
                    {
                        echo '<li class="list-group-item"><a href="upload.php?id_bai_tap='.$_GET['id_bai_tap'].'&id='.$_GET['id'].'"><i class="fa fa-upload" aria-hidden="true"></i>Upload</a></li>
                        ';
                    }
                    ?>
                        

						
						
							</ul>
				</div>
			</div>
		
		</div>
	
	
	
	

            </div>
            
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
            <div class="content">
                <h2>LƯU TRỮ</h2>
             
            </div>
            <br>
            
           
            <div class="table-responsive">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Tài khoản</th>
                             <th>Họ và tên</th>
                           <th>Email</th>
                           <th>Ngày nộp</th>
                           <th>File</th>
                           
                          

                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    include("./../server/admin/select_nop_bai_tap.php");
                   if(mysqli_num_rows($stms) > 0)
               {
                

                 while ($row=mysqli_fetch_array($stms)) {
               
                ?>
                    <td><?php echo $row['ten_dang_nhap'] ?></td>
                    <td><?php echo $row['ho_ten'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['ngay_nop'] ?></td>

                    <td><a href="<?php echo $row['file_nop_bai_tap'] ?>" download>Download</a></td>

                   </tbody>
                   <?php 
                 }
                }
                else
                {
                   
                      echo "<h4>Khong co du lieu</h4>";
                }
                   ?>
               </table>
           </div>
           

            </div>
            
        </div>
        
        
    </div>
    
    
<body>



</body>

</html>