<?php 
include_once('../config.php');
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');

endSession();

//redirect to the signin page.
if(strlen($_GET['message']) > 0){
    $message = urldecode(base64_decode($_GET['message']));
    goToSignInPage($message);
}else{
    goToAdminSignInPage('Logged out successfully.');
}
?>