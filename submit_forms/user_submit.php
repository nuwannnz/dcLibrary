<?php include_once('../config.php'); ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');

    $fname = fixString($_POST['fname']);
    $lname = fixString($_POST['lname']);
    $email = fixString($_POST['email']);    
    
    //check for empty values
    if(empty($fname) || empty($lname) || empty($email)){
        goToAddUserPage("Mandatory fields are missing.");
        exit();
    }

    if(isset($_POST['addUser']) && $_POST['addUser'] == "Add User"){
        //check whether the email exisits 
        if(!checkEmailExists($conn,$email)){
            
            //we can add the user now
            include_once($paths['models'] . '/User.php');

            $user = new RegUser(
                null,
                $fname,
                $lname,
                $email
            );

            if(addRegisteredUser($conn,$user)){
                goToUsersPage("New user added successfully.");
                exit();
            }else{
                goToAddUserPage("Failed to add a new user.");
                exit(); 
            }

        }else{
            goToAddUserPage("Email already exists.");
            exit();
        }

    }

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>