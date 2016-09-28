<?php require_once('../../config.php') ?>

<?php include_once($paths['include'] . '/logged_in_top.php') ?>

<?php

//if this is the first time user logged in 
// redirect to the profile pic upload page 
if($CurrentUser->image == null){
    goToProfilePicPage();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- links -->
        <?php include_once($paths['include'] . '/logged_in_links.php') ?>      
    </head>

    
 <body>
        
        <!-- top header -->
        <?php include_once($paths['include'] . '/logged_in_header.php') ?>

        
            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

</div><!-- end of content container-->

        <!-- footer -->
        <?php include_once($paths['include'] . '/logged_in_footer.php') ?>
    </body>
</html>