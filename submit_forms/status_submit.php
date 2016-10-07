<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/navigation_helpers.php');
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['include'] . '/connection.php');
checkSession();

if(isset($_SESSION['user_detail']) && isset($_POST['status'])) {


    $status = $_POST['status'];    
    if($status == '1'){
        updateUserRead('NULL');
    }else if($status == '2'){
        updateUserRead("'0'");
    }else if($status == '3'){
        updateUserRead("'1'");
    }
    
    goToMyBooksPage(2);

}else{
        goToErrorPage("Unauthorized Access");
    }




function updateUserRead($status){
    global $conn;
    //update the record 
    $query_update_tbl_reads = "UPDATE `user_read` SET `is_completed`=$status WHERE `user_reg_id`='". $_SESSION['user_detail'] ."' AND `isbn`='". $_POST['isbn'] ."'";
    $result_update_tbl_reads = mysqli_query($conn,$query_update_tbl_reads);

    if(mysqli_affected_rows($conn) != 1){
        echo "error";
    }
}


?>