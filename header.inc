<?php 	
$myquery = "select pname from products where minlevel>curlevel";	 
$myresults = mysql_query($myquery);
$mynoofrows = mysql_num_rows($myresults); 
?>
<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome <?php echo($currentuser);?>,<a href="dashboard.php" class="messages">(<?php echo($mynoofrows);?>) Low in Stock</a>| <a href="logout.php" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>