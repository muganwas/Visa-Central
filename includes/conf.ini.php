<?php
require("server.ini.php");
ob_start();
if(isset($_POST['username'])){

    $user_id = htmlentities(trim($_POST['username']));

}else{

    $user_id ="visitor". rand(0, 100000);
}
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
$dirx = $_SERVER['DOCUMENT_ROOT'];//absolute server root directory
$temp_name = explode('/', $_SERVER['SCRIPT_NAME']);
$temp_name1 = array_pop($temp_name);
$dir =$dirx."/visas"; 
$site_root = "/visas";
$archive_dir = $dir."/". "archive/";
$current_page = $temp_name1;
$current_page_name = explode('.', $current_page);
$current_page_name = $current_page_name[0];
//define constan for server connection
if(isset($server)){
    $ini_con =new mysqli($server, $username, $password, $database);
}
if($current_page_name == "index" && (isset($server))){

    $current_page_name = "Visa Central";

}else{

    $current_page_name = "Visa | ".ucfirst($current_page_name);

}
$temp_name3 = $_SERVER['SCRIPT_NAME'];
//define constants
define('temp_name', $temp_name);
define('temp_name1', $temp_name1);
define('temp_name3', $temp_name3);
define('archive_dir', $archive_dir);
define('dir', $dir);
define('site_root', $site_root);
define('current_page_name', $current_page_name);
?>
<?php
//defined after user settup
if(!defined('server') && isset($server)){
    define('server', $server);
    define('server_user', $username);
    define('server_pass', $password);
    define('site_database', $database);
}

?>