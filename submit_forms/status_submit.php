<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/navigation_helpers.php');
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['include'] . '/connection.php');
checkSession();

if(isset($_SESSION['user_detail']) && isset($_POST['status'])) {

//status 1 = want to read
//       2 = currently reading
//       3 = completed


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

    //also if status is completed we have to update num of reads of the book
    if($_POST['status'] == 3){
        $query_update_book = "UPDATE `book` SET `num_of_reads`=`num_of_reads` + 1 WHERE `isbn`='".$_POST['isbn']."'"; 
        $result_update_book = mysqli_query($conn,$query_update_book);
        if(mysqli_affected_rows($conn) != 1){
             echo "Error updating num_of_reads";
        }
    }

    //also if the user setting status to 1 or 2 for a previously completed book we have to update the reads
    if($_POST['status']==1 || $_POST['status']==1){
        //first check whether theres a previous book read
        $query_select_read = "SELECT `isbn` FROM "; 
        $result_select_read = mysqli_query($conn,$query_select_read);
        $row_select_read = mysqli_fetch_assoc($result_select_read);
    }    
}


?>