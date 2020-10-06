<footer id="contact">
    <div class="container sx-footer">
        <div class="left">
            <?php
                $filename = "includes/footer.txt";
                $handle = fopen($filename, "r");
                $contents = fread($handle, filesize ($filename));
                fclose($handle);
                echo $contents;
            ?>
        </div>
        <div class="right">
        </div>
    </div>
</footer>