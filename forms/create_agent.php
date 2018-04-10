<?php
    global $glip;
    if(isset($_POST['agent'])){
        if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['contact']) && isset($_POST['password']) && isset($_POST['password-confirm']) && isset($_POST['mobile']) && isset($_POST['email'])){
            if(isset($_SESSION['username'])){
              $agent = trim(htmlentities($_SESSION['username']));
            }else{
              $agent = 'none';
            }
            $password = $_POST['password'];
            $password_con = $_POST['password-confirm'];
            if($password != $password_con){
                $feedback = "The passwords don't match";
            }else{
                $agent_name= trim(htmlentities($_POST['name']));
                //random agent number generator
                $agent_noArr = [];
                $ranNumLen = 7;
                for($count=0;$count<$ranNumLen; $count++){
                    $ranNum = rand(0,9);
                    $agent_noArr[$count]=$ranNum;
                }
                //end of random number generator
                $agent_number= implode("", $agent_noArr);
                $address = trim(htmlentities($_POST['address']));
                $contact_person = trim(htmlentities($_POST['contact']));
                $agent_mobile = trim(htmlentities($_POST['mobile']));
                $email = trim(htmlentities($_POST['email']));
                $feedback = $glip->regAgent($agent_name, $agent_number, $address, $contact_person, $agent_mobile, $email, $password);
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
    <input type="hidden" value="agent" name="agent" />
    <input type="text" name="name" placeholder="Agents Name" required/>
    <input type="text" name="address" placeholder="Agents Address" required/>
    <input type="text" name="contact" placeholder="Contact Person" required/>
    <input type="text" pattern="^[0-9]+$" name="mobile" placeholder="Agent Mobile Number" required/>
    <input type="email" name="email" placeholder="Agent Email Address" required/>
    <input id="password" type="password" name="password" placeholder="Password" required/>
    <input id="password-confirm" type="password" name="password-confirm" placeholder="Confirm Password" required/>
    <input type="submit" value="Submit"/>
</form>
<?php 
if(!isset($_POST['agent'])){
    echo '<div class="info">*All input fields are required.</div>';
}
?>
