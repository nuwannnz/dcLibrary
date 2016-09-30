<?php 

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


?>