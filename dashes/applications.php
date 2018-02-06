<?php 
    global $glip;
    global $user;
    global $id;

    if(isset($_POST['unset'])){
        unset($_SESSION["get_info"]);
    }
 ?>
<div class="applications-main">
    <div id="application-form">
        <div class="header">Create Application</div>
        <?php
            $glip->applicationForm();
         ?>
    </div>
    <div id="applicants-dits">
        <div class="header">Applicants Details</div>
        <?php
            if(!isset($_SESSION['get_info']) && !isset($_POST['get_info'])){
                $glip->applicationsList($id, $user);
            }else{
                if(isset($_POST['get_info'])){
                    $app_id= $_POST['get_info'];
                    $_SESSION['get_info'] = $app_id;
                    $glip->getApplicationDetails($app_id, $user);
                    $glip->update_applicant_info();
                    if(isset($_POST['status']) && !empty($_POST['status'])){
                        $data = $_POST['status'];
                        $update = 'application_status';
                        $applicant = $_SESSION['applicant'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateApp($update, $app_id, $data).''.$upload_fb = $glip->upload_visa_copy($user, $applicant, "visa").'</div>';
                    }
                }
                else{
                    $app_id= $_SESSION['get_info'];
                    $glip->getApplicationDetails($app_id, $user);
                    $glip->update_applicant_info();
                    if(isset($_POST['status']) && !empty($_POST['status'])){
                        $data = $_POST['status'];
                        $update = 'application_status';
                        $applicant = $_SESSION['applicant'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateApp($update, $app_id, $data).'<br/>'.$upload_fb = $glip->upload_visa_copy($user, $applicant, "visa").'</div>';
                    }
                }  
            }
         ?>
    </div>
    <div id="search-results">
        <div class="header">Search Results</div>
        <?php 
        if(isset($_POST['search_text'])){
            $id = $_POST['search_text'];
            $glip->applicationSearch($id);
        } 
        ?>
    </div>
</div>