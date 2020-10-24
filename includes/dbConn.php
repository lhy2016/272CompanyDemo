<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "company";
 
function mysqlinstalled (){
    if (function_exists ("mysql_connect")){
     return true;
    } else {
     return false;
    }
   }
   function mysqliinstalled (){
    if (function_exists ("mysqli_connect")){
     return true;
    } else {
     return false;
    }
   }
    
   if (mysqlinstalled()){
    echo "<p>The mysql extension is installed.</p>";
   } else {
    echo "<p>The mysql extension is not installed..</p>";
   }
   if (mysqliinstalled()){
    echo "<p>The mysqli extension is installed.</p>";
   } else {
    echo "<p>The mysqli extension is not installed..</p>";
   }

$conn = new mysqli($servername,$username,$password,$db_name);
if ($conn->connect_error) {
    echo($conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}
?>