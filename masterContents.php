<html>
	<head>
		<title>:: master page ::</title>
		<link rel="stylesheet" type="text/css" href="blog.css" /> 
    	<script type="text/javascript" src="blog.js"></script>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script src="gooeymenu.js">

/***********************************************
* Gooey Menu Script (c) Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>

<link rel="stylesheet" type="text/css" href="gooeymenu.css" />
	</head>
<body>
<?php
$posting=$_GET['id'];
$feldName=$_POST['Feld'];
$var=$_POST['var'];
$dataType=$_POST['data_type'];
$tableName=$_POST['tableName'];
print "<div class='box'>";
include('adminMenu.php');
print "<div class='leftWindow'>";
include('leftbar.php');
print "</div><div class='rightWindow'>";
include('createDB.php');
	  if(!isset($posting))
	  {
		print "<h3>Welcome to Admin Page</h3>".
		      "<p>This is the admin page for ryu.keepskatinbro.com<br />".
			  "You can edit following stuff whatever you want </p>";
	  }
	  if($posting=='blog')
	  {
	  	print "<h3>BLOG MANAGER</h3>".
	  		  "<p>You can manage your web log with this section.</p>";
	  }
	  if($posting=='post')
	  {
		print "<h3>WEB BLOG POSTING SECTION</h3>".
			  "<form method='post' action='blog_post.php'>".
        	  "Subject : <input name='subject' type='text' /><br />".
	       	  "Contents :<br />".
  	       	  "<textarea name='contents' rows='10' cols='50'>".
  	    	  "</textarea>".
  			  "<br />".
  			  "Tag : <input name='tag' type='text' /><br />".
  	 		  "<button class='textArea' type='submit'>Post</button>".
  	 		  "<button type='reset'>Reset</button>".
  			  "</form>";
	    }
	    if($posting=='edit')
	    {	include('master_blog_edit.php');	}
	    if($posting=='delete')
	    {	include('master_blog_delete.php');	}
	    if($posting=='deleteCom')
	    {	include('master_blog_comment_delete.php');	}
		if($posting=='createDB')
		{	
			if(isset($_POST['Feld']) AND isset($_POST['data_type']))
			{	createFeld($tableName,$fledName,$var,$dataType);	}
			else
			{	getOptionCreaete($database);	}
		}
		if($posting=='deleteDB')
		{	
			if(isset($_POST['tableName']) AND isset($_POST['var']))
			{	deleteFeld($tableName,$fledName,$var);	}
			else
			{	getOptionDelete($database);	}
		}
		if($posting=='editDB')
		{	
			if(isset($_POST['tableName']) AND isset($_POST['var']))
			{	changeDatatype($tableName,$fledName,$var,$dataType);	}
			else
			{	getOptionChangeDt($database);	}
			
		}
		
?>
</body>
</html>
