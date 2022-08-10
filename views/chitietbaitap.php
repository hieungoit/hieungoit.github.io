<?php
session_start();
        if(isset($_SESSION['ten_dang_nhap']))
{
    include('./../config.php');

    include("./../server/admin/select_dang_nhap.php");

 
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
<?php
if(isset($_POST['comment']) and isset($_POST['action'])){
   if($_POST['action'] == "insert")
   {
    include("./../server/insert_comment.php");
    unset($_POST);
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
    
    <div class="container-fluid full">
        
        
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
           
	
		<div class="row">
			<div class="col-md-12">
				<div class="sidebar sidebar-fixed" >
					<ul class="list-group">
                    <li class="list-group-item"><a class="active" href=""><i class="fa fa-info-circle" aria-hidden="true"></i>Chi tiết bài tập</a></li>
                    <?php 
                 if($auth['loai_tai_khoan'] == "GV" or $auth['loai_tai_khoan'] == "AD"){
                    echo ' <li class="list-group-item"><a href="luutru.php?id_bai_tap='.$_GET['id_bai_tap'].'&id='.$_GET['id'].'"><i class="fa fa-list"></i>Lưu trữ</a></li>';
                 }
                ?>
                        
                        <?php 
                 if($auth['loai_tai_khoan'] == "HV" or $auth['loai_tai_khoan'] == "AD"){
                    echo '  <li class="list-group-item"><a href="upload.php?id_bai_tap='.$_GET['id_bai_tap'].'&id='.$_GET['id'].'"><i class="fa fa-upload" aria-hidden="true"></i>Upload</a></li>

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
                <h2>Chi tiết bài tập</h2>
             
            </div>
            <br>
            
           
            <div class="chat">
                    <?php  include("./../server/admin/select_chi_tiet_thong_bao.php"); ?>
                    <?php
                    while ($row=mysqli_fetch_array($stms)) {
                        ?>
                    
                    <div class="tieude" >
                    <h3><?=$row['ten_bai_tap']?></h3>
                    <h5><?=$row['mo_ta']?></h5>
                    
                </div>

                    <?php


                    }

                    ?>
                    <div class="box-chat">
                      
                        <?php
                         $id_bai_tap = $_GET['id_bai_tap'];
                         $sql = "SELECT * FROM `comment` WHERE `id_bai_tap`=$id_bai_tap";
                       
               
                         $stms = mysqli_query($conn,$sql);
                         if(mysqli_num_rows($stms)==0)
                         {
                           echo "<h4>Khong co du lieu</h4>";
                         };
                        while ($row = mysqli_fetch_array($stms)) {

                        ?>
                            <div class="container box-mess">
                               <div class="newbox">
                               <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" alt="Avatar">
                                <div class="info">
                                <span class="name"><?php echo $row['ten_dang_nhap'] ?></span>
                                <span class="content1"><?php echo $row['comment'] ?></span>
                                </div>

                              
                               </div>
                                <?php 
                    if($auth['loai_tai_khoan'] == "GV" or $auth['loai_tai_khoan'] == "AD"){
                        echo ' <div onclick = "deletecm('.$row['id_comment'].')" class ="trash1" ><i  class="fa fa-trash"></i></div>';
                    }
                    ?>
                            </div>
                           

                    <?php


                        }
                    

                    ?>

                    </div>
                    <div class="chat-message clearfix">
                       <form action="" method="POST" >
                       <input type="hidden" name="action" value="insert">
                           <input type="hidden" name ="id_bai_tap" value="<?php echo $_GET['id_bai_tap']; ?>">
                       <textarea name="comment" id="message-to-send" placeholder="Nhập bình luận...." rows="3"></textarea>


<button type="submit" class="btn btn-primary">Send</button>
                       </form>

                    </div>
                </div>
           

            </div>
            
        </div>
        
        
    </div>
    
    
<body>



</body>
<script src="./../main.js"></script>

</html>