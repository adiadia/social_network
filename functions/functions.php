<?php


$con=mysqli_connect("localhost","adityaaditya","Aditya","aditya_media");


 // function for getting Topics

    function getTopics(){
    	global $con;
    	$get_topic="select * from topics";
    	$run_topics=mysqli_query($con,$get_topic);
        while ($row=mysqli_fetch_array($run_topics)) {
        	$topic_id=$row['topic_id'];
        	$topic_title=$row['topic_name'];
        	echo "<option value='$topic_id'>$topic_title</option>";
        }

        }

    // function for inserting posts
        function insertPost()
        {
        	if(isset($_POST['sub'])){
        		global $con;
        		global $user_id;
        		$title=addslashes($_POST['title']);
        		$content=addslashes($_POST['content']);
        		$topic=addslashes($_POST['topic']);


        		if($content=='' || $title=='' ){
        			echo "<h2>Plaese enter title and  description </h2>";
        			exit();
        		}
        		else{
        			$insert="insert into posts (user_id,topic_id,post_title,post_content,post_date) values ('$user_id','$topic','$title','$content',NOW())";
        			$run=mysqli_query($con,$insert);

        			if($run){
        				echo "<h3>Posted to timeline, Looks great!</h3>";
        				$update="update users set posts= 'yes' where user_id='$user_id' ";
        				$run_update=mysqli_query($con,$update);
        			}

        			}
        		}
        	    
        }

     //function for displaying posts
    function get_posts(){
    	global $con;
    	$per_page=5;
    	if(isset($_GET['page'])){
    		$page=$_GET['page'];
    	}
    	else{
    		$page=1;
            }
          $start_from=($page-1)* $per_page;
          $get_posts="select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
          $run_posts=mysqli_query($con,$get_posts);
          while($row_posts=mysqli_fetch_array($run_posts))
          {
            $post_id=$row_posts['post_id'];
            $user_id=$row_posts['user_id'];
            $post_title=$row_posts['post_title'];
            $content=substr($row_posts['post_content'],0,150);
            $post_date=$row_posts['post_date'];

            //getting the user who has posted the thread

            $user="select * from users where user_id='$user_id' AND posts='yes'";
            $run_user=mysqli_query($con,$user);
            $row_user=mysqli_fetch_array($run_user);
            $user_name=$row_user['user_name'];
            $user_image=$row_user['user_image'];

            //Now dislaying all at once

            echo "<div id='posts'>
           <p><img src='images/$user_image'width='50' height='50' style='border-radius:5px;'>

           <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;font-size:20px;'><strong>$user_name</strong></a>($post_date)
           </p>
           <h3>$post_title</h3>      
           <p>$content</p>
           <a href='single.php?post_id=$post_id' style='float:right;'><button>See Replies or Reply to This </button></a>
           </div><br/> ";

          }
          include("./functions/pagination.php");
    } 
        

  function single_post(){

    if(isset($_GET['post_id'])){
      global $con;
      $get_id=$_GET['post_id'];
      $get_posts="select * from posts where post_id='$get_id'";
      $run_posts=mysqli_query($con,$get_posts);
      $row_posts=mysqli_fetch_array($run_posts);

        $post_id=$row_posts['post_id'];
        $user_id=$row_posts['user_id'];
        $post_title=$row_posts['post_title'];
        $content=$row_posts['post_content'];
        $post_date=$row_posts['post_date'];


        // getting the user who has posted the thread

        $user ="select * from users where user_id='$user_id' AND posts='yes'";
        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['user_name'];
        $user_image=$row_user['user_image'];

        // getting the user session
        $user_com=$_SESSION['user_email'];
        $get_com="select * from users where user_email='$user_com'";
        $run_com=mysqli_query($con,$get_com);
        $row_com=mysqli_fetch_array($run_com);
        $user_com_id=$row_com['user_id'];
        $user_com_name=$row_com['user_name'];

        //now displaying all at once

        echo "<div id='posts'>
        <p><img src='images/$user_image'width='50' height='50' style='border-radius:5px;'>

           <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;font-size:20px;'><strong>$user_name</strong></a>($post_date)
           </p>
           <h3>$post_title</h3>
        <p>$content</p>
        </div>";

        include("functions/comments.php");

        echo "<form action='' method='post' id='reply'>
        <textarea cols='50' rows='5' name='comment' placeholder='Write your reply'></textarea><br/>
        <input type='submit' name='reply' value='Reply to This'/>
        </form>";
   
   if(isset($_POST['reply'])){

      $comment=$_POST['comment'];
      $insert="insert into comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";
      $run=mysqli_query($con,$insert);
      echo "<h2>Your Reply was added! </h2>";  


   } 

    }


  }	

