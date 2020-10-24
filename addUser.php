<?php require 'conf.php';?>
<?php require("includes/dbConn.php");?>
<?php require 'db/users.php';?>
<?php 
    if(isset($_POST["addUser-submit"])) {
       $data = array();
       $data["firstname"] = $_POST["firstname"];
       $data["lastname"] = $_POST["lastname"];
       $data["email"] = $_POST["email"];
       $data["homeAddress"] = $_POST["homeAddress"];
       $data["homePhone"] = $_POST["homePhone"];
       $data["cellPhone"] = $_POST["cellPhone"];
       insertUser($conn,$data);
       header("Location:site_users.php");
    }
?>