<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
    
    if(isset($_POST['addCheckin']) && $_POST['addCheckin']== 'Add checkin'){        
        include_once($paths['functions'] . '/db_helper.php');
        include_once($paths['include'] . '/connection.php');
        include_once($paths['models'] . '/book.php');

        //check whether the checkout id is correct
        $query_select_userid = "SELECT * FROM `book_checkout` WHERE `checkout_id`='".$_POST['checkoutId']."' AND `is_returned`='0'"; 
        $result_select_userid = mysqli_query($conn,$query_select_userid);
        if(mysqli_num_rows($result_select_userid) != 1){
            goToCheckinsPage("Wrong checkout id");
            exit();
        }       

        $checkout = mysqli_fetch_assoc($result_select_userid);

        //now we can insert the checkin
        $checkin = new BookCheckin(
            null,
            $_POST['checkoutId'],
            $_SESSION['admin_detail'],
            date("Y-m-d",time())
        );

        if(addNewCheckin($conn,$checkin)){          

            //also we need to update the number of copies of the book
            $query_update_copies = "UPDATE `book` SET `num_of_copies`=`num_of_copies` + 1 WHERE `isbn`='".$checkout['isbn']."' "; 
            $result_update_copies = mysqli_query($conn,$query_update_copies);

            


            goToCheckinsPage();
            exit();    
        }else{
            goToCheckinsPage("Failed to add the checkout.");
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