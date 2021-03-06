<?php require_once('../config.php'); ?>
<?php 
    include_once($paths['functions'] . '/session_helpers.php');
    checkSession();
    if(isset($_SESSION['admin_detail'])) {
        header("Location:" . $header_paths['public'] . '/admin/books.php');
        exit();
    }

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once($paths['include'] . '/home_links.php') ?>
        <link href="<?php echo $header_paths['css'] . '/input-styles.css'; ?>" rel="stylesheet">        
    </head>

    
<?php require_once($paths['include'] . '/home_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;padding-top:50px;" >
    
    <h1 class="center-align-in" style="margin-top:0px;padding-top:30px;" >Staff login</h1>

<?php 

if(isset($_GET['message'])){
    $message = urldecode(base64_decode($_GET['message']));
echo <<<ERROR_MESSAGE
    <div class="error-message-container center-align-bl">
        <p  style="margin:0px;">$message</p>
    </div>
ERROR_MESSAGE;
}
?>

    <form action="<?php echo $header_paths['submit_forms'] . '/admin_login_submit.php'; ?>" method="POST" class="input-form" onsubmit="return validateLoginForm();"  >
        
               
        <p id="uname_error" class="error-text">please enter a valid username</p>
        <input class="center-align-bl" type="text" name="uname" id="uname" placeholder="Username" >
        
        <p id="pword_error" class="error-text">please enter a valid password</p>
        <input class="center-align-bl" type="password" name="pword" id="pword" placeholder="Password" >

        <input class="center-align-bl site-font-m " type="submit" name="login" id="login" value="Log in" >
        
    </form>

    <!-- validation script-->
    <script src="<?php echo $header_paths['js'] . '/validations.js'; ?>"></script>
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php'); ?>
           