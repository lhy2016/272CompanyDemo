<?php require_once 'conf.php';?>
<?php include 'includes/head.php';?>
<div class="jumbotron contact-content">
    <h3>Contact Us</h3>
    <ul class="list-group">
        <?php 
        $contacts = array(); 
        $file = fopen("includes/contacts.txt", "r");
        $i=0;
        while(! feof($file))
        {
            $line= fgets($file);
            $personAttributes = preg_split("/ {3}/", $line);
            $contacts[] = array();
            $contacts[$i]["name"] = $personAttributes[0];
            $contacts[$i]["position"] = $personAttributes[1];
            $contacts[$i]["phone"] = $personAttributes[2];
            $contacts[$i]["email"] = $personAttributes[3];
            $i++;
        }
        fclose($file);
        ?>
        <?php foreach($contacts as $contact): ?>
            <li class="list-group-item">
                <b><?php echo $contact["name"];?></b> - <?php echo $contact["position"]?>
                <ul class="list-group">
                    <li class="list-group-item"><?php echo $contact["phone"];?></li>
                    <li class="list-group-item"><?php echo $contact["email"];?></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include 'includes/footer.php'; ?>