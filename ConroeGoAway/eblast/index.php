<?php
include("config.php");
$query = mysql_query("SELECT * FROM emails");
$query_row=mysql_fetch_array($query) or die (mysql_error());
?>
<html>
<body>
	<form method="POST" action="">
		Subject:<input type="text" name="subject" value=""><br>
		Message:<textarea name="message" value="">
		</textarea><br>
		<input type="submit" value="Send">
		
	</form>
</body>
</html>

<?php

	if ($_POST)
	{
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		echo $subject;
		echo $message;
			
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
}
?>