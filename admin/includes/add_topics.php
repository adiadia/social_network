<center>
	<h2 style="padding: px;">Add New Topic</h2>
	<form action="" method="post" id="f" class="ff">
      <input type="text" name="title"/><br>1	<br>
      <input type="submit" name="insert" value="Add New Topic"/>	
	</form>

</center>
<?php
  if(isset($_POST['insert'])){

    $title=$_POST['title'];
    $insert="insert into topics (topic_name) values ('$title')";
    $result=mysqli_query($con,$insert);
    if($result){
    	echo "<script>alert('Topic has been insert succesfully')</script>";
    	echo "<script>window.open('index.php?add_topics','_self')</script>";
    }

  }
?>