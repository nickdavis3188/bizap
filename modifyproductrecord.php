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

<script language="javascript">
function calcprofit()
{

var costprice = parseInt(document.getElementById("costprice").value);
var price = parseInt(document.getElementById("price").value);
var prof = price - costprice;
document.getElementById("profit").value= prof;


}

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
   
     <h1>Modify Product Record</h1>   
     
<h2>
 
    Edit Product Info</h2>
      <?php 
	$pname = $_REQUEST['pname'];
	$query = "select * from products where pname = '$pname'";
    $results = mysql_query($query);
	  $noofrows = mysql_num_rows($results);	 
	  if ($noofrows == 1)
	  {
	  	while($row = mysql_fetch_array($results))
	  	{?>
         <div class="form">
           <form action="confirmation.php" method="post" class="myform" name="myform" id="myform">
             
             <fieldset>
               <dl>
                 <dt>Product Type:</dt>
                 <dd>
                   <label for="prodtype"></label>
                   <input type="text" name="prodtype" value="<?php echo($row[0]);?>" readonly="readonly" id="prodtype" />
                 </dd>
               </dl>
               <dl>
                 <dt>
                 <label for="email">Product Name:</label></dt>
                 <dd><input type="text" name="pname" id="pname" size="30" value="<?php echo($row[1]);?>"/></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Cost Price:</label></dt>
                 <dd><input type="text" name="costprice" id="costprice" onfocus="calcprofit()" onfocusout="calcprofit()"  size="30" value="<?php echo($row[6]);?>"/></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Selling Price:</label></dt>
                 <dd><input type="text" name="price" id="price" size="30" onfocus="calcprofit()" onfocusout="calcprofit()"  value="<?php echo($row[2]);?>"/></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Profit:</label></dt>
                 <dd><input type="text" name="profit" value="<?php echo($row[5]);?>" id="profit" size="30" readonly="readonly"/></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Current Level:</label></dt>
                 <dd><input type="text" name="curlevel" id="curlevel" size="30" value="<?php echo($row[3]);?>"/></dd>
               </dl>
               <dl>
                 <dt>
                   <label for="email">Minimum Level:</label></dt>
                 <dd><input type="text" name="minlevel" id="minlevel" size="30" value="<?php echo($row[4]);?>" /></dd>
               </dl>
               
              
                <dl>
                  <table width="100%" border="0" cellspacing="10" cellpadding="10">
                    <tr>
                      <td align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
                    </tr>
                  </table>
                </dl>
</fieldset>
             
           </form>
           	<?php 
		}
	  }
	else
	{
	 echo ("Record does not exist, please try again... <a href=".getenv('HTTP_REFERER')." >Go Back</a>");
	}		
	?>
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
frmvalidator.addValidation("fname","req","Please enter the First Name");
frmvalidator.addValidation("lname","req","Please enter the Last Name");
frmvalidator.addValidation("address","req","Please enter the Address");
frmvalidator.addValidation("phone","req","Please enter the Phone Number");
frmvalidator.addValidation("dept","req","Please enter the Department");
frmvalidator.addValidation("stafftag","req","Please enter the Staff Tag Name");
frmvalidator.addValidation("staffincentive","req","Please enter the Staff Incentive");
</script>