<?php 
    function getUser($conn) {
        $sql = "select * from users";
        $result = $conn->query($sql);
        return $result;
    }
    function insertUser($conn, $data) {
        $sql = "insert into users(firstname, lastname, email, homeAddress, homePhone, cellPhone) values (?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)) {
            mysqli_stmt_bind_param($stmt,'ssssss',
            $data["firstname"],$data["lastname"],$data["email"],
            $data["homeAddress"], $data["homePhone"], $data["cellPhone"]);
            mysqli_stmt_execute($stmt);
        }
    }
    function searchUsers($conn, $cond) {
        $sql = "select * from users where 1=1";
        if(isset($cond["name"])) {
            $sql = $sql . (" and (firstname like '%" . $cond["name"] . "%' or lastname like '%" . $cond["name"] . "%')");
        }
        if(isset($cond["email"])) {
            $sql = $sql . (" and email like '%" . $cond["email"] . "%'");
        }
        if(isset($cond["phone"])) {
            $sql = $sql . (" and (homePhone='" . $cond["phone"] . "' or cellPhone='" . $cond["phone"] . "')");
        }
        $result = $conn->query($sql);
        $results = array();
        while($row = mysqli_fetch_assoc($result)) {
            $results[] = array();
            foreach($row as $name=>$value) {
                $results[count($results)-1][$name] = $value;
            }
        }
        return $results;
    }
?>