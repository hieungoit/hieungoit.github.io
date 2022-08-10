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
    include("./../server/check_dang_nhap.php");
    if($result == 1)
    {
      
        header('Location:./../index.php');
        exit();
    }
    else
    {
        
        echo "<div class ='thatbai'>Đăng nhập không thành công</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
    }
}


?>
<body>
<div class="login-page">
  <div class="form">
    
    <form class="login-form" action="" method="POST">
      <input type="text" placeholder="Tên tài khoản" name="ten_dang_nhap" required/>
      <input type="password" placeholder="Mật khẩu" name="mat_khau" required/>
      <button type="submit" class="login-button form-control">Đăng nhập</button>
      <p class="message"><a href="dangky.php">Tạo tài khoản</a></p>
      <p class="message"><a href="khoiphuc.php">Khôi phục tài khoản</a></p>

    </form>
  </div>
</div>
<div class="alert">

</div>
</body>

</html>