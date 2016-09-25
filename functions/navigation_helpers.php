<?php 
//this script contains functions to navigate to various common pages 
include_once('../config.php');


//navigate to the error page
function goToErrorPage($message){        
    if(!empty($message)){
        global $header_paths;
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['templates'] ."/error.php?message=$message");
    } else{
        header("Location: ". $header_paths['templates'] . '/error.php');
    }
}

function goToSignInPage($message){        
    if(!empty($message)){
        global $header_paths;
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/login.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/login.php');
    }
}

function goToRegisterPage($message){        
    if(!empty($message)){
        global $header_paths;
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/register.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/register.php');
    }
}


?>