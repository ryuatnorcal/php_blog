<?php
$username="database";
$password="sky306";
$database="mysql_db";
$hostName="ryu.keepskatinbro.com";
$isMain=1;
$branch=0;
$subject;	// POST is only 8M capacity 
$article; // GET is not limited
$perpage=6;
$titleRepost=$_POST['subject'];
$articleRepost=$_POST['contents'];
$idRepost=$_POST['editID'];
// Init DB
$con=mysql_connect($hostName, $username, $password) 
	or die("Epic FAIL!");
mysql_select_db($database,$con);
	if(!isset($_GET['choose']))
	{	chooseBlog($_GET['pages'], $perpage);	}

	if(isset($_GET['choose']))
	{	
		postDelete($idRepost); 
		print "<h3>WEBLOG DELETED SUCCESSFULLY </h3>".
			  "<p>your choosen web log was deleted by system </p>";
	}

	mysql_close($con);

function postDelete($blogID)
	{
		mysql_query("DELETE FROM rksb_weblog WHERE posterID='$blogID'"); 
	}

	function chooseBlog($page, $perpage)
	{
		echo "<h3>CHOOSE BLOG ARTICLE</h3><br />".
		     "<form name='input' action='masterContents.php?id=delete&type=blog&choose=1' method='post'>".
		     "<table class='edit'><tr><td>ch</td><td>Title</td><td>Post ID</td><td>Post Date</td></tr>";
		if (isset($_GET['pages']))
		{ 	$page = $_GET['pages'];	$counter=+$page; }
		else
		{ 	$page = 0;	$counter=0;	} 
		$page *= $perpage;
		$result=selectArticleByNonID($page, $perpage);
		while($row = mysql_fetch_assoc($result))
		{
			echo "<tr>".
					"<td><input type='radio' name='editID' value=".$row['posterID']." /></td>".
					"<td>".$row['title']."</td>".
					"<td>".$row['posterID']."</td>".
					"<td>".$row['postDate']."</td>".
				 "</tr>";
					
		}
		echo "</table><input type='submit' value='Delete it!' /></form>";
		if($counter==0){
			echo "<a href='masterContents.php?id=delete&type=blog&pages=". ($counter+1) ."' > Next >> </a>";
		}
		else{
			echo " <a href='masterContents.php?id=delete&type=blog&pages=". ($counter-1) ."' > << Previous </a>".
 				 "<a href='masterContents.php?id=delete&type=blog'> Home </a>".
 				 "<a href='masterContents.php?id=delete&type=blog&pages=". ($counter+1) ."'> Next >> </a>";
		}
	}
	function  selectArticleByNonID($page, $perpage)
	{
		$query = "SELECT id,".
				" title,".
				" article,".
				" posterID,".
				" isMain,".
				" branch,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog".
		" ORDER BY posterID DESC".
		" LIMIT $page, $perpage";
		// DESC is order by decreasing, ESC is order by incleasing
		return mysql_query($query);
	}
?>
