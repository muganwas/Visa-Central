<?php
    global $glip;
    if(isset($_POST['exec'])){
        if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password-confirm']) && isset($_POST['email'])){
            $password = $_POST['password'];
            $password_con = $_POST['password-confirm'];
            if($password != $password_con){
                $feedback = "The passwords don't match";
            }else{
                $name= trim(htmlentities($_POST['name']));
                $email = trim(htmlentities($_POST['email']));
                $feedback = $glip->regExec($name,$email,$password);
            }
        }else{
            $feedback = "You Must Fill all fields";
        }
    }
 ?>
<?php if(isset($feedback)){?>
    <div class="floating_fb"><?php echo $feedback; ?></div>
    <script type="text/javascript">
        setTimeout(() => {
            $('.floating_fb').fadeOut();
        }, 3000);
    </script>
<?php }?>
<form action="" method="POST">
    <input type="hidden" value="exec" name="exec" />
    <input type="text" name="name" placeholder="Users Name" required/>
    <input type="email" name="email" placeholder="Users Email Address" required/>
    <input id="password" type="password" name="password" placeholder="Password" required/>
    <input id="password-confirm" type="password" name="password-confirm" placeholder="Confirm Password" required/>
    <input type="submit" value="Submit"/>
</form>
<?php 
if(!isset($_POST['exec'])){
    echo '<div class="info">*All input fields are required.</div>';
}
?>
