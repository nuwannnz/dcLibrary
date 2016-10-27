<?php include_once('../config.php'); ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail']) && isset($_POST['deleteConfirmBtn']) && $_POST['deleteConfirmBtn'] == "Delete user") {    
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');

   if(isset($_POST['deleteUserId'])){ 
       deleteRegisteredUser($conn,$_POST['deleteUserId']);
       goToUsersPage("Successfully deleted the user account.");
       exit();
   }else{
       goToUsersPage();
       exit();
   }
   

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>