<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM email");
$query_row=mysql_fetch_array($query) or die (mysql_error());
$query2 = mysql_query("SELECT * FROM emails");
$query_row2=mysql_fetch_array($query) or die (mysql_error());
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
				<li><a href="articles.php">Articles</a></li>
				<li><a href="email.php" class="active">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/login.php">Blog</a></li>
			</ul>
		</div>
		
		<div id="bgAnnouncments">
		
			<div id="announcements">
			<form action="" method="POST">
			<?php
				while($row = mysql_fetch_array($query)){
					echo '<textarea id="text.$counter" name="text" rows="15" cols="80" style="width: 100%">';
					echo $row['content'];
					echo '</textarea>';
			}
			?>
			<input type="submit" value="Update" name="submit">
			</form>
			</div>
			<div id="announcements">
			<h2>E-Blast:</h2>
				<form method="POST" action="">
					<h3>Subject:</h3><input type="text" name="subject" value="" style="width: 30%"><br>
					<h3>Message:</h3><textarea name="message" value="" rows="15" cols="80" style="width: 100%">
					</textarea><br>
					<input type="submit" value="Send" name="submit2">
					
				</form>
			</div>

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
				<li><a href="articles.php">Articles</a></li>
				<li><a href="email.php" class="active">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/index.php">Blog</a></li>
			</ul>
		</div>
		
		<div id="bgAnnouncments">
		
			<div id="announcements">
			<?php
				while($row = mysql_fetch_array($query)){
			echo $row['content'];
			}
			?>
				<form method="POST" action="">
					First Name:<input type="text" value="" class="firstName" name="firstName"><br>
					Last Name:<input type="text" value="" class="lastName" name="lastName"><br>
					Email:<input type="text" value="" class="email" name="email"><br>
					<input type="submit" name="submit" value="Submit">
					<input type="reset" name="clear" value="Clear">
				</form>
			</div>

		</div>
		<footer>
		  <p>Copyright &copy 2012 ConroeGoAway<a href="admin.php" class="disable">Webmaster Log-In</a></p>
		</footer> 
		
	</div>
</body>

</html>
<?php
}
if (isset($_SESSION['loggedin'])&&isset($_SESSION['username'])){
if ($_POST){
	if (isset($_POST['submit']))
	{
		$text = $_POST['text'];
		if (isset($text))
		{
			$result = strip_tags(mysql_query("UPDATE email SET content = '$text'"));
			echo ('<meta http-equiv="refresh" content="1">');
		}
	}

	if (isset($_POST['submit2']))
	{
		$subject = $_POST['subject'];
		$message = $_POST['message'];
	//	echo $subject;
	//	echo $message;
			
	while($row = mysql_fetch_array($query)){	// loops through everything in DB so we can get the emails..
		$email_to = $row['email'];	// echos out all emails in DB
		$email_subject = $subject;
		echo $email_to;
		$email_from = "leviwurtz2622@yahoo.com";

		$email_message = ($message)."\n \n";
		 
		 
		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers); 
		$pass = true;
	}
	if ($pass=true){echo "sending email";}
}}}
if ($_POST)
{
	if (isset($_POST['submit'])){
	$first = $_POST['firstName'];
	$last = $_POST['lastName'];
	$email = $_POST['email'];
	$num_rows = mysql_num_rows($query2);
	$sql    = "INSERT into emails (id,last_name,first_name,email) VALUES('$num_rows','$last','$first','$email')";


	$qury  = mysql_query($sql);
	echo "Thank you we have recieved your information!";
	}
	}
?>