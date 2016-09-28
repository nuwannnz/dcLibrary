<?php 
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(!isset($_SESSION['user_detail'])){
    goToErrorPage("Unauthorized Access!");
}

include_once($paths['models'] . '/User.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');

$CurrentUser = getUser($conn,$_SESSION['user_detail']);

?>