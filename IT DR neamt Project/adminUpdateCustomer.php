<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         
        <meta name="author" content="abanoub wagih">
        <link type="text/css" href="css/reset-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/fonts-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/style.css" rel="stylesheet"     />
        <link type="text/css" href="css/logstyle.css" rel="stylesheet" />
        <title>Admin Update Customer</title>
    </head>
    <body>
         <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
             <div id="container">  
        <div class="header">
           <?php
        
             $tEmail = $_GET['Email']; 
              include './connection/config.php';
                
                $conn = new mysqli($config['servername'], $config['username'], $config['password'],$config['dbname']);
                 if ($conn->connect_error)
                  {
                    die('Could not connect at admin update customer  page: ' . $conn->connect_error);
                  }
                  
                  
                  $sql = "SELECT * FROM customer where Email ='$tEmail'" ;
                  


                  $Phone =0;
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                    $FirstName = $row['FirstName'];
                    $LastName = $row['LastName'];
                    $BillingAddress = $row['BillingAddress'];
                    $ShippingAddress = $row['ShippingAddress'];
                    
                    $Email = $row['Email'];
                    $Password = $row['Password'];
                    $oldEmail = $Email;
                    
                        $Phone = number_format($row['phone']);
                    
           echo"<h1> update customer   $FirstName  &nbsp; $LastName </h1>
           </div>
           <aside>
           <nav id='Regmenu'>

                <ul>
                <li>
                        <form action='updateCustomer.php?oldEmail=$oldEmail' method='post'>
                           
                            <input type='text' required value='$FirstName' name='FirstName'> <br>
                            <input type='text' required value='$LastName' name='LastName'><br>
                            <input type='text' placeholder='BillingAddress(optional)' value='$BillingAddress' name='BillingAddress'><br>
                            <input type='text' required value='$ShippingAddress' name='ShippingAddress'><br>
                            <input type='number' placeholder=' Phone (optional)' value='$Phone' name='phone'> <br>
                            <input type='email' required value='$Email' name='Email'> 
                                 <input type='hidden' required value='$oldEmail' name='oldEmail'><br>
                            <input type='password' required value='$Password' name='Password'> <br>
                            <input type='submit' value='Update'> <br>
                        </form>
                        ";
                    ?>
                </ul>
            </nav>
        </aside>
    
         
  <section>
      <img src="image/update.jpg" alt="" name="slide" width="670" height="500" />

            </section>
        </div>

        // put your code here
        
    </body>
</html>
