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
    public function applicationForm() {
        require('forms/visa_application.php');
    }
    public function update_applicant_info(){
        require('forms/update_info.php');
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
        $rows_to_show = 5;
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
                    '<div class="date">',$data['created'],'</div>
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
                echo "<div id='feedback'>No results, try another application number</div>";
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
                    <input type="submit" name="back" value="Back To Detail Page"/>
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
            echo 
                '<div class="tbody">
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
    public function getComments($applicant, $admin){
        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
                
        if($db = new mysqli($server, $username, $password, $database)){

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
    public function createUser($name, $email, $phone, $pass, $c_pass, $level){

        $server = server;
        $username = server_user;
        $password = server_pass;
        $database = site_database;
        $name=trim(htmlentities($name));
        $email=trim(htmlentities($email));
        $phone=trim(htmlentities($phone));
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($c_pass) && !empty($level)){

            if($pass == $c_pass){
                $pass=md5($pass);
                if($db = new mysqli($server, $username, $password, $database)){

                    $query = "INSERT INTO `users` VALUES('',?,?,?,?,null,?)";
                    $connect = $db->prepare($query);
                    $connect->bind_param("sssss", $name, $email, $phone, $pass, $level);
        
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
}
