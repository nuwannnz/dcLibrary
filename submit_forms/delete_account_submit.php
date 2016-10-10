<?php include_once('../config.php') ?> 
<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');

checkSession();

if(isset($_SESSION['user_detail']) && isset($_POST['deleteAccConfirm']) && $_POST['deleteAccConfirm'] == 'Confirm Delete Account' ){
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/validation_helpers.php');
    include_once($paths['include'] . '/connection.php');


        //delete account
        $pword = fixString($_POST['deletePword']);
        if(empty($pword)){
            goToSettingsPage('Password cannot be empty.',3);
            exit();
        }

        if(checkUserPassword($conn,$_SESSION['user_detail'],$pword)){
            deleteUserAccount($conn,$_SESSION['user_detail']);
            goToLogoutPage("Online account removed successfuly.");
            exit();
        }else{
            goToSettingsPage('Wrong password.',3);
            exit();
        }
   




}else{

     goToErrorPage("Unauthorized Access!");
     exit();
}

?>