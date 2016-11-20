
<?php 

// this script contains helper functions to generate repititive html

function getRatingStars($rating){
$s = "rating-star-selected";
$n = "rating-star";

$s1 = $rating >=1 ? $s : $n;
$s2 = $rating >=2 ? $s : $n;
$s3 = $rating >=3 ? $s : $n;
$s4 = $rating >=4 ? $s : $n;
$s5 = $rating ==5 ? $s : $n;


$m = <<<R
<div class="" >
    <span id="star1" class="$s1" style="display:inline-block;"></span>
    <span id="star2" class="$s2" style="display:inline-block;"></span>
    <span id="star3" class="$s3" style="display:inline-block;"></span>
    <span id="star4" class="$s4" style="display:inline-block;"></span>
    <span id="star5" class="$s5" style="display:inline-block;"></span> 
    <span style="display:inline-block;"> </span>
    <span id="starValue" style="display:inline-block;vertical-align:top;margin-top:1px;" >$rating</span>                   
</div>
R;

return $m;
}

function printBook($book){
    global $header_paths;
    echo "<a style=\"float:left;text-decoration:none;\" href=\"". $header_paths['public']. '/book_detail.php?isbn='. $book->isbn ."\">";                                
                                echo "<table class=\"book\">";
                                    echo "<tr>";

                                        echo "<td style=\"width:150px;\">";
                                            echo "<img src=\"". $header_paths['images']. '/books/'.$book->cover_image ."\" />";
                                            echo "</a>";
                                        echo "</td>";

                                        echo "<td style=\"vertical-align:top;\">";                                 
                                            echo "<p class=\"title text-wrap\">". $book->title ."</p>";                    
                                        echo "</td>";

                                    echo "</tr>";
                                echo "</table>";                    
                            echo "</a>"; 
}

function printBookMoreDetail($book){
    global $header_paths;
    global $conn;
    echo "<table style=\"width:300px;max-width:300px;\">";
                    echo "<tr>";
                        //cover image
                        echo "<td rowspan=\"4\" style=\"width:125px;\">";
                                echo "<a href=\"". $header_paths['public'].'/book_detail.php?isbn='. $book->isbn."\" >";
                                    echo "<img src=\"". $header_paths['images'] .'/books/'. $book->cover_image ."\" style=\"width:125px;height:180px;margin-right:10px;\" />";
                                    echo "</a>";
                        echo "</td>";

                        //title
                        echo "<td style=\"height:30px;\">";
                               echo "<a style=\"text-decoration:none;color:#222;\" href=\"". $header_paths['public'].'/book_detail.php?isbn='. $book->isbn."\" >";
                                    echo "<p class=\"title text-wrap\" style=\"max-width:160px;width:160px;font-size:18px\">". $book->title ."</p>";
                                echo "</a>"; 
                        echo "</td>";

                    echo "</tr>";

                    echo "<tr>";
                        //authors
                        echo "<td style=\"height:30px;\">";
                        if(count($book->author_ids) > 0){
                            echo "<span class=\"author text-wrap\" style=\"font-size:14px\">by&nbsp";
                            foreach($book->author_ids as $author_id){
                                $author = getAuthor($conn,$author_id);
                                echo "<a href=\"".$header_paths['public'] . '/author_detail.php?id='. $author_id ."\" >".ucfirst($author->fname) ." ". ucfirst($author->lname) . "</a>";
                                if(count($book->author_ids)>1 ){
                                    echo ", &nbsp <br>"; 
                                }
                            }
                        }                                    
                                      
                        echo "</span>";
                        echo "</td>";

                    echo "</tr>";

                    //rating stars
                    echo "<tr>";
                        echo "<td>";
                                echo getRatingStars(getRatingForBook($conn,$book->isbn));
                        echo "</td>";

                    echo "</tr>";
                    
                    //num of reads
                    echo "<tr>";
                        echo "<td>";
                           echo  "<span >". $book->getNumOfReadsFormatted() ."&nbsp reads</span>";
                        echo "</td>";

                    echo "</tr>";

                echo "</table>";
}

?>