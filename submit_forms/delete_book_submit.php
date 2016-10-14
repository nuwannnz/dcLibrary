<?php include('../config.php') ?>
<?php 


include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
include_once($paths['functions'] . '/db_helper.php');
include_once($paths['include'] . '/connection.php');

    if(isset($_POST['deleteConfirmBtn'])) {
        if(!empty($_POST['deleteIsbn'])){
            if(deleteBook($conn,$_POST['deleteIsbn'])){
                goToBooksPage("Successfully deleted the book");
                exit();
            }else{
                goToBooksPage("Failed to delete the book");
                exit();
            }
        }else{
            goToBooksPage("Error");
            exit();
        }
    }



}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}


?>