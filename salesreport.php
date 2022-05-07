<?php session_start(); 
require("codes.php");
$nav ="";
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
     <?php   
	$dailytotal = 0;
	$dday = $_REQUEST['day'];
	$dmonth = $_REQUEST['month'];
	$dyear = $_REQUEST['year'];
	$fulldate = $dyear."-".$dmonth."-".$dday;
$fd = date($fulldate);
	$formattedfdate = date("d-m-Y", strtotime($fd));
	
	?>
    
    <div class="right_content">            
     <h1>Daily Sales Report for <?php echo($formattedfdate); ?></h1>   
     
<table id="rounded-corner" summary="">
    <thead>
 
    	<tr>
        	<th width="140" class="rounded" scope="col">Date</th>
            <th width="241" class="rounded" scope="col">Item Sold</th>
            <th width="150" class="rounded" scope="col">Quantity Sold</th>
            <th width="127" class="rounded" scope="col">Amount Sold</th><th width="157" class="rounded" scope="col">Profit</th>           </tr>
    </thead>
    <?php   
	
 $query = "select * from  salesreport  where fulldate='$fd' order by item";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
if($noofrows>0)
{
 	
	while($row = mysql_fetch_array($results))
    { 
	$originaldate = $row[3];
	$formatteddate = date("d-m-Y", strtotime($originaldate));
	echo("<tr><td align='center'>".$formatteddate."</td><td>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[4]."</td></tr>");
	}
}
?>
        <?php 
		$query2 = "select SUM(total),SUM(profit) from salesreport where fulldate='$fd'";
		$results2 = mysql_query($query2);
$noofrows2 = mysql_num_rows($results2);
if($noofrows2>0)
{ 	
	while($row = mysql_fetch_array($results2))
    { 
	$rangetotal = $row[0];
	$rangeprofit = $row[1];
	}
	
}?> 
 <?php 
		$query2 = "select SUM(amount) from expenses where fulldate='$fd' AND typeofexpense='Recurrent'";
		$results2 = mysql_query($query2);
$noofrows2 = mysql_num_rows($results2);
if($noofrows2>0)
{ 	
	while($row = mysql_fetch_array($results2))
    { 
	$totalexp = $row[0];
		}
	
}?> 


        <tr><td></td><td></td><td><strong>TOTAL FOR THE DAY</strong></td><td align="center"><strong>#<?php echo($rangetotal);?> .00</strong></td>
        <td align="center"><strong>#<?php echo($rangeprofit);?> .00</strong></td></tr>
         <tr><td></td><td></td>
        <td>&nbsp;</td>
        <td align="center"><strong>Total Recurrent Expenses for the Day</strong></td>
        <td align="center"><strong>#<?php echo($totalexp);?> .00</strong></td></tr>
        <tr><td></td><td></td>
        <td>&nbsp;</td>
        <?php 
		$totalprof = $rangeprofit - $totalexp;
		?>
        <td align="center"><strong>TOTAL PROFIT AFTER EXPENSES</strong></td>
        <td align="center"><strong>#<?php echo($totalprof);?> .00</strong></td></tr>
        
        <tfoot>
    	<tr>
        	<td colspan="5" class="rounded-foot-left"><em>This table shows daily sales report..</em></td>
        	</tr>
    </tfoot>
</table>
     
    <h2><br />
      </h2>
    <h2>&nbsp;</h2>
    <h2>&nbsp;</h2>
    </div>    
                    
  </div>   
      <!--end of center content -->               
                    
                    
    
    
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
