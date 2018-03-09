<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM suggestions");
$query_row=mysql_fetch_array($query) or die (mysql_error());
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
				<li><a href="flatpress/index.php">Blog</a></li>
		</div>
		
		<div id="bgAnnouncments">
		
			<div id="announcements2">
				<form method="POST" action="sug_sub.php">
					Suggestion:<br>
					Title:<input type="text" value="" name="title" class="title"><br>
					<textarea name="suggestions" cols="50" rows="10" onfocus="this.value==this.defaultValue?this.value='':null">Enter your suggestion here
					</textarea><br>
					<input type="submit" name="submit" value="Submit">
					<input type="reset" name="clear" value="Clear">
				</form>
			</div>
				
			<?php
				while($row = mysql_fetch_array($query)){
					if ($row['allow']=="true")
					{
						echo $row['content'];
					}
				}
			?>

		</div>
		<footer>
		  <p>Copyright &copy 2012 ConroeGoAway<a href="admin.php" class="disable">Webmaster Log-In</a></p>
		</footer> 
		
	</div>
</body>

</html>
