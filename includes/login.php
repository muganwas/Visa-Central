<div class="login_form">
<div class="logoSect">
<div class="logo-enc">
<div class="logo"></div>
</div>
<div class="logoText bold">Visa Central</div>
<div class="clear"></div>
</div>
<?php 
if(isset($_POST['email']) && isset($_POST['password'])){
    $glip = new visa_central;
    $email = trim(htmlentities($_POST['email']));
    $password = $_POST['password'];
    $feedback = $glip->login($email, $password);
}
//show feedback to the user from the server
if(isset($feedback)){
?>
<div class="feedback"><?php echo $feedback ?></div>
<?php } ?>
<!--end of feedback -->
    <form action="<?php if(temp_name1 !== null){echo temp_name1;} ?>" method="POST">
        <input id="email" name="email" type="text" placeholder="Email Address" required/>
        <input id="password" name="password" type="password" placeholder="Password" required/>
        <input class="blue-button bold" type="submit" value="Sign in"/>
    </form>
</div>