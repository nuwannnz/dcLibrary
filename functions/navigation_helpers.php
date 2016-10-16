<?php 
//this script contains functions to navigate to various common pages 
//include_once('../config.php');


//navigate to the error page
function goToErrorPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['templates'] ."/error.php?message=$message");
    } else{
        header("Location: ". $header_paths['templates'] . '/error.php');
    }
}

function goToSignInPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/login.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/login.php');
    }
}

function goToAddBookPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/admin/add_book.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/admin/add_book.php');
    }
}

function goToBooksPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/admin/books.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/admin/books.php');
    }
}

function goToCheckoutsPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/admin/checkouts.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/admin/checkouts.php');
    }
}


function goToAdminSignInPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/admin_login.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/admin_login.php');
    }
}

function goToRegisterPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['public'] ."/register.php?message=$message");
    } else{
        header("Location: ". $header_paths['public'] . '/register.php');
    }
}

function goToProfilePicPage(){            
    global $header_paths;    
    header("Location: ". $header_paths['public'] ."/user/profile_pic_upload.php");
}

function goToMyBooksPage($tab=0){
    global $header_paths;    
    if($tab > 0){
        header("Location: ". $header_paths['public'] ."/user/my_books.php?tab=$tab");
    }else{
        header("Location: ". $header_paths['public'] ."/user/my_books.php");
    }
}

function goToSettingsPage($message,$tab=0){
    global $header_paths;

    $location =  $header_paths['public'] ."/user/settings_page.php";
    if(strlen($message) > 0){
        $message = base64_encode(urlencode($message));
        $location = $location . "?message=$message";
    }

    if($tab > 0){
        $location = $location . "&&tab=$tab";
    }

    header("Location: ". $location); 
}

function goToLogoutPage($message){        
    global $header_paths;
    if(!empty($message)){
        $message = base64_encode(urlencode($message));        
        header("Location: ". $header_paths['submit_forms'] ."/logout_submit.php?message=$message");
    } else{
        header("Location: ". $header_paths['submit_forms'] ."/logout_submit.php");
    }
}

?>