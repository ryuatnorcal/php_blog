<?php
	$username="database";
	$password="sky306";
	$database="mysql_db";
	$server="ryu.keepskatinbro.com";
	$perpage = 10;
	// Init DB
	mysql_connect($server, $username, $password) or die("Epic FAIL!");
	mysql_select_db($database);
	function select_menu ($page, $perpage) {
	$query = "SELECT id,".
				" title,".
				" posterID,".
				" DATE_FORMAT(postDate, '%m.%d.%Y') as postDate".
		" FROM rksb_weblog".
		" ORDER BY posterID DESC".	// DESC is order by decreasing, ESC is order by incleasing
		" LIMIT $page, $perpage";
	return mysql_query($query);
}
	
	if (isset($_GET['menu']))
	{ 	$page = $_GET['menu'];	$cot=+$page; }
	else
	{ 	$page = 0;	$cot=0;	} 
	$page *= $perpage;
	$result = select_menu($page, $perpage);
	print "<h4>Web Blog Menu</h4>";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<a href='./contents/blog/blog.php?id=comment&comID=".$row['posterID']."&page=".$count."&menu=".$cot."''>".$row['title']." ".$row['postDate']."</a><br />";
		$count++;
	}
	?>
	<br />
<?php
	if($cot==0){
	?>
		<a href="blog.php?menu=<?php print $cot+1;  ?>"> Next >> </a>
<?php
	}
	else{
	?>
 		<a href="blog.php?menu=<?php print $cot-1; ?>"> << Previous </a>
 		<a href="blog.php?menu=<?php print $cot+1; ?>"> Next >> </a>
<?php
	}
	mysql_close();
?>
