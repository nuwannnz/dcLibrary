<?php 
include_once('../config.php');
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');

endSession();

//redirect to the signin page.
goToSignInPage('Logged out successfully.');
?>