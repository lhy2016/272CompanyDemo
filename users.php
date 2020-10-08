<?php require 'conf.php';?>
<?php 
    session_start();
    if(!isset($_SESSION['logged_User'])) {
        header("Location:$basePath");
    }
?>
<?php include 'includes/head.php';?>
<div class="jumbotron contact-content">
    <h3>Our Site Users:</h3>
    <ul class="list-group">
        <?php 
        $users = array(); 
        $file = fopen("includes/users.txt", "r");
        while(! feof($file))
        {
            $line= fgets($file);
            $users[] =  $line;
        }
        fclose($file);
        ?>
        <?php foreach($users as $user): ?>
        <li class="list-group-item">
            <?php echo $user;?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include 'includes/footer.php'; ?>