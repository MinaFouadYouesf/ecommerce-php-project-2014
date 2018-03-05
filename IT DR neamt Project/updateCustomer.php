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

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$BillingAddress = $_POST['BillingAddress'];
$ShippingAddress = $_POST['ShippingAddress'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$kEmail = $_POST['oldEmail'];
$phone = number_format($_POST['phone']);
    $sql = "UPDATE `customer` SET "
            . "`FirstName`= '$FirstName' ,"
            . "`LastName`= '$LastName' ,"
            . "`BillingAddress`= '$BillingAddress',"
            . "`ShippingAddress`= '$ShippingAddress' ,"
            . "`Email`= '$Email',"
            . "`Password`= '$Password' ,"
            . "`phone`= $phone"
            . " WHERE Email = '$kEmail' ";
    
    $result = $conn->query($sql);
    
    ?>
    <script type="text/JavaScript" language="JavaScript">
    alert("success update");
    history.go(-2);
</script>


