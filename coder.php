<?php
require("codes.php");
$prodname = $_REQUEST['item'];
$query = "SELECT price FROM products where pname='$prodname'";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo($row[0]);
                    
	}

?>