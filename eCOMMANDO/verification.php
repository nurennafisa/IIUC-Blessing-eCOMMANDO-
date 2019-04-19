<?php
$con = mysql_connect("localhost","","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }  
mysql_select_db("ecommando", $con);

$result = mysql_query("SELECT * FROM subadmin_info
                       
						");
						

   $flag=0;
while($row = mysql_fetch_array($result))
  {
 
   if('$_POST[id]'!=$row['NID'] and '$_POST[password]'!=$row['password'] )
   header('location: subadminlogin.php');
   
   }  
 header('location: userlogin.php');   
 
	
 

mysql_close($con);
?> 