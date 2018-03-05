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
        <link type="text/css" href="css/allproduct.css" rel="stylesheet"     />
        <title>All Product</title>
    </head>
    <body>
        <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
        <menu>
            <ul>
                <li> <a href="CustomerInfo" >Customer’s Information Page</a></li>
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
                  
                  $sql = "SELECT * FROM product order by Category,SubCategory,ItemName" ;
                  
                  $result = $conn->query($sql);
                  
                  
               
                     echo "<div class='holding' > ";
                    
                  if ($result->num_rows > 0) { 
                  $i = 0;    
                while ($row = $result->fetch_assoc()) 
                {
                        $Picture = $row['Picture'];
                        $ItemName = $row['ItemName'];
                        $Category = $row['Category'];
                        $SubCategory = $row['SubCategory'];
                        $QuantityInStock = number_format($row['QuantityInStock']);
                        $Price = number_format($row['Price']);
                        
                        
                        echo "<a href='products.php?productname=$ItemName' >
                       <div>
                           <img src='image/product/$Picture' />
                           <div >
                               <h1>$ItemName</h1>
                               <hr />
                               <p>Category : &nbsp;&nbsp;<span>$Category</span></p><br/>
                               <p>SubCategory : &nbsp;&nbsp;<span>$SubCategory</span></p><br/>
                               <p>QuantityInStock : &nbsp;&nbsp;<span>$QuantityInStock</span></p><br/>
                               <p>Price : &nbsp;&nbsp;<span> $Price &nbsp; &pound;</span></p>
                           </div>
                      </div> </a>";
                        
                    }
                    
                    echo " </div>";
                
                  }
        
        ?>
    </body>
</html>
