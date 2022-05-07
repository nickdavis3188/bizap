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
	
	var tot1 = parseFloat(document.getElementById(totalobj1).value);
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
	var price = parseFloat(document.getElementById(priceobj).value);
	var qty =   parseFloat(document.getElementById(qtyobj).value);
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
     <h1>Record Sale</h1>   
     
<h2>     Specify sale details<br />

</h2>
<form id="myform" action="confirmation.php" method="post">
<center>
<table id="rounded-corner" align="center" cellpadding="2" cellspacing="2"><thead><tr>
<th class="rounded-company">Sales Type </th></tr></thead>
<tr><td>
<p>
  
  <select name="salestype" id="salestype">
<option value="retail">Retail</option>
    <option value="wholesale">Wholesale</option>
    
  </select>
</p>
</td></tr></table>
<table width="197" align="center" cellpadding="2" cellspacing="2" id="rounded-corner">
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
 
</table>
</center>

<table width="600" id="rounded-corner" summary="">
    <thead>
    	<tr>
        	<th width="40" class="rounded-company" scope="col">S/N</th>
            <th width="63" class="rounded" scope="col">Item</th>
            <th width="150" class="rounded" scope="col">Price</th>
            <th width="40" class="rounded" scope="col">Qty</th>
            <th width="158" class="rounded" scope="col">Total</th>
            
            </tr>
    </thead>
        <tfoot>
    	<tr>
    	  <td height="91" colspan="5" align="right" class="rounded-foot-left"><br />
    	    Sum Total:
    	    <input type="text" name="sumtotal" id="sumtotal" readonly="readonly" value="0"  /></td>
  	  </tr>
    	<tr>
    	  <td colspan="4" align="right" class="rounded-foot-left">Payment Type
    	    
    	    <select name="paytype" id="paytype">
    	      <option value="Cash" selected="selected">Cash</option>
    	      <option value="Pos">POS</option>
    	      <option value="Transfer">Transfer</option>
  	        </select></td>
    	  <td align="right" class="rounded-foot-left">Discount(%)
    	    <select name="discount" id="discount" onchange="grandtotalcalc()">
            <option value="0" selected="selected">0</option>
            <?php
			for($i=1;$i<51;$i++)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
  	      </select></td>
  	    </tr>
    	<tr>
        	<td colspan="4" align="left" class="rounded-foot-left">Sales Id
            <?php
			$queryo = "select counter from salescounter";
			$resultso = mysql_query($queryo);
		$noofrowso = mysql_affected_rows();
			$scounter = 0;
	if($noofrowso>0)
	{
	while($row = mysql_fetch_array($resultso))
    { 
	$scounter = $row[0]+1;
	
	}
	}
	?>
       	    <input name="salesid" type="text" id="salesid" readonly="readonly" value="<?php echo($scounter);?>"/></td>
        	<td align="right" class="rounded-foot-left">GRAND TOTAL:
            <input type="text" name="grandtotal" id="grandtotal" readonly="readonly" value="0"  /></td>
        	</tr>
    </tfoot>
    <tbody>
    	<tr>
        	<td>1.</td>
            <td><select size="1" name="item1" id="item1" onchange="getitemcost('item1','coder.php?item=','price1','qty1','total1','total2','total3','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel>0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price1" type="text" id="price1" size="8" readonly="readonly"   />
            .00</td>
            <td align="center"><select name="qty1" id="qty1" onchange="settotal('price1','qty1','total1','total2','total3','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total1" type="text" id="total1" size="8" readonly="readonly" value="0" />
              .00</td>

         
            </tr>  
              
        <!--########-->
        <tr>
        	<td>2.</td>
            <td><select size="1" name="item2" id="item2" onchange="getitemcost('item2','coder.php?item=','price2','qty2','total2','total1','total3','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price2" type="text" id="price2" size="8" readonly="readonly"   />
            .00</td>
            <td align="center"><select name="qty2" id="qty2" onchange="settotal('price2','qty2','total2','total1','total3','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
					
						 
				?>
            </select></td>
            <td align="center"><input name="total2" type="text" id="total2" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
  <tr>
        	<td>3.</td>
            <td><select size="1" name="item3" id="item3" onchange="getitemcost('item3','coder.php?item=','price3','qty3','total3','total2','total1','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price3" type="text" id="price3" size="8" readonly="readonly"   />
            .00</td>
            <td align="center"><select name="qty3" id="qty3" onchange="settotal('price3','qty3','total3','total2','total1','total4','total5','total6','total7','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total3" type="text" id="total3" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
        <tr>
        	<td>4.</td>
            <td><select size="1" name="item4" id="item4" onchange="getitemcost('item4','coder.php?item=','price4','qty4','total4','total2','total3','total1','total5','total6','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price4" type="text" id="price4" size="8" readonly="readonly"    />
            .00</td>
            <td align="center"><select name="qty4" id="qty4" onchange="settotal('price4','qty4','total4','total2','total3','total1','total5','total6','total7','total8','total9','total10','sumtotal')">
           <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total4" type="text" id="total4" size="8" readonly="readonly" value="0"   />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->

     <tr>
        	<td>5.</td>
            <td><select size="1" name="item5" id="item5" onchange="getitemcost('item5','coder.php?item=','price5','qty5','total5','total2','total3','total4','total1','total6','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price5" type="text" id="price5" size="8" readonly="readonly"    />
            .00</td>
            <td align="center"><select name="qty5" id="qty5" onchange="settotal('price5','qty5','total5','total2','total3','total4','total1','total6','total7','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total5" type="text" id="total5" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
   <tr>
        	<td>6.</td>
            <td><select size="1" name="item6" id="item6" onchange="getitemcost('item6','coder.php?item=','price6','qty6','total6','total2','total3','total4','total5','total1','total7','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price6" type="text" id="price6" size="8" readonly="readonly"   />            
              .00</td>
            <td align="center"><select name="qty6" id="qty6" onchange="settotal('price6','qty6','total6','total2','total3','total4','total5','total1','total7','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total6" type="text" id="total6" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
