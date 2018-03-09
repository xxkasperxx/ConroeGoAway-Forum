<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM suggestions");
$query_row=mysql_fetch_array($query) or die (mysql_error());
	if ($_POST['submit'])
	{
		$check = false;
		$pass = false;
		$suggestion = $_POST['suggestions'];
		$title = $_POST['title'];
		if (isset($suggestion)&&($title))
		{
			$check=true;

			
			$allow = "false";
			$text = "<div id='announcements'>
					<h2>$title</h2>
					<p>$suggestion</p>
					</div>";
					$test = "<div id=announcements><h2>$title</h2><p>$suggestion</p></div>";
			if ($check=true)
			{

				$sql    = "INSERT into suggestions (id,content,allow) VALUES('','$test','$allow')";
				$qury  = mysql_query($sql) or die ('<br>'.mysql_error());
				$pass=true;
			}
			if ($pass=true)
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
										<li><a href="suggestions.php" class="active">Suggestions</a></li>
										<li><a href="flatpress/login.php">Blog</a></li>
								</div>
								
								<div id="bgAnnouncments">
								
									<div id="announcements2">
										<p>We have recieved your suggestion. It is being reviewed. <br><footer>Thank You!</footer></p>
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
			
			

			
		}else{
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
										<p>Somthing is wrong with your form.<form method="POST" action="sug_sub.php">
											Suggestion:<br>
											Title:<input type="text" value="<?php echo $title; ?>" name="title" class="title"><br>
											<textarea name="suggestions" cols="50" rows="10"><?php echo $suggestion; ?>
											</textarea><br>
											<input type="submit" name="submit" value="Submit">
											<input type="reset" name="clear" value="Clear">
										</form></p>
										
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