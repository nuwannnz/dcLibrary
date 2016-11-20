<?php require_once('../config.php') ?>

<?php 

include_once($paths['models'] . '/User.php');
include_once($paths['include'] . '/connection.php');
include_once($paths['functions'] . '/db_helper.php');
include_once($paths['functions'] . '/session_helpers.php');
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
    <h1 style="margin:0px;margin-bottom:20px;padding-top:20px;">Explore Books</h1>
    <!-- top books -->
    <div class="explore-container" style="background-color:#EDE7F6;min-height:325px;">
        <h2>Top books</h2>
                
        <table style="width:100%;margin-top:20px;">
            <tr>
        <?php
            $topBooks = getTopBooks($conn,3);

            foreach ($topBooks as $topBook) {                
                echo "<td>";
                    printBookMoreDetail($topBook);
                echo "</td>";
            }
        ?>
            <tr>
        </table>
        
       
    </div><!-- end of top books -->

    
    <!-- top authors -->
    <div class="explore-container" style="background-color:#222233;min-height:270px";>
        <h2 style="color:#fff">Top authors</h2>
        <table class="top-authors" style="width:100%">
            <tr>
            <?php 
            $topAuthors = getTopAuthors($conn,4);
            
            foreach ($topAuthors as  $topAuthor) {
                echo "<td class=\"author-port-td\">";
                    echo "<a href=\"". $header_paths['public']. '/author_detail.php?id='. $topAuthor->id."\" >";
                        echo "<img src=\"". $header_paths['images'] . '/authors/'. $topAuthor->image ."\" style=\"\" />";
                        echo "<p> ". $topAuthor->getFullName()." </p>";
                    echo "</a>";
                echo "</td>";    
            }
        
        ?>
            </tr>
        </table>
    </div><!-- end of top authors -->

    
    <!-- all books -->
    <div class="explore-container" style="background-color:#EDE7F6;">
        <h2>All books</h2>

        <div style="width:100%;margin-top:20px;">
        <?php
        $allBooks = getAllBooks($conn);

        foreach ($allBooks as  $allBook) {
            echo "<span class=\"float-left\" style=\"margin:10px;\">";
                printBookMoreDetail($allBook);
            echo "</span>";
        }   

         ?>
        </div>
        <div class="clearfix"></div>
        

    </div><!-- end of all books -->    





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