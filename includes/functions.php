<?php
class visa_central{
    public function showHeader(){
        require('includes/header.php');
    }
    public function showFooter(){
        require('includes/footer.php');
    }
    public function loginForm() {
        require('includes/login.php');
    }
    public function login($email, $pass){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){
            
            if((isset($email) && isset($pass)) && (!empty($email) && !empty($pass))){
                $pass = md5($pass);
                $query = "SELECT id FROM users WHERE `email` = ? AND `password` = ?";
                $connect = $db->prepare($query);
                $connect->bind_param("ss", $email, $pass);
                $connect->execute();
                $connect->bind_result($id);
                $connect->fetch();
                $connect->close();

                if($id>0){
                    $_SESSION['username'] =$email;
                    header('location: dash.php?plc=home');

                }else{

                    return $msg = "Please fill in the correct credentials <br/> or contact your SYSTEMS ADMIN";

                }
            }else{

                return $msg ="Please fill both input boxes!";
            }
        }
    }
    public function logout($logout){

        global $user;

        if($logout == "yes"){
            
            if(!isset($_COOKIE['user_id_cookie']) || $_COOKIE['user_id_cookie'] != $user){
                
                setcookie('user_id_cookie', $user);  
                
            }
            session_destroy();
            header('location: '. site_root);
        }
    }
    public function applications($level, $institution){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if(isset($_GET['plc'])){
            $loc =temp_name1."?plc=".$_GET['plc'];
        }else{
            $lco = temp_name1;
        }
       
        if($db = new mysqli($server, $username, $password, $database)){

            if($institution == "idcc"){
                $query = "SELECT `id`, `type` FROM `forms` WHERE `at_level` = ?";
                $connect = $db->prepare($query);
                $connect->bind_param("s", $level);
                $connect->execute();
                $connect->bind_result($id, $application);              
                while($connect->fetch()){
                    $there = true;
                    echo '<li class="dit"><span class="bold">Application Id: </span>'.$id.'&nbsp; <span class="bold">Type: </span><a href="'.$loc.'&application='.$id.'">'.$application.'</a></li>';                   
                }
                if(!isset($there)){
                    echo "<span class='feedback'>There are no applications to vet</span>";
                }
            }else{
                $query = "SELECT `id`, `type` FROM `forms` WHERE `at_level` = ? AND `requesting_entity` = ?";
                $connect = $db->prepare($query);
                $connect->bind_param("ss", $level, $institution);
                $connect->execute();
                $connect->bind_result($id, $application);

                while($connect->fetch()){
                    $there = true;
                    echo '<li class="dit"><span class="bold">Application Id: </span>'.$id.'&nbsp; <span class="bold">Type: </span><a href="'.$loc.'&application='.$id.'">'.$application.'</a></li>';                   
                }
                if(!isset($there)){
                    echo "<span class='feedback'>There are no applications to vet</span>";
                }
            }

            
        }
    }
    public function getApprovedApplications($staus){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $done_level = 5;
        if(isset($_GET['plc']) && isset($_GET['approved'])){
            $loc =temp_name1."?plc=".$_GET['plc']."&approved=".$_GET['approved'];
        }else{
            $loc = temp_name1;
        }
       
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id`, `type`, `approved_by` FROM `forms` WHERE `approved` = ? AND `at_level`=?";
            $connect = $db->prepare($query);
            $connect->bind_param("ss", $staus, $done_level);
            $connect->execute();
            $connect->bind_result($id, $application, $approved_by);

            while($connect->fetch()){
                $there=true;
                $loc = $loc."&applicant=".$id;
                echo '<li class="dit"><span class="bold">Application Id: </span><a href="'.$loc.'">'.$id.'</a>&nbsp; <span class="bold">Type: </span><a href="'.$loc.'">'.$application.' </a> <span class="bold">Final Authority: </span>'.$approved_by.'</li>';                   
            }
            if(!isset($there)){
                echo "<span class='feedback'>There are no applications to show.</span>";
            }   
        }
    }
    public function getLevel($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `level` FROM `users` WHERE `email` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($level);

            while($connect->fetch()){

                return $level;
                                
            } 

        }
    }
    public function getInstitution($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `institution` FROM `users` WHERE `email` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($inst);

            while($connect->fetch()){

                return $inst;
                                
            } 

        }
    }
    public function getUserNameById($id){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `name` FROM `users` WHERE `id` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $id);
            $connect->execute();
            $connect->bind_result($username);

            while($connect->fetch()){

                return $username;
                                
            } 

        }
    }
    public function getUsername($email){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `name` FROM `users` WHERE `email` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $email);
            $connect->execute();
            $connect->bind_result($username);

            while($connect->fetch()){

                return $username;
                                
            } 

        }
    }
    public function getUserId($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id` FROM `users` WHERE `email` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
            } 

        }
    }
    public function getApplicantId($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id` FROM `forms` WHERE `requesting_entity` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
            } 

        }
    }
    public function commented($user, $applicant){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `comment` FROM `comments` WHERE `admin_id` = ? AND `applicant_id`=?";
            $connect = $db->prepare($query);
            $connect->bind_param("ss", $user, $applicant);
            $connect->execute();
            $connect->bind_result($comment);

            while($connect->fetch()){

                return $comment;
                                
            }
        }
    }
    public function getApplicationDetails($applicant){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id`, `type`, `requesting_entity`, `purpose_visit`, `frequency`, `driver_name`, `driver_qid`, `vehicle_number`, `phone_number`, `additional_passengers`, `employee_name`, `material`, `date` FROM `forms` WHERE `id` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $applicant);
            $connect->execute();
            $connect->bind_result($id, $type, $requesting_entity, $purpose_visit, $frequency, $driver_name, $driver_qid, $vehicle_number, $phone_number, $additional_passengers, $employee_name, $material, $date );
            $connect->fetch();
            $connect->close();
            if(isset($_GET['approved'])){
                echo '<div class="print" id="print_approved">Print</div>';
                echo '<h3>Approved Application Details</h3>';
            }
            echo '<li> Type: <span class="dit">' .$type.'</span></li>', '<li> Requesting Entity: <span class="dit">'.$requesting_entity.'</span></li>', '<li> Purpose for visit: <span class="dit">'.$purpose_visit.'</span></li>', '<li> Frequency: <span class="dit">'.$frequency.'</span></li>', '<li> Driver\'s Name: <span class="dit">'.$driver_name.'</span></li>', '<li> Drivers\'s QID: <span class="dit">'.$driver_qid.'</span></li>', '<li> Vehicle number: <span class="dit">'.$vehicle_number.'</span></li>', '<li> Phone number: <span class="dit">'.$phone_number.'</span></li>', '<li> Additional Passangers: <span class="dit">'.$additional_passengers.'</span></li>', '<li> Employee\'s Name: <span class="dit">'.$employee_name.'</span></li>', '<li> Material: <span class="dit">'.$material.'</span></li>','<li> Date: <span class="dit">'.$date.'</span></li>' ;
            echo '</div><div class="comments">';
            echo "<h3>Comments</h3>";
            
            $query1 = "SELECT `admin_id`, `comment`, `date` FROM `comments` WHERE `applicant_id` = ?";
            $connect1 = $db->prepare($query1);
            $connect1->bind_param("s", $id);
            $connect1->execute();
            $connect1->bind_result($admin_id, $comment, $date);
            while($connect1->fetch()){
                $a_name = $this->getUserNameById($admin_id);
                if($a_name !== null && $a_name !== ''){
                    echo '<li class="dit"> <span class="bold">'.$a_name. ":</span><br/> " .$comment.' <br/><span class="bold">Date: </span>'.$date.'</li>';
                }
            }
            
            $connect1->close();
        }
    }
    public function postComment($user_id, $applicants_id, $comment){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if(!empty($user_id) && !empty($applicants_id) && !empty($comment)){

            if($db = new mysqli($server, $username, $password, $database)){

                $query = "INSERT INTO `comments` VALUES('',?,?,?,null)";
                $connect = $db->prepare($query);
                $connect->bind_param("sss", $user_id, $applicants_id, $comment);
                if($connect->execute()){
                    header('location:'.$loc1);                   
                } 
    
            }
        }else{
            return 'Please fill the comment section';
        }       
        
    }
    public function sendEmailNotification($level){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $emails = [];
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `email` FROM `users` WHERE `level`=?";
            $connect = $db->prepare($query);
            $connect->bind_param('s', $level);
            $connect->execute();
            $connect->bind_result($email);
            while($connect->fetch()){
               array_push($emails, $email);                  
            }
            $email_string = implode(',', $emails);
            $name = "IDCC FORMS CENTRAL";
            $from = "info@idccqatar.com";
            $to = ".$email_string.";
            $message = "There is a new form available for approval \r<br/>";
            $message = htmlspecialchars($message, ENT_QUOTES);
            $subject = 'RE: IDCC FORMS';
            $headers =  'MIME-Version: 1.0'."\r<br/>"; 
            $headers .= 'From: '.$name.' '.$mail."\r<br/>";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r<br/>"; 
            
            if(!empty($name) && !empty($from) && !empty($message)){
                
                try{
                    if(@mail($to, $subject, $message, $headers)){

                            return $msg = 'Notifications sent, thank you.';

                        }else{

                            throw new newExce;
                        }
                    }catch(newExce $ex){

                        return $msg = $ex->emailfError();
                    }
                
            }else{
                
                return $msg = 'There\'s a problem with sending notifications, sorry!';
            }
        }
    }
    public function approve_application($next_level, $approver, $applicant){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $num_of_approvers = 4;
        if($next_level <= $num_of_approvers){
            if($connect = mysqli_connect($server, $username, $password, $database)){

                $query = "UPDATE `forms` SET `at_level`= ? WHERE `id`=? ";
                $upd = $connect->prepare($query);
                $upd->bind_param("ss", $next_level, $applicant);
                $upd->execute();
                if($upd->affected_rows >= 1){
                    return $msg = $applicant."'s application was successfully approved";
                    $this->sendEmailNotification($next_level);
                }else{
                    return $msg = "There was an error approving applicant!";
                }
            }else{
                return $msg = "There was a problem connecting to the database";
            }
        }else{
            if($connect = mysqli_connect($server, $username, $password, $database)){
                $approved=1;

                $query = "UPDATE `forms` SET `approved`= ?, `approved_by`=?, `at_level`=? WHERE `id`=? ";
                $upd = $connect->prepare($query);
                $upd->bind_param("ssss", $approved, $approver, $next_level, $applicant);
                $upd->execute();
                if($upd->affected_rows >= 1){
                    return $msg = $applicant."'s application was successfully approved";
                    $this->sendEmailNotification($next_level);
                }else{
                    return $msg = "There was an error approving applicant!";
                }
            }else{
                return $msg = "There was a problem connecting to the database";
            } 
        }
        
    }
    public function disapprove_application($next_level, $applicant){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($connect = mysqli_connect($server, $username, $password, $database)){
            $query = "UPDATE `forms` SET `at_level`= ? WHERE `id`=? ";
            $upd = $connect->prepare($query);
            $upd->bind_param("ss", $next_level, $applicant);
            $upd->execute();
            if($upd->affected_rows >= 1){
                echo $msg = $applicant."'s application was successfully dis-approved";
                $this->sendEmailNotification($next_level);
            }else{
                echo $msg = "There was an error dis-approving applicant!";
            }         
        }else{
            echo $msg = "There was a problem connecting to the database";
        }
    }
    public function rejectApplication($user, $applicant){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $rejected_level = 5;
        if($connect = mysqli_connect($server, $username, $password, $database)){

            $query = "UPDATE `forms` SET `approved_by`= ?, `at_level`= ? WHERE `id`=? ";
            $upd = $connect->prepare($query);
            $upd->bind_param("sss", $user, $rejected_level, $applicant);
            $upd->execute();
            if($upd->affected_rows >= 1){
                echo $msg = $applicant."'s application was successfully rejected";
            }else{
                echo $msg = "There was an error rejecting applicant!";
            }
        }else{
            echo $msg = "There was a problem connecting to the database";
        }
    }
    public function getUsers(){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $loc =temp_name1."?plc=".$_GET['plc'];
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id`, `name` FROM `users`";
            $connect = $db->prepare($query);
            $connect->execute();
            $connect->bind_result($id, $names);
            while($connect->fetch()){
                echo '<li class="dit"><a href="'.$loc.'&user='.$id.'">'.$names.'</a></li>';                   
            }
        }
    }
    public function getUsersInfo($id){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `name`, `email`, `level`, `title`, `institution` FROM `users` WHERE `id`=?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $id);
            $connect->execute();
            $connect->bind_result($name, $email, $level, $title, $institution);
            while($connect->fetch()){
                echo '<li class="dit"> <span class="bold">Name: </span>'.$name.' <span class="bold">Email Addres: </span>'.$email.
                ' <span class="bold">Level: </span>'.$level.' <span class="bold">Title: </span>'.$title.
                ' <span class="bold">Institution: </span>'.$institution.'</li>';                  
            }
        }
    }
    public function updateUsers($to_update, $data, $id){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($connect = mysqli_connect($server, $username, $password, $database)){
            if($to_update == "password"){
                $data = md5($data);
            }else{
                $data = trim(htmlentities($data));
            }
            $query = "UPDATE `users`  SET `".$to_update."`= ? WHERE `id`=? ";
            $upd = $connect->prepare($query);
            $upd->bind_param("ss", $data, $id);
            $upd->execute();
            if($upd->affected_rows >= 1){
                return "User information was successfully updated, Refresh to see changes";
            }else{
                return $msg = "There was an error updation user info!";
            }
        }else{
            return $msg = "There was a problem connecting to the database";
        }
    }
    public function deleteUsers($id){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($connect = mysqli_connect($server, $username, $password, $database)){

            $query = "DELETE FROM `users`  WHERE `id`= ?";
            $upd = $connect->prepare($query);
            $upd->bind_param("s",$id);
            $upd->execute();
            if($upd->affected_rows >= 1){
                return "User was successfully deleted, Refresh to see changes";
            }else{
                return $msg = "There was an error while deleting user!";
            }
        }else{
            return $msg = "There was a problem connecting to the database";
        }
    }
    public function createUser($name, $email, $phone, $pass, $c_pass, $level, $title, $institution){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $name=trim(htmlentities($name));
        $email=trim(htmlentities($email));
        $phone=trim(htmlentities($phone));
        $rem_token = rand(-100, 100);
        $level=trim(htmlentities($level));
        $title=trim(htmlentities($title));
        $institution=trim(htmlentities($institution));
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($c_pass) && !empty($level) && !empty($title) && !empty($institution)){

            if($pass == $c_pass){
                $pass=md5($pass);
                if($db = new mysqli($server, $username, $password, $database)){

                    $query = "INSERT INTO `users` VALUES('',?,?,?,?,?,null,'',?,?,?)";
                    $connect = $db->prepare($query);
                    $connect->bind_param("ssssssss", $name, $email, $phone, $pass, $rem_token, $level, $title, $institution);
        
                    if($connect->execute()){
                        return 'You successfull added '.$name.' to the database';                   
                    } 
        
                }
            }else{
                return 'The passwords don\'t match';
            }
        }else{
            return 'Please fill all the text fields';
        }       
        
    }
    public function submitForm($type, $requesting_entity, $purpose_visit, $frequency, $driver_name, $driver_qid, $vehicle_number, $phone_number, $additional_passengers, $passanger_qids, $employee, $material, $date, $time_in, $time_out){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $entry_level = 1;
        if(!empty($type) && !empty($requesting_entity) && !empty($purpose_visit) && !empty($frequency) && !empty($driver_name) && !empty($driver_qid) && !empty($vehicle_number) && !empty($phone_number) && !empty($additional_passengers) && !empty($passanger_qids) && !empty($employee) && !empty($material) &&  !empty($date) && !empty($time_in) && !empty($time_out)){

            $additional_passengers = $additional_passengers.' '.$passanger_qids;
            if($db = new mysqli($server, $username, $password, $database)){
                try{
                    $query = "INSERT INTO `forms` VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'','','',null,'')";
                    $connect = $db->prepare($query);
                    $connect->bind_param("sssisssssssssss", $type, $requesting_entity, $purpose_visit, $frequency, $driver_name, $driver_qid, $vehicle_number, $phone_number, $additional_passengers, $employee, $material, $date, $time_in, $time_out, $entry_level);                 
                    if($connect->execute()){
                        return 'You successfull submite your form, thank you.';
                        $this->sendEmailNotification($entry_level);
                    }else{
                        return 'Something went wrong, please try again.';
                    }                
                }catch(Exception $e){
                    return $e->message;
                }
            }else{
                return 'There is an error with the form, try agin within 24hrs.';
            }
        }else{
            return 'Fill in all required fields.';
        }
               
    }
}
