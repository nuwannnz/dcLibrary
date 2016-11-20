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
    
    <h1 style="margin-top:0px;padding-top:10px;" >Contact us</h1>
     
    <h2 style="margin-bottom:5px;">Dc Library</h2>
    <ul style="list-style-type:none;padding:0px;margin:0px 0px 20px 0px;">
        <li>JR road,</li>
        <li>Colombo 09.</li>
        <li>tel: 0112233443</li>
        <li>fax: 0122332444</li>
    </ul>
    
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8167612277985!2d79.85671921466097!3d6.912500320436815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2596ec416915f%3A0x665df8723d642688!2sColombo+Public+Library!5e0!3m2!1sen!2slk!4v1477843619051" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

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
           