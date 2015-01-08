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
$idRepost=$_POST['blogID'];
$tag=$_POST['tag'];
// Init DB
$con=mysql_connect($hostName, $username, $password) 
	or die("Epic FAIL!");
mysql_select_db($database,$con);

	if(isset($_GET['status']))
	{	
		postEditied($titleRepost,$articleRepost,$idRepost,$tag);	
		print "<h3>BLOG EDIT SUCCESS</h3>".
			  "<p>your editing was success!! <br />".
			  "Subject : ".$titleRepost."<br />".
			  "Contents : <br />".$articleRepost;
	}
	if(!isset($_POST['editID']))
	{	
		if(!isset($_GET['status']))
		{	chooseBlog($_GET['pages'], $perpage);	}
	}
	else
	{	editForm($_POST['editID']);	}
	
	mysql_close($con);
	
	function postEditied($title,$article,$blogID,$tag)
	{
		$article = str_replace("\n", "<br />",$article);
		$article = str_replace("\t", "<br />",$article);
		mysql_query("UPDATE rksb_weblog SET title='$title',article='$article',tag='$tag' WHERE posterID='$blogID'"); 
	}
	function chooseBlog($page, $perpage)
	{
		echo "<h3>CHOOSE BLOG ARTICLE</h3><br />".
		     "<form name='input' action='masterContents.php?id=edit&type=blog' method='post'>".
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
		echo "</table><input type='submit' value='Edit!' /></form>";
		if($counter==0){
			echo "<a href='masterContents.php?id=edit&type=blog&pages=". ($counter+1) ."' > Next >> </a>";
		}
		else{
			echo " <a href='masterContents.php?id=edit&type=blog&pages=". ($counter-1) ."' > << Previous </a>".
 				 "<a href='masterContents.php?id=edit&type=blog'> Home </a>".
 				 "<a href='masterContents.php?id=edit&type=blog&pages=". ($counter+1) ."'> Next >> </a>";
		}
	}
	
	function editForm($posterID)
	{
		$result=selectArticle($posterID);
		while($row = mysql_fetch_assoc($result))
		{
			echo  "<h3>WEB BLOG EDITING SECTION</h3>".
				  "<form name='editBlog' method='post' action='masterContents.php?type=blog&id=edit&status=edited' >".
    	    	  "Subject : <input name='subject' value='".$row['title']."' /><br />".
		       	  "Contents :<br />".
  		       	  "<textarea name='contents' rows='10' cols='50'>".$row['article']."</textarea>".
  				  "<br />".
  				  "Blog ID : <input name='blogID' value='".$posterID."' /><br />".
  				  "Tag : <input name='tag' type='text' value=".$row['tag']."/><br />".
  		 		  "<button class='textArea' type='submit'>Post</button>".
  		 		  "<button type='reset'>Reset</button>".
  				  "</form>";
		}
	}
	
	function selectArticle($posterID)
	{
		$query = "SELECT id,".
				" title,".
				" article,".
				" posterID,".
				" isMain,".
				" branch,".
				" tag,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog".
		" WHERE posterID='$posterID'".
		" ORDER BY posterID DESC";	// DESC is order by decreasing, ESC is order by incleasing
		return mysql_query($query);
	}
	
	function  selectArticleByNonID($page, $perpage)
	{
		$query = "SELECT id,".
				" title,".
				" article,".
				" posterID,".
				" isMain,".
				" branch,".
				" tag,".
				" DATE_FORMAT(postDate, '%r %d-%m-%Y') as postDate".
		" FROM rksb_weblog".
		" ORDER BY posterID DESC".
		" LIMIT $page, $perpage";
		// DESC is order by decreasing, ESC is order by incleasing
		return mysql_query($query);
	}

 
?>
