<?php 
    global $glip;
    global $user;
    global $id;

    if(isset($_POST['unset']) || (isset($_GET['clr']) && $_GET['plc'] == "execs")){
        unset($_SESSION["exec_info"]);
    }
 ?>
<div class="applications-main">
    <div id="applicants-dits" class="bottom-round full-sect">
        <?php if(!isset($_SESSION['exec_info']) && !isset($_POST['exec_info'])){ ?>
            <div id="application-form">
                <div class="header">Add Executive User</div>
                <div class="clear"></div>
                <?php
                    $glip->execCreationForm();
                ?>
            </div>
        <?php }?>
        <div class="header">Executives Details</div>
        <?php
            if(!isset($_SESSION['exec_info']) && !isset($_POST['exec_info'])){
                $glip->usersList();
            }else{
                if(isset($_POST['exec_info'])){
                    $id= $_POST['exec_info'];
                    $_SESSION['exec_info'] = $id;
                    $glip->getUserDetails($id);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_users_info();
                    if(isset($_POST['to_update']) && !empty($_POST['to_update'])){
                        $target = $_POST['to_update'];
                        $data = $_POST['update_data'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateUsers($target, $data, $id).'</div>';
                        echo '
                            <script type="text/javascript">
                                setTimeout(() => {
                                    $(".floating_fb").fadeOut();
                                }, 3000);
                            </script>
                        ';
                    }
                    echo '</div></div>';
                }else{
                    $id= $_SESSION['exec_info'];
                    $glip->getUserDetails($id);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_users_info();
                    if(isset($_POST['to_update']) && !empty($_POST['to_update'])){
                        $target = $_POST['to_update'];
                        $data = $_POST['update_data'];
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateUsers($target, $data, $id).'</div>';
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
</div>