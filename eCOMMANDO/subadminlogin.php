<?php 
if(!isset($_SESSION)){
    session_start();
}  
$subadmin=$_SESSION['recentid'];
echo "Welcome ".$subadmin;
?>
<html>

 <a href="http://localhost/include.php"></a>
 
</html> 


