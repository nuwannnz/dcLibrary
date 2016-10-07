<?php include_once('../config.php') ?>
<?php 
include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_POST['addToList'])) {
     if(isset($_SESSION['user_detail'])) {
          include_once($paths['functions'] . '/db_helper.php');
          include_once($paths['include'] . '/connection.php');

          if($_POST['add'] == 1){
            $status = addBookToList($conn,$_POST['isbn'],$_SESSION['user_detail']);
          }else{
            $status= removeFromBookList($conn,$_POST['isbn'],$_SESSION['user_detail']);
          }

          if($status){

              if(isset($_POST['return_location'])){
                header("Location: " . $_POST['return_location']);
                exit();    
              }
              header("Location: " . $header_paths['public'] . '/book_detail.php?isbn=' . $_POST['isbn']);
              exit();
          }else{
              echo "Failed to add/remove book list";
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