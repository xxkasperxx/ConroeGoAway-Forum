<?php
session_start();
include("config.php");
$query = mysql_query("SELECT * FROM articles");
$query_row=mysql_fetch_array($query) or die (mysql_error());
$query2 = mysql_query("SELECT * FROM vars WHERE page='articles'");
$query_row2=mysql_fetch_array($query2) or die (mysql_error());
	
	if($_POST['save'])
	{



			$counter = 3;
			$passorfail = false;
			foreach ( $_POST['mytext'] as $c=> $k)
			{
				while($row = mysql_fetch_array($query)){
					$tbNum = $row['id'];
					echo 'ID: '.$tbNum.'<br>';
					//echo 'input text:'.$k.'<br>';
					//echo 'exiting while statement<br>';
					//echo 'K: '.$k.'<br>';
					$counter++;
					echo 'Counter:'.$counter.'<br>';
				}
			
				
				
				//echo 'input text: '.implode($_POST['mytext']).'<br>';
				echo '<br>input text:'.$k.'<br>';	// Outputs all text like it should.
				
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
				
				
				

		
				$result = strip_tags(mysql_query("UPDATE articles SET content = '$k' WHERE id=$counter"));
					
				
				$passorfail = true;
				
				if ($passorfail==true)
				{
					//echo "passed";
				}
				
				if ($passorfail=false)
				{
						echo "Error: Please contact levi at leviwurtz2622@yahoo.com. Thank you!";
				}
				
			
				$counter++;
					echo 'Counter: '.$counter.'<br>';

				
			//}
			}
	}
	
?>