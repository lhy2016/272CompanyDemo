<!-- handle admin login  -->
<?php require 'conf.php';?>
<?php
    if(isset($_POST['login-submit'])) {
        session_start();
        $sid = session_id();
        echo "session id: " . $sid . "<br/>";
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $matched = FALSE;
            echo "user input: <br/>";
            echo "username: " . $_POST['username'] . "<br/>";
            echo "password: " . $_POST['password'] . "<br/>";
            $file = fopen("includes/user-password.txt", "r");
            while(! feof($file)) {
                $line = fgets($file);
                $userPass = preg_split("/ +/", $line);
                $username = trim($userPass[0]);
                $password = trim($userPass[1]);
                if (trim($_POST['username']) == $username && trim($_POST['password']) == $password) {
                    $matched = TRUE;
                    break;
                }
            }
            fclose($file);
            if ($matched) {
                $_SESSION["logged_User"] = $username;
                if(isset($_SESSION['error'])) {
                    $_SESSION['error'] = NULL;
                    unset($_SESSION['error']);
                }                       
                print_r($_SESSION);
            } else {
                $_SESSION["error"] = "Wrong combination of username and password!";
            }
            header("Location:$basePath?sid=$sid");
        }
    }
?>