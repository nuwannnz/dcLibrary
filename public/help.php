<?php require_once('../config.php'); ?>



<?php 

include_once($paths['functions'] . '/session_helpers.php');



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
          <?php 
            if(isset($_SESSION['user_detail'])){
                include_once($paths['include'] . '/logged_in_links.php');  
            }else{
                include_once($paths['include'] . '/home_links.php');
            }        
        
        ?>
        <link href="<?php echo $header_paths['css'] . '/input-styles.css'; ?>" rel="stylesheet">        
    </head>

    
<?php
    if(isset($_SESSION['user_detail'])){
        include_once($paths['include'] . '/logged_in_header.php'); 
    }else{
        include_once($paths['include'] . '/home_header.php');
    }
?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;padding-top:0px;" >
    
    <h1 style="margin-top:0px;padding-top:10px;" >Help</h1>

    <table>
        <tr>
            <td>
                <h4>What is DcLibrary online?</h4>
                <p>It's an online experience for registered users of the dcLibrary.</p>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Who can use DcLibrary online?</h4>
                <p>All the registered users can use DcLibrary online.</p>
            </td>
        </tr>

        <tr>
            <td>
                <h4>How can I create an online account?</h4>
                <p>You can create an online account with your registration id and the email you provided for registration at library.Please visit our <a href="register.php">registrations</a> page to create an online account.</p>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Why do I need to use DcLibrary online?</h4>
                <p>If you have a busy life, DcLibrary online can manage your book shelfs, due dates, wish lists and every thing. So you can enjoy reading.</p>
            </td>
        </tr>
    </table>


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
           