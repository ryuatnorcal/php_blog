<?php
	$blogID=$_GET['comID'];
	mysql_select_db($database);
	
	function select_comment($blogID) {
	$query2 = "SELECT id,".
		" posterID,".
		" blogID,".
		" comments,".
		" userName,".
		" isMain,".
		" branch,".
		" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate"
		" FROM rksb_weblog_comment".
		" WHERE blogID='$blogID'".
		" ORDER BY postDate DESC";	// DESC is order by decreasing, ESC is order by incleasing
		
	return mysql_query($query2);
	}
	
	$result = select($blogID);
	while($row = mysql_fetch_assoc($result))
	{
		echo "<center>User Name :".$row['userName']."<br />".
			 "Comment : <br />"
			 "<p>".$row['comments'] ."</p><br />".
			 "Post Date : ". $row['postDate'].
			 "<br />Comment ID : ". $row['posterID'].
			 "<br /></center>";
	}		
?>
