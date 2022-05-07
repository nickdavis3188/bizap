<?php
	include("dbConnection.php");

function addexpenses()
{
$exptype = $_REQUEST['exptype'];
$amount = $_REQUEST['amount'];
$day = $_REQUEST['day'];
$month = $_REQUEST['month']; 
$year = $_REQUEST['year'];
$description = $_REQUEST['description'];
$salesp = $_REQUEST['stafftag'];
$fulldate = $year."-".$month."-".$day;
$fd = date($fulldate);
$query = "insert into expenses values ('$exptype','$amount','$description','$fulldate','$salesp','$day','$month','$year')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The expense has been successfully added to the database.<br>");
 }
else
 {
 echo ("The expense can not be added at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 

 }

function adddebt()
{
$custtype = $_REQUEST['custtype'];
if($custtype=='newcust')
 {
echo("window.open('mine.php')");
 }
else
 {
 echo ("The product category can not be added at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
}

function addadebt()
{
$customer = $_REQUEST['customer'];
$salesp = $_REQUEST['stafftag']; 
$amount = $_REQUEST['amount'];
$day = $_REQUEST['day'];
$month = $_REQUEST['month']; 
$year = $_REQUEST['year'];
$fulldate = $year."-".$month."-".$day;
$fd = date($fulldate);
$query = "insert into debttable values ('$customer','$amount','$fulldate','$salesp','$day','$month','$year')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The customer's debt has been successfully added to the database.<br>");
$query2 = "update debtsummary set totaldebt=totaldebt+$amount where customer='$customer'";
$results2 = mysql_query($query2);

 }
else
 {
 echo ("The product customer's debt can not be added at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 

 }


function settleadebt()
{
$customer = $_REQUEST['customer'];
$salesp = $_REQUEST['stafftag']; 
$amountowed = $_REQUEST['amountowed'];
$amountpd = $_REQUEST['amountpd'];
$debtbal = $_REQUEST['debtbal'];
$day = $_REQUEST['day'];
$month = $_REQUEST['month']; 
$year = $_REQUEST['year'];
$fulldate = $year."-".$month."-".$day;
$fd = date($fulldate);
$query = "insert into debtpaymenttable values ('$customer','$amountowed','$fulldate','$salesp','$day','$month','$year','$amountpd','$debtbal')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The customer's debt payment has been successfully submitted to the database.<br>");
$query2 = "update debtsummary set totaldebt=totaldebt-$amountpd where customer='$customer'";
$results2 = mysql_query($query2);

 }
else
 {
 echo ("The product customer's debt can not be added at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 

 } 



function addprodcat()
{
$prodcat = $_REQUEST['prodtype'];
$query = "insert into productcat values ('$prodcat')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The product category has been successfully added to the database.<br>");
 }
else
 {
 echo ("The product category can not be added at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
}


function makesale()
{
$stafftag = $_REQUEST['stafftag']; 
$query0 = "select staffincentive from staff where stafftag = '$stafftag'";
$results0 = mysql_query($query0);
$noofrows0 = mysql_affected_rows();
$incentiv = 0;
if($noofrows0>0)
{
	while($row = mysql_fetch_array($results0))
    { 
	$incentiv = $row[0];
	}
	
}
$salet = $_REQUEST['salestype'];
$day = $_REQUEST['day'];
$month = $_REQUEST['month']; 
$year = $_REQUEST['year'];
$fulldate = $year."-".$month."-".$day;
$fd = date($fulldate);
$item1 = $_REQUEST['item1']; 
$price1 = $_REQUEST['price1']; 
$qty1 = (double)($_REQUEST['qty1']);
$total1 = $_REQUEST['total1'];
$item2 = $_REQUEST['item2'];
$price2 = $_REQUEST['price2'];
$qty2 = $_REQUEST['qty2'];
$total2 = $_REQUEST['total2'];
$item3 = $_REQUEST['item3'];
$price3 = $_REQUEST['price3'];
$qty3 = $_REQUEST['qty3'];
$total3 = $_REQUEST['total3']; 
$item4 = $_REQUEST['item4'];
$price4 = $_REQUEST['price4'];
$qty4 = $_REQUEST['qty4'];
$total4 = $_REQUEST['total4'];
$item5 = $_REQUEST['item5'];
$price5 = $_REQUEST['price5'];
$qty5 = $_REQUEST['qty5'];
$total5 = $_REQUEST['total5'];
$item6 = $_REQUEST['item6'];
$price6 = $_REQUEST['price6'];
$qty6 = $_REQUEST['qty6'];
$total6 = $_REQUEST['total6'];
$item7 = $_REQUEST['item7'];
$price7 = $_REQUEST['price7'];
$qty7 = $_REQUEST['qty7'];
$total7  = $_REQUEST['total7'];
$item8 = $_REQUEST['item8'];
$price8 = $_REQUEST['price8'];
$qty8 = $_REQUEST['qty8'];
$total8 = $_REQUEST['total8'];
$item9 = $_REQUEST['item9']; 
$price9 = $_REQUEST['price9'];
$qty9 = $_REQUEST['qty9'];
$total9 = $_REQUEST['total9'];
$item10 = $_REQUEST['item10'];
$price10 = $_REQUEST['price10'];
$qty10 = $_REQUEST['qty10'];
$total10 = $_REQUEST['total10'];
$sumtotal = $_REQUEST['sumtotal'];
$discount = $_REQUEST['discount']; 
$grandtotal = $_REQUEST['grandtotal'];
$staffincentive = (float)(($incentiv/100)*$grandtotal);
$salesid = $_REQUEST['salesid'];
$paytype = $_REQUEST['paytype'];


$query = "insert into sales(day,month,year,stafftag,item1,price1,qty1,total1,item2,price2,qty2,total2,item3,price3,qty3,total3,item4,price4,qty4,total4,item5,price5,qty5,total5,item6,price6,qty6,total6,item7,price7,qty7,total7,item8,price8,qty8,total8,item9,price9,qty9,total9,item10,price10,qty10,total10,sumtotal,discount,grandtotal,salesid,fulldate,paytype) values('$day','$month','$year','$stafftag','$item1','$price1',$qty1,'$total1','$item2','$price2','$qty2','$total2','$item3','$price3','$qty3','$total3','$item4','$price4','$qty4','$total4','$item5','$price5','$qty5','$total5','$item6','$price6','$qty6','$total6','$item7','$price7','$qty7','$total7','$item8','$price8','$qty8','$total8','$item9','$price9','$qty9','$total9','$item10','$price10','$qty10','$total10','$sumtotal','$discount','$grandtotal','$salesid','$fd','$paytype')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
	$query2 = "insert into dailyincentive values('$stafftag','$staffincentive','$fd')"; 
	$results2 = mysql_query($query2);
	
	$queryg = "update incentives set totalincentive = totalincentive+$staffincentive where stafftag='$stafftag'";
	mysql_query($queryg);
	
	$queryb = "update salescounter set counter=counter+1";
	mysql_query($queryb);
	
	$queryz = "select item1,qty1,price1,total1,item2,qty2,price2,total2,item3,qty3,price3,total3,item4,qty4,price4,total4,item5,qty5,price5,total5,item6,qty6,price6,total6,item7,qty7,price7,total7,item8,qty8,price8,total8,item9,qty9,price9,total9,item10,qty10,price10,total10,sumtotal,discount,grandtotal,fulldate,stafftag,paytype from sales where salesid = '$salesid'";
	$profit = 0;
		$result = mysql_query($queryz);
	$noofrows = mysql_affected_rows();
	if($noofrows>0)
	{ 	
	while($row = mysql_fetch_array($result))
    { 
		if($row[0]!="" || $row[0]!=NULL)
		{
		$qtyz = $row[1];
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[0]'";
		mysql_query($query4);			
		$query44 = "select profit from products where pname='$row[0]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[1];			
		}			
		$query5 = "insert into salesreport values('$row[0]','$row[1]','$row[3]','$row[43]',$profit)";
		mysql_query($query5);
		}		
		
		if($row[4]!="" || $row[4]!=NULL)
		{
		$qtyz = $row[5];
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[4]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[4]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[5];	
		}				
		$query5 = "insert into salesreport values('$row[4]','$row[5]','$row[7]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[8]!="" || $row[8]!=NULL)
		{
		$qtyz = ($row[9]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[8]'";
		mysql_query($query4);
		$query44 = "select profit from products where pname='$row[8]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[9];	
		}			
		$query5 = "insert into salesreport values('$row[8]','$row[9]','$row[11]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[12]!="" || $row[12]!=NULL)
		{
		$qtyz = ($row[13]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[12]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[12]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[13];	
		}		
		$query5 = "insert into salesreport values('$row[12]','$row[13]','$row[15]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[16]!="" || $row[16]!=NULL)
		{
		$qtyz = ($row[17]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[16]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[16]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[17];	
		}		
		$query5 = "insert into salesreport values('$row[16]','$row[17]','$row[19]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[20]!="" || $row[20]!=NULL)
		{
		$qtyz = ($row[21]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[20]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[20]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[21];	
		}		
		$query5 = "insert into salesreport values('$row[20]','$row[21]','$row[23]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[24]!="" || $row[24]!=NULL)
		{
		$qtyz = ($row[25]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[24]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[24]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[25];	
		}		
		$query5 = "insert into salesreport values('$row[24]','$row[25]','$row[27]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[28]!="" || $row[28]!=NULL)
		{
		$qtyz = ($row[29]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[28]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[28]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[29];	
		}		
		$query5 = "insert into salesreport values('$row[28]','$row[29]','$row[31]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[32]!="" || $row[32]!=NULL)
		{
		$qtyz = ($row[33]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[32]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[32]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[33];	
		}		
		$query5 = "insert into salesreport values('$row[32]','$row[33]','$row[35]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		
		if($row[36]!="" || $row[36]!=NULL)
		{
		$qtyz = ($row[37]);
		$query4 = "update products set curlevel=curlevel-$qtyz where pname='$row[36]'";
		mysql_query($query4);	
		$query44 = "select profit from products where pname='$row[36]'";
		$result44 = mysql_query($query44);	
		while($row44=mysql_fetch_array($result44))
		{
			$profit = $row44[0]*$row[37];	
		}		
		$query5 = "insert into salesreport values('$row[36]','$row[37]','$row[39]','$row[43]',$profit)";
		mysql_query($query5);		
		}
		else
		{}
	}}
		header("Location: recordsale2.php?salestype=$salet");
				exit;
	
}
else{
	 echo("Unsuccessful ".mysql_error());
}
}

function createuser()
{
 $fname = $_REQUEST['fname'];
 $lname = $_REQUEST['lname'];
 $uname = $_REQUEST['uname'];
 $pword = $_REQUEST['pword'];
 $privilege = $_REQUEST['privilege'];
 
 $query = "insert into users (fname,lname,uname,pword,privilege)values('$fname','$lname','$uname','$pword','$privilege')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The system user ".$fname." ".$lname. "'s account has been successfully created. <br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER').">Add More Users...</a>");
 }
else
 {
 echo ("The user can not be added at the moment. Try again with a different username <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 }
 }
 
 function deleteuser()
 {
	$duser = $_REQUEST['duser'];
	$query = "delete from users where fname ='"."$duser"."'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if ($noofrows==1)
{
  echo ("The user account has been successfully deleted...<br>");
 
 }
 else
 {
	
	 echo ("The user account can not be deleted at this moment, please try again later...<br>");
	 echo ("<br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
	 }
 }
 
 function addincentive()
 {
	 
	$incentive = $_REQUEST['incentive'];
 
 $query = "update incentive set incntv = '$incentive'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The staff incentive has been successfully modified.<br>");
 }
else
 {
 echo ("The staff incentive can not be modified at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
 }
	 
	 function payincentive()
 {
	 
	$incentive = $_REQUEST['incentive'];
 
 $query = "insert into incentive values('$incentive')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The staff incentive has been successfully modified.<br>");
 }
else
 {
 echo ("The staff incentive can not be modified at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
 }
	 function addstaff()
 {
	$fname = $_REQUEST['fname'];
 $lname = $_REQUEST['lname'];
  $sex = $_REQUEST['sex'];
 $address = $_REQUEST['address'];
 $phone = $_REQUEST['phone'];
 $dept = $_REQUEST['dept'];
 $stafftag = $_REQUEST['stafftag'];
 $staffincentive = $_REQUEST['staffincentive'];

 $query = "insert into staff(fname,lname,sex,address,phone,dept,stafftag,staffincentive)values('$fname','$lname','$sex','$address','$phone','$dept','$stafftag','$staffincentive')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The staff ".$fname." ".$lname. "'s record has been successfully submitted. <br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER').">Add More Personnel Record...</a>");
$query2 = "insert into incentives(stafftag,totalincentive)values('$stafftag',0)";
mysql_query($query2);
 }
else
 {
 echo ("The staff record can not be added at the moment. Try again with a different Sales Tag  <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
	 
	 
	 }
	 
	 
 function modifystaff()
 {
	$oldstafftag = $_REQUEST['oldstafftag'];
	$fname = $_REQUEST['fname'];
 $lname = $_REQUEST['lname'];
  $sex = $_REQUEST['sex'];
 $address = $_REQUEST['address'];
 $phone = $_REQUEST['phone'];
 $dept = $_REQUEST['dept'];
 $stafftag = $_REQUEST['stafftag'];
 $staffincentive = $_REQUEST['staffincentive'];

 $query = "update staff set fname='$fname' ,lname='$lname',sex='$sex',address='$address',phone='$phone',dept='$dept',stafftag='$stafftag',staffincentive='$staffincentive' where stafftag='$oldstafftag'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The staff ".$fname." ".$lname. "'s record has been successfully modified. <br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER').">Modify Another Personnel Record...</a>");
$query2 = "update incentives set stafftag='$stafftag' where stafftag='$oldstafftag'";
mysql_query($query2);
 }
else
 {
 echo ("The staff record can not be modified at the moment. Try again later  <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
	 
	 
	 }
	 
	function deletestaff()
 {
	$stafftag = $_REQUEST['stafftag'];
	$query = "delete from staff where stafftag ='"."$stafftag"."'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if ($noofrows==1)
{
  echo ("The Staff record has been successfully deleted...<br>");
 
 }
 else
 {
	
	 echo ("The Staff record can not be deleted at this moment, please try again later...<br>");
	 echo ("<br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
	 }
 }
 
	function addproduct()
 {
	$ptype = $_REQUEST['prodtype'];
 $pname = $_REQUEST['pname'];
  $price = (int)($_REQUEST['price']);
 $curlevel = (int)($_REQUEST['curlevel']);
 $minlevel = (int)($_REQUEST['minlevel']);
 $costprice = (int)($_REQUEST['costprice']);
 $profit = (int)($_REQUEST['profit']);
 
 $query = "insert into products(ptype,pname,price,curlevel,minlevel,costprice,profit)values('$ptype','$pname','$price','$curlevel','$minlevel','$costprice','$profit')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The product ".$pname." has been successfully added to the store. <br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER').">Add More Products...</a>");

 }
else
 {
 echo ("The product can not be added at the moment. Try again with a different product name<br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 	 
	 }
	 
	 function modifyproduct()
 {
	$ptype = $_REQUEST['prodtype'];
 $pname = $_REQUEST['pname'];
  $price = (int)($_REQUEST['price']);
 $curlevel = (int)($_REQUEST['curlevel']);
 $minlevel = (int)($_REQUEST['minlevel']);
 $costprice = (int)($_REQUEST['costprice']);
 $profit = (int)($_REQUEST['profit']);
 
 $query = "update products set ptype='$ptype',pname='$pname',price='$price',curlevel='$curlevel',minlevel='$minlevel',costprice='$costprice',profit='$profit' where pname='$pname'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The product ".$pname." has been successfully modified. <br>");


 }
else
 {
 echo ("The product can not be modified at the moment. Try again with a different product name<br>".mysql_error());

 } 	 
	 }
function restock()
{
	 
	$pname = $_REQUEST['pname'];
	$addqty = (int)($_REQUEST['addqty']);
 
 $query = "update products set curlevel = (curlevel+$addqty) where pname = '$pname'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The product has been successfully re-stocked.<br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Re-stock more products</a>");
 }
else
 {
 echo ("The product can not be re-stocked at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
 }

function removeproduct()
 {
	$pname = $_REQUEST['pname'];
	if($pname=="" || $pname==NULL)
	{
	
	 echo ("No product was selected. Please go back and select the product to delete...<br>");
	 echo ("<br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
	}
	else{
	$query = "delete from products where pname ='"."$pname"."'";
	$results = mysql_query($query);
	$noofrows = mysql_affected_rows();
	if ($noofrows==1)
	{
  	echo ("The product has been successfully deleted...<br>");
 	}
 	else
 	{
	 echo ("The product can not be deleted at this moment, please try again later...<br>");
	 echo ("<br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
	}
}
 } 	 
	 
function changepassword()
 {
	 
	$uname = $_REQUEST['uname'];
	$newpword = $_REQUEST['newpword'];
 
 $query = "update users set pword = '$newpword' where uname = '$uname'";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("Your new password is ".$newpword."<br>");
 }
else
 {
 echo ("Your password can not be reset at the moment. Try again later <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
 }	 
	
	
 function registermember()
 {
	$fullname = $_REQUEST['fullname'];
 $phone = $_REQUEST['phone'];
  $altphone = $_REQUEST['altphone'];
 $address = $_REQUEST['address'];
 $email = $_REQUEST['email'];
 $bday = $_REQUEST['day'];
  $bmonth = $_REQUEST['month'];
 $query = "insert into members(fullname,phone,altphone,address,email,birthmonth,birthday)values('$fullname','$phone','$altphone','$address','$email','$bmonth','$bday')";
$results = mysql_query($query);
$noofrows = mysql_affected_rows();
if($noofrows==1)
 {
echo ("The member ".$fullname." has successfully registered. <br>");
echo ("<br><br><a href=".getenv('HTTP_REFERER').">Add More Members...</a>");
$query2 = "insert into debtsummary(customer,totaldebt) values ('$fullname','0')";
$results2 = mysql_query($query2);
 }
else
 {
 echo ("The member registration was unsuccessful. Try again with a different name <br>".mysql_error());
echo ("<br><br><a href=".getenv('HTTP_REFERER')." >Go Back</a>");
 } 
 }
	 
	 
	 	
 ?>   
