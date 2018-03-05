<?php
include './connection/config.php';
$connenction_link=mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

if(!$connenction_link)
{
echo " error in connection".mysql_error();
}

// Select Database
mysql_select_db($config['dbname']);

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$BillingAddress = $_POST['BillingAddress'];
$ShippingAddress = $_POST['ShippingAddress'];
$phone = number_format($_POST['Phone']);
$Email = $_POST['Email'];
$Password = $_POST['Password'];

$select_query = " SELECT * FROM customer ";

$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());

while($row=mysql_fetch_array($result))
{
    if ( $Email == $row['Email'] )
	
	    
    	$check = 1 ;
    
}


if ( $check == 0 )
{

$insert_query= " INSERT into customer 
(FirstName , LastName , BillingAddress , ShippingAddress ,phone, Email ,Password) 
values ( '$FirstName' ,'$LastName','$BillingAddress','$ShippingAddress',$phone ,'$Email' ,'$Password')";


mysql_query($insert_query);
  ?>
  
 <script type="text/JavaScript" language="JavaScript">alert("successful registration "); </script>;
 <?php
  require ("login.html");

}

if ( $check == 1 )
{
  ?>
  
 <script type="text/JavaScript" language="JavaScript">alert("This email is already exist"); </script>;
 <?php
  require ("register.html");

}
mysql_close($connenction_link);



?>
