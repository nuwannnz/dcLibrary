<?php require_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['models'] . '/User.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');

checkSession();

if(isset($_SESSION['user_detail'])){

 include_once($paths['include'] . '/logged_in_top.php'); 
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- links -->
        
        <?php 
        if(isset($_SESSION['user_detail'])){
            include_once($paths['include'] . '/logged_in_links.php');  
        }else{
            include_once($paths['include'] . '/home_links.php');
        }
        
        ?>      
    </head>

    
 <body>
        
        <!-- top header -->
<?php
    if(isset($_SESSION['user_detail'])){
        include_once($paths['include'] . '/logged_in_header.php'); 
    }else{
        include_once($paths['include'] . '/home_header.php');
    }
?>

        
            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

    

</div><!-- end of content container-->

        <!-- footer -->
        <?php 
         if(isset($_SESSION['user_detail'])){
                include_once($paths['include'] . '/logged_in_footer.php');  
            }else{
                include_once($paths['include'] . '/home_footer.php');
            }
        
        ?>
    </body>
</html>