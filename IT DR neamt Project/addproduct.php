<!DOCTYPE html> 
<?php 
include './connection/config.php';
$name=$_POST['ItemName'];
$description=$_POST['ItemDescription'];
$Quantity_In_Stock=number_format($_POST['QuantityInStock']);
$Price=  number_format($_POST['Price']);
$category=$_POST['Category'];
$subcategory=$_POST['SubCategory'];
$picture=$_POST['Picture'];

$connenction_link=mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);

if(!$connenction_link)
{
echo " error in connection".mysql_error();
}
        
$selected = mysql_select_db($config['dbname']) ;

$insert_query= " INSERT into Product(ItemName, ItemDescription, QuantityInStock, Price, Category,SubCategory,Picture) 
values('$name','$description',$Quantity_In_Stock,$Price,'$category','$subcategory','$picture')";
mysql_query($insert_query);


?>
<script type="text/JavaScript" language="JavaScript">alert("done");
    location.href="http://localhost/ITProject/storagepageadmin.php";
</script>