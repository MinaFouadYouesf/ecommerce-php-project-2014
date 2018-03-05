 <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Refresh" content="20;url=http://localhost/ITProject/uptadeorderprocessing.html">
        <link type="text/css" href="css/reset-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/fonts-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/style.css" rel="stylesheet"     />
        <link type="text/css" href="css/product.css" rel="stylesheet"     />
        <link type="text/css" href="css/allproduct.css" rel="stylesheet"     />
        <style>
            table{
                margin: 20px auto;
            }
            td{
                border: brown solid 10px;
            }
        </style>
    </head>
<body>
    <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
    
<?php

include './connection/config.php';
$strSQL  = 'SELECT *FROM orderprocessing' ;

$strConnection =mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

$strResult = mysqli_query($strConnection,$strSQL);
$tab='<table cellspacing="50">';
$tab.='<tr><td >TransactionID</td>  <td >CustomerID</td>  <td >Number</td> <td >Quantity</td> '
        . '<td >datatime</td> <td >Processed</td> <td >Shipped</td> <td >Dateshipped</td> '
        . '<td >TrackingNumber</td>  <td >ShippingCompany</td></tr>';
while($strRow = mysqli_fetch_array($strResult))
{
  	$strnaTransactionID = $strRow['TransactionID'];
	$strcategCustomerID = $strRow['CustomerID'];
        $strProductID = $strRow['ProductID'];
	$strQuantity = $strRow['Quantity'];
	$strdatatime= date($strRow['dateTime']);
	$strProcessed = $strRow['Processed'];
        $strShipped = $strRow['Shipped'];
  	$strDateshipped = $strRow['DateShipped'];
  	$strTrackingNumber = $strRow['TrackingNumber'];
  	$strShippingCompany = $strRow['ShippingCompany'];

	$tab.='<tr> <td >'.$strnaTransactionID.'</td> <td >'.$strcategCustomerID.'</td> <td >'.$strProductID.'</td>  '
                . '<td >'.$strQuantity.'</td> <td >'.$strdatatime.'</td> <td >'.$strProcessed.'</td>'
                . ' <td >'.$strShipped.'</td> <td >'.$strDateshipped.'</td> <td >'.$strTrackingNumber.'</td> '
                . ' <td >'.$strShippingCompany.'</td> </tr>';
		
}

$tab.='</table>';
echo $tab;



?>

</body>
</html>

