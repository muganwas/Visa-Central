<?php require('includes/prepend.php') ?>
<?php
//instantiation of the idcc_forms class that hold all the applications functions
$glip = new visa_central;
$glip->showHeader();
echo '<div class="form_container">';
    $glip->loginForm(); 
echo '</div>';
?>
</div>
<script type="text/javascript">
    var de = document.getElementById('main');
    de.classList.remove('main');
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/visas.js"></script>
</body>
</html>
