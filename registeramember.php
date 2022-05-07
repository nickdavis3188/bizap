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
     <h1>Add a new Customer</h1>   
     
<h2>
 
    Enter Member's Info</h2>
     
         <div class="form">
           <form action="confirmation.php" method="post" class="niceform" name="myform">
             
             <fieldset>
               <dl>
                 <dt>
                   <label for="email">Full Name:</label></dt>
                 <dd><input type="text" name="fullname" id="" size="54" /></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Phone Number:</label></dt>
                 <dd><input type="text" name="phone" id="" size="54" /></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Alternate Phone Number:</label></dt>
                 <dd><input type="text" name="altphone" id="" size="54" /></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="password">Contact Address:</label></dt>
                 <dd><input type="text" name="address" id="" size="54" /></dd>
               </dl>
               
               <dl>
                 <dt>
                   <label for="password">Email Address:</label></dt>
                 <dd><input type="text" name="email" id="" size="54" /></dd>
               </dl>
               
               <dl>
                 <dt>
                   <label for="password">Birthday:</label></dt>
                 <dd><span class="rounded">
                   </span>
                   <table width="100" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td><span class="rounded">
                         <select name="month" id="month">
                           <?php 
	$month = $today['mon'];
	$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
	for($i=0;$i<12;$i++)
	{
		if($i==($month-1))
				 {
				echo("<option value=".($months[$i])." selected='selected'>".$months[$i]."</option>");	 
				}
				else{
	 echo("<option value=".($months[$i]).">".$months[$i]."</option>");	}
		}
	?>
                         </select>
                       </span></td>
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
                     </tr>
                   </table>
                 </dd>
               </dl>
               
                <dl>
                  <table width="100%" border="0" cellspacing="10" cellpadding="10">
                    <tr>
                      <td align="center"><input type="submit" name="submit" id="submit" value="Register" /></td>
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
frmvalidator.addValidation("fullname","req","Please enter the Full Name");
frmvalidator.addValidation("phone","req","Please enter the Phone number");
frmvalidator.addValidation("phone","num","Please enter the correct phone number");
frmvalidator.addValidation("email","email","Please enter the correct email address");
</script>