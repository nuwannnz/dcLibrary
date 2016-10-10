<?php include_once('../config.php') ?> 
<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');

checkSession();

if(isset($_SESSION['user_detail']) && isset($_POST['saveUname']) || isset($_POST['savePword']) || isset($_POST['saveDetails']) ){
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/validation_helpers.php');
    include_once($paths['include'] . '/connection.php');


    if(isset($_POST['saveDetails']) && $_POST['saveDetails']== 'Save'){
        //update user details
        $fname = fixString($_POST['fname']);
        $lname = fixString($_POST['lname']);
        $email = fixString($_POST['email']);
        $currenEmail = fixString($_POST['currentEmail']);

        if(empty($fname) || empty($lname) || empty($email)){
            goToSettingsPage('Mandatory fields are missing.');
            exit();
        }

        if(strlen($status = checkEmail($email)) > 0){
            goToSettingsPage($status);
            exit();
        }else if($currenEmail != $email && checkEmailExists($conn,$email)){
            goToSettingsPage('Email already exists.');
            exit();
        }

        $status = updateUserDetails($conn,$_SESSION['user_detail'],$fname,$lname,$email);
        goToSettingsPage($status);
        exit();
        //now we can safely update user input


    }else if(isset($_POST['saveUname']) && $_POST['saveUname'] == 'Save'){
    //update username
        //sanitaize user input
        $uname = fixString($_POST['uname']);
        if(empty($uname)){
            goToSettingsPage('Username cannot be empty.',1);
            exit();
        }else if(strlen($status = checkUsername($uname)) > 0){
            goToSettingsPage($status,1);
            exit();
        }
        if(checkUsernameExists($conn,$_POST['uname'])){
            if(updateUsername($conn,$_SESSION['user_detail'],$_POST['uname'])){
                //go to settings page
                goToSettingsPage('Username successfully updated.',1);
                exit();
            }else{
                goToSettingsPage('Failed to update username.',1);
                exit();
            }
            
        }else{
            goToSettingsPage('Username already exists. Please try another.',1);
            exit();
        }

    }else if(isset($_POST['savePword']) && $_POST['savePword'] == 'Save'){
        
        $pword = fixString($_POST['pword']);
        $newPword = fixString($_POST['newPword']);
        $newPwordRepeat = fixString($_POST['newPwordRepeat']);

        if(empty($pword) || empty($newPword) || empty($newPwordRepeat)){
            goToSettingsPage('Mandatory fields are missing.',2);
            exit();
        }
        if(checkUserPassword($conn,$_SESSION['user_detail'],$pword)){
            if(strlen($status = checkPassword($newPword))>0){
                goToSettingsPage($status,2);
                exit();
            }
            if($newPword == $newPwordRepeat){

                if(updatePassword($conn,$_SESSION['user_detail'],$newPword)){
                    goToSettingsPage('Password updated successfully.',2);
                    exit();
                }else{
                    goToSettingsPage('Failed to update the password.',2);
                    exit();
                }
            }else{
                goToSettingsPage('Passwords does not match.',2);    
                exit();
            }

        }else{
            goToSettingsPage('Wrong password.',2);
            exit();
        }
    }




}else{

     goToErrorPage("Unauthorized Access!");
     exit();
}

?>