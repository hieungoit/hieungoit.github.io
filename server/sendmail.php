<?php


	require_once('../config.php');

	$ten_dang_nhap = $_POST['ten_dang_nhap'];



	
	$sql = "SELECT * FROM `dang_nhap` WHERE `ten_dang_nhap`='$ten_dang_nhap'";
     $stms = mysqli_query($conn,$sql);
     $count = mysqli_num_rows($stms);
            if ($count > 0) {
                $email = mysqli_fetch_array($stms);

                $mat_khau_moi = rand();
                $sql = "UPDATE `dang_nhap` SET `mat_khau`='$mat_khau_moi' WHERE `ten_dang_nhap`='$ten_dang_nhap'";
                $stms = mysqli_query($conn,$sql);
                if($stms)
                {
                    require 'phpmailer.php';
                    $mail = new PHPMailer();
                    
                    $mail->IsSMTP();
                           
                    $mail->Host = 'smtp.gmail.com';		
                    $mail->Port = 587;							
                    $mail->SMTPAuth = true;						
                    $mail->Username = 'diachiemailcuaban';	//taikhoanemail
                    $mail->Password = 'matkhaucuaban';	//pass				
                    $mail->SMTPSecure = 'tls';						
                    $mail->From = "diachiemailcuaban";//taikhoan				
                    $mail->FromName = "tenemailcuaban";//tennguoidung
                        $mail->AddAddress("'".$email['email']."'", "'".$email['ho_ten']."'");	
                   
                   
                    $mail->WordWrap = 50;							
                    $mail->IsHTML(true);										
                    $mail->Subject = "Khôi phục mật khẩu";				
                    $mail->Body = '<span>Thông tin mật khẩu</span>: '.$mat_khau_moi;
                    $mail->CharSet = 'UTF-8';
                    if(!$mail->send()) 
                    {
                        echo "0";
                    } 
                    else 
                    {
                        $result = 1;
                    }
                 }
                 else
                 {
                    $result = 0;
                }
            }
            else {
               $result = 0;
            }


?>