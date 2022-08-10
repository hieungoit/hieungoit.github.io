
<?php
session_start();
        if(isset($_SESSION['ten_dang_nhap']))
{
    include('./../config.php');

    include("./../server/admin/select_dang_nhap.php");

    if($auth['loai_tai_khoan'] == "AD")
    {
       
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

if(isset($_POST['ten_dang_nhap']) and $_POST['action']=="insert")
{
    include("./../server/insert_dang_nhap.php");
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
if(isset($_POST['ten_dang_nhap']) and $_POST['action']=="update")
{
    include("./../server/update_dang_nhap.php");
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


<head>
<?php include("bundle_view/head.php"); ?>
</head>


<div class="header">
    <div class="header-admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="navbar">
                        <a class="navbar-brand" href="#">
                            <h4>CLASSROOM</h4>
                        </a>
                        <ul class="nav navbar-nav">

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
                    <div class="sidebar sidebar-fixed">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="./../" class=""><i class="fa fa-list" aria-hidden="true"></i>Danh sách lớp</a>

                            </li>
                            <li class="list-group-item"><a href="" class="active"><i class="fa fa-user" aria-hidden="true"></i>Tài khoản</a>

</li>

                        </ul>
                    </div>
                </div>

            </div>





        </div>

        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
            <div class="content">
                <h2>Danh sách người dùng</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Thêm tài khoản</button>
            </div>
            <br>
           
            <br>
           
           <div class="table-responsive">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Tên tài khoản</th>
                           <th>Mật khẩu</th>
                           <th>Họ và tên</th>
                           <th>Ngày tháng năm sinh</th>
                           <th>Sổ điện thoại</th>
                           <th>Email</th>
                           <th>Loại tài khoản</th>
                           <th>Hành động</th>

                       </tr>
                   </thead>

                   <tbody>
                       <?php
                       include("./../server/admin/selectall_dang_nhap.php");
                   if(mysqli_num_rows($stms) > 0)
               {
                 while ($row=mysqli_fetch_array($stms)) {
               
                ?>
                       <tr>
                           <td><?php echo $row['ten_dang_nhap'] ?></td>
                           <td><?php echo $row['mat_khau'] ?></td>
                           <td><?php echo $row['ho_ten'] ?></td>
                           <td><?php echo date("d-m-Y", strtotime($row['ngay_sinh']))?></td>
                           <td><?php echo $row['so_dien_thoai'] ?></td>
                           <td><?php echo $row['email']?></td>
                           <td><?php echo $row['loai_tai_khoan']?></td>

                           <td>
                           <a onclick="deletetk(<?php echo $row['id_dang_nhap'] ?>)" class="btn btn-danger" >Xóa</a>

                               <a class="btn btn-success" onclick="edittk(<?php echo $row['id_dang_nhap'] ?>)" >Sửa</a>
                           </td>

                       </tr>

                   <?php 
                      }
                    }
                    else{
                       
                          echo "<h4>Khong co du lieu</h4>";
                        
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
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm lớp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="" method="POST"  >
    <div class="modal-body">
    <input type="hidden" value="insert" name="action">
      <input type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" >
                <br>
                <input type="text" class="form-control" placeholder="Mật khẩu" name="mat_khau">
                <br>
                <input type="text" class="form-control" placeholder="Họ tên" name="ho_ten">
                <br>
                <input type="date" class="form-control" placeholder="ngày sinh" name="ngay_sinh">
                <br>
                <input type="text" class="form-control" placeholder="email" name="email">
                <br>
                <input type="number" class="form-control" placeholder="số điện thoại" name="so_dien_thoai">
                <br>
               
               
                   
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>



<div class="modal fade" id="updatetk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm lớp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="" method="POST"  >
    <div class="modal-body">
    <input type="hidden" value="update" name="action">
      <input type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" >
      <input  class="form-control" placeholder="Mật khẩu" name="id_dang_nhap">

                <br>
                <input type="text" class="form-control" placeholder="Mật khẩu" name="mat_khau">
                <br>
                <input type="text" class="form-control" placeholder="Họ tên" name="ho_ten">
                <br>
                <input type="date" class="form-control" placeholder="ngày sinh" name="ngay_sinh">
                <br>
                <input type="text" class="form-control" placeholder="email" name="email">
                <br>
                <input type="number" class="form-control" placeholder="số điện thoại" name="so_dien_thoai">
                <br>
                <!-- <input type="text" class="form-control" placeholder="Loại tài khoản" name="loai_tai_khoan"> -->
                <select class="form-control" name="loai_tai_khoan">
                    <option value="HV" >Học viên</option>
                    <option value="GV">Giảng viên</option>
                    <option value="AD"> Admin</option>
                   
</select>
                <br>
               
                   
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<body>



</body>


<script src="./../main.js"></script>

</html>