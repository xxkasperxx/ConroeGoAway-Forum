<?php
 session_start();
 
 session_unset(); 

 //destroy the session 
 session_destroy(); 
 ?>
 	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
			  <title>Conroe Go Away</title>
			<link href="css/main.css" type="text/css" rel="stylesheet" />
			<link href="css/admin.css" type="text/css" rel="stylesheet" />
			<!--[if IE ]>
			<link href="css/ie.css" type="text/css" rel="stylesheet" />
			<![endif]-->
					<!-- Browser Icon -->
				  <link rel="shortcut icon" href=".\favicon.ico">
				   <!-- End browser Icon -->
			</head>
			



			<body>

					
				<div id="wrapper">
		<div id="header">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="articles.php">Articles</a></li>
				<li><a href="email.php">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/">Blog</a></li>
			</ul>
		</div>
					<div class="aboutUpdate">
						<p>You've been logged out.</p>
						<img src="images/home.png">
					</div>
						
					</div>				
			</body>
			</html>
