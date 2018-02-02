<?php require('includes/prepend.php') ?>
<?php $glip = new visa_central;  ?>
<?php 
$glip->showHeader();
if(isset($_SESSION['username']) && (defined('server') && defined('server_user') && defined('server_pass') && defined('site_database')) && isset($_GET['plc'])){ 
    $user = $_SESSION['username'];
    $userLevel = $glip->getLevel($user);
    $fname = $glip->getUsername($user);
    //start of top section
    echo '<div class="user_welcome">';
    echo "Welcome <span class='name'>", $fname,"!</span>";
    ?>
    <div id="logout"><a href="dash.php?logout=yes">Logout</a></div>
    <div class="clear"></div>
    <?php include('includes/menu.php'); ?>
    <!-- end of top section -->
    </div>
    <?php if($_GET['plc'] == "home"){ ?>
        <div class="applications">
            <h3>Applications for approval</h3>
        <?php
        //return applications on users level
            $inst = $glip->getInstitution($user);
            $glip->applications($userLevel, $inst);
        ?>
        </div>
        <div class="application_dits">
        <div class="info">
            <?php 
            if(!isset($_GET['approved']) && isset($_GET['application'])){
                echo '<div class="print" id="print_approved">Print</div>';
            } ?>
            <h3>Application Details</h3>
        <?php
            if(isset($_GET['application'])){
                
                $plc = $_GET['plc'];
                $loc = temp_name1."?plc=".$plc;
                $applicant = trim(htmlentities($_GET['application']));
                //return application details
                $glip->getApplicationDetails($applicant);
                $id = $glip->getUserId($user);
                $a_id = $applicant;
                if(isset($_POST['comment'])){
                    $loc1 = $loc."&application=".$a_id;
                    $comment = trim(htmlentities($_POST['comment']));
                    $com_feedback = $glip->postComment($id, $a_id, $comment);    
                }
                if(isset($_POST['approve'])){
                    $new_level = $userLevel +1;
                    $com_feedback = $glip->approve_application($new_level, $fname, $applicant);
                    header('location:'.$loc);//reload page. Remove if you'd rather see the feedback
                }
                if(isset($_POST['disapprove'])){
                    $new_level = $userLevel -1;
                    $com_feedback = $glip->disapprove_application($new_level, $applicant);
                    header('location:'.$loc);
                }
                if(isset($_POST['reject'])){
                    $com_feedback = $glip->rejectApplication($fname, $applicant);
                    header('location:'.$loc);
                }

        ?>
        <?php if(isset($com_feedback))echo '<div class="feedback">', $com_feedback, '</div>'; ?>
        
        <form action="" method="POST">
                <textarea id="comment" name="comment" placeholder="comment"></textarea><br/>
                <input type="submit" value="Submit Comment">
        </form>
        <div class="approveDeny">
        <form action="" method="POST"> 
            <input type="hidden" name="approve" value=1/>
            <input type="submit" value="Approve">
        </form>
        <?php
         $commented=$glip->commented($id, $a_id);
         if($commented !== null && $userLevel > 1){ ?>
            <form action="" method="POST"> 
                <input type="hidden" name="disapprove" value=1/>
                <input type="submit" value="Deny">
            </form>
         <?php } 

         if($commented !== null && ($userLevel == 4 || $userLevel == 1)){
         ?>
            <form action="" method="POST"> 
                <input type="hidden" name="reject" value=1/>
                <input type="submit" value="Reject">
            </form>
         <?php } ?>
         </div>
         <div class="clear"></div>
        </div> 
        <?php
            }else{
                echo '<div class="info"><span class="feedback">Select an application to show details.</span></div><div class="clear"></div>';
            }
        ?>
        <div class="clear"></div>
        </div>
        <?php
        }else if($_GET['plc']=="forms"){
            $status = $_GET['approved'];
        ?>
        <div class="applications_1">
        <?php if($status == 1){ ?>
            <h3>Approved Applications</h3>
        <?php }else if($status == 0){ ?>
            <h3>Denied Applications</h3>
        <?php }?>
            <?php $glip->getApprovedApplications($status); ?>
        </div>
        <div id="approved" class="application_dits">
                <div class="info">
                    <?php 
                        if(isset($_GET['approved']) && isset($_GET['applicant'])){
                            $applicant = trim(htmlentities($_GET['applicant']));
                            //return application details
                            $glip->getApplicationDetails($applicant);
                        }
                    ?>
                </div>
        </div>
    <?php 
    }else if($_GET['plc']=="users"){ ?>
        <div class="applications">
            <div class="users">
                <ul>
                    <?php
                        $glip->getUsers();
                    ?>
                </ul>
            </div>
            <div class="users_info">
                <?php
                if(isset($_GET['user'])){
                    $id= $_GET['user'];
                    $glip->getUsersInfo($id);
                    if(isset($_POST['delete'])){
                        echo $glip->deleteUsers($id);
                    }
                    if(isset($_POST['element']) && isset($_POST['new_data'])){
                        $element = $_POST['element'];
                        $new_data = $_POST['new_data'];
                        if(isset($_GET['user'])){
                            $id= $_GET['user'];
                            echo '<div class="feedback">', $glip->updateUsers($element, $new_data, $id), '</div>';
                        }
                    }
                ?>
                <form action="" method="post">
                    <input type="hidden" name="delete"/>
                    <button id="delete_user" type="submit" ><h3 style="color: red;">Delete User</h3></button>
                </form>
                <h3>Update User Info</h3>
                <form action="" method="POST">
                    <label for="element">Element to update</label>
                    <select id="element" name="element" required>
                        <option>--</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="password">Password</option>
                        <option value="title">Title</option>
                        <option value="level">Level</option>
                        <option value="institution">Institution</option>
                    </select>
                    <input type="text" placeholder="Update Data" id="new_data" name="new_data" required/>
                    <input type="submit" value="Update">
                </form>
                <?php }else{
                    echo "<span class='feedback'>Select user in the left pane to see or update their details.</span>";
                }?>
                <?php
                    if(isset($_POST['create'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                        $con_password = $_POST['con_password'];
                        $level = $_POST['level'];
                        $title = $_POST['title'];
                        $institution = $_POST['institution'];
                        echo '<div class="feedback">', $glip->createUser($name, $email, $phone, $password, $con_password, $level, $title, $institution), '</div>';
                    }
                ?>
                <h3>Create New User</h3>
                <form action="" method="POST">
                    <input type="hidden" name="create"/>
                    <input type="text" id="name" placeholder="Full Name" name="name" required/>
                    <input type="email" id="email" placeholder="Email Address" name="email" required/>
                    <input type="text" pattern="^[0-9]+$" id="phone" placeholder="Phone Number" name="phone" required/>
                    <input type="password" id="password" placeholder="Password" name="password" required/>
                    <input type="password" id="con_password" placeholder="Confirm Password" name="con_password" required/>
                    <select name="level" required>
                        <option>Select level</option>
                        <option value="1">Approver 1</option>
                        <option value="2">Ec Member</option>
                        <option value="3">IDCC Admin</option>
                        <option value="4">Chief Cordinator</option>
                    </select>
                    <input type="text" id="title" placeholder="User Title" name="title" required/>
                    <input type="text" id="institution" placeholder="Institution" name="institution" required/><br/>
                    <input type="submit" value="Create User" />         
                </form>
            </div>
        </div>
    <?php
    }else if(!isset($_GET['plc']) || !empty($_GET['plc'])){
        //if someone tries to access dash without proper params log them out
        header('location: dash.php?logout=yes');
    }else{
        //if user is not logged in
        header('location: dash.php?logout=yes');
    }
}else{
    //if user is not logged in
    header('location: dash.php?logout=yes');
}
//if logged out call logout function
if(isset($_GET['logout'])){
    $logout=$_GET['logout'];
    $glip->logout($logout);
}
$glip->showFooter();
