<?php

$query="select * from posts";
$result=mysqli_query($con,$query);

//couont the total records
$total_posts=mysqli_num_rows($result);

//using ceil function to divide the total records on per page
$total_pages=ceil($total_posts/$per_page);

 // Going to first page

echo "<center>
  <div id='pagination'><a href='home.php?page=1' style='text-decoration: none;'>First Page</a>  ";
for($i=1; $i<=$total_pages; $i++){
echo " <a href='home.php?page=$i' style='text-decoration: none;'>$i</a> ";
}
// Going to last page
echo "<a href='home.php?page=$total_pages' style='text-decoration: none;'>Last Page</a></center></div>";


?>