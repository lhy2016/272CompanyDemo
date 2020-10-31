<?php require 'conf.php';?>
<?php require 'productInfo.php' ?>
<?php 
    $most5 = array();
    if(isset($_COOKIE['most'])) {
        $mostJson = $_COOKIE['most'];
        $most = json_decode($mostJson, TRUE);
        $most5 = $most;
    }
?>
<?php include 'includes/head.php';?>

<div class="jumbotron contact-content">
    <h3>Products you mostly viewed(at most 5):</h3>
    <br />
    <?php $count = 0;?>
    <?php foreach($most5 as $idstr => $vc): ?>
    <br />
    <?php $id = preg_split("/:/", $idstr)[1]; ?>
    <h5 style="font-weight:600;">Viewed: <?php echo $vc;?></h5>
    <h5>Product: <?php echo $productInfo[$id]["title"] ?></h5>
    <div style="display:flex; justify-content: flex-start;">
        <img src="images/pdt-slide-<?php echo($id + 1); ?>.png" style="width:20vh" />
        <p style="font-size: 17px;margin-left:20px;color:grey;">
            <?php echo $productInfo[$id]["description"]; ?></p>
    </div>
    <br />
    <?php 
        $count++;
        if($count == 5) {
            break;
        }
    ?>
    <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>