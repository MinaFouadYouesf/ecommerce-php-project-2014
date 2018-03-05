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
        <style>
            aside ul li{width: 330px; height: 100px; } 
            a {  float: left;   margin-right: 40px;    margin-left: 30px; }
            aside{  width: 100%; clear: both;  }            
            div{  margin-right: 100px; float: right;  }
            div input{   height: 50px;  min-width: 80px;}
        </style>
        
        <script language="JavaScript" type="text/javascript">
            function search(){
                var text = document.getElementById('search').value ;
                var found = document.getElementById(text);
                found.focus();
                found.setAttribute('style',"border:red 10px solid; border-radius:10px;");
            }
            function back(){
                var text = document.getElementById('search').value ;
                if(text==="" || text === null)return ;
                var found = document.getElementById(text);
                
                found.setAttribute('style',"border:none;");
            }
            setInterval("back()",5000);
        </script>
        <title>customer List</title>
    </head>
    <body>
        <header>
            <marquee direction="right" behavior="alternate">
            <h1>IT Shopping</h1></marquee>
            <img src="image/logo.png"/>
        </header>
        
        <?php
        
                include './connection/config.php';
                
                $conn = new mysqli($config['servername'], $config['username'], $config['password'],$config['dbname']);
                 if ($conn->connect_error)
                  {
                    die('Could not connect at customer list  page: ' . $conn->connect_error);
                  }
                  
                  $sql = "SELECT `CustomerID`, `FirstName`, `LastName`,  `Email` FROM `customer` " ;
                  
                  $result = $conn->query($sql);
                  
                    echo "
                 <div class='container'>
                 <h1>Customer List</h1>
                 <div>
                 <input type='email' placeholder='enter your Email' id='search'/> 
                 <input type='button' value='search' onclick='search()' />
                 </div>
                  <aside>

                            <ul>
                   ";
                    
                    while ($row = $result->fetch_assoc()) {
                        
                            $clientName = $row['FirstName']."  ".$row['LastName'];
                            $CustomerID = $row['CustomerID'];
                            $Email = $row['Email'];
                             echo "
                            <a href='adminUpdateCustomer.php?Email=$Email' ><li id='$Email'>$CustomerID &nbsp;&nbsp; $clientName <br/> $Email</li></a>";
                        }
                        echo "
                            </ul>

                    </aside>
                    </div>";
       ?>

    </body>
</html>
