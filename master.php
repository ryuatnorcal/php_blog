<html>
	<head>
		<title>:: master page ::</title>
		<link rel="stylesheet" type="text/css" href="blog.css" /> 
    	<script type="text/javascript" src="blog.js"></script>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script src="gooeymenu.js">



</script>

<link rel="stylesheet" type="text/css" href="gooeymenu.css" />
	</head>
<body>
<?php
	$userName=$_POST['user'];
	$passWord=$_POST['passwd'];
	$user='user';
	$pass='pw';
	$posting=$_GET['id'];
	$posterID='0000';
	$isMain='1';
	$branch='0';
	
	if(isset($userName) and isset($passWord))
	{
		if(($userName==$user) and ($passWord==$pass))
		{
			include('masterContents.php');
		}
		else
		{
			print "<font color='red'>*User name or passwrd is not mach as the database. <br />".
				  "Please try again </font>".
			      "<form method='post' action='master.php'>".
				  "User Name : <input name='user' type='text' /><br />".
				  "Pass World : <input name='passwd' type='password' /><br />".
				  "<button class='textArea' type='submit'>Login</button>".
	  			  "</form>";
		}
		print "</div>";
	}
	else
	{
		print "<form method='post' action='master.php'>".
		      "User Name : <input name='user' type='text' /><br />".
		 	  "Pass World : <input name='passwd' type='password' /><br />".
			  "<button class='textArea' type='submit'>Login</button>".
	  		  "</form>";
	}
?>
</body>
</html>
