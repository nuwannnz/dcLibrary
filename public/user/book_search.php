<?php require_once('../../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['models'] . '/User.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');
include_once($paths['functions'] . '/html_helper.php');



checkSession();

include_once($paths['include'] . '/logged_in_top.php'); 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- links -->
        
        <?php 
        
            include_once($paths['include'] . '/logged_in_links.php');  
               
        
        ?>
         <link href="<?php echo $header_paths['css'] . '/explore-books-styles.css'; ?>" rel="stylesheet">              
    </head>

    
 <body>
        
        <!-- top header -->
<?php

        include_once($paths['include'] . '/logged_in_header.php'); 
   
?>

<?php

if(!isset($_GET['q'])){
    header("Location:" . $header_paths['public']. '/explore_books.php');
}

 ?>
            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;padding-bottom:20px;" >
    <h1 style="margin:0px;margin-bottom:20px;padding-top:20px;">Search results for : <?php echo $_GET['q']; ?></h1>
    <!-- books -->
    <div class="explore-container" style="background-color:#EDE7F6;min-height:325px;">
        <h2>Books</h2>
                
       <?php
        $Books = getQueryBooks($conn,$_GET['q']);

        if(count($Books) > 0){        
            foreach ($Books as  $Book) {
                echo "<span class=\"float-left\" style=\"margin:10px;\">";
                    printBookMoreDetail($Book);
                echo "</span>";
            }
        }else{
            echo "<p class=\"center-align-in\" style=\"padding-top:100px;\">Sorry, No matching books for search term '".$_GET['q']."' </p>";
        }   
        ?>
       
    </div><!-- end of books -->

    
    <!-- top authors -->
    <div class="explore-container" style="background-color:#222233;min-height:270px;";>
        <h2 style="color:#fff">Authors</h2>
      
        <?php
             
            $authors = getQueryAuthors($conn,$_GET['q']);

            if(count($authors) > 0){            
                foreach ($authors as  $author) {
                    echo "<span class=\"float-left author-port-td\" style=\"margin:10px;\">";
                        echo "<a href=\"". $header_paths['public']. '/author_detail.php?id='. $author->id."\" >";
                            echo "<img src=\"". $header_paths['images'] . '/authors/'. $author->image ."\" style=\"\" />";
                            echo "<p> ". $author->getFullName()." </p>";
                        echo "</a>";
                    echo "</span>";    
                }
            }else{
                echo "<p class=\"center-align-in\" style=\"padding-top:80px;color:#fff;\">Sorry, No matching authors for search term '".$_GET['q']."' </p>";
            }
        ?>
    </div><!-- end of top authors -->

    

</div><!-- end of content container-->

        <!-- footer -->
        <?php 
         
                include_once($paths['include'] . '/logged_in_footer.php');  
            
        ?>
    </body>
</html>