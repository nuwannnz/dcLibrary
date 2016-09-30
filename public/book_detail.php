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
            <form  action="<?php echo $header_paths['submit_forms'] .'/book_list_submit.php'; ?>" method="POST">
            <input type="hidden" name="add" value="<?php echo isBookListContainsBook($conn,$CurrentBook->isbn,$CurrentUser->id) === true ? 0 : 1 ?> "/>
            <input type="hidden" name="isbn" value="<?php echo $CurrentBook->isbn ?>" />            
            <input class="border-button book-list-button" type="submit" name="addToList" style="" href="#" value="<?php echo isBookListContainsBook($conn,$CurrentBook->isbn,$CurrentUser->id) === true ? "Remove from my list ":"Add to my list" ?>" />
            </form>    
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
    <?php 
    if(isset($_SESSION['user_detail'])) {
         echo "<a class=\"border-button\" onclick=\"showReviewBox();\" style=\"padding:4px 10px;margin:10px 0px 0px 0px;border-color:#222233;color:#222233;position:absolute;right: 20px;top: 542px;\" href=\"javascript: void(0);\">Write a review</a>"; 
    }else{
            $message = base64_encode(urlencode("Please sign in to write a review"));
         echo "<a class=\"border-button\" href=\"". $header_paths['public'] . "/login.php?message=$message"."\" style=\"padding:4px 10px;margin:10px 0px 0px 0px;border-color:#222233;color:#222233;position:absolute;right: 20px;top: 542px;\" >Write a review</a>";
    }
    
    ?>
    
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
                                    echo "<td style=\"width:48px;\">";
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
            echo "<a href=\"javascript: void(0);\" id=\"viewMore\" onclick=\"viewMore();\" style=\"display:block;text-align:center;text-decoration:none;margin:10px;\" >View More</a>";
        }
    ?>

    <hr style="position:absolute;top:430px;left:0px;right:0px;border:0px;border-top: 0.01px solid rgba(255,255,255,0.4);" />
    

    

<div id="add-review-container" class="popup-container" style="display:none;">
    <div class="popup"  >
        <form action="<?php echo $header_paths['submit_forms'] . '/review_submit.php'; ?>" method="POST" onsubmit="return validateReview();">
        <table style="width:100%;">
            <tr>
                <td style="width:48px;">
                    <!-- image--> 
                    <img class="profile-image-circle" src="<?php echo $header_paths['images'] . '/users/' . $CurrentUser->image; ?>" >
                </td>
                <td>
                    <!-- name-->
                    <span><?php echo $CurrentUser->getFName(); ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span id="rstar1" class="rating-star-selected" style="display:inline-block;"></span>
                    <span id="rstar2" class="rating-star" style="display:inline-block;"></span>
                    <span id="rstar3" class="rating-star" style="display:inline-block;"></span>
                    <span id="rstar4" class="rating-star" style="display:inline-block;"></span>
                    <span id="rstar5" class="rating-star" style="display:inline-block;"></span> 
                    
                    <select name="rating" id="rating" style="margin-left:10px;" onchange="onRateChange(this.value);">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <script>

                        function validateReview(){
                            var content = document.getElementById('rcontent');
                            if(content.value == "" ){
                                return false;
                            }
                            return true;
                        } 

                       function onRateChange(rate){
                            var stars = [];
                            stars.push(document.getElementById('rstar1'));
                            stars.push(document.getElementById('rstar2'));
                            stars.push(document.getElementById('rstar3'));
                            stars.push(document.getElementById('rstar4'));
                            stars.push(document.getElementById('rstar5'));

                            for(var i in stars){
                                stars[i].className ='';
                            }

                            var s = "rating-star-selected";
                            var n = "rating-star";

                            var c1 = rate >= 1 ? s : n;
                            var c2 = rate >= 2 ? s : n;
                            var c3 = rate >= 3 ? s : n;
                            var c4 = rate >= 4 ? s : n;
                            var c5 = rate == 5 ? s : n;

                            stars[0].className += c1;
                            stars[1].className += c2;
                            stars[2].className += c3;
                            stars[3].className += c4;
                            stars[4].className += c5;

                        }
                    </script>            
                </td>
                
            </tr>

            <tr>
                <td colspan="2">
                    <textarea name="rcontent" id="rcontent" cols="94" style="max-width:480px;max-height:200px;font-size:16px;" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;padding-right:6px;">
                    <input type="submit" name="reviewSubmit" class="input-button" style="width:100px;height:27px;font-size:16px;padding-top:3px;display:inline-block;border-radius:5px;" value="Add review">
                    <a class="input-button"  onclick="closeReview();" style="display:inline-block;width:100px;height:22px;font-size:16px;border-radius:5px;text-align:center;padding-top:3px;" >Cancel</a>
                </td>
            </tr>
        </table>
        <input type="hidden" name="isbn" value="<?php echo $CurrentBook->isbn; ?>">
        <input type="hidden" name="userId" value="<?php echo $CurrentUser->id; ?>">
        </form>
    </div>
</div>

<script>
    function showReviewBox(){
        var reviewBox = document.getElementById("add-review-container");
        reviewBox.style.display ="block";
    } 
    
    function closeReview(){
        var reviewBox = document.getElementById("add-review-container");
        reviewBox.style.display ="none";
    }
    
    
    

</script>

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