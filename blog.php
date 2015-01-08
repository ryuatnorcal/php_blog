<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>:: Weblog ::</title> 
    <link rel="stylesheet" type="text/css" href="blog.css" /> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script> 
    <script type="text/javascript" src="blog.js"></script> 
<body>
     <div class="containa">
		<div class="head">
			<!--Here will be top of webpage -->
			<a href="index.html" title="Home"><img id="logo" src="logo.jpg" alt="Logo" style="float:left;" /></a>
			<div class="jap"><a href="/jp/index.html">|| JAPANESE </a></div> 
           
		</div>
		<div id="menu" class="menu">
			<script>menu();</script>
		</div>
		<div class="pic">
			<!--Here will be picture place of page -->
		</div>
		<div class="contents">
			<!--Here will be contents area -->
		</div>
		<div class="leftColum">
			<!--Here will be left side of web  -->
            <?php include('blog_side_menu.php'); ?>
		</div>
        
		<div id="rightColum_wrapper">
			<div class="rightColum">
				<!-- Here will be right side of web -->
		        <br />
		        <?php
		        	include('blog_article.php');
		        ?>
			
			
				<br />
				<fb:comments xid="[Random Number Associated To Random Comment Feed]_comments" canpost="false" candelete="false" returnurl="http://www.facebook.com/[Your Facebook Page]">
					<fb:title>
					</fb:title>
				</fb:like>
			</div>
		</div><!-- #rightColum_wrapper -->
		<!--<div class="centerColum">
			<!-- here will be center of web -->      
	<!--	</div>-->
		<div class="footer">
			<!-- here will be footer -->
			<p>All Copy Right, Received @ Dr.Pepper</p>
		</div>
	</div>
</body>
</html>
