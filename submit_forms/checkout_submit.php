<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
    
    if(isset($_POST['addCheckout']) && $_POST['addCheckout']== 'Add checkout'){        
        include_once($paths['functions'] . '/db_helper.php');
        include_once($paths['include'] . '/connection.php');
        include_once($paths['models'] . '/book.php');

        //check whether the user id is correct
        $query_select_userid = "SELECT `user_reg_id` FROM `registered_user` WHERE `user_reg_id`='".$_POST['userId']."'"; 
        $result_select_userid = mysqli_query($conn,$query_select_userid);
        if(mysqli_num_rows($result_select_userid) != 1){
            goToCheckoutsPage("Wrong user id");
            exit();
        }

        //check whether the isbn is correct
        if(!checkIsbnExists($conn,$_POST['isbn'])){
            goToCheckoutsPage("Wrong isbn");
            exit();
        }

        //check the return date
        if(strtotime($_POST['returnDate']) < strtotime(date('Y-m-d',time()))){
            goToCheckoutsPage("Invalid return date");
            exit();
        }

        //now we can insert the checkout
        $checkout = new BookCheckout(
            null,
            date('Y-m-d',time()),
            $_POST['returnDate'],
            $_POST['isbn'],
            $_POST['userId'],
            $_SESSION['admin_detail'],
            0
        );

        if(addNewCheckout($conn,$checkout)){
            //now we have to add a user read. so the book will appear in the users book shelf

            $query_insert_userRead = "INSERT INTO `user_read` (`user_reg_id`, `isbn`, `is_completed`) VALUES ('".$_POST['userId']."', '".$_POST['isbn']."', NULL)"; 
            $result_insert_userRead = mysqli_query($conn,$query_insert_userRead);
            
            //also if the user has this book in his book list /wish list we have to remove it

            $query_delete_bookList = "DELETE FROM `user_book_list` WHERE `isbn`='".$_POST['isbn']."' AND `user_reg_id`='".$_POST['userId']."'"; 
            $result_delete_bookList = mysqli_query($conn,$query_delete_bookList);
            

            //also we need to update the number of copies of the book 
            $query_update_copies = "UPDATE `book` SET `num_of_copies`=`num_of_copies` - 1 WHERE `isbn`='".$_POST['isbn']."' "; 
            $result_update_copies = mysqli_query($conn,$query_update_copies);
            
            if(mysqli_affected_rows($conn) == 1){
                goToCheckoutsPage();
                exit();                 
            }else{
                goToCheckoutsPage("Failed to add the checkout.");
                exit();    
            }
        }else{
            goToCheckoutsPage("Failed to add the checkout.");
            exit();
        }        


    }else{
        goToErrorPage("Unauthorized Access!");
        exit();    
    }

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>