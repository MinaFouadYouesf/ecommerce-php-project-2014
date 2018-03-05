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
        <link type="text/css" href="css/productlist.css" rel="stylesheet"     />
        
        <title>Products List</title>
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
                  
                  $sql = "select distinct Category from product" ;
                  
                  $resultForCategory = $conn->query($sql);
                  
                    echo "
                 <div class='container'>
                 <h1>Products List</h1>
                <aside>

                            <ul>
                      ";          

                    while ($rowForCategory = $resultForCategory->fetch_assoc()){

                        $category = $rowForCategory['Category'];
                        echo "<li>$category "
                                . "<ul id='two' >";
                        
                            $subSql = "select distinct SubCategory from product where Category ='$category'";
                            $resultForSubCategory = $conn->query($subSql);

                                while ($rowForSubCategory= $resultForSubCategory->fetch_assoc()){
                                    $subCategory = $rowForSubCategory['SubCategory'];
                                    echo "<li  '>$subCategory"
                                            . "<ul id='three'>";
                                            $itemSql = "SELECT * FROM product WHERE SubCategory = '$subCategory'";
                                            $resultForitem = $conn->query($itemSql);
                                            while ($rowForItem= $resultForitem->fetch_assoc()){
                                                $ItemName = $rowForItem['ItemName'];
                                                $Price = number_format($rowForItem['Price']);
                                                echo "<a href='products.php?productname=$ItemName'>"
                                                        . "<li>$ItemName &nbsp; &nbsp; $Price  &nbsp; &pound;</li>"
                                                        . "</a>";
                                            }
                                    echo "</ul>".
                                     "</li>"; 
                                }

                        echo "</ul>"
                                . "</li>";
                    }

                    echo "
                            <a href='allProduct.php'><li>All Product</li></a>
                            </ul>

                    </aside>
                    </div>";
       ?>

    </body>
</html>
