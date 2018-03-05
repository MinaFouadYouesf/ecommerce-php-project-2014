<!DOCTYPE html>
<html>
<body>
<?php
include './connection/config.php';
$strConnection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

 
 $ID = $_POST['ProductID'];
 $name = $_POST['ItemName'];
 $cat = $_POST['Category'];
 $sub= $_POST['sub-Category'];
 $pri = $_POST['Price'];
 $quantity = $_POST['QuantityInStock'];
 $Description = $_POST['ItemDescription'];
 
 $update_query= " UPDATE product SET ItemName='$name',ItemDescription='$Description',QuantityInStock=$quantity,Price=$pri,Category='$cat',SubCategory='$sub' WHERE ProductID=$ID";
 mysqli_query($strConnection,$update_query);

  
        ?>
<script type="text/JavaScript" language="JavaScript">alert("done");
    location.href="http://localhost/ITProject/storagepageadmin.php";
</script>
    
<?php

?>

</body>
</html>
