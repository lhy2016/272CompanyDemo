<?php require 'conf.php';?>
<?php
    if(isset($_POST['logout'])) {
        session_start();
        $_SESSION['logged_User'] = NULL;
        session_destroy();
        header("Location:$basePath");
    }
?>