<?php require 'conf.php';?>
<?php require 'productInfo.php' ?>
<?php 
    if(isset($_COOKIE['recent'])) {
        $recentJson = $_COOKIE['recent'];
        $recent = json_decode($recentJson, TRUE);
        // check if existed:
        $found = FALSE;
        $index = -1; 
        for($i = 0; $i < count($recent);$i++) {
            if($recent[$i]["id"] == $_GET["id"]) {
                $found = TRUE;
                $index = $i;
                break;
            }
        }
        // delete previous duplicated record first
        if($found) {
            array_splice($recent, $index, 1);
        }
        // if exceeded, delete the least recent reviewed
        if(count($recent) == 5) {
            array_splice($recent, 0, 1);
        }
        // insert current record
        $recent[] = array("time"=>date("Y-m-d H:i:s",time()),"id"=>$_GET["id"]);
        $recentJson = json_encode($recent);
        $expire = time()+60*60*24*30;
        setcookie("recent", $recentJson,$expire);
    } else {
        $expire = time()+60*60*24*30;
        date_default_timezone_set("America/Los_Angeles");
        $initRecent = array(array("time"=>date("Y-m-d H:i:s",time()),"id"=>$_GET["id"]));
        $initRecentJson = json_encode($initRecent);
        setcookie("recent",$initRecentJson, $expire);
    }
?>
<?php include 'includes/head.php';?>

<div class="jumbotron contact-content">
    <h3><?php echo $productInfo[$_GET["id"]]["title"];?></h3>
    <br />
    <div style="display:flex; justify-content: space-around;">
        <img src="images/pdt-slide-<?php echo($_GET["id"]+1); ?>.png" style="width:40vh" />
        <p style="font-size: 17px"><?php echo $productInfo[$_GET["id"]]["description"]; ?></p>
    </div>
</div>
<?php include 'includes/footer.php'; ?>