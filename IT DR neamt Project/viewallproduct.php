
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Refresh" content="30;url=http://localhost/ITProject/storagepageadmin.php" >
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
$strSQL  = 'SELECT *FROM product ' ;

$strConnection =mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

$strResult = mysqli_query($strConnection,$strSQL);
$tab='<table cellspacing="50">';
$tab.='<tr><td >ID</td>  <td >Name</td> <td >Category</td> <td >Sub-Category</td> <td >Price</td> <td >Quantity</td> <td >Description</td> </tr>';
while($strRow = mysqli_fetch_array($strResult))
{
  	$strname = $strRow['ItemName'];
	$strcategory = $strRow['Category'];
        $strDescription = $strRow['ItemDescription'];
	$strQuantity = $strRow['QuantityInStock'];
	$strPrice = $strRow['Price'];
	$strSub = $strRow['SubCategory'];
	$strID = $strRow['ProductID'];
	$tab.='<tr> <td >'.$strID.'</td> <td >'.$strname.'</td> <td >'.$strcategory.'</td> <td >'.$strSub.'</td> <td >'.$strPrice.'</td> <td >'.$strQuantity.'</td> <td >'.$strDescription.'</td> </tr>';
		
}

$tab.='</table>';
echo $tab;




?>

</body>
</html>>







   
                
