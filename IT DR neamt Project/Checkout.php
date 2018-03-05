<?php

$CID = $_POST["CustomerID"];

$con = mysql_connect("localhost","root","","shopping"); 
 if (!$con) {
  die('Could not connect: ' . mysql_error());
 }
 mysql_select_db("shopping");


$result = mysql_query("SELECT * FROM customer");


	while($row = mysql_fetch_array($result)){
	 
	   if($CID==$row['CustomerID']){



                  echo "that customer is exist in database";
echo "</br>";
 echo "==========================================";
                
                  echo "<br>";

                  echo "Billing Address  : ";
                 echo $row['BillingAddress'];
                 echo "</br>";
                   echo "________________________";
                 echo "<br>";
              
                  echo "Billing City  : ";
                 echo$row['BillingCity'];
                   echo "</br>";
                      echo "________________________";
                 echo "<br>";

                 echo "Billing State  : ";
                 echo$row['BillingState'];
                   echo "</br>";
                     echo "________________________";
                 echo "<br>";

                  echo "Billing Zip  : ";
                 echo$row['BillingZip'];
                   echo "</br>";
                     echo "________________________";
                 echo "<br>";

                  echo "Shipping Address  : ";
                 echo$row['ShippingAddress'];
                   echo "</br>"; 
                      echo "________________________";
                 echo "<br>";

                  echo "Shipping City  : ";
                 echo$row['ShippingCity'];
                   echo "</br>";
                    echo "________________________";
                 echo "<br>";
                  

                  echo "Shipping State  : ";
                 echo$row['ShippingState'];
                   echo "</br>";
                   echo "________________________";
                 echo "<br>";

                   echo "Shipping Zip  : ";
                 echo$row['ShippingZip'];
                   echo "</br>";
                   echo "________________________";
                 echo "<br>";
     }
  else { 
echo "                  ";
echo "</br>";
 echo "==========================================";
//echo "</br>";
}

}

$result = mysql_query("SELECT * FROM product");


	while($row = mysql_fetch_array($result)){
	 
	   if($CID==$row['CustomerID']){
	   echo "product that customer have chosen to purchase from are ";
	              echo "Product Name  : ";
                 echo$row['ItemName'];
                   echo "</br>";
                   echo "________________________";
                 echo "<br>";
				 }
				 else{ 
echo "            ";
echo "</br>";
 echo "==========================================";
echo "</br>";
	 }	  
}
echo"if customer need to make any changes go to the shopping cart page.";
//<script type="text/JavaScript" language="JavaScript">alter("this page is already exist");</script>;





?>
