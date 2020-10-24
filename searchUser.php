<?php require 'conf.php';?>
<?php require("includes/dbConn.php");?>
<?php require 'db/users.php';?>
<?php 
    if(isset($_GET["searchUser-submit"])) {
       $getParam = "";
       foreach($_GET as $name=>$value) {
           if($name !== "searchUser-submit") {
               
               if (trim($value) != "") {
                    if($getParam !== "") {
                        $getParam = $getParam."&";
                    }
                   $getParam = $getParam . ($name."=".trim($value));
               }
           }
       }
       echo $getParam;
       $getParam = trim($getParam);
       if ($getParam === "") {
           header("Location:site_users.php");
       } else {
           $getParam = "site_users.php?" . $getParam;
           header("Location:$getParam");
       }
    }
?>