<?php 
include_once($paths['functions'] . '/session_helpers.php');
checkSession();

if(isset($_SESSION['user_detail'])){
    header("Location:". $header_paths['public'] . '/user/logged_in_home.php' );
    exit();
}
?>