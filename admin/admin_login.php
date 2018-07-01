<?php
session_start();
include("../includes/connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

<style>
body{
	padding: 0px;
	margin: 0px;
	background-color: pink;

}
td,table{
	padding: 10px;
}
</style>

</head>
<body>

<form action="admin_login.php" method="post">
 <table align="center" bgcolor="skyblue" width="500">
 	<tr align="center">
 		<td colspan="3">
 			<h2>Admin Login Here</h2>
 		</td>
 	</tr>
 	<tr>
 		<td align="right"><strong>Admin Email: </strong></td>
 		<td><input type="email" name="email" placeholder="Enter email"></td>

 	</tr>
 	<tr>
 		<td align="right"><strong>Admin Password: </strong></td>
 		<td><input type="password" name="pass" placeholder="Enter Password">
 		</td>
 	</tr>
 	<tr align="center">
 		<td colspan="3"><input type="submit" name="admin_login" value="Admin_login"/></td>
 		
 	</tr>
 	
 </table>	
</form>
<?php
  if(isset($_POST['admin_login'])){
	  $email=mysqli_real_escape_string($con,$_POST['email']);
	  $pass=mysqli_real_escape_string($con,$_POST['pass']);
	  $get_admin="select * from admin where admin_email='$email' AND admin_pass='$pass'";
	  $run_admin=mysqli_query($con,$get_admin);
	  $check_admin=mysqli_num_rows($run_admin);
	  if($check_admin==0)
	  {
	  	echo "<script>alert('Email or password is not correct, plz try again')</script>";
	  }
	  else{
	  	$_SESSION['admin_email']=$email;
	  	echo "<script>window.open('index.php?welcome=Welcome $email','_self')</script>";
	  }

  }
?>
</body>
</html>