<?php
include './connection/config.php';
$connenction_link=mysql_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
if(!$connenction_link)
{
echo " error in connection".mysql_error();
}
mysql_select_db($config['dbname']);

$keyword=$_POST["keyword"];
$Username= $_POST["username"];
$productName= $_POST["productName"];
$purchsing_value= $_POST["purchsing_value"];

$select_query="SELECT *  FROM Order_processing where userID='$keyword' ";
$result=mysql_query($select_query);
$result2 = "Update orderprocessing Set value =' $purchsing_value'  Where customername='$Username' AND Prodctname='$purchsing_value' ";



if(mysql_num_rows($result)!=0)
{
echo " There Name or Email entered Found </br>";
echo " search results : </br> ";
echo "_ _ _ _ _ _ _ _ _ _ _ _</br>";
echo "<table border='3' width='30%'>
 <tr>
 <th>User name</th>
 <th>Product name      </th>
 </tr>
";
  while($row=mysql_fetch_array($result))
 {
    echo"<tr>
         <td> ";
    echo $row["userName"];
     echo "
        </td>
        <td>";
  echo $row["productName"];
     echo "
        </td>
        </tr>";
}
echo"</table>";

}
if($Username!="" && $productName!="") {mysql_query ($result2);}
mysql_close($connenction_link);

  

?>




<!DOCTYPE HTML> 
<html>
<head>
</head>
<form name="adduser" action="Shopping cart 2.php" method="post">
UserName <input type="text" name="username"></br>
productName <input type="text" name="productName"></br>
purchsing_value <input type="text" name="purchsing_value"></br>
 <input type="submit" name="submit" value="updte">
 </form>


</body>
</html>