<tr>
        	<td>7.</td>
            <td><select size="1" name="item7" id="item7" onchange="getitemcost('item7','coder.php?item=','price7','qty7','total7','total2','total3','total4','total5','total6','total1','total8','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price7" type="text" id="price7" size="8" readonly="readonly"   />
            .00</td>
            <td align="center"><select name="qty7" id="qty7" onchange="settotal('price7','qty7','total7','total2','total3','total4','total5','total6','total1','total8','total9','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total7" type="text" id="total7" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
<tr>
        	<td>8.</td>
            <td><select size="1" name="item8" id="item8" onchange="getitemcost('item8','coder.php?item=','price8','qty8','total8','total2','total3','total4','total5','total6','total7','total1','total9','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price8" type="text" id="price8" size="8" readonly="readonly"     />
            .00</td>
            <td align="center"><select name="qty8" id="qty8" onchange="settotal('price8','qty8','total8','total2','total3','total4','total5','total6','total7','total1','total9','total10','sumtotal')">
         <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total8" type="text" id="total8" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
<tr>
        	<td>9.</td>
            <td><select size="1" name="item9" id="item9" onchange="getitemcost('item9','coder.php?item=','price9','qty9','total9','total2','total3','total4','total5','total6','total7','total8','total1','total10','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price9" type="text" id="price9" size="8" readonly="readonly" value="" />
            .00</td>
            <td align="center"><select name="qty9" id="qty9" onchange="settotal('price9','qty9','total9','total2','total3','total4','total5','total6','total7','total8','total1','total10','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total9" type="text" id="total9" size="8" readonly="readonly" value="0"  />
              .00</td>

         
            </tr>
        <!--@@@@@@@-->
<tr>
        	<td>10.</td>
            <td><select size="1" name="item10" id="item10" onchange="getitemcost('item10','coder.php?item=','price10','qty10','total10','total2','total3','total4','total5','total6','total7','total8','total9','total1','sumtotal')">
             <option value="" selected="selected">-Empty-</option>
  <?php
  $query = "SELECT pname FROM products where curlevel > 0 order by pname";
$results = mysql_query($query);
$noofrows = mysql_num_rows($results);
while($row=mysql_fetch_array($results))
    { 
                    echo("<option value='".$row[0]."'>".$row[0]."</option>");
                    
	}

?>
    </select></td>
            <td align="center"><input name="price10" type="text" id="price10" size="8" readonly="readonly" value=""   />
            .00</td>
            <td align="center"><select name="qty10" id="qty10" onchange="settotal('price10','qty10','total10','total2','total3','total4','total5','total6','total7','total8','total9','total1','sumtotal')">
            <option value="0" selected="selected">0</option>
         
            <?php
			for($i=1;$i<40;$i=$i+1)
			 	{
				 echo("<option value=".$i.">".$i."</option>");	 
				}
						 
				?>
            </select></td>
            <td align="center"><input name="total10" type="text" id="total10" size="8" readonly="readonly" value='0'/>
              .00</td>

         
            </tr>
        <!--@@@@@@@-->

  </tbody>
</table>
    
     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Submit" />
     </dl>
  
  </form>
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
<script type="text/javascript">
var frmvalidator = new Validator("myform");
frmvalidator.addValidation("stafftag","dontselect=000","Please specify the sales person");;
</script>