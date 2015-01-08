<?php
	$blogID=$_GET['comID'];
	// Init DB
	$username="tester_sql";
	$password="ghasjkp";
	$database="tester";
	$perpage = 3;
	$hostName="ryu.keepskatinbro.com";
	$isMain=1;
	$branch=0;
	$subject=$_GET['subject'];	// POST is only 8M capacity 
	$article=$_GET['contents']; // GET is not limited
	// Init DB
	$con=mysql_connect($hostName, $username, $password) 
	or die("Epic FAIL!");
	mysql_select_db($database);
	
	function select_comments($id) {
	$query2 = "SELECT id,".
				" userName,".
				" comments,".
				" blogID".
				" posterID,".
				" isMain,".
				" branch,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog_comment".
		" WHERE blogID ='".$id."'".
		" ORDER BY postDate DESC";	// DESC is order by decreasing, ESC is order by incleasing
		
	return mysql_query($query2);
	}
	$result = select_comments($blogID);
	print "<div class='blog'>".
		  "<div class='comment'>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<B>user name : ".$row['userName']."</B><BR />".
		     "comment : <br />".
			 "<p>".$row['comments'] ."</p>".
			 " ".$row['postDate']." ".$row['branch']."</h4><br />".
			 "<br />";
	}
	print "</div>";
	mysql_close();
	$action = "blog_comment_post.php?comID=".$blogID;
	echo "<form method='post' action='".$action."'>".
    	 "User Name : <input name='userName' type='text' /><br />".
		 "Email Address : <input name='Email' type='text' /><br />".
		 "<input type='checkbox' name='subscribe' value='subscribe' /> Would you like to receve email when someone leave the comment ?<br />".
		 "Coemments :<br />".
  		 "<textarea name='comments' rows='5' cols='50'></textarea>".
  		 "<br />".
  		 "<button class='textArea' type='submit'>Post</button>".
  		 "<button type='reset'>Reset</button>".
  		 "</form></div>";
 ?>
