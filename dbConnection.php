<?php
    $host = "localhost";
    $user = "root";
    $db = "bizap";
    $pwd = "";
    $conn = mysql_connect($host,$user,"")or die("Problems :".mysql_error());
    $dbselect = mysql_select_db($db,$conn) or die("Error selecting DB: ".mysql_error());
 ?>