function members()
{
	global $con;

	//select all members;
	$user="select * from users";
	$run_user=mysqli_query($con,$user);
	while($row_user=mysqli_fetch_array($run_user)){

		$user_id =$row_user['user_id'];
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];

	echo "<span><a href='user_profile.php?u_id=$user_id'><img src='images/$user_image' width='50' height='50' title='$user_name' style='float:left; margin:2px;'/></a>
	</span>

	";
	}

} 

// function for displaying user posts

 function user_posts(){
 	global $con;
 	if(isset($_GET['u_id'])){
     $u_id=$_GET['u_id'];}
     $get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC";
     $run_posts=mysqli_query($con,$get_posts);
     while($row_posts=mysqli_fetch_array($run_posts)){

     	$post_id=$row_posts['post_id'];
     	$user_id=$row_posts['user_id'];
     	$post_title=$row_posts['post_title'];
     	$content=$row_posts['post_content'];
     	$post_date=$row_posts['post_date'];

     	// getting the user who has posted the thread
     	$user="select * from users where user_id='$user_id' AND posts='yes' ";
     	$run_user=mysqli_query($con,$user);
     	$row_user=mysqli_fetch_array($run_user);
     	$user_name=$row_user['user_name'];
     	$user_image=$row_user['user_image'];

     	//Now displaying all at once
     	echo "<div id='posts'>
     	<p><img src='images/$user_image'width='50' height='50' style='border-radius:5px;'>

           <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;font-size:20px;'><strong>$user_name</strong></a>($post_date)</p>
     	<h3>$post_title</h3>
     	<p>$content</p>
     	<a href='single.php?post_id=$post_id' style='float:right;'><button>View</button></a>
     	<a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button></a>
     	<a href='functions/delete_posts.php?post_id=$post_id' style='float:right;'><button>Delete</button></a>
     	</div><br/>";
     	
     	include("delete_posts.php");

     }
 }


// function displaying posts by category

 function show_topics(){
  global $con;
  if(isset($_GET['topic'])){

   $id=$_GET['topic'];  }
   $get_posts="select * from posts where topic_id='$id' ";
   $run_posts=mysqli_query($con,$get_posts);
     while($row_posts=mysqli_fetch_array($run_posts)){

     	$post_id=$row_posts['post_id'];
     	$user_id=$row_posts['user_id'];
     	$post_title=$row_posts['post_title'];
     	$content=$row_posts['post_content'];
     	$post_date=$row_posts['post_date'];

     	// getting the user who has posted the thread
     	$user="select * from users where user_id='$user_id' AND posts='yes' ";
     	$run_user=mysqli_query($con,$user);
     	$row_user=mysqli_fetch_array($run_user);
     	$user_name=$row_user['user_name'];
     	$user_image=$row_user['user_image'];

     	//Now displaying all at once
     	echo "<div id='posts'>
     	<p><img src='images/$user_image'width='50' height='50' style='border-radius:5px;'>

           <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;font-size:20px;'><strong>$user_name</strong></a>($post_date)</p>
     	<h3>$post_title</h3>
     	<p>$content</p>
     	<a href='single.php?post_id=$post_id' style='float:right;'><button>View</button></a>
     	<a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button></a>
     	<a href='functions/delete_posts.php?post_id=$post_id' style='float:right;'><button>Delete</button></a>
     	</div><br/>";
     	
     	include("delete_posts.php");
}

 }


// function for displaying search results

 function results(){
  global $con;
  if(isset($_GET['search'])){

   $id=$_GET['user_query'];  }
   $get_posts="select * from posts where post_title like '%$id%' OR post_content like '%$id%' ";
   $run_posts=mysqli_query($con,$get_posts);
     while($row_posts=mysqli_fetch_array($run_posts)){

     	$post_id=$row_posts['post_id'];
     	$user_id=$row_posts['user_id'];
     	$post_title=$row_posts['post_title'];
     	$content=$row_posts['post_content'];
     	$post_date=$row_posts['post_date'];

     	// getting the user who has posted the thread
     	$user="select * from users where user_id='$user_id' AND posts='yes' ";
     	$run_user=mysqli_query($con,$user);
     	$row_user=mysqli_fetch_array($run_user);
     	$user_name=$row_user['user_name'];
     	$user_image=$row_user['user_image'];

     	//Now displaying all at once
     	echo "<div id='posts'>
     	<p><img src='images/$user_image'width='50' height='50' style='border-radius:5px;'>

           <a href='user_profile.php?u_id=$user_id' style='text-decoration: none;font-size:20px;'><strong>$user_name</strong></a>($post_date)</p>
     	<h3>$post_title</h3>
     	<p>$content</p>
     	<a href='single.php?post_id=$post_id' style='float:right;'><button>View</button></a>
     	<a href='edit_post.php?post_id=$post_id' style='float:right;'><button>Edit</button></a>
     	<a href='functions/delete_posts.php?post_id=$post_id' style='float:right;'><button>Delete</button></a>
     	</div><br/>";
     	
     	include("delete_posts.php");
}

 }


 ?>
