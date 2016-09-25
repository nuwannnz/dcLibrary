<?php 

include_once('../config.php');
include_once($paths['functions'] . '/navigation_helpers.php');

if(isset($_POST['register']) && $_POST['register'] == 'Register'){

    include_once($paths['include'] . '/connection.php');
    include_once($paths['functions'] . '/validation_helpers.php');
    include_once($paths['functions'] . '/sql_helpers.php');


    $reg_id = fixString($_POST['regId']);
    $email = fixString($_POST['email']);
    $username = fixString($_POST['uname']);
    $password = fixString($_POST['pword']);

    //input validations 
    //check for empty values
    if( empty($reg_id) 
        || empty($email)
        || empty($username) 
        || empty($password)){

            //return to the register page.
            goToRegisterPage("Mandatory fields are missing.");
            
        }else if(filter_var($reg_id,FILTER_VALIDATE_INT) === false){
            goToRegisterPage("Register Id should contain only numbers");
        }else if(strlen($status = checkUsername($username)) > 0){
            goToRegisterPage($status);
        }else if(strlen($status = checkPassword($password)) > 0){
            goToRegisterPage($status);
        }else if(strlen($status = checkEmail($email)) > 0){
            goToRegisterPage($status);
        }else{

            //now we have sanitized inputs. so it's safer to query MYSQL with them.
            //Now we have to check few things before we can add the user to the db

            /*
            1. User must have a valid register id. So we have to check the registered_user table to 
                ensure the user has registered in the dcLibrary. Also we have to check the user table to 
                ensure that this user doesn't have an online account already.

            2. To ensuer that a true user is trying to register we have to check the provided email with 
                the email corresponding to the register id.

            3. Since the username is unique we have to check user table to find whether the provided username already exisits.

            4. If above tests are true then we can add the user details to the user table.

            */

            // 1.
            $query_select_userId_tblreguser = "SELECT * FROM `registered_user` WHERE `user_reg_id`='$reg_id'";
            $result_select_userId_tblreguser = mysqli_query($conn,$query_select_userId_tblreguser);

            //check wether we have a one record. If not then redirect to the register page 
            if(mysqli_num_rows($result_select_userId_tblreguser) != 1){
                goToRegisterPage("Wrong register id");
            }

            //check whether the user already hava an online account
            $query_select_tbluser = "SELECT * FROM `user` WHERE `user_reg_id`='$reg_id'";
            $result_select_tbluser = mysqli_query($conn,$query_select_tbluser);

            if(mysqli_num_rows($result_select_tbluser) != 0){
                goToRegisterPage("An online account already exists for the corresponding register id. Please use Sign in page to login.");
            }


            //2.
            //double check the user by checking the email 
            $row_select_userId_tblreguser = mysqli_fetch_assoc($result_select_userId_tblreguser);
            if($email != $row_select_userId_tblreguser['email']){
                goToRegisterPage("Wrong email. You should use the email which you used to register at the library.");
            }

            //3.
            //check whether the username already exists
            $query_select_username_tbluser = "SELECT `username` FROM `user` WHERE `username`='$username'";
            $result_select_username_tbluser = mysqli_query($conn,$query_select_username_tbluser);

            if(mysqli_num_rows($result_select_username_tbluser) != 0){
                goToRegisterPage("Username already exists. Please try another one.");
            }

            //4.
            //now we can safely register the user to the db.

            //we have to encrypt the password
            $password = sha1($password);

            $query_insert_tbluser = "INSERT INTO `user` (`user_reg_id`, `username`, `password`, `user_image`, `score`) VALUES ('$reg_id', '$username', '$password', NULL, '0')";
            $result_insert_tbluser = mysqli_query($conn,$query_insert_tbluser);

            if(mysqli_affected_rows($conn) == 1){
                goToSignInPage("Online account created successfully. Please sign in.");
            }else if(mysqli_affected_rows($conn) == -1){
                goToRegisterPage("Failed");
            }
        }



}else{    
    goToErrorPage('Unauthorized Access!');
}


?>