<div class="login_container">
<?php
$glip = new visa_central;
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = trim(htmlentities($_POST['email']));
    $password = $_POST['password'];
    $feedback = $glip->login($email, $password);
}
?>
<?php
//show feedback to the user from the server
if(isset($feedback)){
?>
<div id="feedback" class="fadeIn"><?php echo $feedback ?></div>
<?php } ?>
<div class="login_form">
<div class="logoSect">
<div class="logo-enc">
<div class="logo"></div>
</div>
<div class="logoText bold">Visa Central</div>
<div class="clear"></div>
</div>
<!--end of feedback -->
    <form action="<?php if(temp_name1 !== null){echo temp_name1;} ?>" method="POST">
        <input id="email" name="email" type="text" placeholder="Email Address" required/>
        <input id="password" name="password" type="password" placeholder="Password" required/>
        <input class="blue-button bold" type="submit" value="Sign in"/>
    </form>
</div>
</div>
<div class="lfooter">Oman Days &copy; 2018. Powered by Codebudha.</div>