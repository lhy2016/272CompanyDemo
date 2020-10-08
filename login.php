<!-- handle admin login  -->
<?php require 'conf.php';?>
<?php
    if(isset($_POST['login-submit'])) {
        if(isset($_POST['username']) && isset($_POST['password']) && 
            $_POST['username'] == "admin" && $_POST['password'] == "password") {
            header("Location: $basePath");
        }
        
    }
?>