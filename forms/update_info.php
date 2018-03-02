
<?php
global $user;
global $glip;
$applicant = $_SESSION['get_info'];
$status = $glip->getStatus($applicant);
$userLevel = $this->getLevel($user);
if($userLevel != 3){
    $hidden="hidden";
}else{
    $hidden='';
}
if(!isset($_POST['activate'])){
    $disabled = "disabled";
}else{
    $disabled = "";
    $hidden = "";
}
echo '
    <div class="inline_block">
        <form action="" method="POST">
            <input type="hidden" name="get_comments" value="'.$applicant.'"/>
            <button class="small-button" type="submit" name="submit">Notes</button>
        </form>
    </div>
    <div class="inline_block">
        <form action="" method="POST">
            <input type="hidden" name="activate"/>
            <button class="small-button '.$hidden.'" type="submit" name="submit">Make Changes</button>
        </form>
    </div>
    
    ';
    
    if($status == "processing"){ 
        $option2 = '<option value="ready">Ready</option>';
        $option3 = '<option value="rejected">Rejected</option>';
    }else if($status == "ready"){
        $option2 = '<option value="processing">Processing</option>';
        $option3 = '<option value="rejected">Rejected</option>';
    }else if($status == "rejected"){
        $option2 = '<option value="processing">Processing</option>';
        $option3 = '<option value="rejected">Ready</option>';
    }
echo '<form action="" method="POST" enctype="multipart/form-data">
    <select name="status"'.$disabled.'>
    <option value="'.$status.'">',ucfirst($status),'</option>'
    ,$option2
    ,$option3,'
    </select>
    <div class="visa '.$disabled.'">
        <label for="visa">Upload Visa Copy</label>
        <input id="visa" type="file" name="visa[]" multiple="multiple" '.$disabled.'/>
    </div>
    <button class="small-button '.$disabled.'" type="submit" name="submit" '.$disabled.'>Save Changes</button>
</form>
';
?>
