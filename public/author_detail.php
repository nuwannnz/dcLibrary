<?php require_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['models'] . '/User.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');
include_once($paths['functions'] . '/html_helper.php');

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
        <link rel="stylesheet" href="<?php echo $header_paths['css'] .'/book-detail-styles.css' ?>">
        
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

 <?php 
 
 if(isset($_GET['id'])){

    $CurrentAuthor = getAuthor($conn,$_GET['id']);
    if($CurrentAuthor == null){
        header("Location: " . $header_paths['public'] .'/all_authors.php');
        exit();   
    }
 }else{
     header("Location: " . $header_paths['public'] .'/all_authors.php');
     exit();
 }
 
 ?>       
            
<!-- content -->
<div id="content" class="content center-align-bl" style="min-height:770px;background-color:#fff;padding:0px;margin-top:30px;position:relative;" >

        <?php $AuthorImagePath =  $header_paths['images'] .'/authors/'. $CurrentAuthor->image; ?>
                   
    <div class="blur-background" style="height:430px;">
        <div class="blur-image"  style="background-image:url('<?php echo $AuthorImagePath; ?>');" >
        <div class="overlay-gray"></div>

        </div> 
    </div>    

    <div class="inner-container">
        <div class="book-container">
            <img class="book-cover float-left" style="width:250px;margin-top:42px;height:250px;border-radius:50%;background-color:#333;" src="<?php echo $AuthorImagePath; ?>"  alt="A photo of the author.">
            <div class="book-text-container float-left" style="position:relative;width:calc( 100% - 290px);" >
                
                <span class="title text-wrap" style="margin-top:140px;"><?php echo $CurrentAuthor->getFullName(); ?></span>
                                
            </div>
            <div class="clear-fix"></div>
                
        </div>

        
    </div><!-- end of inner container-->

    <p class="font-large" style="margin-left:10px;">Books by <?php echo ucfirst($CurrentAuthor->fname); ?></p>

    <div class="" style="margin-bottom:30px;">
            <?php 
                $books = getBooksOfAuthor($conn,$CurrentAuthor->id);
                if(count($books) >0 ){
                   
                    foreach ($books as $book ) {
                        
                       echo "<div class=\"float-left\">";
                            echo "<a href=\"". $header_paths['public'] . '/book_detail.php?isbn='.$book->isbn."\" style=\"text-decoration:none;\">";
                                echo "<img src=\"".$header_paths['images']. '/books/'.$book->cover_image."\" style=\"width:170px;height:250px;margin:10px;\" >";
                                echo "<p class=\"site-font-m text-wrap\" style=\"margin:0px;margin-left:10px;max-width:170px;color:#333;\">". $book->title."</p>";
                            echo "</a>";
                       echo "</div>";

                    }    
                       
                    echo "<div class=\"clear-fix\"></div>";
                }else{
                    echo "<p style=\"text-align:center;\">There are no books by this author yet.</p>";
                }
                    
            ?>
                                

    </div><!-- end of books by author container-->
    


    
    


</div><!-- end of content container-->

</div>
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