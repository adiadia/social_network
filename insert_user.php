 
<?php
 session_start();
?>


 <?php

  include("includes/connection.php");
  if(isset($_POST['sign_up'])){
    $name=mysqli_real_escape_string($con,$_POST['u_name']);
    $pass=mysqli_real_escape_string($con,$_POST['u_password']);
    $email=mysqli_real_escape_string($con,$_POST['u_email']);
    $country=mysqli_real_escape_string($con,$_POST['u_country']);
    $gender=mysqli_real_escape_string($con,$_POST['u_gender']);
    $birthday=mysqli_real_escape_string($con,$_POST['u_birthday']);
    $status="unverified";
    $posts="no";
    $ver_code= mt_rand();


    if(strlen($pass)<8){
    	echo "<script> alert('Password should be minimum 8 characters!')</script>";
    	exit();
    }

    $check_email="select * from users where user_email='$email'";
    $run_email =mysqli_query($con,$check_email);
    $check=mysqli_num_rows($run_email);
    if($check==1){
    	echo "<script>alert('email already exist, please try another email')</script>";
    	exit();
    }

    $insert="insert into users (user_name,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_reg_date,user_last_login,status,ver_code,posts) values ('$name','$pass','$email','$country','$gender','$birthday','default.jpg',NOW(),NOW(),'$status','$ver_code','$posts')";

      $query=mysqli_query($con,$insert);

      if($query){
      	echo "<h3 style='width:270px; color:green;'>Hi, $name congratulations registration is almost complete please check your email for final varification.</h3>";
      }
      else{
      	echo "<h3 style='color:red'>Registration failed. Please try again.</h3>";
      }
      $to=$email;
      $subject="Verify your email address";

      $message="
        <html><strong>$name</strong> You have just created an account on www.interviewgovernmentjob.in/social_network.com, <a href='http://www.interviewgovernmentjob.in/social_network/verify.php?code=$ver_code'>Click to Verify Your Email</a><br/>
        <strong>Thank You for creating an account</strong>
        </html>
      ";
      // Always set content-type when sending HTML email.
      $headers="MIME-Version: 1.0". "\r\n";
      $headers .="Content-type:text/html;charset=UTF-8"."\r\n";
      $headers .='From: <adi@interviewgovernmentjob.in>'."\r\n";
      mail($to,$subject,$message,$headers);

  }


 ?>