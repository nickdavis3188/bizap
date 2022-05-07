<?php
session_start();
include("dbConnection.php");
			
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$privilege = "";
		if ($username && $password)
		{
			$query = "select privilege from users where uname='$username' and pword ='$password'";
			$results = mysql_query($query);
			$noofrows = mysql_num_rows($results);
		if ($noofrows==1)
		{
		while($row = mysql_fetch_array($results))
    		{ 
				$_SESSION['validuser'] = $username;
				$_SESSION['privilege']= $row[0];
				header("Location: dashboard.php");
				exit;
			}
		}
		else{
				header("Location: index3.php?message=Your login details are incorrect!!!");
				exit;
				}
		}
		else
		{
			header("Location: index.php");
				exit;
			}
			
?>