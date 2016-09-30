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
 
 if(isset($_GET['isbn'])){

    $CurrentBook = getBook($conn,$_GET['isbn']);
    
 }
 
 ?>       
            
<!-- content -->
<div id="content" class="content center-align-bl" style="min-height:770px;background-color:#fff;padding:0px;margin-top:30px;position:relative;" >

        <?php $coverImagePath =  $header_paths['images'] .'/books/'. $CurrentBook->cover_image; ?>
                   
    <div class="blur-background">
        <div class="blur-image"  style="background-image:url('<?php echo $coverImagePath; ?>');" >
        <div class="overlay-gray"></div>

        </div> 
    </div>    

    <div class="inner-container">
        <div class="book-container">
            <img class="book-cover float-left" src="<?php echo $coverImagePath; ?>" alt="Cover image of the book.">
            <div class="book-text-container float-left" style="position:relative;" >
                <span class="title text-wrap"><?php echo $CurrentBook->title ?></span>
                <span class="author text-wrap">by
                    <?php 
                    
                    foreach($CurrentBook->author_ids as $author_id){
                        $author = getAuthor($conn,$author_id);
                        echo "<a href=\"#\" >".ucfirst($author->fname) ." ". ucfirst($author->lname) . "</a>";
                        if(count($CurrentBook->author_ids)>0 ){
                            echo "&nbsp&nbsp"; 
                        }
                    }
                    
                     ?>
                </span>

                <span class="description text-wrap"> <?php echo $CurrentBook->description; ?></span>

                <span class="genre text-wrap"> 
                    <?php 
                        $genre = getGenre($conn,$CurrentBook->genre_id);
                        echo "<a href=\"#\">" . $genre->name . "</a>"
                    ?>
                </span>

                <div class="rating-container" >
                   <!-- <span id="star1" class="rating-star-selected" style="display:inline-block;"></span>
                    <span id="star2" class="rating-star-selected" style="display:inline-block;"></span>
                    <span id="star3" class="rating-star" style="display:inline-block;"></span>
                    <span id="star4" class="rating-star" style="display:inline-block;"></span>
                    <span id="star5" class="rating-star" style="display:inline-block;"></span> 
                    <span style="display:inline-block;"> </span>
                    <span id="starValue" style="display:inline-block;vertical-align:top;margin-top:1px;" ><?php echo getRatingForBook($conn,$CurrentBook->isbn); ?></span>
                    -->
                    <?php echo  getRatingStars(getRatingForBook($conn,$CurrentBook->isbn)); ?>                   
                </div>
            </div>
            <div class="clear-fix"></div>

            <a class="border-button" style="padding:4px 10px;width:188px;margin:10px 0px 0px 0px;border-color:rgba(255,255,255,0.7)" href="#">Add to my list</a>

            
        </div>

        <table class="circle-detail-table">
            <tr>
                <td>
                    <div class="circle-detail center-align-bl">
                        <div class="circle">
                            <img src="../resources/images/pages.png" style="opacity:0.7;" alt="Number of pages.">
                        </div>
                        <div class="circle-text">
                            <span class="site-font-m">Pages</span>
                            <span style="opacity:0.7;margin-top:5px;"><?php echo $CurrentBook->page_count; ?></span>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="circle-detail center-align-bl">
                        <div class="circle">
                            <img src="../resources/images/reads.png" style="opacity:0.7;" alt="Number of pages.">
                        </div>
                        <div class="circle-text">
                            <span class="site-font-m">Reads</span>
                            <span style="opacity:0.7;margin-top:5px;"><?php echo $CurrentBook->getNumOfReadsFormatted(); ?></span>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="circle-detail center-align-bl">
                        <div class="circle">
                            <img src="../resources/images/copies1.png" style="opacity:0.7;" alt="Number of pages.">
                        </div>
                        <div class="circle-text">
                            <span class="site-font-m">Copies</span>
                            <span style="opacity:0.7;margin-top:5px;"><?php echo $CurrentBook->num_of_copies; ?></span>
                        </div>
                    </div>
                </td>
            </tr>
        </table>


        
    </div><!-- end of inner container-->

            <p class="font-large" style="margin-left:10px;">Reviews</p>
    <div class="reviews-container">
            <?php 
                $reviews = getReviewsForBook($conn,$CurrentBook->isbn);
                if(count($reviews) >0 ){
                   
                    foreach ($reviews as $review ) {
                        $user = getUser($conn,$review->user_id);
                        echo "<div class=\"review-container float-left\">";

                            echo "<table>";

                                echo "<tr>";
                                    //image
                                    echo "<td>";
                                        echo "<img src=\"".$header_paths['images'] . '/users/' .$user->image."\" />";
                                    echo "</td>";

                                    //name
                                    echo "<td>";
                                        echo "<p>" . $user->getFName() . "</p>";
                                        echo getRatingStars($review->rating);
                                    echo "</td>";

                                    //date
                                    echo "<td style=\"padding-top:5px;vertical-align:text-top;\">";
                                        echo "<span>" . $review->date . "</span>";
                                    echo "</td>";
                                echo "<tr>";

                                echo "<tr>";
                                    //content
                                    echo "<td colspan=\"3\">";
                                        echo "<p class=\"text-wrap\">" . $review->content . "</p>";
                                    echo "</td>";
                                echo "<tr>";

                            echo "</table>";

                        echo "</div>";

                    }    
                       
                    echo "<div class=\"clear-fix\"></div>";
                }else{
                    echo "<p>There are no reviews for this book yet.</p>";
                }
                    
            ?>
                                
<script>
    function viewMore(){
        var container = document.getElementsByClassName('reviews-container')[0];
        var button = document.getElementById('viewMore');
        container.style.maxHeight="inherit";
        
        button.innerHTML = "Show less";
        button.onclick = function(){viewLess()};
    }

    function viewLess(){
        var container = document.getElementsByClassName('reviews-container')[0];
        var button = document.getElementById('viewMore');
        container.style.maxHeight="180px";
        
        button.innerHTML = "View more";
        button.onclick = function(){viewMore()};
    }
    
</script>
    </div><!-- end of reviews container-->
    
    <?php 
        if(count($reviews)){
            echo "<a href=\"javascript: void();\" id=\"viewMore\" onclick=\"viewMore();\" style=\"display:block;text-align:center;text-decoration:none;margin:10px;\" >View More</a>";
        }
    ?>

    <hr style="position:absolute;top:430px;left:0px;right:0px;border:0px;border-top: 0.01px solid rgba(255,255,255,0.4);" />
    
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