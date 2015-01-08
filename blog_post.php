<?php
 
// Setup Vars
$username="database";
$password="sky306";
$database="mysql_db";
$perpage = 3;
$hostName="ryu.keepskatinbro.com";
$posterID=time();
$isMain=1;
$branch=0;
$tag=$_POST['tag'];
$subject=$_POST['subject'];	// POST is only 8M capacity 
$article=$_POST['contents']; // GET is not limited
// Init DB
$con=mysql_connect($hostName, $username, $password) 
	or die("Epic FAIL!");
mysql_select_db($database,$con);

	$article = str_replace("\n", "<br />",$article);
	$article = str_replace("\t", "<br />",$article);
	$query="INSERT INTO rksb_weblog(title,article,posterID,isMain,branch,tag) VALUES('$subject','$article','$posterID', '$isMain', '$branch','$tag')";
	mysql_query($query); 
mysql_close($con);
 
?>
	your post was : <br />
	title : <?php print $_POST['subject'];?><br /><br />
	Article : <br />
	<?php print $_POST['contents'];?>
	Length : <?php print strlen($_POST['contents']);?>
	Tag : <?php print $_POST['tag']; ?>
	
