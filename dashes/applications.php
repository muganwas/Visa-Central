<?php 
    global $glip;
    global $user;
    global $id;
    global $userLevel;

    if(isset($_POST['unset']) || (isset($_GET['clr']) && $_GET['plc'] == "applications")){
        unset($_SESSION["get_info"]);
    }
 ?>
<div class="applications-main">
    <div class="<?php if($userLevel == 3){ 
            echo "left-bottom-round large-sect";
        }else if($userLevel == 1){
            echo "bottom-round full-sect";            
        }else{
            echo "right-bottom-round large-sect";
        }
        ?>"id="applicants-dits">
        <!-- application form-->
        <?php if($userLevel == 1 && !isset($_POST['get_info']) && !isset($_SESSION['get_info']) && !isset($_POST['get_comments']) && !isset($_SESSION['get_comments'])){ ?>
            <div id="application-form">
                <div class="header">Create Application</div>
                <?php
                    $glip->applicationForm();
                ?>
            </div>
        <?php } ?>
        <?php
            if(!isset($_SESSION['get_info']) && !isset($_POST['get_info'])){
                echo '<div class="sub-header">List Section</div>';
                $glip->applicationsList($id, $user);
            }else{
                if(isset($_POST['unset1']) || (isset($_GET['clr']) && $_GET['plc'] == "applications")){
                    unset($_SESSION['get_comments']);
                }
                if(isset($_POST['get_info'])){
                    $app_id= $_POST['get_info'];
                    $_SESSION['get_info'] = $app_id;
                    $glip->getApplicationDetails($app_id, $user);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_applicant_info();
                    if(isset($_POST['status']) && !empty($_POST['status'])){
                        $data = $_POST['status'];
                        $update = 'application_status';
                        $applicant = $_SESSION['applicant'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateApp($update, $app_id, $data).''.$upload_fb = $glip->upload_visa_copy($user, $applicant, "visa").'</div>';
                        echo '
                            <script type="text/javascript">
                                setTimeout(() => {
                                    $(".floating_fb").fadeOut();
                                }, 3000);
                            </script>
                        ';
                    }
                    echo '</div></div>';
                }else if(isset($_POST['get_comments']) || isset($_SESSION['get_comments'])){
                    echo '<div class="sub-header">Notes Section</div>';
                    echo '<div class="applicationsList">
                    <div class="comments_reg">';
                    if(isset($_POST['get_comments'])){
                        $app_id=$_POST['get_comments'];
                        if(!isset($_SESSION['get_comments'])){
                            $_SESSION['get_comments']=$app_id;
                        }
                    }else{
                        $app_id=$_SESSION['get_comments'];
                    }
                    $user_id = $glip->getApplicantsId($app_id);
                    $glip->notesList($user_id);
                    $glip->makeNote();
                    if(isset($_POST['notes'])){
                        $notes = $_POST['notes'];
                        echo $glip->postNote($id, $user_id, $notes);
                    }
                    echo '</div></div>';
                }else{
                    $app_id= $_SESSION['get_info'];
                    $glip->getApplicationDetails($app_id, $user);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_applicant_info();
                    if(isset($_POST['status']) && !empty($_POST['status'])){
                        $data = $_POST['status'];
                        $update = 'application_status';
                        $applicant = $_SESSION['applicant'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateApp($update, $app_id, $data).'<br/>'.$upload_fb = $glip->upload_visa_copy($user, $applicant, "visa").'</div>';
                        echo '
                            <script type="text/javascript">
                                setTimeout(() => {
                                    $(".floating_fb").fadeOut();
                                }, 3000);
                            </script>
                        ';
                    }
                    echo '</div></div>';
                }  
            }
         ?>
    </div>
    <?php if(isset($userLevel) && $userLevel==3){?>
    <div id="search-results">
        <div class="header">Search Results</div>
        <?php 
        if(isset($_POST['search_text'])){
            $id = $_POST['search_text'];
            $glip->applicationSearch($id);
        } 
        ?>
    </div>
    <?php } ?>
</div>