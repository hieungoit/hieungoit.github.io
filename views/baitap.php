<?php
session_start();
        if(isset($_SESSION['ten_dang_nhap']))
{
    include('./../config.php');

    include("./../server/admin/select_dang_nhap.php");

    if( $auth['loai_tai_khoan']=="HV")
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

?>

<!DOCTYPE html>
<html>
<head>
    <?php include("bundle_view/head.php"); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>       <link rel="stylesheet" type="text/css" href="./../../style.css">
</head>
<?php 

if(isset($_SESSION['ten_dang_nhap']) and isset($_POST['action']) )
{
  if($_POST['action'] === "insert")
    {
        include './../server/insert_bai_tap.php';
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

 
}
if(isset($_POST['id_bai_tap1']) and $_POST['action']=="update")
{
    include("./../server/update_bai_tap.php");
    if($result == 1)
    {
      
        echo "<div class ='thanhcong'>cập nhật dữ liệu thành công</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thanhcong").toggle() }, 2000);
     </script>';
    }
    else
    {
        
        echo "<div class ='thatbai'>cập nhật không thành công không thành công</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
    }
}

?>
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
                        <li class="list-group-item"><a class="active" href=""><i class="fa fa-book" aria-hidden="true"></i>Bài tập</a></li>

                <?php 
                if($auth['loai_tai_khoan'] == "GV" or $auth['loai_tai_khoan'] == "AD"){
                  echo '<li class="list-group-item"><a href="xacnhan.php?id='.$_GET['id'].' "><i class="fa fa-check" aria-hidden="true"></i>Xác nhận</a></li>
                    <li class="list-group-item"><a href="danhsachthanhvien.php?id='.$_GET['id'].' "><i class="fa fa-list" aria-hidden="true"></i>Danh sách</a></li>';
                   
                      }
                ?>
                    			
							</ul>
				</div>
			</div>
		
		</div>
	
	
	
	

            </div>
            
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
            <div class="content">
                <h2>Bài tập</h2>
                <?php 
                 if($auth['loai_tai_khoan'] == "GV" or $auth['loai_tai_khoan'] == "AD"){
                    echo ' <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Thêm bài tập</button>';
                 }
                ?>
            </div>
            
            <br>
            <br>
           
           <div class="table-responsive">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Tên bài tập</th>
                           <th>mô tả</th>
                           <th>Thời gian bắt đầu</th>
                           <th>Thời gian kết thúc</th>
                           <th>file</th>


      
                    <th>Hành động</th>
                    

                       </tr>
                   </thead>
                    <?php
              

                  ?>

                   <tbody>
                    <?php  include("./../server/admin/select_bai_tap.php");
            
            if(mysqli_num_rows($stms)==0)
            {
              echo "<h4>Khong co du lieu</h4>";
            };
                 while ($row=mysqli_fetch_array($stms)) {
                ?>
                       <tr>
                           <td><?php echo $row['ten_bai_tap'] ?></td>
                           <td><?php echo $row['mo_ta'] ?></td>
                           <td><?php echo  date("d-m-Y H:i:s", strtotime($row['ngay_bat_dau']))  ?></td>

                           <td><?php echo date("d-m-Y H:i:s", strtotime($row['ngay_ket_thuc']))  ?></td>
                           <td style type="file" media="screen">
                             <a href="<?= $row['file_bai_tap'] ?>" download="">download</a>
                           </td>
                           <td>
                            

                        <?php  
                          if($auth['loai_tai_khoan'] == "GV" or $auth['loai_tai_khoan'] == "AD")
                          {   
                              echo '  
                             

                              <a class="btn btn-danger" onclick="deletett('.$row['id_bai_tap'].')" >Xóa</a>
                              <a class="btn btn-success" onclick="editbt('.$row['id_bai_tap'].')" >Sửa</a>


                             ';
                          }
                            ?>
                          <?php 
                             echo '<a href="chitietbaitap.php?id_bai_tap='.$row['id_bai_tap'].'&id='.$_GET['id'].'" class="btn btn-primary">Chi tiết</a>'
                             ?>
                                        </td>
                       </tr>
                       <?php 
 }
               ?>
                   </tbody>
               </table>
           </div>
           

            </div>
            
        </div>
        
        
    </div>
    
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm bài tập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="" method="POST"  enctype="multipart/form-data">
    <div class="modal-body">
                      <input type="hidden" name="action" value="insert">

                <br>
                <input type="text" class="form-control" placeholder="tên bài viết" name="ten_bai_tap">
                
                <br>
                <input type="text" class="form-control" placeholder="thông tin" name="mo_ta">
                
                <br>
                <input type="datetime-local" class="form-control" placeholder="tên bài viết" name="ngay_bat_dau" required>
                
                <br>
                <input type="datetime-local" class="form-control" placeholder="tên bài viết" name="ngay_ket_thuc" required>
                
                <br>
                <input type="file" class="form-control" placeholder="file" name="file_bai_tap" required>
                <br>      
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
    </form>
    </div>
  </div>
</div> 
<div class="modal fade" id="updatebt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm bài tập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="" method="POST"  enctype="multipart/form-data">
    <div class="modal-body">
                      <input type="hidden" name="action" value="update">
                      <input type="hidden" name="id_bai_tap1" >


                <br>
                <input type="text" class="form-control" placeholder="tên bài viết" name="ten_bai_tap1">
                
                <br>
                <input type="text" class="form-control" placeholder="thông tin" name="mo_ta1">
                
                <br>
                <input type="datetime-local" class="form-control" placeholder="tên bài viết" name="ngay_bat_dau1" required>
                
                <br>
                <input type="datetime-local" class="form-control" placeholder="tên bài viết" name="ngay_ket_thuc1" required>
                
                <br>
                <input type="file" class="form-control" placeholder="file" name="file_bai_tap1" >
                <br>      
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
    </form>
    </div>
  </div>
</div> 
<body>



</body>

<script src="./../main.js"></script>

</html>