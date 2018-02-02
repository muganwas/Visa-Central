<?php require('includes/prepend.php') ?>
<?php
//instantiation of the idcc_forms class that hold all the applications functions
$glip = new visa_central;
$glip->showHeader();
echo '<div class="form_container">';
    $glip->loginForm(); 
echo '</div>';
$glip->showFooter();
