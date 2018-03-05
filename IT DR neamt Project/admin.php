<?php
include './connection/config.php';
$connenction_link=mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
if(!$connenction_link)
{
echo " error in connection".mysql_error();
}

// Select Database
mysql_select_db($config['dbname']);


$Username=$_POST["Username"];
$Password=$_POST["Password"];
$select_query = " SELECT * FROM admin ";

$check = 0 ;
$result= mysql_query($select_query);

while($row=mysql_fetch_array($result))
{
    if ( $Username == $row["Username"] &&( $Password == $row["Password"]))
	{
	   $check = 1 ;
	}
   

}
if ($check== 0){
  
    echo "$Username  ".$row['Username']."   &$Password  ".$row["Password"];
  ?>
<script type="text/JavaScript" language="JavaScript">alert("wrong username  or password");
    location.href="http://localhost/ITProject/admin.html";
</script>
    
<?php
 
  }
elseif($check ==1)
{
  session_start();
  $_SESSION['admin']=$Username;
?>
<script type="text/JavaScript" language="JavaScript">alert("log in done ");
    location.href="http://localhost/ITProject/storagepageadmin.php";
</script>
    
<?php
}
mysql_close($connenction_link);

?>