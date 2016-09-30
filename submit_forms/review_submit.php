
<?php include_once('../config.php') ?>
<?php

include_once($paths['functions'] . '/navigation_helpers.php');
include_once($paths['functions'] . '/session_helpers.php');
checkSession();

if(isset($_POST['reviewSubmit']) && $_POST['reviewSubmit'] == "Add review") {
     
    if(isset($_SESSION['user_detail'])) {

    include_once($paths['models'] . '/Review.php');
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');

    $review = new Review(
        $_POST['isbn'],
        $_SESSION['user_detail'],
        $_POST['rcontent'],
        $_POST['rating'],
        date("Y-m-d",time())        
    );

    if(addReview($conn,$review)){
        header("Location:" . $header_paths['public'] ."/book_detail.php?isbn=".$_POST['isbn']);
    }else{
        echo "Failed to add review";
    }
    }else{
        goToErrorPage("Unauthorized Access");
    }

}else{
        goToErrorPage("Unauthorized Access");
    }
?>