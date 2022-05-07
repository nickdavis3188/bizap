<?php session_start(); 
require("codes.php");
$nav ="";
$today = getdate();
if(isset($_SESSION['validuser']))
{
	$currentuser = $_SESSION['validuser'];
	if (($_SESSION['privilege'])=="adminuser")
	{
		$nav = "adminnav.inc";
		}
		else
		{
			$nav = "usernav.inc";
			}
	$myquery = "select pname from products where minlevel>curlevel";
	 
$myresults = mysql_query($myquery);
$mynoofrows = mysql_num_rows($myresults);

	
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bizap ver1.0.1 | Powered by TAVICOM</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="clockp.js"></script>
<script type="text/javascript" src="clockh.js"></script> 
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

<style type="text/css">
<!--
body {
	background-color: #292c25;
}
-->
</style></head>
<body>
<div id="main_container">

	<?php include("header.inc");?>
    
    <div class="main_content">
    
                    <?php include("menunav.inc");?> 
                    
                    
                    
                    
    
    
    
    
      <?php include("leftside.inc");?>
    
    <div class="right_content">            
     <h1>My Dashboard</h1>   
     

    <h2>Items low in stock</h2> 
                    
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th width="40" class="rounded-company" scope="col">S/N</th>
            <th width="209" class="rounded" scope="col">Product</th>
            <th width="88" class="rounded" scope="col">Min Level</th>
            <th width="93" class="rounded" scope="col">Current Level</th>
            <th width="109" class="rounded" scope="col">Re-stock Item</th>
            <th width="58" class="rounded-q4" scope="col">Delete</th>
        </tr>
    </thead>
    
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>This table shows items that are currently low in stock.</em></td>
        	</tr>
    </tfoot>
    <tbody>
         <?php   
 $query = "select pname,minlevel,curlevel from products where minlevel>curlevel order by ptype";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
if($noofrows>0)
{
 	$count = 1;
	while($row = mysql_fetch_array($results))
    { 
	echo("<tr><td>".$count."</td><td><strong>".$row[0]."</strong></td><td>".$row[1]."</td>");
	

	if($row[2]<$row[1])
	{
	echo("<td><b><font color='red'>".$row[2]."</font></b></td><td><a href='restock2.php?pname=".$row[0]."'><img src='images/photo.png' alt='' title='' border='0' /></a></td><td><a href='removeproduct2.php?pname=".$row[0]."' class='ask'><img src='images/trash.png' alt='' title='' border='0' /></a></td></tr>");
	}
	else
	{
	echo("<td>".$row[2]."</td><td><a href='restock2.php?pname=".$row[0]."'><img src='images/photo.png' alt='' title='' border='0' /></a></td><td><a href='removeproduct2.php?pname=".$row[0]."' class='ask'><img src='images/trash.png' alt='' title='' border='0' /></a></td></tr>");
	}

	$count++;
	}}
?>
    	        
    </tbody>
</table>

</div><!-- end of right content-->
            
     
     
     <div class="right_content">            
     <h2>Best Selling Products</h2> 
                    
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
  <thead>
    	<tr>
        	<th width="40" class="rounded-company" scope="col">S/N</th>
            <th width="209" class="rounded" scope="col">Product</th>
            <th width="88" class="rounded" scope="col">Quantity Sold</th>
            <th width="93" class="rounded" scope="col">Amount</th>
            <th width="109" class="rounded" scope="col">Profit</th>
            
        </tr>
    </thead>
    
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>This table shows the best selling products.</em></td>
        	</tr>
    </tfoot>
    <tbody>
         <?php   
 $query = "select item,sum(qty),sum(total),sum(profit) from salesreport group by item order by sum(qty) desc";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
if($noofrows>0)
{
 	$count = 1;
	while($row = mysql_fetch_array($results))
    { 
	echo("<tr><td>".$count."</td><td><strong>".$row[0]."</strong></td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>");
	$count++;
	}
	
	}
?>
    	        
    </tbody>
</table>

</div>
             
             <div class="right_content">            
     <h2>Bithday Celebrants of the Month</h2> 
                    
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
  <thead>
    	<tr>
        	<th width="40" class="rounded-company" scope="col">S/N</th>
            <th width="209" class="rounded" scope="col">Fullname</th>
            <th width="88" class="rounded" scope="col">Phone</th>
            <th width="93" class="rounded" scope="col">Email</th>
            <th width="109" class="rounded" scope="col">Birthday</th>
            
        </tr>
    </thead>
    
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>This table shows birthday celebrants for the month.</em></td>
        	</tr>
    </tfoot>
    <tbody>
         <?php   
		 $month = $today['month'];
 $query = "SELECT * FROM members where birthmonth = '$month' ORDER BY fullname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
if($noofrows>0)
{
 	$count = 1;
	while($row = mysql_fetch_array($results))
    { 
	echo("<tr><td>".$count."</td><td><strong>".$row[0]."</strong></td><td>".$row[1]."</td><td>".$row[4]."</td><td>".$row[5]." ".$row[6]."</td></tr>");
	$count++;
	}
	
	}
?>
    	        
    </tbody>
</table>
<h2>&nbsp;</h2>
</div>
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <?php include("footer.inc");?>

</div>		
</body>
</html>
<?php
}
else
{
header("Location: index3.php?message=You must login to use this software!!!");
				exit;
	
	}

 ?>
