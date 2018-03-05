<?php

            /*

                author : abanoub wagih
             * 
             *              */
              include './connection/config.php';
                
                $conn = new mysqli($config['servername'], $config['username'], $config['password'],$config['dbname']);
                 if ($conn->connect_error)
                  {
                    die('Could not connect at update customer  page: ' . $conn->connect_error);
                  }

$shipped= number_format($_POST['Shipped']);
$trackingnumber = number_format($_POST['TrackingNumber']);
$shippingcompany = $_POST['ShippingCompany'];
$transactionID=number_format($_POST['TransactionID']);

    $sql = "UPDATE `orderprocessing` SET `TrackingNumber`=$trackingnumber,"
            . "`ShippingCompany`='$shippingcompany',`Shipped`=$shipped WHERE `TransactionID` = $transactionID";
    
    $result = $conn->query($sql);
    
    ?>
    <script type="text/JavaScript" language="JavaScript">
    alert("success update");
    location.href= "http://localhost/ITProject/storagepageadmin.php";
</script>

