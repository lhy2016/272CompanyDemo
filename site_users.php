<?php require 'conf.php';?>
<?php require 'db/users.php';?>


<?php include 'includes/head.php';?>
<?php 
    $userResult = getUser($conn);
?>
<div class="jumbotron contact-content">
    <?php if(count($_GET) > 0): ?>
    <?php 
        $results = searchUsers($conn, $_GET);
    ?>
    <div style="display: flex; justify-content: space-between;margin-bottom: 20px;">
        <h3>Search Result:</h3>
        <div>
            <a id="clear-search" href="site_users.php">Clear Result</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Home Address</th>
                <th>Home Phone</th>
                <th>Cell Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result): ?>
                <tr>
                    <?php foreach($result as $name=>$value):?>
                        <?php if($name !== "id"): ?>
                            <td><?php echo $value;?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif; ?>
    <div style="display: flex; justify-content: space-between;margin-bottom: 20px;">
        <h3>Our Users:</h3>
        <div>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#searchUser">Search</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add User</button>
        </div>
    </div>
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="addUser.php" method="POST" role="form" id="addUser-form">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="homeAddress">Home Address</label>
                            <input type="text" class="form-control" name="homeAddress">
                        </div>
                        <div class="form-group">
                            <label for="homePhone">Home Phone</label>
                            <input type="text" class="form-control" name="homePhone">
                        </div>
                        <div class="form-group">
                            <label for="cellPhone">Cell Phone</label>
                            <input type="text" class="form-control" name="cellPhone">
                        </div>
                        <input style="display:none;" type="submit" id="addUser-submit" name="addUser-submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="add-submit">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="searchUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Search user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="searchUser.php" method="GET" role="form" id="searchUser-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <input style="display:none;" type="submit" id="searchUser-submit" name="searchUser-submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="search-submit">Search</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Home Address</th>
                <th>Home Phone</th>
                <th>Cell Phone</th>
            </tr>
        </thead>
        <tbody>
            
                <?php 
              while($row = mysqli_fetch_assoc($userResult)) {
                  echo "<tr>"; 
                  foreach($row as $name=>$value) {
                      if ($name !== "id") {
                        echo "<td>".$value."</td>";
                      }
                  }
                  echo "</tr>";
              }
              ?>
            
        </tbody>
    </table>
    <h3>jiu Bar's Site Users: <span style="font-size:14px;"><a href="https://runchen-tao.herokuapp.com/"> visit here </a></span></h3>
    <?php 
    $headerArray =array("Content-type:application/json;","Accept:application/json");
    $curl = curl_init();
    $url = "https://runchen-tao.herokuapp.com/api.php";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
    $output = curl_exec($curl);
    curl_close($curl);
    $resultObj = json_decode($output,true);
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Home Address</th>
                <th>Home Phone</th>
                <th>Cell Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultObj as $result): ?>
                <tr>
                    <?php foreach($result as $name=>$value):?>
                        <?php if($name !== "id"): ?>
                            <td><?php echo $value;?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script>
$("#add-submit").click(function() {
    $("#addUser-submit").click();
});
$("#search-submit").click(function() {
    $("#searchUser-submit").click();
});
</script>
<?php include 'includes/footer.php'; ?>