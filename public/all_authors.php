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
        <link href="<?php echo $header_paths['css'] . '/explore-books-styles.css'; ?>" rel="stylesheet">
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

 <h2>All authors</h2>

 <div class="center-align-in" style="width:100%;min-height:600px;">

     <?php 
            $allAuthors = getAllAuthors($conn);
            
            foreach ($allAuthors as  $author) {
                echo "<div class=\"author-port-td float-left\" style=\"width:110px;min-height:210px;margin:0px 25px;\">";
                    echo "<a href=\"". $header_paths['public']. '/author_detail.php?id='. $author->id."\" >";
                        echo "<img src=\"". $header_paths['images'] . '/authors/'. $author->image ."\" style=\"\" />";
                        echo "<p style=\"color:#000;\"> ". $author->getFullName()." </p>";
                    echo "</a>";
                echo "</div>";    
            }
        
        ?>
        <div class="clear-fix">

        </div>
 </div>
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