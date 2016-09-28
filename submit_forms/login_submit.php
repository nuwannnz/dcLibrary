<?php 
include_once('../config.php');
include_once($paths['functions'] . '/navigation_helpers.php');


if(isset($_POST['login']) && $_POST['login'] == 'Log in'){

    //sql connection
    include_once($paths['include'] . '/connection.php');
    //sql helpers
    include_once($paths['functions'] . '/sql_helpers.php');

    //sanitize inputs
    
    $username = fixString($_POST['uname']);
    $password = fixString($_POST['pword']);

    if(empty($username) || empty($password)){
        goToSignInPage("Mandatory fields are missing.");
        exit();
    }else{
        //we can now check whether the username and the password matches.

        $query_select_user_tblUser = "SELECT `user_reg_id`,`password` FROM `user` WHERE `username`='$username'";
        $result_select_user_tblUser = mysqli_query($conn,$query_select_user_tblUser);

        //check whether we have a matching username
        if(mysqli_num_rows($result_select_user_tblUser) != 1){
            goToSignInPage("Wrong username and password combination.");
            exit();
        }

        //fetch data
        $row_select_user_tblUser = mysqli_fetch_assoc($result_select_user_tblUser);

        //check the password
        if(sha1($password) != $row_select_user_tblUser['password']){
            goToSignInPage("Wrong username and password combination.");
            exit();
        }


        // username and password matches. So create a session.
        
        session_start();
        $_SESSION['user_detail'] = $row_select_user_tblUser['user_reg_id'];
        header("Location: ".$header_paths['public'] ."/user/logged_in_home.php");
        echo "logged in";
    }

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>