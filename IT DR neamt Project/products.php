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
        <link type="text/css" href="css/product.css" rel="stylesheet"     />
        <?php
            $productname ="";
                    if (isset($_GET['productname'])) {
                        $productname = $_GET['productname'];
                    }
            echo "<title>".$productname."</title>";
        ?>
    </head>
    <body>
        <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
        <menu>
            <ul>
                <li> <a href="CustomerInfo.php" >Customer’s Information Page</a></li>
                <li> <a href="ProductsListPage.php" >Products List </a></li>
                <li><a href="allProduct.php" >all product</a>
                    <ul>
                    	<a href="products.php?productname=Inspiron 15 3542 Notebook" ><li>Inspiron 15 3542 Notebook</li></a>
                        <a href="products.php?productname=iPhone 5C 8GB (White)" ><li>iPhone 5C 8GB (White)</li></a>
                         <a href="products.php?productname=A114 Canvas 2.2 White" ><li>A114 Canvas 2.2 White</li></a>
                    	<a href="products.php?productname=Galaxy Grand 2 White" ><li>Galaxy Grand 2 White</li></a>

                    </ul>
                </li>
                
            </ul>          
        </menu>
        
            <?php

                include './connection/config.php';
                
                $conn = new mysqli($config['servername'], $config['username'], $config['password'],$config['dbname']);
                 if ($conn->connect_error)
                  {
                    die('Could not connect at product page: ' . $conn->connect_error);
                  }

                 // $sql = "select * from Product where ItemName = ".$productname ;
                   $sql = "select * from Product where ItemName = '".$productname."'" ;
                  
                  $result = $conn->query($sql);
                  
            if ($result->num_rows > 0) {
                       
                       $row = $result->fetch_assoc();

                  
                 
                  
                       echo "<article id='product'>
                            <div>
                                <img src='image/product/".$row['Picture']."' alt='errors'/>
                                
                            </div>
                            <div>
                                <table>
                                        <tr><td colspan='2'><h1>".$row['Category']."</h1></td><td></td></tr>
                                        <tr><td>Sub-Category</td><td>".$row['SubCategory']."</td></tr>
                                        <tr><td>ProductID</td><td>".$row['ProductID']."</td></tr>
                                        <tr><td>ItemName</td><td>".$row['ItemName']."</td></tr>
                                        <tr><td>ItemDescription</td><td>".$row['ItemDescription']."</td></tr>
                                        <tr><td>QuantityInStock</td><td>".number_format($row['QuantityInStock'])."</td></tr>
                                        <tr><td>Price</td><td>".number_format($row['Price'])." &pound;</td></tr>  
                                </table>
                            </div>
                        </article>";
                       echo "<form action='shoppingcart1.php' method='post' id='productForm'>
                            <label>number of wanted product </label>&nbsp;&nbsp;  
                            <input type='number' min='1' max='".number_format($row['QuantityInStock'])."'name='numberoforder'/><b/>
                            <input type='hidden' name='ItemName' value='".$row['ItemName']."' />
                                <input type='hidden' name='price' value='".number_format($row['Price'])."' />&nbsp;&nbsp;&nbsp;
                            <input type='submit' value='buy' />
                        </form>";
            
                       
            }
         ?>
        
    </body>
</html>
