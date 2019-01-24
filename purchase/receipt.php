<!DOCTYPE html>
<!--Hanlin Chen-->
<html>
<head>
<title>Receipt</title>
<meta charset="utf-8" />
<link href="purchase.css"  rel="stylesheet"  type="text/css" />
</head>

<body>

<div  class="receipt">

<h1>Receipt</h1>
<?php 
$FirstName=$_GET["firstname"];
$LastName=$_GET["lastname"];
$City=$_GET["city"];
$state=$_GET["state"];
$Zip=$_GET["zip"];
$Quantity=$_GET["quantity"];
$Size=$_GET["size"];

if($Size=="small"){
	$price=2.00;
}

if($Size=="medium"){
	$price=2.65;
}

if($Size=="large"){
	$price=2.99;
}

date_default_timezone_set('America/Phoenix');
$mydate = date("d/m/Y");
echo    '<b>Purchase Date: '.$mydate.'</b><br>'.
		'<b>Purchase '.'&nbsp;'.$Quantity.'&nbsp;'.$Size.'&nbsp;'.'Item(s) </b><br>'.
        '<b>Total Cost : $'.round($Quantity*$price,2).'</b><br><br>'.
	    '<fieldset><legend><b>Ship to</b></legend><b>'.
		$FirstName.'&nbsp;'.$LastName.'<br>'.
		$City.','.$state.'<br>'.
		$Zip.'</b></fieldset>';
?>
</div>
</body>
</html>