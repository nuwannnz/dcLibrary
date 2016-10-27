<?php require_once('../../config.php') ?>
<?php require_once($paths['include'] . '/admin_top.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once($paths['include'] . '/admin_links.php') ?>        
        <link href="<?php echo $header_paths['css'] . '/input-styles.css'; ?>" rel="stylesheet">    

        <style>
            label{
                margin-top:10px;
                display:block;
            }
            .select-wrapper{
                display:inline-block;
                width:200px;
                height:80px;                
            }
            select{
                margin-top:10px;
                padding:5px;
            }            
        </style>        
    </head>

    
<?php require_once($paths['include'] . '/admin_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

<?php 

if(isset($_GET['id'])) {
    echo "<h2>Edit user ( Register id:".$_GET['id']." )</h2>";
    $CurrentUser = getUser($conn,$_GET['id']);
}else{
    echo "<h2>Add a user</h2>";
    $CurrentUser = null;
}

 
//error message
if(isset($_GET['message'])){
    $message = urldecode(base64_decode($_GET['message']));
echo <<<ERROR_MESSAGE
    <div class="error-message-container center-align-bl">
        <p  style="margin:0px;">$message</p>
    </div>
ERROR_MESSAGE;
}



?>

<form action="<?php echo $header_paths['submit_forms'] .'/user_submit.php' ?>" method="POST" onsubmit="return onAdd();"  >
   
    <label for="fname">First name</label>
    <input type="text" name="fname" value="<?php print($CurrentUser==null ? '' : $CurrentUser->fname) ?>">

    <label for="lname">Last name</label>
    <input type="text" name="lname" value="<?php print($CurrentUser==null ? '' : $CurrentUser->lname) ?>">

     <label for="email">Email</label>
    <input type="email" name="email" value="<?php print($CurrentUser==null ? '' : $CurrentUser->email) ?>">
   

    <?php 
    
    if($CurrentUser == null){
        echo "<input type=\"submit\" name=\"addUser\" value=\"Add User\">"; 
    }else{
        echo "<input type=\"submit\" name=\"saveUser\" value=\"Save User\">";
    }
    
    ?>    
</form>

    
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           