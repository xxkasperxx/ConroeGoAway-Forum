<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM suggestions");
$query_row=mysql_fetch_array($query) or die (mysql_error());
?>
<html>
<?php	
	if ($_POST)
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username&&$password)
		{
		 

			$query2 = mysql_query("SELECT * FROM users WHERE username='$username'");



		 
			$numrows = mysql_numrows($query2); 
		 
			 if ($numrows!=0)	// code to login
			{
			
				while ($row = mysql_fetch_assoc($query2))
				{
				
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
				
				}
				
				// check to see if the match!
				if($username==$dbusername&&$password==$dbpassword)
				{
				
					$_SESSION['loggedin'] = TRUE;
					$_SESSION['username'] = $username;
				
					
					?>
					
				
					<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
			  <title>ConroeGoAway</title>
			<link href="css/main.css" type="text/css" rel="stylesheet" />
			<link href="css/admin.css" type="text/css" rel="stylesheet" />
			<!--[if IE ]>
			<link href="css/ie.css" type="text/css" rel="stylesheet" />
			<![endif]-->
					<!-- Browser Icon -->
				  <link rel="shortcut icon" href=".\favicon.ico">
				   <!-- End browser Icon -->
			</head>
			



			<body id="sector1">

					<!------------------------------------------------------------------------	ADMIN PANEL --------------------------------------------------------------->
				<!-- Black Menu -->
			
					<div class="aboutUpdate">
																	<!-------------------- CHANGE HERE ----------------------------------------->
						<ul class="menu">
							<?php echo "Welcome, " . $username . "!" ?>
							
							<p> Please click a link to view that page!</p>
							
							<li><a href="index.php">Home</a></li>
							<li><a href="articles.php">Articles</a></li>
							<li><a href="email.php">Email</a></li>
							<li><a href="suggestions.php">Suggestions</a></li>
							<li><a href="flatpress/login.php">Blog</a></li>
						</ul>
					</div>
						
						<!-- admin panel -->
						<div id="bgAnnouncments">
							<h2>Admin Panel:</h2>
							<p>Please visit the email tab to send out an E-Blast. To edit any other page please click on the link above and then edit the content you want. Please <b>DO NOT</b> forget to push "Save".</p>
							<p>
							<form method="POST" action="admin_sub.php">
								<?php
									$roww = mysql_fetch_array($query);
			
									$counter = $roww['id'];
									while($row = mysql_fetch_array($query)){

									
										if ($row['allow']=="false")
										{
											$counter++;echo $counter;
											
											echo "<input type='checkbox' name='mychk[]' value='$counter'>";
										
											echo $row['content'];
										}
									}
									
									
								?>
								<input type="submit" value="Save!" name="save">
							</form>
						</div>
									
			</body>
			</html>
					

					




					<?php
				}else
				{
	
					?>
					<html>
								<head>
<link href="css/main.css" type="text/css" rel="stylesheet" >
	<title>ConroeGoAway</title>
	</head>
					<body>
						<div id="bgAnnouncments">
						<p>Incorrect password!</p>
						<img src="images/home.png">
						<form action='admin.php' method='POST'>
							Username:<input type='text' name='username'><br>
							Password:<input type='password' name='password'><br>
							<input type='submit' value='Log In'>
						</form>
						</div>
						</body>
					</html>
				<?php
				}
		

	
			
			}else
			{

				?>
				<html>
							<head>
<link href="css/main.css" type="text/css" rel="stylesheet" >
	<title>ConroeGoAway</title>
	</head><body>
	<div id="bgAnnouncments">
					<p>Incorrect username!</p>
					<img src="images/home.png">
					<form action='admin.php' method='POST'>
						Username:<input type='text' name='username'><br>
						Password:<input type='password' name='password'><br>
						<input type='submit' value='Log In'>
					</form>
					</div>
					</body>
				</html>
				<?php
			}
		}else
		{

				?>
			<html>
			<head>
<link href="css/main.css" type="text/css" rel="stylesheet" >
	<title>ConroeGoAway</title>
	</head>
			<body>
						<div id="bgAnnouncments">
				<p>Please enter a username/password</p>
				<img src="images/home.png">
				<form action='admin.php' method='POST'>
					Username:<input type='text' name='username'><br>
					Password:<input type='password' name='password'><br>
					<input type='submit' value='Log In'>
				</form>
				</div>
				</body>
			</html>
		<?php
		}
 
	}else
	{
		?>
		<html>			<head>
<link href="css/main.css" type="text/css" rel="stylesheet" >
	<title>ConroeGoAway</title>
	</head>
		<body>
						<div id="bgAnnouncments">
		<p>Please enter a username/password</p>
		<img src="images/home.png">
		<form action='admin.php' method='POST'>
			Username:<input type='text' name='username'><br>
			Password:<input type='password' name='password'><br>
			<input type='submit' value='Log In'>
		</form>
		</div>
				</body>
<?php 
	}

?>	
</html>

