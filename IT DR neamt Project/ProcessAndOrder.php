<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Refresh" content="40;url=http://localhost/ITProject/storagepageadmin.php" >
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
            div{
                margin: 300px 0 0 300px ;
            }
            div h1 {color: #990000 ; font-size:24px;}
              div hr{width:250px; margin-left:-1px; border-color:#000;}
              div p{ font-size:80% ; color:rgb(0,0,0); line-height:140%; }
              div p:last-child{font-size:120% ; color:rgb(255,255,255); line-height:140%;}
              div p span{ font-size:16px; color:#F00;}
        </style>
    </head>
<body>
    <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
<?php

$SID = number_format($_POST["TransactionID"]);
include './connection/config.php';
$con = mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);


  mysql_select_db($config['dbname']);

$result = mysql_query("SELECT * FROM orderprocessing");


	while($row = mysql_fetch_array($result)){
	 
	   if($SID==$row['TransactionID']){


              
                  

                   
                   $com = $row['ShippingCompany'];
                   $da = $row['DateShipped'];
                   echo " 
                       <div>
                           
                           <div >
                               <h1>Product was Shipped</h1>
                               <hr />
                               <p>Shipping Company   : &nbsp;&nbsp;<span>$com</span></p><br/>
                               <p>Shipping date : &nbsp;&nbsp;<span>$da</span></p><br/>
                           </div>
                      </div> ";
                    
        

        echo "<div><h1>Product NOT Shipped</div></h1>";
           }
             
         

   else if($SID!=$row['TransactionID']){

        ?>
<script type="text/JavaScript" language="JavaScript">alert("Please Enter Corecct Transaction ID");
    location.href="http://localhost/ITProject/OrderTrackingPage.html";
</script>
    
<?php
  	           
     }
							  
		
	}
  mysql_close($con);


	?>
</body>
</html>>