<?php
    global $glip;
    if(isset($_POST['application'])){
        if(isset($_POST['name']) && isset($_POST['app_number']) && isset($_POST['passport_no']) && isset($_POST['ref_card_no']) && !empty($_FILES['files']) && isset($_POST['ref_mobile_no'])){
            if(isset($_SESSION['username'])){
              $agent = trim(htmlentities($_SESSION['username']));
            }else{
              $agent = 'none';
            }
            //file upload array check(checking if anything was uploaded)
            $arr_length = count($_FILES['files']{'name'});

            for($x = 0; $x < $arr_length; $x++) {

                $file_name = $_FILES['files']{'name'}[$x];
                $file_name1 = $_FILES['passport']{'name'}[$x];
                if(!empty($file_name) && !empty($file_name1)){
                    $app_no= trim(htmlentities($_POST['app_number']));
                    $app_name= trim(htmlentities($_POST['name']));
                    $passport_no = trim(htmlentities($_POST['passport_no']));
                    $ref_id_no = trim(htmlentities($_POST['ref_card_no']));
                    $ref_mobile_no = trim(htmlentities($_POST['ref_mobile_no']));
                    $status = "applied";
                    $pass_photo="mag-shot";
                    $pass_copy="passport";
                
                    $feedback = $glip->submitForm($agent, $app_no, $app_name, $passport_no, $ref_id_no, $ref_mobile_no, $status, $pass_photo, $pass_copy);

                }else{
                    $feedback = "You Must Fill all fields and attach required Images";
                }
            }
        }else{
            $feedback = "You Must Fill all fields and attach required Images";
        }
    }
 ?>
<?php if(isset($feedback)){?>
    <div id="feedback"><?php echo $feedback; ?></div>
<?php }?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="application" name="application" />
    <input type="text" name="app_number" placeholder="Application Number" required/>
    <input type="text" name="name" placeholder="Applicants Name" required/>
    <input type="text" name="passport_no" placeholder="Passport Number" required/>
    <input type="text" name="ref_card_no" placeholder="Referee ID Number" required/>
    <input type="text" pattern="^[0-9]+$" name="ref_mobile_no" placeholder="Referee Mobile Number" required/>
    <div class="input_upload">
        <label for="photo">Applicants Likeness</label><input id="photo" type="file" name="files[]" multiple="multiple" required/>
    </div>
    <div class="input_upload">
        <label for="passport">Applicants Passport Copy</label><input id="passport" type="file" name="passport[]" multiple="multiple" required/>
    </div>
    <input type="submit" value="Submit"/>
</form>
<?php 
if(!isset($_POST['application'])){
    echo '<div class="info">*All input fields are required.</div>';
}
?>
