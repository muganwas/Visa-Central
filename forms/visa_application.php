<?php
    global $glip;
    if(isset($_POST['application'])){
        if(isset($_POST['name']) && isset($_POST['passport_no']) && isset($_POST['ref_card_no']) && isset($_POST['ref_mobile_no'])){
            if(isset($_SESSION['username'])){
              $agent = trim(htmlentities($_SESSION['username']));
            }else{
              $agent = 'none';
            }
            $name= trim(htmlentities($_POST['name']));
            $passport_no = trim(htmlentities($_POST['passport_no']));
            $ref_id_no = trim(htmlentities($_POST['ref_card_no']));
            $ref_mobile_no = trim(htmlentities($_POST['ref_mobile_no']));
            $status = "applied";
        
            $feedback = $glip->submitForm($agent, $name, $passport_no, $ref_id_no, $ref_mobile_no, $status);
        
        }
    }
 ?>
<?php if(isset($feedback)){?>
    <div id="feedback"><?php echo $feedback; ?></div>
<?php }?>
<form action="" method="POST">
    <input type="hidden" value="application" name="application" />
    <input type="text" name="name" placeholder="Applicants Name" required/>
    <input type="text" name="passport_no" placeholder="Passport Number" required/>
    <input type="text" name="ref_card_no" placeholder="Referee ID Number" required/>
    <input type="text" name="ref_mobile_no" placeholder="Referee Mobile Number" required/>
    <input type="submit" name="name" value="Submit"/>
</form>
<div class="info">*All input fields are required.</div>