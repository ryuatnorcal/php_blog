<?php
 
// Setup Vars
$username="database";
$password="sky306";
$database="mysql_db";
$hostName="ryu.keepskatinbro.com";
$posterID=time();
$blogID = $_GET['comID'];
$isMain=1;
$branch=0;
$comments = $_POST['comments'];
$userName = $_POST['userName'];
// Init DB
$con=mysql_connect($hostName, $username, $password) or die("Epic FAIL!");
mysql_select_db($database,$con);
?>
	your post was : <br />
	user name : <?php print $userName;?><br /><br />
	comments : <br />
	<?php print $comments;?>
	Length : <?php print strlen($comments);?><br />
	blog ID : <?php print $blogID; ?><br />
	
<?php
	$comments = str_replace("\n", "<br />",$comments);
	$comments = str_replace("\t", "<br />",$comments);
	$branch=time();
	$query_comment="INSERT INTO rksb_weblog_comment(userName,comments,posterID,blogID,isMain,branch)". 
		   "VALUES('$userName','$comments','$posterID','$blogID','$isMain', '$branch')";
	mysql_query($query_comment); 
mysql_close($con);
 
?>
