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
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>

function getitemcost(itemobj,codeobj,priceobj,qtyobj,totalobj1,totalobj2,totalobj3,totalobj4,totalobj5,totalobj6,totalobj7,totalobj8,totalobj9,totalobj10,sumtotalobj)
{
	var itemobj = document.getElementById(itemobj).value;

var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) {
XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
XMLHttpRequestObject = new
ActiveXObject("Microsoft.XMLHTTP");
}
if(XMLHttpRequestObject) {
var mainsource = codeobj+itemobj;

XMLHttpRequestObject.open("GET", mainsource);
XMLHttpRequestObject.onreadystatechange = function()
{
if (XMLHttpRequestObject.readyState == 4 &&
XMLHttpRequestObject.status == 200) {
var itemprice = XMLHttpRequestObject.responseText;
document.getElementById(priceobj).value=parseInt(itemprice);
settotal(priceobj,qtyobj,totalobj1,totalobj2,totalobj3,totalobj4,totalobj5,totalobj6,totalobj7,totalobj8,totalobj9,totalobj10,sumtotalobj);
grandtotalcalc();

}
}
XMLHttpRequestObject.send(null);
}
}
</script>

<script language="javascript">
function sumtotal(totalobj1,totalobj2,totalobj3,totalobj4,totalobj5,totalobj6,totalobj7,totalobj8,totalobj9,totalobj10,sumtotalobj)
{
	
	var tot1 = parseInt(document.getElementById(totalobj1).value);
	var tot2 = parseInt(document.getElementById(totalobj2).value);
	var tot3 = parseInt(document.getElementById(totalobj3).value);
	var tot4 = parseInt(document.getElementById(totalobj4).value);
	var tot5 = parseInt(document.getElementById(totalobj5).value);
	var tot6 = parseInt(document.getElementById(totalobj6).value);
	var tot7 = parseInt(document.getElementById(totalobj7).value);
	var tot8 = parseInt(document.getElementById(totalobj8).value);
	var tot9 = parseInt(document.getElementById(totalobj9).value);
	var tot10 = parseInt(document.getElementById(totalobj10).value);
	
	var sumtot = tot1+tot2+tot3+tot4+tot5+tot6+tot7+tot8+tot9+tot10;
	document.getElementById(sumtotalobj).value= sumtot;
	
	
	}
	
function settotal(priceobj,qtyobj,totalobjo,totalobj2,totalobj3,totalobj4,totalobj5,totalobj6,totalobj7,totalobj8,totalobj9,totalobj10,sumtotalobj)
{
	var price = parseInt(document.getElementById(priceobj).value);
	var qty =   parseInt(document.getElementById(qtyobj).value);
   	var total = price * qty;
	document.getElementById(totalobjo).value=total;
	sumtotal(totalobjo,totalobj2,totalobj3,totalobj4,totalobj5,totalobj6,totalobj7,totalobj8,totalobj9,totalobj10,sumtotalobj);
	grandtotalcalc();
	}
	
<!--function grandtotalcalc(grandtotobj,totalsumobj,discobj)-->
function grandtotalcalc()
{
	var tsum = parseInt(document.getElementById("sumtotal").value);
	var discval = parseInt(document.getElementById("discount").value);
	var gtotal = tsum - (tsum/100*discval);
	document.getElementById("grandtotal").value=gtotal;	
	
	
	
	
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tilapia &amp; Tinz::Bizap ver1.0.1 | Powered by TAVICOM</title>
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
</style>
<script type="text/javascript" src="gen_validatorv4.js"></script>
</head>
<body>
<div id="main_container">

	<?php include("header.inc");?>
    
    <div class="main_content">
    
                    <?php include("menunav.inc");?> 
                    
                    
                    
                    
    
    
    
    
      <?php include("leftside.inc");?>
    
    <div class="right_content">            
     <h1> Monthly Sales Report</h1>   
     
<h2>     Select the month<br />

</h2>
<form id="myform" action="monthlysalesreport.php" method="post">
<center>

<table width="228" align="center" cellpadding="2" cellspacing="2" id="rounded-corner">
<thead>
<tr align="center">
        <th width="33%" class="rounded">Month</th>
    <th width="33%" class="rounded-q4">Year</th>
  </tr></thead>
  <tr align="center">
    <td><select name="month" id="month">
      <?php 
	$month = $today['mon'];
	$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	for($i=0;$i<12;$i++)
	{
		if($i==($month-1))
				 {
				echo("<option value=".($i+1)." selected='selected'>".$months[$i]."</option>");	 
				}
				else{
	 echo("<option value=".($i+1).">".$months[$i]."</option>");	}
		}
	?>
    </select></td>
    <td><select name="year" id="year">
      <?php 
	$year = $today['year'];
	for($i=2010;$i<2050;$i++)
			 {
				 if($i==$year)
				 {
					 echo("<option value=".$i." selected='selected'>".$i."</option>");
					 }
					 else{
               echo("<option value=".$i.">".$i."</option>");
					 }
			 }
				?>
    </select></td>
    </tr>
  
  <tr align="center">
    <td colspan="2"><br />      <input type="submit" name="submit" id="submit" value="View Report" /></td>
    </tr>
 
</table>
</center>
<dl class="submit">
                    
     </dl>
</div>    
                    
  </div>   
  </form>
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
<script type="text/javascript">
var frmvalidator = new Validator("myform");
frmvalidator.addValidation("stafftag","dontselect=000","Please specify the sales person");;
</script>