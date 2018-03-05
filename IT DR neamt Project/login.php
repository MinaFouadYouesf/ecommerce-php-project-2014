<?php


// Start the session
session_start();

include './connection/config.php';
$connenction_link=mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
if(!$connenction_link)
{
echo " error in connection".mysql_error();
}

// Select Database
mysql_select_db($config['dbname']);


$Email=$_POST["Email"];
$Password=$_POST["Password"];
$select_query = " SELECT * FROM customer ";

$check = 0 ;
$result= mysql_query($select_query)or die($select_query."<br/><br/>".mysql_error());
$check = 0 ;
$chech_index= 0 ;
while($row=mysql_fetch_array($result))
{
    if ( $Email == $row["Email"] &&( $Password == $row["Password"]))
	{
	   $check = 1 ;
	}
   

}
if ($check== 0){
  
  ?>
<script type="text/JavaScript" language="JavaScript">alert("wrong username  or password");
    location.href="http://localhost/ITProject/login.html";
</script>
    
<?php
 
  }
elseif($check ==1)
{
  
  $_SESSION['Email']=$Email;
?>
<script type="text/JavaScript" language="JavaScript">
    alert("success login");
    location.href = "http://localhost/ITProject/ProductsListPage.php"
</script>
    
<?php


   
    
}
mysql_close($connenction_link);

?>