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


<script language="javascript">
function valinput()
{
if(isNaN(document.getElementById("amount").value))
{
	alert("Amount must be a numeric value");
	return false;
	}
	else{
		return true;
		}
}
</script>

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
     <h1>Add Debt</h1>   
     
<h2>
 
    Add New Debt</h2>
     
         <div class="form">
           <form action="confirmation.php" method="post" class="myform" name="myform" id="myform" onsubmit="return valinput()">
             
             <fieldset>
               <dl>
                 <dt>Customer:</dt>
                 <dd><select size="1" name="customer" id="customer">
                 <option value="000" selected="selected">-Select Customer-</option>
  <?php
  $query = "SELECT fullname FROM members order by fullname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Amount:</label></dt>
                 <dd><input type="text" name="amount" id="amount" value="0" size="30" /></dd>
               </dl>
               <dl><dt>
             <label for="email">Date of Transaction:</label></dt><dd>
              <table width="197" align="left" cellpadding="2" cellspacing="2" id="rounded-corner">
<thead>
<tr align="center">
    <th width="33%" class="rounded-company">Day</th>
    <th width="33%" class="rounded">Month</th>
    <th width="33%" class="rounded-q4">Year</th>
  </tr></thead>
  <tr align="center">
    <td><select name="day" id="day">
                <?php for($i=1;$i<32;$i++)
			 	{
				 $day = $today['mday'];
				 if($i==$day)
				 {
				echo("<option value=".$i." selected='selected'>".$day."</option>");	 
				}
				else{
               echo("<option value=".$i.">".$i."</option>");
				}
			 }
				?>
              </select></td>
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
    <td> <select name="year" id="year">
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
    <td colspan="3"><b>Sales Person</b>
      <select size="1" name="stafftag" id="stafftag">
       <option value="000" selected="selected">-Select-</option>
  <?php
  $query = "SELECT stafftag FROM staff order by stafftag";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
    </tr>
 
</table></dd></dl>
               <dl>
                  <table width="100%" border="0" cellspacing="10" cellpadding="10">
                    <tr>
                      <td align="center"><input type="submit" name="submit" id="submit" value="Record Debt" /></td>
                    </tr>
                  </table>
               </dl>
             </fieldset>
             
           </form>
        </div>  
      
     
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

<script type="text/javascript">
var frmvalidator = new Validator("myform");
frmvalidator.addValidation("amount","req","Please enter the quantity");
frmvalidator.addValidation("amount","num","Amount must be a numeric value");
frmvalidator.addValidation("amount","greaterthan=0","Amount must be greater than 0");
frmvalidator.addValidation("stafftag","dontselect=000","Please specify the sales person");
frmvalidator.addValidation("customer","dontselect=000","Please specify the Customer");
</script>

</script>