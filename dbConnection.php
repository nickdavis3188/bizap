<?php
    $conString = "mysql://b883bbc137e326:2bfc946e@us-cdbr-east-05.cleardb.net/heroku_e7f4dc073878fe6?reconnect=true";
    $host = "us-cdbr-east-05.cleardb.net";
    $user = "b883bbc137e326";
    $db = "heroku_e7f4dc073878fe6";
    $pwd = "2bfc946e";
    $conn = mysql_connect($host,$user,$pwd)or die("Problems :".mysql_error());
    $dbselect = mysql_select_db($db,$conn) or die("Error selecting DB: ".mysql_error());
 ?>