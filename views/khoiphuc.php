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
    include('./../server/sendmail.php');
    if($result == 1)
    {
      
        echo "<div class ='thanhcong'>Khôi phục thành công, vào gmail để xem thông tin</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
    }
    else
    {
        
        echo "<div class ='thatbai'>Tên tài  khoản không đúng</div>";
        echo '<script type="text/JavaScript">  
        setTimeout(function(){ $(".thatbai").toggle() }, 2000);
     </script>';
    }
}


?>
<body>
<div class="login-page">
  <div class="form">
    
    <form class="khoiphuc" action="" method="POST">
      <input type="text" placeholder="Nhập tên đăng nhập" name="ten_dang_nhap" required/>
    
      <button type="submit" class="login-button form-control">Khôi phục</button>

      <p class="message"><a href="dangnhap.php">Quay về đăng nhập</a></p>
    </form>
  </div>
</div>
<div class="alert">

</div>
</body>

</html>