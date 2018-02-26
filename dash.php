<?php require('includes/prepend.php') ?>
<?php global $glip ?>
<?php 
$glip->showHeader();
if(isset($_SESSION['username']) && (defined('server') && defined('server_user') && defined('server_pass') && defined('site_database')) && isset($_GET['plc'])){ 
    $user = $_SESSION['username'];
    $id = $_SESSION['id'];
    $userLevel = $_SESSION['level'];
    $fname = $glip->getUsername($id);
    //start of top section
    echo '<div class="header_sect">';
    echo '<div class="logo_dash"></div>';
    echo '<div class="top_widget"><div id="user_welcome">Welcome <span class="name">', $user,'!</span></div>';
    ?>
    <div id="logout"><a href="dash.php?logout=yes">Logout</a></div>
    </div>
    <div class="clear"></div>
    <?php include('includes/menu.php'); ?>
    <!-- end of top section -->
    </div>
   <?php if(isset($_GET['plc']) && $_GET['plc'] === "applications"){
       if($userLevel == 2){
            header('location: dash.php?plc=agents');
       }else{
            $glip->showApplications();
       }  
    }else if(isset($_GET['plc']) && $_GET['plc'] === "agents"){
        $glip->showAgents();
    }else if(isset($_GET['plc']) && $_GET['plc'] === "execs"){
        $glip->showExecs();
    }else if(!isset($_GET['plc']) || empty($_GET['plc'])){
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
