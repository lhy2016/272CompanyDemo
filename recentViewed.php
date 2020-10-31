<?php require 'conf.php';?>
<?php require 'productInfo.php' ?>
<?php 
    $recent5 = array();
    if(isset($_COOKIE['recent'])) {
        $recentJson = $_COOKIE['recent'];
        $recent = json_decode($recentJson, TRUE);
        $recent5 = $recent;
    }
?>
<?php include 'includes/head.php';?>

<div class="jumbotron contact-content">
    <h3>Products you recently viewed(at most 5):</h3>
    <br />
    <?php for($i=count($recent5)-1;$i >=0;$i--): ?>
        <?php $record = $recent5[$i];?>
    <br/>
    <h5 style="font-weight:600;">Time: <?php echo $record["time"];?></h5>
    <h5>Product: <?php echo $productInfo[$record["id"]]["title"] ?></h5>
    <div style="display:flex; justify-content: flex-start;">
        <img src="images/pdt-slide-<?php echo($record["id"]+1); ?>.png" style="width:20vh" />
        <p style="font-size: 17px;margin-left:20px;color:grey;"><?php echo $productInfo[$record["id"]]["description"]; ?></p>
    </div>
    <br/>
    <?php endfor; ?>
</div>
<?php include 'includes/footer.php'; ?>