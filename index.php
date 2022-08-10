<?php
session_start();
if (isset($_SESSION['ten_dang_nhap'])) {
  include 'config.php';

  include("server/admin/select_dang_nhap.php");
} else {
  header("Location: views/dangnhap.php");
  exit();
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="./../../style.css">

</head>

<?php

if (isset($_POST['ten_dang_nhap']) and $_POST['action'] == "insert") {
  include("server/insert_lop_hoc.php");
  if ($result == 1) {

    echo "<div class ='thanhcong'>Thêm mới dữ liệu thành công</div>";
    echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thanhcong").toggle() }, 2000);
     </script>';
  } else {

    echo "<div class ='thatbai'>Thêm không thành công</div>";
    echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
  }
}
if (isset($_POST['id_lop_hoc']) and $_POST['action'] == "update") {
  include("server/update_lop_hoc.php");
  if ($result == 1) {

    echo "<div class ='thanhcong'>cập nhật dữ liệu thành công</div>";
    echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thanhcong").toggle() }, 2000);
     </script>';
  } else {

    echo "<div class ='thatbai'>cập nhật không thành công không thành công</div>";
    echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
  }
}


?>












<?php
$ten_dang_nhap = $_SESSION['ten_dang_nhap'];
$sql = "SELECT * FROM `dang_nhap` WHERE `ten_dang_nhap`='$ten_dang_nhap'";
$stms = mysqli_query($conn, $sql);
$name = mysqli_fetch_array($stms);

?>



<div class="header">
  <div class="header-admin">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="navbar">
            <a class="navbar-brand" href="#">
              <h4>CLASSROOM</h4>
            </a>
            <form class="group-search" action="" method="post">
             <input type="text "  name = "search"class="form-control" placeholder="Tìm kiếm lớp học ...">
             <input type="hidden" name="action" value="search"  class="form-control" placeholder="Tìm kiếm lớp học ...">

              <button type="submit" style="width: auto;"  class="form-control">Tìm</button>
             </form>
            <ul class="nav navbar-nav">

              <li>
                <a href="server/dangxuat.php">Đăng xuất</a>
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
              <li class="list-group-item"><a href="/" class="active"><i class="fa fa-list"></i>Danh sách lớp</a>

              </li>
              <?php
              if ($auth['loai_tai_khoan'] == "AD") {
                echo '<li class="list-group-item"><a href="views/quanlytk.php" class=""><i class="fa fa-user"></i>Tài khoản</a>

</li>';
              }

              ?>


            </ul>
          </div>
        </div>

      </div>





    </div>

    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 padding-content">
      <div class="content">
        <h2>Danh sách lớp</h2>
        <?php
        if ($auth['loai_tai_khoan'] == "HV") {
          echo '<button onclick="checkcode()" class="btn btn-primary" >Nhập mã lớp</button>';
        } 
        else {
          echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter">Tạo Lớp</button>';
        }

        ?>


      </div>
      <br>
      <br>

      <div class="row">

        <?php
        
        if(isset($_POST['action']) and $_POST['action'] == 'search')
        {
          if ($auth['loai_tai_khoan'] === "AD") {
            include("server/admin/search_lop_hoc.php");
          } 
          else if( $auth['loai_tai_khoan'] === 'HV') {
            include("server/admin/search_lop_hv.php");
          }
          else{
            include("server/giangvien/search_lop_hoc.php");

          }
        }
        else
        {
          if ($auth['loai_tai_khoan'] === "AD") {

            include("server/admin/select_lop_hoc_all.php");
          } 
          else if($auth['loai_tai_khoan'] === 'HV')
          {
            include("server/admin/select_lop_hoc_hv.php");
          }
          else {

            include("server/giangvien/select_lop_hoc.php");
          }
        }

        if (mysqli_num_rows($stms) > 0) {
          while ($row = mysqli_fetch_array($stms)) {


        ?>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">


              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $row['hinh_anh_dai_dien'] ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['ten_lop_hoc'] ?></h5>

                  <p class="card-text"><?php echo $name['ho_ten'] ?></p>

                  <p class="card-text"><?php echo $row['mon_hoc'] ?></p>

                  <div class="box-btn">
                    <div class="group-btn">
                      <?php
                      if ($auth['loai_tai_khoan'] == "AD" or $auth['loai_tai_khoan'] == "GV") {
                        echo '<a onclick="delete_class(' . $row['id_lop_hoc'] . ')"  class="btn btn-danger">Xóa</a>
                                        <a onclick="edit_class(' . $row['id_lop_hoc'] . ')"  class="btn btn-success">Sửa</a>';
                      }
                      ?>

                      <a onclick="getqr(<?php echo $row['id_lop_hoc'] ?>)" class="btn btn-primary">Tham gia</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

        <?php
          }
        } else {
          echo "Không có lớp";
        }

        ?>
        <input type="hidden" name='idroom'>

      </div>

    </div>

  </div>


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm lớp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" value="insert" name="action">
          <input type="hidden" class="form-control" placeholder="Tên đăng nhập" value="<?php echo $_SESSION['ten_dang_nhap'] ?>" name="ten_dang_nhap">
          <br>
          <input type="text" class="form-control" placeholder="Tên lớp học" name="ten_lop_hoc">
          <br>
          <input type="text" class="form-control" placeholder="Môn học" name="mon_hoc">
          <br>
          <input type="text" class="form-control" placeholder="Tên giáo viên" value="<?php echo $name['ho_ten'] ?>" disabled>
          <br>
          <input type="file" class="form-control" placeholder="Hình ảnh đại diện" name="hinh_anh_dai_dien">
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

<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm lớp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="id_lop_hoc">

          <br>
          <input type="text" class="form-control" placeholder="Tên lớp học" name="ten_lop_hoc_u">
          <br>
          <input type="text" class="form-control" placeholder="Môn học" name="mon_hoc_u">
          <br>
          <input type="text" class="form-control" value="<?php echo $name['ho_ten'] ?>" placeholder="Tên giáo viên" disabled>
          <br>
          <input type="file" class="form-control" placeholder="Hình ảnh đại diện" name="hinh_anh_dai_dien_u">
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


<div class="modal fade" id="join" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mã code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" value="checkma" name="action">
        <br>

        <input type="text" class="form-control" placeholder="Tên lớp học" name="ma_dang_nhap">
        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="checkidclass('<?php echo $_SESSION['ten_dang_nhap'] ?>')" class="btn btn-primary">Submit</button>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="checkcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mã code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" value="checkma" name="action">
        <br>

        <input type="text" class="form-control" placeholder="Tên lớp học" name="ma_dang_nhap1">
        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="checkcodeqr('<?php echo $_SESSION['ten_dang_nhap'] ?>')" class="btn btn-primary">Submit</button>
      </div>

    </div>
  </div>
</div>


<body>



</body>
<script src="main.js"></script>

</html>