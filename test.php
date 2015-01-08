<?php
	$username="database";
	$password="sky306";
	$database="mysql_db";
	$server="ryu.keepskatinbro.com";
	$perpage = 1;
	$blogID=1306705369;
	// Init DB
	mysql_connect($server, $username, $password) or die("Epic FAIL!");
	mysql_select_db($database);
	
	function select_comment($id) {
	$query2 = "SELECT id,".
				" userName,".
				" comments,".
				" blogID".
				" posterID,".
				" isMain,".
				" branch,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog_comment";
		//" WHERE blogID ='".$id."'".
		//" ORDER BY postDate DESC";	// DESC is order by decreasing, ESC is order by incleasing
		
	return mysql_query($query2);
	}
	print "in a if <br />";	
	$result = select_comment($blogID);
	while($row = mysql_fetch_assoc($result))
	{
		echo "user name : ".$row['userName']."<br />".
		     "comment : <br />".
			 "<p>".$row['comments'] ."</p><br />".
			 " ".$row['postDate']."</h4><br />".
			 "<br />".
			 " BLOG ID :" .$row['posterID'];
	}	
	print "end<br />";
	mysql_close();
?>
