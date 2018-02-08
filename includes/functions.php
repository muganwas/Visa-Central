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
    public function showApplications() {
        require('dashes/applications.php');
    }
    public function showAgents() {
        require('dashes/agents.php');
    }
    public function showExecs() {
        require('dashes/execs.php');
    }
    public function makeNote(){
        require('forms/makeNote.php');
    }
    public function applicationForm() {
        require('forms/visa_application.php');
    }
    public function update_applicant_info(){
        require('forms/update_info.php');
    }
    public function update_agents_info(){
        require('forms/update_agent_info.php');
    }
    public function update_users_info(){
        require('forms/update_users_info.php');
    }
    public function agentCreationForm(){
        require('forms/create_agent.php');
    }
    public function execCreationForm(){
        require('forms/create_exec.php');
    }
    public function upload_photo($agent, $applicant, $pass_photo){

        $uploader = $agent;        
        $date = (new DateTime)->format('Y-m-d\ H꞉i꞉s');

        if((archive_dir !== null) && $applicant != null){

            $f_folder = $applicant;
            $location = (archive_dir).$f_folder."/";
            if(!file_exists($location)){
                mkdir($location, 0777, true);
            }
        }else{

            echo "No directory provided!";

        }

        //declare variable once file has been selected and sent for upload
        if(isset($_FILES['files']) && !empty($_FILES['files'])){

            $arr_length = count($_FILES['files']{'name'});

            for($x = 0; $x < $arr_length; $x++) {

                $file_name = $_FILES['files']{'name'}[$x];
                $tmp_name = $_FILES['files']{'tmp_name'}[$x];
                $file_size = $_FILES['files']{'size'}[$x];
                $file_type = $_FILES['files']{'type'}[$x];
                //turn the file_type string to an array, seperated by the /
                $file_type_array = explode('/', $file_type);
                //extract the first string in position 0
                $fstring = $file_type_array['0'];
                $file_name_arr = explode(".", $file_name);
                $file_extension_temp = end($file_name_arr);
                //use the substr function to extract string after a position, the position is found by the strpos function which searches for the position of the period. use strtolower to change all string to lowercase.
                $file_extension = strtolower($file_extension_temp);

                if(!empty($file_name)){

                    if(($file_extension == 'jpg' || $file_extension == 'png' || $file_extension == 'gif')){//check file extension file type

                        if($file_size <= 5000000){//check the size of the file

                        $last_name = $location.$pass_photo.'.'.$file_extension;//change the file_name to a string passed from the params

                            if(move_uploaded_file($tmp_name, $last_name)){
                                return $file_name.' Uploaded ';
                            }
                            else{
                                return $file_name.' already exist or there was an error! Try again or contact your SYSTEMS ADMIN.';
                            }
                        }
                        else{
                                return $file_name.' is too large!';
                            }
                    }
                    else{
                            return $file_name.' file format is not permitted!';
                        }
                }else{
                        return 'Select an passport photo!';
                }
            }   
        }else{
            return "Nothing has been set";
        }
    }
    public function upload_passport($agent, $applicant, $passport){

        $uploader = $agent;        
        $date = (new DateTime)->format('Y-m-d\ H꞉i꞉s');

        if((archive_dir !== null) && $applicant != null){

            $f_folder = $applicant;
            $location = (archive_dir).$f_folder."/";
            if(!file_exists($location)){
                mkdir($location, 0777, true);
            }
        }else{

            echo "No directory provided!";

        }

        //declare variable once file has been selected and sent for upload
        if(isset($_FILES['passport']) && !empty($_FILES['passport'])){

            $arr_length = count($_FILES['passport']{'name'});

            for($x = 0; $x < $arr_length; $x++) {

                $file_name1 = $_FILES['passport']{'name'}[$x];
                $tmp_name1 = $_FILES['passport']{'tmp_name'}[$x];
                $file_size1 = $_FILES['passport']{'size'}[$x];
                $file_type1 = $_FILES['passport']{'type'}[$x];
                //turn the file_type string to an array, seperated by the /
                $file_type_array1 = explode('/', $file_type1);
                //extract the first string in position 0
                $fstring1 = $file_type_array1['0'];
                $file_name_arr1 = explode(".", $file_name1);
                $file_extension_temp1 = end($file_name_arr1);
                //use the substr function to extract string after a position, the position is found by the strpos function which searches for the position of the period. use strtolower to change all string to lowercase.

                $file_extension1 = strtolower($file_extension_temp1);

                if(!empty($file_name1)){

                    if(($file_extension1 == 'jpg' || $file_extension1 == 'png' || $file_extension1 == 'gif')){//check file extension file type

                        if($file_size1 <= 5000000){//check the size of the file

                            $last_name1 = $location.$passport.'.'.$file_extension1;

                            if(move_uploaded_file($tmp_name1, $last_name1)){
                                return $file_name1.' Uploaded ';
                            }
                            else{
                                return $file_name1.' already exist or there was an error! Try again or contact your SYSTEMS ADMIN.';
                            }
                        }
                        else{
                                return $file_name1.' is too large!';
                            }
                    }
                    else{
                            return $file_name1.' file format is not permitted!';
                        }
                }else{
                        return 'There was no Image provided!';
                }
            }   
        }else{
            return "Nothing has been set";
        }
    }
    public function upload_visa_copy($agent, $applicant, $visa){

        $uploader = $agent;        
        $date = (new DateTime)->format('Y-m-d\ H꞉i꞉s');

        if((archive_dir !== null) && $applicant != null){

            $f_folder = $applicant;
            $location = (archive_dir).$f_folder."/";
            if(!file_exists($location)){
                mkdir($location, 0777, true);
            }
        }else{

            echo "No directory provided!";

        }

        //declare variable once file has been selected and sent for upload
        if(isset($_FILES['visa']) && !empty($_FILES['visa'])){

            $arr_length = count($_FILES['visa']{'name'});

            for($x = 0; $x < $arr_length; $x++) {

                $file_name1 = $_FILES['visa']{'name'}[$x];
                $tmp_name1 = $_FILES['visa']{'tmp_name'}[$x];
                $file_size1 = $_FILES['visa']{'size'}[$x];
                $file_type1 = $_FILES['visa']{'type'}[$x];
                //turn the file_type string to an array, seperated by the /
                $file_type_array1 = explode('/', $file_type1);
                //extract the first string in position 0
                $fstring1 = $file_type_array1['0'];
                $file_name_arr1 = explode(".", $file_name1);
                $file_extension_temp1 = end($file_name_arr1);
                //use the substr function to extract string after a position, the position is found by the strpos function which searches for the position of the period. use strtolower to change all string to lowercase.

                $file_extension1 = strtolower($file_extension_temp1);

                if(!empty($file_name1)){

                    if(($file_extension1 == 'jpg' || $file_extension1 == 'png' || $file_extension1 == 'gif')){//check file extension file type

                        if($file_size1 <= 5000000){//check the size of the file

                            $last_name1 = $location.$visa.'.'.$file_extension1;

                            if(move_uploaded_file($tmp_name1, $last_name1)){
                                return $file_name1.' Uploaded ';
                            }
                            else{
                                return $file_name1.' already exist or there was an error! Try again or contact your SYSTEMS ADMIN.';
                            }
                        }
                        else{
                                return $file_name1.' is too large!';
                            }
                    }
                    else{
                            return $file_name1.' file format is not permitted!';
                        }
                }else{
                        return 'There was no Image provided for upload!';
                }
            }   
        }else{
            return "Nothing has been set";
        }
    }
    public function login($email, $pass){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){
            
            if((isset($email) && isset($pass)) && (!empty($email) && !empty($pass))){
                $pass = md5($pass);
                $query = "SELECT `id`, `name`, `level` FROM users WHERE `email` = ? AND `password` = ?";
                $connect = $db->prepare($query);
                $connect->bind_param("ss", $email, $pass);
                $connect->execute();
                $connect->bind_result($id, $name, $level);
                $connect->fetch();
                $connect->close();

                if($id>0){
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $name;
                    $_SESSION['level']=$level;
                    header('location: dash.php?plc=applications'); 
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
    public function applicationsList($agent_id, $agent_name){

        if(isset($_GET['plc'])){
            $loc =temp_name1."?plc=".$_GET['plc'];
        }else{
            $loc = temp_name1;
        }
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $row_count = 0;
        $rows_to_show = 9;
        if($mysqli = new mysqli($server, $username, $password, $database)){

            $query2 = "SELECT `level` FROM `users` WHERE `name` ='".$agent_name."'";
            $connect2 = $mysqli->query($query2);
            $rez= $connect2->fetch_array(MYSQLI_NUM);
            $level=$rez[0]; 
            if($level == 1){
                //fetch the data depending on the page requested
                $query1 = "SELECT count(id) FROM applications WHERE travel_agent ='".$agent_name."'";
            }else{
                $query1 = "SELECT count(id) FROM applications";
            }       
            $connect1 = $mysqli->query($query1);
            $row = $connect1->fetch_row();//get the number of rows the query returned
            $total_row_count = $row[0];
            $last_page = ceil($total_row_count/$rows_to_show);
            //make sure the last page is never less than 1
            if($last_page < 1){
                $last_page = 1;
            }
            //page number details
            $page_num = 1;
            if(isset($_GET['page_num'])){
                $page_num = preg_replace('#[^0-9]#', '', $_GET['page_num']) ;
            }
            if($page_num < 1){
                $page_num = 1;
            }else if($page_num > $last_page){
                $page_num = $last_page;
            }
            $limit = ($page_num - 1) * $rows_to_show.', '. $rows_to_show;
            if($level == 1){
                //fetch the data depending on the page requested
                $query = "SELECT * FROM applications WHERE travel_agent = '".$agent_name."' ORDER BY `id` DESC LIMIT $limit";
            }else{
                $query = "SELECT * FROM applications ORDER BY `id` DESC  LIMIT $limit";
            }
            $connect = $mysqli->query($query);
            $page_info = "Page <b>$page_num</b> of <b>$last_page</b>";
            //pagination controls var
            $paginationCtrl = '';
            //pagination navigation start
            echo '<div class="applicationsList">';
            if($last_page != 1){
                $init_next = 2;
                if(!isset($_GET['page_num']) || $_GET['page_num'] == 1){
                    $second = '&amp;page_num='.$init_next;
                    $last_page_addon = '&amp;page_num='.$last_page;
                    echo 
                    "<div>
                        <a href='".$loc."".$second."'> Next </a>
                        <a href='".$loc."".$last_page_addon."'> Last </a>
                    </div>";
                }else if(isset($_GET['page_num'])){
                    $curr_page = $_GET['page_num'];
                    if($curr_page == $last_page && $curr_page == 2){
                        $init_page = '&amp;page_num=1';
                        echo 
                        "<div>
                            <a href='".$loc."'> Prev </a> 
                        </div>";
                    }else if($curr_page != $last_page && $curr_page != 1){
                        $next_page = $curr_page+1;
                        $prev_page = $curr_page-1;
                        $next_page_addon = '&amp;page_num='.$next_page;
                        $prev_page_addon = '&amp;page_num='.$prev_page;
                        $last_page_addon = '&amp;page_num='.$last_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                            <a href='".$loc."".$next_page_addon."'> Next </a>
                            <a href='".$loc."".$last_page_addon."'> Last </a>
                        </div>";
                    }else if(($curr_page == $last_page && $curr_page != 1)){
                        $prev_page = $curr_page-1;
                        $prev_page_addon = '&amp;page_num='.$prev_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                        </div>";
                    }
                }   
            }
            //pagination end
            //Information about the results
            if($total_row_count != 0){
                echo '<div class="repeat_reg">';
                echo 
                '<div class="thead">
                    <div class="agent">Agent</div>
                    <div class="app_no">Form Id</div>
                    <div class="ref_id">Ref Id</div>
                    <div class="ref_mobile">Ref Mobile</div>
                    <div class="status_alt">Status</div>
                    <div class="date">Date Submitted</div>
                </div>
                <div class="clear"></div> 
                ';      
                while($data = $connect->fetch_array(MYSQLI_ASSOC)){
                    $timestamp = $data['created'];
                    $timestampArr = explode(' ', $timestamp);
                    $date = $timestampArr[0];
                    echo 
                    '<div class="tbody">
                    <div class="agent">',$data['travel_agent'],'</div>',
                    '<div class="app_no_alt">
                    <form action="" method="POST">
                    <input type="hidden" name="get_info" value="'.$data['application_number'].'"/>
                    <input type="submit" value="'.
                    $data['application_number']
                    .'" /></form></div>',
                    '<div class="ref_id">',$data['reference_card_number'],'</div>',
                    '<div class="ref_mobile">',$data['reference_mobile_number'],'</div>',
                    '<div class="status_alt">',$data['application_status'],'</div>',
                    '<div class="date">',$date,'</div>
                    </div>
                    <div class="clear"></div>
                    ';
                }
                echo '</div>';
                echo "<div>", $page_info, "</div>";
            }
            if($total_row_count==0){
                echo "<div id='feedback'>There are no applications to view</div>";
            }
            echo '</div>';        
        }
    }
    
    public function applicationSearch($app_id){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $app_id = "%".$app_id."%";
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `application_number`, `application_status` FROM `applications` WHERE `application_number` LIKE ? ";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $app_id);
            $connect->execute();
            $connect->store_result();//result has to be stored for num_rows to work
            $row_count = $connect->num_rows;
            $connect->bind_result($applicant, $status);

            if($row_count != 0){
                echo '<div class="head">Found...</div><div class="search-rez">';
                echo '<div class="thead">
                <div class="search_1">Form Id</div>
                <div class="search_2">Status</div>
                </div><div class="tbody">';
            }
            while($connect->fetch()){
                $there = 'is';
                echo '<div class="search_1">
                <form action="" method="POST">
                    <input type="hidden" name="get_info" value="'.$applicant.'"/>
                    <input type="submit" value="'.$applicant.'" />
                </form>
                </div>
                <div class="search_2"> ', $status, '</div>';                 
            }
            if(!isset($there)){
                echo "<div class='floating_fb fadeIn'>No results, try another application number</div>";
            }
            echo '</div></div>'; 
        }
    }
    public function getStatus($applicant){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `application_status` FROM `applications` WHERE `application_number` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $applicant);
            $connect->execute();
            $connect->bind_result($status);
            while($connect->fetch()){
                return $status;
            }  
        }
    }
    public function getLevel($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `level` FROM `users` WHERE `name` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($level);

            while($connect->fetch()){

                return $level;
                                
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
    public function getUserId($name){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id` FROM `users` WHERE `name` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $name);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
            } 

        }
    }
    public function getAgentIdFromUserId($user_id){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id` FROM `agents` WHERE `user_id` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user_id);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
            } 

        }
    }
    public function getUserIdByAgentNo($agent_no){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `user_id` FROM `agents` WHERE `agent_number` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $agent_no);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
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
    public function getApplicantsId($user){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `id` FROM `applications` WHERE `application_number` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $user);
            $connect->execute();
            $connect->bind_result($id);

            while($connect->fetch()){

                return $id;
                                
            } 

        }
    }
    public function getAgentsName($user_id){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

            $query = "SELECT `name` FROM users WHERE `id`=".$user_id;
            $connect = $db->query($query);
            $name=$connect->fetch_array(MYSQLI_ASSOC);
            return $name=$name['name'];
        }
    }
    public function getApplicationDetails($applicant, $user){
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){
            $query = "SELECT `id`, `travel_agent`, `name`, `reference_card_number`, `reference_mobile_number`, `created`, `application_status` FROM `applications` WHERE `application_number` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $applicant);
            $connect->execute();
            $count = $connect->store_result();
            $connect->bind_result($id, $agent, $name, $ref_id, $ref_mob, $date, $status);
            $connect->fetch();
            $connect->close();
            $mag_shot_jpg= 'uploads/'.$name.'/mag-shot.jpg';
            $mag_shot_png= 'uploads/'.$name.'/mag-shot.png';
            $mag_shot_gif= 'uploads/'.$name.'/mag-shot.gif';
            $passport_jpg= 'uploads/'.$name.'/passport.jpg';
            $passport_png= 'uploads/'.$name.'/passport.png';
            $passport_gif= 'uploads/'.$name.'/passport.gif';
            $visa_jpg= 'uploads/'.$name.'/visa.jpg';
            $visa_png= 'uploads/'.$name.'/visa.png';
            $visa_gif= 'uploads/'.$name.'/visa.gif';
            if(!isset($_SESSION['applicant'])){
                $_SESSION['applicant'] =  $name;
            }else if(isset($_SESSION['applicant']) && $_SESSION['applicant'] != $name){
                $_SESSION['applicant'] =  $name;
            }
            echo 
            '<div class="applicationsList">
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="unset" value="unset"/>
                    <input type="submit" name="back" value="Back To Application List"/>
                </form>
            </div>';
            echo '<div class="repeat_reg">
            <div class="details_images">';

                if(file_exists($mag_shot_jpg)){
                    echo '<div class="mag-shot-container"><div class="float_left">Passport Photo</div><img class="mag-shot" src="'.$mag_shot_jpg.'"/></div>';
                }else if(file_exists($mag_shot_png)){
                    echo '<div class="mag-shot-container"><div class="float_left">Passport Photo</div><img class="mag-shot" src="'.$mag_shot_png.'"/></div>';
                }else if(file_exists($mag_shot_gif)){
                    echo '<div class="mag-shot-container"><div class="float_left">Passport Photo</div><img class="mag-shot" src="'.$mag_shot_gif.'"/></div>';
                }else{
                    echo '<div class="mag-shot-container"><div class="float_left">Passport Photo</div><img class="mag-shot" src="images/no_image.png"/></div>';
                }
                if(file_exists($passport_jpg)){
                    echo '<div class="passport-copy-container"><div class="float_left">Passport Copy</div><img class="passport-copy" src="'.$passport_jpg.'"/></div>';
                }else if(file_exists($passport_png)){
                    echo '<div class="passport-copy-container"><div class="float_left">Passport Copy</div><img class="passport-copy" src="'.$passport_png.'"/></div>';
                }else if(file_exists($passport_gif)){
                    echo '<div class="passport-copy-container"><div class="float_left">Passport Copy</div><img class="passport-copy" src="'.$passport_gif.'"/></div>';
                }else{
                    echo '<div class="passport-copy-container"><div class="float_left">Passport Copy</div><img class="passport-copy" src="images/no_image.png"/></div>';
                }
                if(file_exists($visa_jpg)){
                    echo '<div class="visa-copy-container"><div class="float_left">Visa Copy</div><img class="visa-copy" src="'.$visa_jpg.'"/></div>';
                }else if(file_exists($visa_png)){
                    echo '<div class="visa-copy-container"><div class="float_left">Visa Copy</div><img class="visa-copy" src="'.$visa_png.'"/></div>';
                }else if(file_exists($visa_gif)){
                    echo '<div class="visa-copy-container"><div class="float_left">Visa Copy</div><img class="visa-copy" src="'.$visa_gif.'"/></div>';
                }else{
                    echo '<div class="visa-copy-container"><div class="float_left">Visa Copy</div><img class="visa-copy" src="images/no_image.png"/></div>';
                }
            echo '</div>';
            echo 
            '<div class="thead">
                <div class="agent_alt">Agent</div>
                <div class="app_name">Name</div>
                <div class="ref_id">Ref Id</div>
                <div class="ref_mobile">Ref Mobile</div>
                <div class="status">Status</div>
                <div class="date">Date Submitted</div>
            </div>
            <div class="clear"></div> 
            ';
            $timestamp = $date;
            $timestampArr = explode(' ', $timestamp);
            $date = $timestampArr[0];
            echo 
                '<div class="tbody1">
                <div class="agent_alt">',$agent,'</div>',
                '<div class="app_name">',$name,'</div>',
                '<div class="ref_id">',$ref_id,'</div>',
                '<div class="ref_mobile">',$ref_mob,'</div>',
                '<div class="status">',$status,'</div>',
                '<div class="date">',$date,'</div>
                </div>
                <div class="clear"></div>
                ';
            echo 
            '</div>
            </div>';
        }
    }
    public function getAgentDetails($agent){
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){
            $query = "SELECT `user_id`, `agent_number`, `email`, `phone`, `address`, `contact person` FROM `agents` WHERE `agent_number` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $agent);
            $connect->execute();
            $count = $connect->store_result();
            $connect->bind_result($id, $agent_no, $email, $phone, $address, $contact);
            $connect->fetch();
            $connect->close();
            $name = $this->getAgentsName($id);
            if(!isset($_SESSION['agent'])){
                $_SESSION['agent'] =  $name;
            }else if(isset($_SESSION['agent']) && $_SESSION['agent'] != $name){
                $_SESSION['agent'] =  $name;
            }
            echo 
            '<div class="applicationsList">
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="unset" value="unset"/>
                    <input type="submit" name="back" value="Back To Agents List"/>
                </form>
            </div>';
            echo '<div class="repeat_reg">';
            echo 
            '<div class="thead">
                <div class="agent_alt">Name</div>
                <div class="ref_mobile_alt1">Agent_No</div>
                <div class="ref_id">Address</div>
                <div class="con_name">Contact Person</div>
                <div class="status">Mobile</div>
                <div class="date">Email Address</div>
            </div>
            <div class="clear"></div> 
            ';
            echo 
                '<div class="tbody1">
                    <div class="agent_alt">'.$name.'</div>
                    <div class="ref_mobile_alt1">'.$agent_no.'</div>
                    <div class="ref_id">'.$address.'</div>
                    <div class="con_name">'.$contact.'</div>
                    <div class="status">'.$phone.'</div>
                    <div class="date">'.$email.'</div>
                </div>
                <div class="clear"></div>
                ';
            echo 
            '</div>
            </div>';
        }
    }
    public function getUserDetails($id){
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){
            $query = "SELECT `name`, `email`, `created_at` FROM `users` WHERE `id` = ?";
            $connect = $db->prepare($query);
            $connect->bind_param("s", $id);
            $connect->execute();
            $count = $connect->store_result();
            $connect->bind_result($name, $email, $date);
            $connect->fetch();
            $connect->close();
            if(!isset($_SESSION['sel_user'])){
                $_SESSION['sel_user'] =  $name;
            }else if(isset($_SESSION['sel_user']) && $_SESSION['sel_user'] != $name){
                $_SESSION['sel_user'] =  $name;
            }
            echo 
            '<div class="applicationsList">
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="unset" value="unset"/>
                    <input type="submit" name="back" value="Back To Executives List"/>
                </form>
            </div>';
            echo '<div class="repeat_reg">';
            echo 
            '<div class="thead">
                <div class="user_name">User Name</div>
                <div class="user_email">User Email</div>
                <div class="user_date">Date Created</div>
            </div>
            <div class="clear"></div> 
            ';
            echo 
                '<div class="tbody1">
                    <div class="user_name">'.$name.'</div>
                    <div class="user_email">'.$email.'</div>
                    <div class="user_date">'.$date.'</div>
                </div>
                <div class="clear"></div>
                ';
            echo 
            '</div>
            </div>';
        }
    }
    public function postNote($user_id, $applicants_id, $comment){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if(!empty($user_id) && !empty($applicants_id) && !empty($comment)){

            if($db = new mysqli($server, $username, $password, $database)){

                $query = "INSERT INTO `notes` VALUES('',?,?,?,null)";
                $connect = $db->prepare($query);
                $connect->bind_param("sss", $user_id, $applicants_id, $comment);
                if($connect->execute()){
                    return '<div class="floating_fb">Note posted successfully.</div>';                   
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
    public function updateApp($to_update, $app_id, $update){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($connect = mysqli_connect($server, $username, $password, $database)){

            $query = "UPDATE `applications`  SET `".$to_update."`= ? WHERE `application_number`=? ";
            $upd = $connect->prepare($query);
            $upd->bind_param("ss", $update, $app_id);
            $upd->execute();
            if($upd->affected_rows >= 1){
                return "User ".$to_update." was successfully updated!";
            }else{
                return $msg = "There was an error updating user ".$to_update;
            }
        }else{
            return $msg = "There was a problem connecting to the database";
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
                return "User information was successfully updated!";
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
    public function updateAgent($to_update, $data, $user_id){
        
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if($connect = mysqli_connect($server, $username, $password, $database)){
            if($to_update == "password" || $to_update =="name" || $to_update == "email"){

                if($to_update == "email"){
                    $data1 = $data;
                    $to_update1 = $to_update;
                    $user_id1 = $user_id;
                    $data = trim(htmlentities($data));
                    $query1 = "UPDATE `agents` SET `".$to_update."`= ? WHERE `user_id`=? ";
                    $upd1 = $connect->prepare($query1);
                    $upd1->bind_param("si", $data, $user_id);
                    $upd1->execute();
                    if($upd1->affected_rows >= 1){
                        $msg1 = "Agent information was successfully updated!";
                    }else{
                        $msg1 ="There was an error updating user info!";
                    }
                    $data1 = trim(htmlentities($data1));
                    $query = "UPDATE `users` SET `".$to_update1."`= ? WHERE `id`=? ";
                    $upd = $connect->prepare($query);
                    $upd->bind_param("si", $data1, $user_id1);
                    $upd->execute();
                    if($upd->affected_rows >= 1){
                        return "User information was successfully updated! <br/>".$msg1;
                    }else{
                        return "There was an error updating user info! <br/>".$msg1;
                    }
                }else{
                    if($to_update == "password"){
                        $data = md5($data);
                    }else{
                        $data = trim(htmlentities($data));
                    }
                    $query = "UPDATE `users`  SET `".$to_update."`= ? WHERE `id`=? ";
                    $upd = $connect->prepare($query);
                    $upd->bind_param("ss", $data, $user_id);
                    $upd->execute();
                    if($upd->affected_rows >= 1){
                        return "User information was successfully updated!";
                    }else{
                        return $msg = "There was an error updation user info!";
                    }
                }

            }else{
                $data = trim(htmlentities($data));
                $query = "UPDATE `agents`  SET `".$to_update."`= ? WHERE `user_id`=? ";
                $upd = $connect->prepare($query);
                $upd->bind_param("ss", $data, $user_id);
                $upd->execute();
                if($upd->affected_rows >= 1){
                    return "User information was successfully updated!";
                }else{
                    return $msg = "There was an error updation user info!";
                }
            }
            
        }else{
            return $msg = "There was a problem connecting to the database";
        }
    }
    public function createAgent($user_id, $agent_number, $email, $phone, $address, $contact){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if(!empty($user_id) && !empty($agent_number) && !empty($email) && !empty($phone) && !empty($address) && !empty($contact)){

            if($db = new mysqli($server, $username, $password, $database)){

                $query = "INSERT INTO `agents` VALUES('',?,?,?,?,?,?)";
                $connect = $db->prepare($query);
                $connect->bind_param("ississ", $user_id, $agent_number, $email, $phone, $address, $contact);
                if($connect->execute()){
                    return 'You successfull registered agent';                   
                } 
            }
        }else{
            return 'Please fill all the text fields';
        }       
        
    }
    public function submitForm($agent, $app_no, $name, $passport_no, $ref_id_no, $ref_mobile_no, $status, $pass_photo, $passport){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        if(!empty($agent) && !empty($name) && !empty($passport_no) && !empty($ref_id_no) && !empty($ref_mobile_no) && !empty($status)){

            if($db = new mysqli($server, $username, $password, $database)){
                try{
                    $query = "INSERT INTO `applications` VALUES('',?,?,?,?,?,?,null,?)";
                    $connect = $db->prepare($query);
                    $connect->bind_param("sssssis", $agent, $app_no, $name, $passport_no, $ref_id_no, $ref_mobile_no, $status);                 
                    if($connect->execute()){
                        //$upload_fb = $this->upload_files($agent, $name);
                        return 'Application creation was successful, thank you.<br/>'. $this->upload_photo($agent, $name, $pass_photo).'<br/>'.$this->upload_passport($agent, $name, $passport);
                        //$this->sendEmailNotification($entry_level);
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
    public function regAgent($agent_name, $agent_number, $address, $contact_person, $agent_mobile, $email, $pass){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $level = 1;
        $feedback ="Init". $agent_name. $agent_number. $address. $contact_person. $agent_mobile. $email. $password;
        if(!empty($agent_name) && !empty($pass) && !empty($agent_number) && !empty($address) && !empty($contact_person) && !empty($agent_mobile) && !empty($email)){
            $pass = md5($pass);
            if($db = new mysqli($server, $username, $password, $database)){
                try{
                    $query = "INSERT INTO `users` VALUES('',?,?,?,null,?)";
                    $connect = $db->prepare($query);
                    $connect->bind_param("ssss", $agent_name, $email, $pass, $level);                 
                    $connect->execute();
                    //get user id
                    $user_id = $this->getUserId($agent_name);
                    if($user_id != 0 && $user_id != null){
                        //$upload_fb = $this->upload_files($agent, $name);
                        return 'User was successfully registered.<br/>'. $this->createAgent($user_id, $agent_number, $email, $agent_mobile, $address, $contact_person);
                        //$this->sendEmailNotification($entry_level);
                    }else{
                        return "Something went wrong while retrieving the user Id.";
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
    public function regExec($name,$email, $pass){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $level = 2;
        if(!empty($name) && !empty($pass) && !empty($email)){
            $pass = md5($pass);
            if($db = new mysqli($server, $username, $password, $database)){
                try{
                    $query = "INSERT INTO `users` VALUES('',?,?,?,null,?)";
                    $connect = $db->prepare($query);
                    $connect->bind_param("ssss", $name, $email,$pass, $level);                 
                    if($connect->execute()){
                        return 'User was successfully registered.';
                        //$this->sendEmailNotification($entry_level);
                    }else{
                        return "Something went wrong while retrieving the user Id.";
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
    public function notesList($applicant){

        if(isset($_GET['plc'])){
            $loc =temp_name1."?plc=".$_GET['plc'];
        }else{
            $loc = temp_name1;
        }
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $row_count = 0;
        $rows_to_show = 1;
        $applicant = trim(htmlentities($applicant));
        if($mysqli = new mysqli($server, $username, $password, $database)){

            $query1 = "SELECT count(id) FROM notes WHERE `applicant_id`=".$applicant;
            $connect1 = $mysqli->query($query1);
            $row = $connect1->fetch_row();//get the number of rows the query returned
            $total_row_count = $row[0];
            $last_page = ceil($total_row_count/$rows_to_show);
            //make sure the last page is never less than 1
            if($last_page < 1){
                $last_page = 1;
            }
            //page number details
            $page_num = 1;
            if(isset($_GET['pag_num'])){
                $page_num = preg_replace('#[^0-9]#', '', $_GET['pag_num']) ;
            }
            if($page_num < 1){
                $page_num = 1;
            }else if($page_num > $last_page){
                $page_num = $last_page;
            }
            $limit = ($page_num - 1) * $rows_to_show.', '. $rows_to_show;
            //fetch the data depending on the page requested
            $query = "SELECT * FROM notes WHERE `applicant_id`= ".$applicant." ORDER BY `id` DESC LIMIT $limit";
            $connect = $mysqli->query($query);
            $page_info = "Page <b>$page_num</b> of <b>$last_page</b>";
            //pagination controls var
            $paginationCtrl = '';
            echo '<div>
                    <form action="" method="POST">
                        <input type="hidden" name="unset1" value="unset1"/>
                        <input type="submit" name="back" value="Back To Detail Page"/>
                    </form>
                </div><br/>';
            //pagination navigation start
            echo '<div class="applicationsList">';
            if($last_page != 1){
                $init_next = 2;
                if(!isset($_GET['pag_num']) || $_GET['pag_num'] == 1){
                    $second = '&amp;pag_num='.$init_next;
                    $last_page_addon = '&amp;pag_num='.$last_page;
                    echo 
                    "<div>
                        <a href='".$loc."".$second."'> Next </a>
                        <a href='".$loc."".$last_page_addon."'> Last </a>
                    </div>";
                }else if(isset($_GET['pag_num'])){
                    $curr_page = $_GET['pag_num'];
                    if($curr_page == $last_page && $curr_page == 2){
                        $init_page = '&amp;pag_num=1';
                        echo 
                        "<div>
                            <a href='".$loc."'> Prev </a> 
                        </div>";
                    }else if($curr_page != $last_page && $curr_page != 1){
                        $next_page = $curr_page+1;
                        $prev_page = $curr_page-1;
                        $next_page_addon = '&amp;pag_num='.$next_page;
                        $prev_page_addon = '&amp;pag_num='.$prev_page;
                        $last_page_addon = '&amp;pag_num='.$last_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                            <a href='".$loc."".$next_page_addon."'> Next </a>
                            <a href='".$loc."".$last_page_addon."'> Last </a>
                        </div>";
                    }else if(($curr_page == $last_page && $curr_page != 1)){
                        $prev_page = $curr_page-1;
                        $prev_page_addon = '&amp;page_num='.$prev_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                        </div>";
                    }
                }   
            }
            //pagination end
            //Information about the results
            if($total_row_count != 0){
                echo '<div class="repeat_reg">';
                echo 
                '<div class="thead">
                    <div class="cname">Name</div>
                    <div class="note">Notes</div>
                    <div class="date">Date Created</div>
                </div>
                <div class="clear"></div> 
                ';      
                while($data = $connect->fetch_array(MYSQLI_ASSOC)){
                    $timestamp = $data['date'];
                    $timestampArr = explode(' ', $timestamp);
                    $date = $timestampArr[0];

                    //get commenters name
                    $id = $data['admin_id'];
                    $query3 = "SELECT `name` FROM users WHERE `id`=".$id;
                    $connect3 = $mysqli->query($query3);
                    $name=$connect3->fetch_array(MYSQLI_ASSOC);
                    $name=$name['name'];
                    echo 
                    '<div class="tbody">
                    <div class="cname downer">',$name,'</div>',
                    '<div class="note downer">',$data['comment'],'</div>',
                    '<div class="date downer">',$date,'</div>
                    </div>
                    <div class="clear"></div>
                    ';
                }
                echo '</div>';
                echo "<div>", $page_info, "</div>";
            }
            if($total_row_count==0){
                echo "<div id='feedback'>There are no notes to view</div>";
            }
            echo '</div>';        
        }
    }
    public function agentsList(){

        if(isset($_GET['plc'])){
            $loc =temp_name1."?plc=".$_GET['plc'];
        }else{
            $loc = temp_name1;
        }
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $row_count = 0;
        $rows_to_show = 9;
        if($mysqli = new mysqli($server, $username, $password, $database)){

            $query1 = "SELECT count(id) FROM agents";
            $connect1 = $mysqli->query($query1);
            $row = $connect1->fetch_row();//get the number of rows the query returned
            $total_row_count = $row[0];
            $last_page = ceil($total_row_count/$rows_to_show);
            //make sure the last page is never less than 1
            if($last_page < 1){
                $last_page = 1;
            }
            //page number details
            $page_num = 1;
            if(isset($_GET['pag_num'])){
                $page_num = preg_replace('#[^0-9]#', '', $_GET['pag_num']) ;
            }
            if($page_num < 1){
                $page_num = 1;
            }else if($page_num > $last_page){
                $page_num = $last_page;
            }
            $limit = ($page_num - 1) * $rows_to_show.', '. $rows_to_show;
            //fetch the data depending on the page requested
            $query = "SELECT * FROM agents ORDER BY `id` DESC LIMIT $limit";
            $connect = $mysqli->query($query);
            $page_info = "Page <b>$page_num</b> of <b>$last_page</b>";
            //pagination controls var
            $paginationCtrl = '';
            //pagination navigation start
            echo '<div class="applicationsList">';
            if($last_page != 1){
                $init_next = 2;
                if(!isset($_GET['pag_num']) || $_GET['pag_num'] == 1){
                    $second = '&amp;pag_num='.$init_next;
                    $last_page_addon = '&amp;pag_num='.$last_page;
                    echo 
                    "<div>
                        <a href='".$loc."".$second."'> Next </a>
                        <a href='".$loc."".$last_page_addon."'> Last </a>
                    </div>";
                }else if(isset($_GET['pag_num'])){
                    $curr_page = $_GET['pag_num'];
                    if($curr_page == $last_page && $curr_page == 2){
                        $init_page = '&amp;pag_num=1';
                        echo 
                        "<div>
                            <a href='".$loc."'> Prev </a> 
                        </div>";
                    }else if($curr_page != $last_page && $curr_page != 1){
                        $next_page = $curr_page+1;
                        $prev_page = $curr_page-1;
                        $next_page_addon = '&amp;pag_num='.$next_page;
                        $prev_page_addon = '&amp;pag_num='.$prev_page;
                        $last_page_addon = '&amp;pag_num='.$last_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                            <a href='".$loc."".$next_page_addon."'> Next </a>
                            <a href='".$loc."".$last_page_addon."'> Last </a>
                        </div>";
                    }else if(($curr_page == $last_page && $curr_page != 1)){
                        $prev_page = $curr_page-1;
                        $prev_page_addon = '&amp;page_num='.$prev_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                        </div>";
                    }
                }   
            }
            //pagination end
            //Information about the results
            if($total_row_count != 0){
                echo '<div class="repeat_reg">';
                echo 
                    '<div class="thead">
                        <div class="agent_alt">Name</div>
                        <div class="ref_mobile">Agent_No</div>
                        <div class="ref_id">Address</div>
                        <div class="app_name">Contact Person</div>
                        <div class="status">Mobile</div>
                        <div class="date">Email Address</div>
                    </div>
                <div class="clear"></div> 
                ';      
                while($data = $connect->fetch_array(MYSQLI_ASSOC)){

                    //get agents name
                    $id = $data['user_id'];
                    $name = $this->getAgentsName($id);
                    echo 
                    '<div class="tbody">
                    <div class="agent_alt">',$name,'</div>',
                    '<div class="ref_mobile_alt">
                    <form action="" method="POST">
                    <input type="hidden" name="agent_info" value="'.$data['agent_number'].'"/>
                    <input type="submit" value="'.$data['agent_number'].'" />
                    </form></div>',
                    '<div class="ref_id">',$data['address'],'</div>',
                    '<div class="app_name">',$data['contact person'],'</div>',
                    '<div class="status">',$data['phone'],'</div>',
                    '<div class="date">',$data['email'],'</div>
                    </div>
                    <div class="clear"></div>
                    ';
                }
                echo '</div>';
                echo "<div>", $page_info, "</div>";
            }
            if($total_row_count==0){
                echo "<div id='feedback'>There are no agents to view</div>";
            }
            echo '</div>';        
        }
    }
    public function usersList(){

        if(isset($_GET['plc'])){
            $loc =temp_name1."?plc=".$_GET['plc'];
        }else{
            $loc = temp_name1;
        }
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $row_count = 0;
        $rows_to_show = 9;
        $level = 2;
        if($mysqli = new mysqli($server, $username, $password, $database)){

            $query1 = "SELECT count(id) FROM users WHERE `level`='".$level."'";
            $connect1 = $mysqli->query($query1);
            $row = $connect1->fetch_row();//get the number of rows the query returned
            $total_row_count = $row[0];
            $last_page = ceil($total_row_count/$rows_to_show);
            //make sure the last page is never less than 1
            if($last_page < 1){
                $last_page = 1;
            }
            //page number details
            $page_num = 1;
            if(isset($_GET['page1_num'])){
                $page_num = preg_replace('#[^0-9]#', '', $_GET['page1_num']) ;
            }
            if($page_num < 1){
                $page_num = 1;
            }else if($page_num > $last_page){
                $page_num = $last_page;
            }
            $limit = ($page_num - 1) * $rows_to_show.', '. $rows_to_show;
            //fetch the data depending on the page requested
            $query = "SELECT * FROM users WHERE `level`='".$level."' ORDER BY `id` DESC LIMIT $limit";
            $connect = $mysqli->query($query);
            $page_info = "Page <b>$page_num</b> of <b>$last_page</b>";
            //pagination controls var
            $paginationCtrl = '';
            //pagination navigation start
            echo '<div class="applicationsList">';
            if($last_page != 1){
                $init_next = 2;
                if(!isset($_GET['page1_num']) || $_GET['page1_num'] == 1){
                    $second = '&amp;page1_num='.$init_next;
                    $last_page_addon = '&amp;page1_num='.$last_page;
                    echo 
                    "<div>
                        <a href='".$loc."".$second."'> Next </a>
                        <a href='".$loc."".$last_page_addon."'> Last </a>
                    </div>";
                }else if(isset($_GET['page1_num'])){
                    $curr_page = $_GET['page1_num'];
                    if($curr_page == $last_page && $curr_page == 2){
                        $init_page = '&amp;page1_num=1';
                        echo 
                        "<div>
                            <a href='".$loc."'> Prev </a> 
                        </div>";
                    }else if($curr_page != $last_page && $curr_page != 1){
                        $next_page = $curr_page+1;
                        $prev_page = $curr_page-1;
                        $next_page_addon = '&amp;page1_num='.$next_page;
                        $prev_page_addon = '&amp;page1_num='.$prev_page;
                        $last_page_addon = '&amp;page1_num='.$last_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                            <a href='".$loc."".$next_page_addon."'> Next </a>
                            <a href='".$loc."".$last_page_addon."'> Last </a>
                        </div>";
                    }else if(($curr_page == $last_page && $curr_page != 1)){
                        $prev_page = $curr_page-1;
                        $prev_page_addon = '&amp;pagee1_num='.$prev_page;
                        echo 
                        "<div>
                            <a href='".$loc."'> First </a> <a href='".$loc."".$prev_page_addon."'> Prev </a>
                        </div>";
                    }
                }   
            }
            //pagination end
            //Information about the results
            if($total_row_count != 0){
                echo '<div class="repeat_reg">';
                echo 
                    '<div class="thead">
                        <div class="user_name">Name</div>
                        <div class="user_email">Email</div>
                        <div class="user_date">Date</div>
                    </div>
                <div class="clear"></div> 
                ';      
                while($data = $connect->fetch_array(MYSQLI_ASSOC)){

                    //get agents name
                    echo 
                    '<div class="tbody">
                    <div class="user_name">',$data['name'],'</div>',
                    '<div class="user_email_alt">
                    <form action="" method="POST">
                    <input type="hidden" name="exec_info" value="'.$data['id'].'"/>
                    <input type="submit" value="'.$data['email'].'" />
                    </form></div>',
                    '<div class="user_date">',$data['created_at'],'</div>
                    </div>
                    <div class="clear"></div>
                    ';
                }
                echo '</div>';
                echo "<div>", $page_info, "</div>";
            }
            if($total_row_count==0){
                echo "<div id='feedback'>There are no users to view</div>";
            }
            echo '</div>';        
        }
    }
}
