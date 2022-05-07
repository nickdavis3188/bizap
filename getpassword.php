<?php
session_start();
$host = "localhost";
$user = "root";
$db = "bizap";
$conn = mysql_connect($host,$user,"")or die("Problems :".mysql_error());
$dbselect = mysql_select_db($db,$conn) or die("Error selecting DB: ".mysql_error());
			
			$fname = $_REQUEST['fname'];
			$username = $_REQUEST['username'];
			
		if ($username && $fname)
		{
			$query = "select pword from users where uname='$username' and fname ='$fname'";
			$results = mysql_query($query);
			$noofrows = mysql_num_rows($results);
		if ($noofrows==1)
		{
		while($row = mysql_fetch_array($results))
    		{ 
				
				$password = $row[0];
				$_SESSION['password'] = $password;
				header("Location: index2.php?password=".$password);
				exit;
			}
		}
		else{
				header("Location: forgotpword2.php?password=".$password);
				exit;
				}
		}
		else
		{
			header("Location: index.php");
				exit;
			}
			
?>