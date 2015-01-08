<?php
	$id=$_GET['type'];
	$address='masterContents.php?type='.$id.'&id=';
	$address2='masterContents.php?type='.$id.'&option=';
	if($id=='blog')
	{
			print "<h4>BLOG MENU</h4>".
				  "<ul><li><a href=".$address."post >Post New Article</a></li>".
				  "<li><a href=".$address."edit >Edit Article</a></li>".
				  "<li><a href=".$address."delete >Delete Article</a></li>".
				  "<li><a href=".$address."deleteCom >Delete Comment</a></li>";
 	}
 	if($id=='skate')
 	{
 		print "<h4>SKATE MENU</h4>".
 			  "<p>There is no contents exist so far <br />".
 			  "Probably, this section is still on the way to create.</p>";
 			  
 	}
 	if($id=='video')
 	{
 		print "<h4>VIDEO MENU</h4>".
 			  "<p>There is no contents exist so far <br />".
 			  "Probably, this section is still on the way to create.</p>";
 	}
 	if($id=='photo')
 	{
 		print "<h4>PHOTO MENU</h4>".
 			  "<p>There is no contents exist so far <br />".
 			  "Probably, this section is still on the way to create.</p>";
 	}
 	if($id=='programming')
 	{
 		print "<h4>PROGRAMMING MENU</h4>".
 			  "<p>There is no contents exist so far <br />".
 			  "Probably, this section is still on the way to create.</p>";
 	}
 	if($id=='thanks')
 	{
 		print "<h4>SPECIAL THANKS MENU</h4>".
 			  "<p>There is no contents exist so far <br />".
 			  "Probably, this section is still on the way to create.</p>";
 	}
	if($id=='table')
	{
		print "<h4>SQL TABLE OPTION </h4>".
			  "<p>You can edit SQL table here.".
			  "User following opption to edit your SQL table.</p>".
			  "<ul>".
			  "<li><a href=".$address."createDB >ADD Feld</a></li>".
			  "<li><a href=".$address."deleteDB >Delete Feld</a></li>".
			  "<li><a href=".$address."editDB >Edit Data Type</a></li>".
			  "</ul>";
    }
?>
