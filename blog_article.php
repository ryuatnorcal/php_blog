<?php
	$username="database";
	$password="sky306";
	$database="mysql_db";
	$server="ryu.keepskatinbro.com";
	$perpage = 1;
	
	// Init DB
	mysql_connect($server, $username, $password) or die("Epic FAIL!");
	mysql_select_db($database);
	
	function createID($page)
	{
		$query = "SELECT posterID";
	}
	
	function select ($page, $perpage) {
	$query = "SELECT id,".
				" title,".
				" article,".
				" posterID,".
				" isMain,".
				" branch,".
				" tag,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog".
		" ORDER BY posterID DESC".	// DESC is order by decreasing, ESC is order by incleasing
		" LIMIT $page, $perpage";
	return mysql_query($query);
}
	
	if (isset($_GET['page']))
	{ 	$page = $_GET['page'];	$counter=+$page; }
	else
	{ 	$page = 0;	$counter=0;	} 
	$page *= $perpage;
	$result = select($page, $perpage);
	
	while($row = mysql_fetch_assoc($result))
	{
		echo "<h3>".$row['title']." ".$row['postDate']."</h3><br />".
			 "<p>".$row['article'] ."</p><br />".
			 "<br />".
			 "<div class='fblike'><div id='fb-root'></div><script src='http://connect.facebook.net/en_US/all.js#appId=229398887075637&amp;xfbml=1'></script><fb:like href='http://ryu.keepskatinbro.com/blog.php/blog.php?id=comment&amp;comID=".$row['posterID']."' send='false' width='450' show_faces='false' font='arial'></fb:like><br />".
			 //##############################################
			 "<a id=\"comment_link\" href='./blog.php?id=comment&comID=".$row['posterID']."&page=".$counter."'>".
			 "COMMENT(".commentCounter($row['posterID']).")</a>";
			 
			 print " BLOG ID :" .$row['posterID']." TAG : ".$row['tag']."</div>";
	}
	mysql_close();
	if(isset($_REQUEST['comID']))
	{
		$blogID = $_REQUEST['comID'];
		echo "<br />";
		include('./blog_comment.php');
	}
?>	
	<br />
	<br />
<?php
	if($counter==0){
	?>
		<a href="blog.php?page=<?php print $counter+1;  ?>"> Next >> </a>
<?php
	}
	else{
	?>
 		<a href="blog.php?page=<?php print $counter-1; ?>"> << Previous </a>
 		<a href="blog.php"> Home </a>
 		<a href="blog.php?page=<?php print $counter+1; ?>"> Next >> </a>
<?php
	}
	?>
 	<br />	
<?php
	function commentCounter($idNum)
	{
		$count=0;
		mysql_select_db($database);
		$result = select_comment($idNum);
		while($row = mysql_fetch_assoc($result))
		{
			$count++;
		}
		mysql_close();
		return $count;
	}
 	function select_comment($id) 
 	{
		$query2 = "SELECT id,".
				" userName,".
				" comments,".
				" blogID".
				" posterID,".
				" isMain,".
				" branch,".
				" tag,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog_comment".
		" WHERE blogID ='".$id."'".
		" ORDER BY postDate DESC";	// DESC is order by decreasing, ESC is order by incleasing
		
		return mysql_query($query2);
	}
?>
