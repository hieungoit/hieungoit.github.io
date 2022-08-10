
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./../style.css">
    <title>Document</title>
</head>
<?php 
if(isset($_POST['ten_dang_nhap']))
{
    include("./../server/insert_dang_nhap.php");
    if($result == 1)
    {
      echo "<div class ='thanhcong'>Đăng ký  dữ liệu thành công</div>";
      echo '<script type="text/JavaScript">  
      setTimeout(function(){ $(".thanhcong").toggle() }, 2000);
   </script>';
    }
    else
    {
        
        echo "<div class ='thatbai'>Đăng ký không thành công</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
    }
}


?>



<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" action=""  method="POST">

      <input type="text" placeholder="Tên tài khoản" name="ten_dang_nhap" required/>
      <input type="password" placeholder="Mật khẩu" name="mat_khau" required />
      <input type="text" placeholder="Họ và tên" name="ho_ten" required />
      <input type="date" placeholder="Ngày sinh" name="ngay_sinh" required />
      <input type="text" placeholder="Email" name="email"  required/>
      <input type="text" placeholder="SDT" name="so_dien_thoai" required />





      <button type="submit" class="register-button btn btn-success" >Create</button>
      <a type="button" style="    width: 100%;
    height: 50px;" href="dangnhap.php" class="login-button btn btn-primary">return login</a>

      
    </form>
   
  </div>
</div>
</body>

</html>