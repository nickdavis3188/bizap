    <?php
        $conString = "mysql://b883bbc137e326:2bfc946e@us-cdbr-east-05.cleardb.net/heroku_e7f4dc073878fe6?reconnect=true";
        $host = "us-cdbr-east-05.cleardb.net";
        $user = "b883bbc137e326";
        $db = "heroku_e7f4dc073878fe6";
        $pwd = "2bfc946e";
        $conn = mysql_connect($host,$user,$pwd)or die("Problems :".mysql_error());
        $dbselect = mysql_select_db($db,$conn) or die("Error selecting DB: ".mysql_error());
     ?>
<!-- <?php
    // $conString = "mysql://b883bbc137e326:2bfc946e@us-cdbr-east-05.cleardb.net/heroku_e7f4dc073878fe6?reconnect=true";
    // $host = "localhost";
    // $user = "id18899058_mybizap";
    // $db = "id18899058_bizap";
    // $pwd = "4SL}B?WCg9fvp)2X";
   
    
    // $conn = new mysqli($host, $user, $pwd);
    
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    
    ?> -->
