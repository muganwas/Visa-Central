<?php 
    global $glip;
    global $user;
    global $id;

    if(isset($_POST['unset']) || (isset($_GET['clr']) && $_GET['plc'] == "agents")){
        unset($_SESSION["agent_info"]);
    }
 ?>
<div class="applications-main">
    <div id="applicants-dits" class="bottom-round full-sect">
        <?php if(!isset($_SESSION['agent_info']) && !isset($_POST['agent_info'])){ ?>
        <div id="application-form">
            <div class="header">Add Agent</div>
            <?php
                $glip->agentCreationForm();
            ?>
        </div>
        <?php } ?>
        <div class="header">Agents Details</div>
        <?php
            if(!isset($_SESSION['agent_info']) && !isset($_POST['agent_info'])){
                $glip->agentsList();
            }else{
                if(isset($_POST['agent_info'])){
                    $agent_no= $_POST['agent_info'];
                    $_SESSION['agent_info'] = $agent_no;
                    $glip->getAgentDetails($agent_no);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_agents_info();
                    if(isset($_POST['to_update']) && !empty($_POST['to_update'])){
                        $target = $_POST['to_update'];
                        $data = $_POST['update_data'];
                        $user_id = $glip->getUserIdByAgentNo($agent_no);
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateAgent($target, $data, $user_id).'</div>';
                    }
                    echo '</div></div>';
                }else{
                    $agent_no= $_SESSION['agent_info'];
                    $glip->getAgentDetails($agent_no);
                    echo '<div class="applicationsList">
                    <div class="update_reg">';
                    $glip->update_agents_info();
                    if(isset($_POST['to_update']) && !empty($_POST['to_update'])){
                        $target = $_POST['to_update'];
                        $data = $_POST['update_data'];
                        $user_id = $glip->getUserIdByAgentNo($agent_no);
                        echo '<div class="floating_fb fadeIn">'.$feedback = $glip->updateAgent($target, $data, $user_id).'</div>';
                    }
                    echo '</div></div>';
                }  
            }
         ?>
    </div>
</div>