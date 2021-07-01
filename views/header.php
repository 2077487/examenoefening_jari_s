<?php
session_start();

?>
<?php if (array_key_exists('logged_in_as',$_SESSION)){ ?>
    <li><a href="/examenoefening_jari_s/code/logout.php"> logout </a></li>
    <?php } else { ?> 
        <li><a href="/examenoefening_jari_s/index.php"> login </a></li> 
            <?php } ?>