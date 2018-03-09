<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM home");
$query_row=mysql_fetch_array($query) or die (mysql_error());
if (isset($_SESSION['loggedin'])&&isset($_SESSION['username']))
 {
 echo "Welcome, " . $_SESSION['username'] . "!" . "<a href='logout.php'> Log-out!</a>";

 
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
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="articles.php">Articles</a></li>
				<li><a href="email.php">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/">Blog</a></li>
			</ul>
		</div>
		
		<div id="picture">
			<img src="images/home.png"width="80%">
		</div>
		<div id="bgAnnouncments">
		<form action="index_sub.php" method="POST">
		<?php
		$counter =1;
		while($row = mysql_fetch_array($query)){
			
		echo '<textarea id="mytext[]" name="mytext[]" rows="15" cols="80" style="width: 100%">';
				echo $row['content'];
			echo '</textarea>';
		
			//  echo '<pre>'; print_r( $row ); echo '</pre>';
			//  $counter++;
			  
		//}
		
				
					// IF WE DONT POST SOMTHING BRING UP THE OLD TEXT FROM DB
				//	echo "<br>".$counter."<br>";
			/*	//echo $counter;
			echo '<textarea id="text{$counter}" name="text{$counter}" rows="15" cols="80" style="width: 100%">';
				echo $row['content'];
			echo '</textarea>';
			//echo "counter: ".$counter;
			echo "text{$counter}<br>";
			if ($_POST)
			{
	// DO UPDATE
				// need a while statement to say while the counter is lower than the id in DB then update..

					//echo $text.$counter;
					$tbNum = $row['id'];
					echo "counter: ". $counter ."<br>";
					echo "id num: ".$tbNum ."<br>";
					//$text = $_POST['text'.$counter];
					if ($counter==$tbNum)
					{
				//		echo "<br>Counter: ".$counter."<br>";
						echo "text{$counter}";
						$text = $_POST["text{$counter}"];
						echo $text ." <br>";
						//echo $counter.$tbNum;
						$result = strip_tags(mysql_query("UPDATE home SET content = '$text' WHERE '$tbNum' = '$counter'"));
					}
				
					
		
	
		}*/
			}
		?>
			<input type="submit" value="Submit" name="save">
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
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="articles.php">Articles</a></li>
				<li><a href="email.php">Email</a></li>
				<li><a href="suggestions.php">Suggestions</a></li>
				<li><a href="flatpress/index.php">Blog</a></li>
			</ul>
		</div>
		
		<div id="picture">
			<img src="images/home.png"width="100%">
		</div>
		<div id="bgAnnouncments">
		<?php
		while($row = mysql_fetch_array($query)){
		if ($row['allow']=="true"){
			echo $row['content'];
			}
			}
		?>
		</div>
		<footer>
		  <p>Copyright &copy 2012 ConroeGoAway<a href="admin.php" class="disable">Webmaster Log In</a>
<br><br>
<img src="http://hitwebcounter.com/counter/counter.php?page=4495140&style=0025&nbdigits=5&type=ip&initCount=0" title="" Alt=""   border="0" >
</a><br/>

  
		</footer> 
		
	</div>
</body>

</html>
<?php
}

	//if ($_POST)
	//{
	/*
		foreach ($text as $text){
		$text = $_POST['text'];
		echo $text;
		echo "data is posted";
		if (isset($text))
		{
			echo 'text is set';
			$result = strip_tags(mysql_query("UPDATE home SET content = '$text'"));
			
			
		}
	}*/
	
	/*if ($_POST)
			{
			//echo "posting somthing";
			$counter =1;
		while($row2 = mysql_fetch_array($query)){
		echo "inside the while statement";
		$counter++;
			echo "posting somthing";
				$tbNum = $row['id'];
				echo $counter;
				echo $tbNum;
				if ($counter==$tbNum)
				{
					echo "id num: $tbNum <br>";
					echo "textarea num: $counter";
					$testss = "text";
					$text = $_POST['$testss'];
					$result = strip_tags(mysql_query("UPDATE home SET content = '$text' WHERE id = '$tbNum'"));
				}
			}
		}
*/
	
	
	
	
	


	

?>