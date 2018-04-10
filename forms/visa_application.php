<?php
    global $glip;
    if(isset($_POST['application'])){

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
                //random applican number generator
                $chars = "qwertyuiopasdfghjklzxcvbnm";
                $charArr = str_split($chars);
                $charArrLen = count($charArr);
                $app_noArr = [];
                $ranNumLen = 3;
                for($count=0;$count<$ranNumLen; $count++){
                    $ranCharP = rand(0, ($charArrLen-1));
                    $ranChar = $charArr[$ranCharP];
                    $ranNum = rand(0,9);
                    $app_noArr[$count]=$ranNum;
                    $app_noArr[$count+3]=$ranChar;
                }
                //end of random num generator
                $app_no= strtoupper(implode("", $app_noArr));
                $status = "processing";
                $pass_photo="mag-shot";
                $pass_copy="passport";
            
                $feedback = $glip->submitForm($agent, $app_no, $status, $pass_photo, $pass_copy);

            }else{
                $feedback = "You Must Fill all fields and attach required Images";
            }
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
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="application" name="application" />
    <!--
    <input type="text" name="name" placeholder="Applicants Name" required/>
    <input type="text" name="passport_no" placeholder="Passport Number" required/>
    <input type="text" name="ref_card_no" placeholder="Referee ID Number" required/>
    <input type="text" pattern="^[0-9]+$" name="ref_mobile_no" placeholder="Referee Mobile Number" required/>-->
    <div class="input_upload">
        <label for="photo" class="upload_button">Applicants Photo: </label>
        <input id="photo" type="file" name="files[]" required/>
        <span class="phototxt" id="photoName"></span>
    </div>
    <div class="input_upload">
        <label for="passport" class="upload_button">Applicants Passport Copy: </label>
        <input id="passport" type="file" name="passport[]" required/>
        <span class="phototxt" id="passportPhotoName"></span>
    </div>
    <input type="submit" value="Submit"/>
</form>
<?php 
if(!isset($_POST['application'])){
    echo '<div class="info">*All input fields are required.</div>';
}
?>
