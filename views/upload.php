<?php
session_start();
        if(isset($_SESSION['ten_dang_nhap']))
{
    include('./../config.php');

    include("./../server/admin/select_dang_nhap.php");

    if($auth['loai_tai_khoan'] == "AD" or $auth['loai_tai_khoan'] == "HV")
    {
        if($auth['loai_tai_khoan']=="HV")
        {
            $id = $_GET['id'];
            include("auth.php");
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
    <?php
    if(isset($_SESSION['ten_dang_nhap']) and isset($_POST['id_bai_tap']) )
    {
   
            include './../server/insert_nop_bai_tap.php';
            if($result == 1)
        {
          
            echo "<div class ='thanhcong'>Thêm mới dữ liệu thành công</div>";
            echo '<script type="text/JavaScript">  
            setTimeout(function(){ $(".thanhcong").toggle() }, 2000);
         </script>';
        }
        else
        {
            
            echo "<div class ='thatbai'>Thêm không thành công</div>";
            echo '<script type="text/JavaScript">  
            setTimeout(function(){ $(".thatbai").toggle() }, 2000);
         </script>';
        }
    
        
    
     
    }
    ?>
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
                    <li class="list-group-item"><a href="chitietbaitap.php?id_bai_tap=<?php echo $_GET['id_bai_tap']?><?php echo "&id=".$_GET['id'] ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>Chi tiết bài tập</a></li>
                    <?php
                    if($auth['loai_tai_khoan'] == "AD" or $auth['loai_tai_khoan'] == "GV") 
                    {
                        echo '<li class="list-group-item"><a class="" href="luutru.php?id_bai_tap='.$_GET['id_bai_tap'].'&id='.$_GET['id'].'"><i class="fa fa-check"></i>Lưu trữ</a></li>
                        ';
                    }
                    ?>
                        <li class="list-group-item"><a class="active" href="pos"><i class="fa fa-upload" aria-hidden="true"></i>Upload</a></li>

						
						
							</ul>
				</div>
			</div>
		
		</div>
	
	
	
	

            </div>
            
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
            <div class="content">
                <h2>Upload</h2>
                <?php

               include('./../server/admin/select_status_baitap.php');
               $count = mysqli_num_rows($stms);
                  if($count > 0)
                  {
                      
                  }
              else
              {
                echo '<div style="background: #bf5c6b;
                display: flex;
                min-width: 200px;" class="status">
                <span style="margin: auto;">Đã hết hạn nộp</span>
            </div>';
              }
                        
                ?>
                
                   
            </div>
            <br>
            
           
           <div class="upload">
           <form action="" method="post" enctype="multipart/form-data">

           <?php

          $id_bai_tap = $_GET['id_bai_tap'];
          $ten_dang_nhap = $_SESSION['ten_dang_nhap'];

          $sql1 = "SELECT * FROM `nop_bai_tap` WHERE `id_bai_tap`= $id_bai_tap and `ten_dang_nhap` = '$ten_dang_nhap'  ";

          $stms1 = mysqli_query($conn,$sql1);
          if(mysqli_num_rows($stms1)>0)
          {
            echo '<div style="background: #5cbf5f;
            display: flex;
            min-width: 200px;
            height:50px" class="status">
            <span style="margin: auto;">Đã nộp bài</span>
        </div>';
          }
          else
          {
            echo '<div style="background: #bf5c6b;
            display: flex;
            min-width: 200px;
            height:50px" class="status">
            <span style="margin: auto;">Chưa nộp bài</span>
        </div>';
          }
		  ?>
  				
           
           <h3 style="text-align: center; color:rebeccapurple">UPLOAD FILE</h3>

                        <textarea id="content" name="content" class="form-control" placeholder="Mô tả"></textarea>
                        <input type="hidden" id="assign" name="ten_dang_nhap" value="<?= $_SESSION['ten_dang_nhap'] ?>"></input>
                        <input type="hidden" id="group" name="id_bai_tap" value="<?= $_GET['id_bai_tap'] ?>"></input>
                    
                   

                   


               <div class="mb-3">
              <div class="input-group">
                <input type="file" id="fileUpload" class="form-control" name="file_nop_bai_tap" required>
              </div>
            </div>
            <?php 
  if($count > 0)
  {
    echo '<input type="submit" class="form-control">';

  }
  else
  {
    echo '<input type="submit" class="form-control" alt="Đã hết hạn" disabled >';

  }
  ?>
</form>  
           </div>
           

            </div>
            
        </div>
        
        
    </div>
    
    
<body>



</body>

</html>