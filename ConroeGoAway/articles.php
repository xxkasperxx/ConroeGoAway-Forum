<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM articles");
$query_row=mysql_fetch_array($query) or die (mysql_error());
if (isset($_SESSION['loggedin'])&&isset($_SESSION['username']))
 {
 echo "Welcome, " . $_SESSION['username'] . "!" . "<a href='logout.php'> Log-out!</a>";
echo "<a href='admin.php'>Admin Panel</a>";
 
?>
<!-- EDIT FOR CMS -->
<!DOCTYPE html> 
<html>
<head>
<link href="css/main.css" type="text/css" rel="stylesheet" >
	<title>ConroeGoAway</title>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="articles.php" class="active">Articles</a></li>
				<li><a href="email.php">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/login.php">Blog</a></li>
			</ul>
		</div>
		
		<div id="bgAnnouncments">
			<form action="articles_sub.php" method="POST">
		<?php
		$counter =1;
		while($row = mysql_fetch_array($query)){
		echo '<textarea id="mytext[]" name="mytext[]" rows="15" cols="80" style="width: 100%">';
				echo $row['content'];
			echo '</textarea>';
			}
		?>
			<input type="submit" value="Save" name="save">
		</form>
		</div>
		<footer>
		  <p>Copyright &copy 2012 ConroeGoAway</p>
		</footer> 
		
	</div>
</body>

</html>
<?php
}else
{
 ?>

<!-- REGULAR -->
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
				<li><a href="articles.php" class="active">Articles</a></li>
				<li><a href="email.php">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/index.php">Blog</a></li>
			</ul>
		</div>
		
		<div id="bgAnnouncments">
			
			<?php
		while($row = mysql_fetch_array($query)){
			echo $row['content'];
			}
		?>
		</div>
		<footer>
		  <p>Copyright &copy 2012 ConroeGoAway<a href="admin.php" class="disable">Webmaster Log-In</a></p>
		</footer> 
		
	</div>
</body>

</html>
<?php
}
?>