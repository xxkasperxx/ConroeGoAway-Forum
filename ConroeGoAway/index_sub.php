<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM home");
$query_row=mysql_fetch_array($query) or die (mysql_error());
$query2 = mysql_query("SELECT * FROM vars WHERE page='articles'");
$query_row2=mysql_fetch_array($query) or die (mysql_error());
	
	if($_POST['save'])
	{

			$counter = 2;
			$passorfail = false;
			foreach ( $_POST['mytext'] as $c=> $k)
			{
				while($row = mysql_fetch_array($query)){
					$tbNum = $row['id'];
				//	echo 'ID: '.$tbNum.'<br>';
					//echo 'input text:'.$k.'<br>';
					//echo 'exiting while statement<br>';
					//echo 'K: '.$k.'<br>';
					$counter++;
			//		echo 'Counter:'.$counter.'<br>';
				}
			
				
				
				//echo 'input text: '.implode($_POST['mytext']).'<br>';
			//	echo '<br>input text:'.$k.'<br>';	// Outputs all text like it should.
				
				//echo '<pre>'; print_r( $row ); echo '</pre>';
				 //echo "its on<br>";
				
				//execute the sql
				// set allow = true where id = $c
				$allow = "false";
				//echo "ID: ".$tbNum."<br>";
				$text = implode($_POST['mytext']);	// ARRAY of text
			
				//echo '<br>they are equal<br>';
				//$text = $row['id']; 
				//echo "".$text."";
				//echo "$c";
				$text2 = '<div id="announcements"><p>'.$k.'</p></div>';
			//	echo $k;
			//	echo $text2;
				
				if (isset($k))
				{
					$result = strip_tags(mysql_query("UPDATE home SET allow = 'true' WHERE id=$counter"));
				}
					
	
				
		
				$result = strip_tags(mysql_query("UPDATE home SET content = '$k' WHERE id=$counter"));
					
				
				$passorfail = true;
				
				
				
			
				$counter++;
				//	echo 'Counter: '.$counter.'<br>';
					
				
			//}
			}
			
		
				$passorfail = true;

			if ($passorfail==true)
				{?>
			
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
										<li><a href="suggestions.php">Suggestions</a></li>
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
	}
	
?>