<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body onload="window.print()">
<?php
$host = "localhost";
$user = "root";
$db = "bizap";
$conn = mysql_connect($host,$user,"")or die("Problems :".mysql_error());
$dbselect = mysql_select_db($db,$conn) or die("Error selecting DB: ".mysql_error());
$queryo = "select counter from salescounter";
$resultso = mysql_query($queryo);
$noofrowso = mysql_affected_rows();
$scounter = 0;
	if($noofrowso>0)
	{
	while($row = mysql_fetch_array($resultso))
    { 
	$scounter = $row[0];	
	}
	} 


?>
  <div style="position:absolute; left: 0px; top: 0px; width: 626px; height: 369px;">
  <table width="626" height="500
 " border="0" cellpadding="0" cellspacing="0" style="font:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:13px">
    <tr>
      <td width="626" height="48" align="center"><br />
        <font size="+4">THE LOUNGE</font><br />
        <font size="+2">@THE AUTOGRAPH</font><br /><br />
30/33 Sani Abacha Road, GRA Phase 3, Port Harcourt, R/S.<br />
Tel: 07086151272, 08032721362
<br />
.................................................. <br /></td>
    </tr>
    <tr>
      <td height="12" align="left">
Receipt No:<?php echo($scounter);?></td>
    </tr>
    <tr>
      <td height="47" align="center" valign="top"><table width="100%" height="39" border="0" cellpadding="0" cellspacing="0" style="font-size:11px">
        <tr>
        <td width="40%" height="39" align="left">ITEM</td>
        <td width="10%" align="left">QTY</td>
          <td width="26%" align="center">UNIT <BR />PRICE</td>
          
          <td width="24%">TOTAL</td>
        </tr>
       <?php 
		
		$query ="select item1,qty1,price1,total1,item2,qty2,price2,total2,item3,qty3,price3,total3,item4,qty4,price4,total4,item5,qty5,price5,total5,item6,qty6,price6,total6,item7,qty7,price7,total7,item8,qty8,price8,total8,item9,qty9,price9,total9,item10,qty10,price10,total10,sumtotal,discount,grandtotal,fulldate,stafftag,paytype from sales where salesid = '$scounter'";
	$result = mysql_query($query);
	$noofrows = mysql_num_rows();
	if($noofrows>0)
{
 	
	while($row = mysql_fetch_array($result))
    { 
		if($row[0]!="" || $row[0]!=NULL)
		{
			echo("<tr><td>".$row[0]."</td><td>".$row[1]."</td><td align='center'>".$row[2]."</td><td>".$row[3]."</td></tr>");
			}
			if($row[4]!="" || $row[4]!=NULL)
			{	
	echo("<tr><td>".$row[4]."</td><td>".$row[5]."</td><td align='center'>".$row[6]."</td><td>".$row[7]."</td></tr>");
			}
		 if($row[8]!="" || $row[8]!=NULL)
			{
	echo("<tr><td>".$row[8]."</td><td>".$row[9]."</td><td align='center'>".$row[10]."</td><td>".$row[11]."</td></tr>");
			}
		 if($row[12]!="" || $row[12]!=NULL)
			{
	echo("<tr><td>".$row[12]."</td><td>".$row[13]."</td><td align='center'>".$row[14]."</td><td>".$row[15]."</td></tr>");
			}
		 if($row[16]!="" || $row[16]!=NULL)
			{
	echo("<tr><td>".$row[16]."</td><td>".$row[17]."</td><td align='center'>".$row[18]."</td><td>".$row[19]."</td></tr>");
			}
			if($row[20]!="" || $row[20]!=NULL)
			{
	echo("<tr><td>".$row[20]."</td><td>".$row[21]."</td><td align='center'>".$row[22]."</td><td>".$row[23]."</td></tr>");
			}
			if($row[24]!="" || $row[24]!=NULL)
			{
	echo("<tr><td>".$row[24]."</td><td>".$row[25]."</td><td align='center'>".$row[26]."</td><td>".$row[27]."</td></tr>");
			}
		if($row[28]!="" || $row[28]!=NULL)
			{
	echo("<tr><td>".$row[28]."</td><td>".$row[29]."</td><td align='center'>".$row[30]."</td><td>".$row[31]."</td></tr>");
			}
		 if($row[32]!="" || $row[32]!=NULL)
			{
	echo("<tr><td>".$row[32]."</td><td>".$row[33]."</td><td align='center'>".$row[34]."</td><td>".$row[35]."</td></tr>");
			}
			if($row[36]!="" || $row[36]!=NULL)
			{
	echo("<tr><td>".$row[36]."</td><td>".$row[37]."</td><td align='center'>".$row[38]."</td><td>".$row[39]."</td></tr>");	
			}
			else
			{
				echo("<tr><td></td><td></td><td></td><td></td></tr>");
				}
				echo("<tr><td colspan='4'><center>
            ..............................................................................................
      </center></td></tr>");
				
				
				
	echo("<tr><td height='20' colspan='3' align='right'>SUM TOTAL&nbsp;&nbsp;&nbsp;</td><td>&nbsp;".$row[40]."</td></tr>");
	echo("<tr><tr><td height='20' colspan='3' align='right'>DISCOUNT&nbsp;&nbsp;&nbsp;</td><td>&nbsp;%".$row[41]."</td></tr>");
	echo("<tr><td height='20' colspan='3' align='right'>GRAND TOTAL&nbsp;&nbsp;&nbsp;</td><td>&nbsp; #".$row[42].".00</td></tr>");
	echo("<tr><td colspan='4'><center>
            ..............................................................................................
      </center></td></tr>");
	echo("<tr><td><br>Sales Person: ".$row[44]."</td><td></td><td>Payment Type: ".$row[45]."</td><td colspan='1' align='left'>Date: ".$row[43]."</td></tr>");
	}
}?>
      </table></td>
    </tr>
    <tr>
      <td height="56" align="center" valign="top"><span style="font-size:10px">...........................................................................................................<br />
      </span></td>
</tr> </table></div>
</body></html>