<?php include_once('../config.php'); ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail']) && isset($_POST['deleteConfirmBtn']) && $_POST['deleteConfirmBtn'] == "Delete author") {    
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');

   if(isset($_POST['deleteAuthorId'])){

        //delete the author

        $query_delete_athor = "DELETE FROM `author` WHERE `author_id`='".$_POST['deleteAuthorId']."'"; 
        $result_delete_athor = mysqli_query($conn,$query_delete_athor);
        if(mysqli_affected_rows($conn) ==1){
             //delete from book_author
             $query_delete_bookAuthor = "DELETE FROM `book_author` WHERE `author_id`='".$_POST['deleteAuthorId']."'"; 
             $result_delete_bookAuthor = mysqli_query($conn,$query_delete_bookAuthor);

            goToAuthorsPage("Successfully deleted the author.");
            exit(); 

        }else if(mysqli_affected_rows($conn) == -1){
            goToAuthorsPage("Failed to delete the author.");
            exit();
        }

       
   }else{
       goToUsersPage();
       exit();
   }
   

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>