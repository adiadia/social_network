<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");
if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('index.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome User!</title>
	<link rel="stylesheet" type="text/css" href="styles/home_style.css" media="all">
</head>
<body>
  <!-- Container starts -->

    <div class="container">

     	<!--Header Wrapper Starts -->
     	 <div id="head_wrap">
     	 	 <!--Header Starts-->
     	 	   <div id="header">
                 <ul id="menu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="members.php">Members</a></li>
                    <strong>Topics: </strong>
                     <?php
                     $get_topics="select * from topics";
                     $run_topics=mysqli_query($con,$get_topics);
                     while($row=mysqli_fetch_array($run_topics)){

                     	$topic_id=$row['topic_id'];
                     	$topic_title=$row['topic_name'];
                     	echo "<li><a href='topic.php?topic=$topic_id'>$topic_title</a></li>";
                     }

                     ?>
 
                 </ul>    
             <form method="get" action="results.php" id=form1>
             	<input type="text" name="user_query" placeholder="Search a topic">
             	<input type="submit" name="search" value="Search">          	

             </form>


                </div>
             <!-- Header ends here-->
          </div>
        <!-- Header Wrapper ends here-->


       <!-- content area starts -->
        <div class="content">
        	<!-- user timeline starts -->
        	 <div id="user_timeline">
        	 	<div id="user_details">
        	 		<?php
        	 		$user=$_SESSION['user_email'];
        	 		$get_user="select * from users where user_email='$user'";
        	 		$run_user=mysqli_query($con,$get_user);
        	 		$row=mysqli_fetch_array($run_user);
        	 		$user_id=$row['user_id'];
        	 		$user_name=$row['user_name'];
        	 		$user_country=$row['user_country'];
        	 		$user_image=$row['user_image'];
        	 		$register_date=$row['user_reg_date'];
        	 		$last_login=$row['user_last_login'];
        	 		$user_posts="select * from posts where user_id='$user_id'";
        	 		$run_posts=mysqli_query($con,$user_posts);
        	 		$posts=mysqli_num_rows($run_posts);
        	 		//getting the number of unread messages
        	 		$sel_msg="select * from messages where receiver='$user_id' AND status='unread' ORDER by 1 DESC";
        	 		$run_msg=mysqli_query($con,$sel_msg);
        	 		$count_msg=mysqli_num_rows($run_msg);

        	 		echo "
        	 		   <center>
        	 		   <img src='images/$user_image' width='200' height='200'/>
        	 		   </center>
        	 		   <div id='user_mention'>
        	 		   <p><strong>Name:</strong> $user_name</p>
        	 		   <p><strong>Country:</strong> $user_country</p>
        	 		   <p><strong>Last Login:</strong> $last_login</p><p><strong>Member Since:</strong> $register_date</p>
        	 		   <p><a href='my_message.php?inbox&u_id=$user_id'>Messages($count_msg)</a></p>
        	 		   <p><a href='my_posts.php?u_id=$user_id'>My Posts ($posts)</a></p>
        	 		   <p><a href='edit_profile.php?u_id=$user_id'>Edit My Acoount</a></p>
        	 		   <p><a href='logout.php'>Logout</a></p>
        	 		   </div>
        	 		   ";

        	 		?>
        	 		
        	 	</div>
        	 	
        	 </div>
        	 <!-- user timeline ends here -->
           
            <!-- Content timeline starts -->
             <div id="content-timeline">
             	<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f">
             		<h2>What's your question today? let's discuss!</h2>
             		<input type="text" name="title" placeholder="Write a Title......" size="82" required="required"/><br/>
             		<textarea cols="83" rows="4" name="content" placeholder="Write description....">   			
             		</textarea><br>
             		<select name="topic">
             			<option>Select Topic</option>
             			<?php getTopics();?>
             			</select>
             			<input type="submit" name="sub" value="Post to Timeline"/>
                 </form>
                 <?php insertPost(); ?>
                 <h3>Most Recent Discussions!</h3>
                 <?php get_posts();?>

             	
              </div>
        </div>
        <!-- content area ends here -->




    </div>
   <!-- Container ends here -->

</body>
</html>