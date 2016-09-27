<?php require_once('../config.php'); ?>

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
    
    <h1 class="center-align-in" style="margin-top:0px;padding-top:30px;" >Join dcLibrary online</h1>

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

    <form action="../submit_forms/register_submit.php" method="POST" class="input-form" onsubmit="return validateRegisterForm();" >
        
        <p id="regid_error" class="error-text">please enter a valid registration number</p>
        <input class="center-align-bl" type="text" name="regId" id="regId" placeholder="Registration Number" >
        
        <p id="email_error" class="error-text">please enter a valid email</p>
        <input class="center-align-bl" type="email" name="email" id="email" placeholder="Email" >
        
        <p id="uname_error" class="error-text">please enter a valid username</p>
        <input class="center-align-bl" type="text" name="uname" id="uname" placeholder="Username" >
        
        <p id="pword_error" class="error-text">please enter a valid password</p>
        <input class="center-align-bl" type="password" name="pword" id="pword" placeholder="Password" >

        <p class="font-small">By clicking Sign up, you agree to our <a href="#">Terms and Conditions</a>.</p>

        <input class="center-align-bl site-font-m " type="submit" name="register" id="register" value="Register" >

        <p class="font-small">NOTE: You should first register in the library before <span style="display:block;">you can create an online account.</span></p>
    </form>

    <!-- validation script-->
    <script src="../js/validations.js"></script>
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php'); ?>
           