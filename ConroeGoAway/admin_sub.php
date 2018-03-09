<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM suggestions");
$query_row=mysql_fetch_array($query) or die (mysql_error());
	
	if($_POST['save'])
	{
		$passorfail = false;
		foreach ( $_POST['mychk'] as $k=> $c)
			{
			while($row = mysql_fetch_array($query)){
			$tbNum = $row['id'];
			
			
			echo 'box checked'.$c.'<br>';
			 //echo "its on<br>";
			
			//execute the sql
			// set allow = true where id = $c
			$allow = "false";
	//		echo "ID: ".$tbNum."<br>";
			if ($tbNum == $c)
			{
				//echo '<br>they are equal<br>';
				$text = $row['id']; 
				//echo "".$text."";
				//echo "$c";
				$result = strip_tags(mysql_query("UPDATE suggestions SET allow = 'true' WHERE id=$c"));
				$passorfail = true;
				
				if ($passorfail==true)
				{
			//		echo "passed";
			?>
					
					<!DOCTYPE html> 
						<html>
						<head>
						<link href="css/main.css" type="text/css" rel="stylesheet" >
							<title>ConroeGoAway</title>
						</head>

						<body>
							<div id="wrapper">
								<div id="header">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="articles.php">Articles</a></li>
										<li><a href="email.php">Email</a></li>
										<li><a href="#" class="active">Suggestions</a></li>
										<li><a href="flatpress/">Blog</a></li>
								</div>
								
								<div id="bgAnnouncments">
								
									<div id="announcements2">
										<p>Your updates have been applied.</p>
										
									</div>
										


								</div>
								<footer>
								  <p>Copyright &copy 2012 ConroeGoAway</p>
								</footer> 
								
							</div>
						</body>

						</html>

					<?php
				}
				
				if ($passorfail=false)
				{
						?>
				
					<!DOCTYPE html> 
						<html>
						<head>
						<link href="css/main.css" type="text/css" rel="stylesheet" >
							<title>ConroeGoAway</title>
						</head>

						<body>
							<div id="wrapper">
								<div id="header">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="articles.php">Articles</a></li>
										<li><a href="email.php">Email</a></li>
										<li><a href="#" class="active">Suggestions</a></li>
										<li><a href="flatpress/">Blog</a></li>
								</div>
								
								<div id="bgAnnouncments">
								
									<div id="announcements2">
										<p>Error: Please contact Levi Wurtz at leviwurtz2622@yahoo.com</p>
										
									</div>
										


								</div>
								<footer>
								  <p>Copyright &copy 2012 ConroeGoAway</p>
								</footer> 
								
							</div>
						</body>

						</html>

					<?php
				}
				
			}else
			{
	//		echo ";";
			}
				
				
			}
			}
	}
	
?>