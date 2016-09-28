<?php include_once('../config.php') ?> 
<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');

checkSession();

if(isset($_SESSION['user_detail'])){
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');
    //Here the user have 3 choices.
    /*
    1. continue with the selected photo.
    2. continue with the default photo.
    3. upload another photo.

    */
    $dir = $header_paths['images'] . '/users/temp/';
    $full_dir = $paths['images'] . '/users/temp/';
    $full_image_dir = $paths['images'] . '/users/';
    // 1.
    if(isset($_POST['confirm']) && $_POST['confirm'] == "Continue"){

        $image = $_POST['image-name'];
        $name = substr($image,strripos($image,"/") + 1,strlen($image));
        $extension = substr($name,strripos($name,"."),strlen($name));

        $targetName = "user(". $_SESSION['user_detail'] . ")$extension";

        //update the db
        updateUserImage($conn,$_SESSION['user_detail'],$targetName);

        //move the new file
        moveNewPhoto($full_dir.$name , $full_image_dir .$targetName);

        //clear the temp folder in case we have any junk
        clearTempFolder($full_dir);
        //goToSuccessPage
        goToSuccessPage();

    }

    //2.
    if(isset($_POST['use-default']) && $_POST['use-default'] == 1){
        //update the db
        updateUserImage($conn,$_SESSION['user_detail'],'default.png');
        //clear the temp folder in case we have any junk
        clearTempFolder($full_dir);
        //goToSuccessPage
        goToSuccessPage();
    }

    //3.
    if(isset($_FILES['input-file'])){        
        //clear the tempfolder 
        clearTempFolder($full_dir);        
        move_uploaded_file($_FILES['input-file']['tmp_name'],$full_dir . $_FILES['input-file']['name']);
        echo $dir . $_FILES['input-file']['name'];
    }




}else{

    goToErrorPage("Unauthorized Access!");
}

function clearTempFolder($dirToClear){
    array_map("unlink",glob($dirToClear . '*'));
}

function moveNewPhoto($oldLocation , $newLocation ){
    global $full_image_dir;
    //check whether a photo with the same name already exists
    if(count(glob($full_image_dir . '/user('. $_SESSION['user_detail'] . ').*')) >0){
        array_map("unlink",glob($full_image_dir . '/user('. $_SESSION['user_detail'] . ').*'));
    }

    rename($oldLocation,$newLocation);
}   

function goToSuccessPage(){
    global $header_paths;
    if(isset($_POST['onSuccess']) && $_POST['onSuccess'] != ''){
        header("Location:" . $_POST['onSuccess']);
    }else{        
        header("Location: " . $header_paths['public'] . '/user/logged_in_home.php');
    }
    exit();
}

?>