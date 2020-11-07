<?php require '../conf.php';?>
<?php require '../db/users.php';?>
<?php require("../includes/dbConn.php");?>
<?php 
    $userResult = getUser($conn);
    $userObj = array();
    while($row = mysqli_fetch_assoc($userResult)) {
        $userObj[] = array();
        foreach($row as $name=>$value) {
            if ($name !== "id") {
              $userObj[count($userObj)-1][$name] = $value;
            }
        }
    }
    $userJson = json_encode($userObj);
    echo $userJson;
?>