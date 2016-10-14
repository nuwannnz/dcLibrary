<?php 
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(!isset($_SESSION['admin_detail'])){
    goToErrorPage("Unauthorized Access!");
}

include_once($paths['models'] . '/Admin.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');

$CurrentAdmin = getAdmin($conn,$_SESSION['admin_detail']);


?>