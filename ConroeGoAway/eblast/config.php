<?php
mysql_connect('localhost','root','') or die('could not connect to MYSQL' . mysql_error());

mysql_select_db("cgoaway") or die ("Couldnt find table Database. Sorry");
?>