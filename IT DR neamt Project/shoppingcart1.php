<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="abanoub wagih">
        <link type="text/css" href="css/reset-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/fonts-min.css" rel="stylesheet"  />
        <link type="text/css" href="css/style.css" rel="stylesheet"     />
        <link type="text/css" href="css/product.css" rel="stylesheet"     />
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

        $ItemName = $_POST['ItemName'];
        $quant = number_format($_POST['numberoforder']) ;
        $kEmail =  $_SESSION['Email']; 
        $time = date(" d - m - y  ----   h : i : s");
        $time2 = date(" d - m - y  ----   h : i : s") + 1000 ;
        $price = $_POST['price'];
         echo "<article id='product'>
                            <div>
                                <table>
                                        <tr><td colspan='2'><h1>$kEmail</h1></td><td></td></tr>
                                        <tr><td>ItemName</td><td>$ItemName</td></tr>
                                        <tr><td>quantity</td><td>$quant</td></tr>
                                        <tr><td>time</td><td>$time</td></tr>
                                        <tr><td>Price</td><td>$price &pound;</td></tr>  
                                </table>
                            </div>
                        </article>";
         
 
         
                        echo "<form action='' method='post' id='productForm'>
                         
                            <input type='submit' value='purchase' />
                        </form>";

       ?>

    </body>
    </html>