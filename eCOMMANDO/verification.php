<?php 
if(!isset($_SESSION)){
    session_start();
}
		



$con = mysql_connect("localhost","","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }  
mysql_select_db("ecommando", $con);
$email=$_SESSION['email'];

$result = mysql_query("SELECT * FROM subadmin_info
                       
						");
						
$_SESSION['recentid'] = $_POST['id'];
 
while($row = mysql_fetch_array($result))
  {
 if(($_POST['id']==$row['NID']) and ($_POST['password']==$row['password']))
 {
      header('location: subadminlogin.php');
   }
   }
 
	
 

mysql_close($con);
?> 